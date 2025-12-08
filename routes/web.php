<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolsController;

// Main landing page - redirect to tools dashboard
Route::get('/', [ToolsController::class, 'dashboard']);

// About page
Route::view('/about', 'about')->name('about');

// Tools routes
Route::prefix('tools')->name('tools.')->group(function () {
    // Dashboard - all tools
    Route::get('/', [ToolsController::class, 'dashboard'])->name('dashboard');
    
    // QR Code Generator
    Route::get('/qr-generator', [ToolsController::class, 'qrGenerator'])->name('qr-generator');
    Route::post('/qr-generator', [ToolsController::class, 'generateQr'])->name('generate-qr');
    Route::post('/qr-generator/advanced', [App\Http\Controllers\QRController::class, 'generateAdvanced'])->name('generate-qr-advanced');
    
    // URL Shortener
    Route::get('/url-shortener', [ToolsController::class, 'urlShortener'])->name('url-shortener');
    Route::post('/url-shortener', [ToolsController::class, 'shortenUrl'])->name('shorten-url');
    
    // URL Analytics (for future feature)
    Route::get('/url-analytics/{code}', [ToolsController::class, 'urlAnalytics'])->name('url-analytics');
    
    // JSON Formatter
    Route::get('/json-formatter', [ToolsController::class, 'jsonFormatter'])->name('json-formatter');
    
    // Password Generator
    Route::get('/password-generator', [ToolsController::class, 'passwordGenerator'])->name('password-generator');
    
    // Base64 Encoder/Decoder
    Route::get('/base64-encoder', [ToolsController::class, 'base64Encoder'])->name('base64-encoder');
    
    // Hash Generator
    Route::get('/hash-generator', [ToolsController::class, 'hashGenerator'])->name('hash-generator');
    
    // Text Case Converter
    Route::get('/text-case-converter', [ToolsController::class, 'textCaseConverter'])->name('text-case-converter');
    
    // Sitemap Generator
    Route::get('/sitemap-generator', [ToolsController::class, 'sitemapGenerator'])->name('sitemap-generator');
});

// Theme Routes
Route::prefix('theme')->name('theme.')->group(function () {
    Route::post('/switch', [App\Http\Controllers\ThemeController::class, 'switch'])->name('switch');
    Route::post('/color', [App\Http\Controllers\ThemeController::class, 'changeColor'])->name('color');
});

// Short URL redirect
Route::get('/s/{code}', [ToolsController::class, 'redirectShortUrl'])->name('short-redirect');
