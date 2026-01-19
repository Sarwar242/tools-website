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
                'name' => 'JSON Formatter',
                'description' => 'Format, validate, and beautify JSON data',
                'icon' => '📋',
                'route' => 'tools.json-formatter',
                'category' => 'developers',
                'popular' => true
            ],
            [
                'name' => 'Password Generator',
                'description' => 'Generate strong, secure passwords instantly',
                'icon' => '🔐',
                'route' => 'tools.password-generator',
                'category' => 'generators',
                'popular' => true
            ],
            [
                'name' => 'Base64 Encoder/Decoder',
                'description' => 'Encode and decode Base64 strings',
                'icon' => '🔄',
                'route' => 'tools.base64-encoder',
                'category' => 'developers',
                'popular' => false
            ],
            [
                'name' => 'Hash & Bcrypt Generator',
                'description' => 'Generate Bcrypt, MD5, SHA-1, SHA-256, SHA-512 hashes',
                'icon' => '🔏',
                'route' => 'tools.hash-generator',
                'category' => 'developers',
                'popular' => true
            ],
            [
                'name' => 'Text Case Converter',
                'description' => 'Convert text to uppercase, lowercase, title case',
                'icon' => '📝',
                'route' => 'tools.text-case-converter',
                'category' => 'text',
                'popular' => false
            ],
            [
                'name' => 'Sitemap Generator',
                'description' => 'Generate XML sitemaps for better SEO',
                'icon' => '🗺️',
                'route' => 'tools.sitemap-generator',
                'category' => 'web',
                'popular' => true
            ],
            [
                'name' => 'URL Encoder/Decoder',
                'description' => 'Encode and decode URL strings for safe transmission',
                'icon' => '🔗',
                'route' => 'tools.url-encoder',
                'category' => 'developers',
                'popular' => false
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
     * JSON Formatter
     */
    public function jsonFormatter()
    {
        return view('tools.json-formatter');
    }

    /**
     * Password Generator
     */
    public function passwordGenerator()
    {
        return view('tools.password-generator');
    }

    /**
     * Base64 Encoder/Decoder
     */
    public function base64Encoder()
    {
        return view('tools.base64-encoder');
    }

    /**
     * Hash Generator
     */
    public function hashGenerator()
    {
        return view('tools.hash-generator');
    }

    /**
     * Text Case Converter
     */
    public function textCaseConverter()
    {
        return view('tools.text-case-converter');
    }

    /**
     * Sitemap Generator
     */
    public function sitemapGenerator()
    {
        return view('tools.sitemap-generator');
    }

    /**
     * URL Encoder/Decoder
     */
    public function urlEncoder()
    {
        return view('tools.url-encoder');
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