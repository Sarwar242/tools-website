<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Logo\LogoInterface;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\SvgWriter;

class QRController extends Controller
{
    public function generateAdvanced(Request $request)
    {
        $request->validate([
            'data' => 'required|string|max:2048',
            'size' => 'integer|min:100|max:800',
            'format' => 'in:svg,png',
            'error_correction' => 'in:L,M,Q,H',
            'margin' => 'integer|min:0|max:50',
            'foreground_color' => 'regex:/^#[0-9A-F]{6}$/i',
            'background_color' => 'regex:/^#[0-9A-F]{6}$/i'
        ]);

        $data = $request->input('data');
        $size = $request->input('size', 300);
        $format = $request->input('format', 'svg');
        $errorCorrection = $request->input('error_correction', 'M');
        $margin = $request->input('margin', 10);
        $foregroundColor = $request->input('foreground_color', '#000000');
        $backgroundColor = $request->input('background_color', '#ffffff');

        try {
            $result = Builder::create()
                ->writer($format === 'png' ? new PngWriter() : new SvgWriter())
                ->writerOptions([])
                ->data($data)
                ->encoding(new Encoding('UTF-8'))
                ->errorCorrectionLevel(match($errorCorrection) {
                    'L' => ErrorCorrectionLevel::Low,
                    'M' => ErrorCorrectionLevel::Medium,
                    'Q' => ErrorCorrectionLevel::Quartile,
                    'H' => ErrorCorrectionLevel::High,
                    default => ErrorCorrectionLevel::Medium
                })
                ->size($size)
                ->margin($margin)
                ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
                ->foregroundColor($this->hexToRgb($foregroundColor))
                ->backgroundColor($this->hexToRgb($backgroundColor))
                ->build();

            $qrCode = $result->getString();
            
            // For SVG, clean it up for better display
            if ($format === 'svg') {
                $qrCode = preg_replace('/^<\?xml[^>]*\?>\s*/', '', $qrCode);
            }

            // Log usage
            \App\Models\ToolUsage::create([
                'tool_name' => 'qr_generator_advanced',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'parameters' => json_encode([
                    'format' => $format,
                    'size' => $size,
                    'data_length' => strlen($data),
                    'error_correction' => $errorCorrection
                ])
            ]);

            return response()->json([
                'success' => true,
                'qr_code' => $qrCode,
                'format' => $format,
                'size' => $size,
                'data' => $data
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to generate QR code: ' . $e->getMessage()
            ], 500);
        }
    }

    private function hexToRgb($hex)
    {
        $hex = ltrim($hex, '#');
        return [
            'r' => hexdec(substr($hex, 0, 2)),
            'g' => hexdec(substr($hex, 2, 2)),
            'b' => hexdec(substr($hex, 4, 2))
        ];
    }
}