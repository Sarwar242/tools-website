<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ToolUsage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;

class HashController extends Controller
{
    /**
     * Generate multiple hash types for the given input
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function generate(Request $request): JsonResponse
    {
        $request->validate([
            'input' => 'required|string|max:10000'
        ]);

        $input = $request->input('input');

        try {
            // Generate bcrypt hash using Laravel's Hash facade
            $bcryptHash = Hash::make($input);

            // Generate other hashes
            $hashes = [
                'bcrypt' => $bcryptHash,
                'md5' => md5($input),
                'sha1' => sha1($input),
                'sha256' => hash('sha256', $input),
                'sha512' => hash('sha512', $input),
            ];

            // Log usage
            ToolUsage::logUsage(
                'hash_generator',
                $request->ip(),
                $request->userAgent(),
                false, // Premium status
                [
                    'input_length' => strlen($input),
                    'api_version' => 'v1'
                ]
            );

            return response()->json([
                'success' => true,
                'data' => [
                    'hashes' => $hashes,
                    'input_length' => strlen($input),
                    'timestamp' => now()->toIso8601String()
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => [
                    'message' => 'Failed to generate hashes',
                    'details' => config('app.debug') ? $e->getMessage() : null
                ]
            ], 500);
        }
    }
}
