<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ShortenedUrl;
use App\Models\ToolUsage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ToolsController extends Controller
{
    /**
     * Dashboard - Show available tools
     */
    public function dashboard()
    {
        $tools = [
            [
                'name' => 'QR Code Generator',
                'description' => 'Generate QR codes for URLs, text, WiFi, and more',
                'icon' => '📱',
                'route' => 'tools.qr-generator',
                'category' => 'generators',
                'popular' => true
            ],
            [
                'name' => 'URL Shortener',
                'description' => 'Shorten long URLs and track clicks',
                'icon' => '🔗',
                'route' => 'tools.url-shortener',
                'category' => 'web',
                'popular' => true
            ]
        ];

        // Get usage stats for display
        $stats = [
            'total_tools' => count($tools),
            'monthly_users' => $this->getMonthlyUsers(),
            'total_usage' => $this->getTotalUsage(),
        ];

        return view('tools.dashboard', compact('tools', 'stats'));
    }

    /**
     * QR Code Generator
     */
    public function qrGenerator()
    {
        return view('tools.qr-generator');
    }

    public function generateQr(Request $request)
    {
        $request->validate([
            'data' => 'required|string|max:2048',
            'size' => 'integer|min:100|max:800',
            'type' => 'in:text,url,wifi,email,phone'
        ]);

        $data = $request->input('data');
        $size = $request->input('size', 300);
        $type = $request->input('type', 'text');

        // Format data based on type
        switch($type) {
            case 'wifi':
                $ssid = $request->input('ssid', '');
                $password = $request->input('password', '');
                $data = "WIFI:T:WPA;S:{$ssid};P:{$password};;";
                break;
            case 'email':
                $data = "mailto:{$data}";
                break;
            case 'phone':
                $data = "tel:{$data}";
                break;
        }

        try {
            // Generate QR code as SVG with better styling
            $qrCode = QrCode::size($size)
                            ->format('svg')
                            ->margin(1)
                            ->errorCorrection('M')
                            ->generate($data);

            // Clean the SVG and ensure it displays properly
            $cleanSvg = str_replace(['<?xml version="1.0" encoding="UTF-8"?>', "\n", "\r"], '', $qrCode);
            
            // Log usage
            $this->logToolUsage('qr_generator', $request, [
                'type' => $type,
                'size' => $size,
                'data_length' => strlen($data)
            ]);

            return response()->json([
                'success' => true,
                'qr_code' => $cleanSvg,
                'original_data' => $data,
                'type' => $type,
                'size' => $size
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to generate QR code: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * URL Shortener
     */
    public function urlShortener()
    {
        return view('tools.url-shortener');
    }

    public function shortenUrl(Request $request)
    {
        $request->validate([
            'url' => 'required|url|max:2048'
        ]);

        $originalUrl = $request->input('url');

        try {
            // Check if URL already exists (optional feature)
            $existing = ShortenedUrl::where('original_url', $originalUrl)
                                   ->where('is_active', true)
                                   ->first();

            if ($existing) {
                $shortCode = $existing->short_code;
            } else {
                // Generate new short code
                $shortCode = ShortenedUrl::generateUniqueCode(6);
                
                // Get page title (optional)
                $title = $this->getPageTitle($originalUrl);

                // Create shortened URL
                ShortenedUrl::create([
                    'short_code' => $shortCode,
                    'original_url' => $originalUrl,
                    'title' => $title,
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent()
                ]);
            }

            $shortUrl = url("/s/{$shortCode}");

            // Log usage
            $this->logToolUsage('url_shortener', $request, [
                'url_length' => strlen($originalUrl),
                'domain' => parse_url($originalUrl, PHP_URL_HOST)
            ]);

            return response()->json([
                'success' => true,
                'original_url' => $originalUrl,
                'short_url' => $shortUrl,
                'short_code' => $shortCode,
                'clicks' => $existing ? $existing->click_count : 0
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to shorten URL: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Redirect short URL
     */
    public function redirectShortUrl($code)
    {
        $shortUrl = ShortenedUrl::where('short_code', $code)
                                ->active()
                                ->first();

        if (!$shortUrl) {
            abort(404, 'Short URL not found or expired');
        }

        // Increment click count
        $shortUrl->incrementClicks(request()->ip(), request()->userAgent());

        // Redirect to original URL
        return redirect($shortUrl->original_url);
    }

    /**
     * Get URL analytics (for future premium feature)
     */
    public function urlAnalytics($code)
    {
        $shortUrl = ShortenedUrl::where('short_code', $code)->first();

        if (!$shortUrl) {
            abort(404);
        }

        return view('tools.url-analytics', compact('shortUrl'));
    }

    /**
     * Helper: Log tool usage
     */
    private function logToolUsage($toolName, Request $request, $metadata = null)
    {
        ToolUsage::logUsage(
            $toolName,
            $request->ip(),
            $request->userAgent(),
            false, // Premium status
            $metadata
        );
    }

    /**
     * Helper: Get page title from URL
     */
    private function getPageTitle($url)
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_USERAGENT, 'ToolHub URL Shortener');
            
            $html = curl_exec($ch);
            curl_close($ch);

            if ($html && preg_match('/<title>(.*?)<\/title>/is', $html, $matches)) {
                return trim(strip_tags($matches[1]));
            }
        } catch (\Exception $e) {
            // Silently fail and return null
        }

        return null;
    }

    /**
     * Helper: Get monthly users count
     */
    private function getMonthlyUsers()
    {
        return ToolUsage::where('used_at', '>=', now()->subMonth())
                       ->distinct('ip_address')
                       ->count();
    }

    /**
     * Helper: Get total usage count
     */
    private function getTotalUsage()
    {
        return ToolUsage::count();
    }
}