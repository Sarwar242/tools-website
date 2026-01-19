@extends('layouts.app')

@section('title', 'About ToolHub - Free Online Tools')
@section('description', 'ToolHub provides free online tools for developers, designers, and everyday users. Generate QR codes, shorten URLs, format JSON, and more.')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Hero Section -->
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-gray-100 mb-4">
            About ToolHub
        </h1>
        <p class="text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
            Your one-stop destination for free, powerful online tools that make your work easier
        </p>
    </div>

    <!-- Mission -->
    <div class="card p-8 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">Our Mission</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    ToolHub was created to provide fast, reliable, and free online tools for everyone. Whether you're a developer, designer, marketer, or just someone who needs to get things done, we've got you covered.
                </p>
                <p class="text-gray-600 dark:text-gray-400">
                    All our tools work directly in your browser, ensuring your data remains private and secure. No registration required, no downloads needed - just instant access to powerful utilities.
                </p>
            </div>
            <div class="bg-gradient-to-br from-primary-100 to-primary-200 dark:from-primary-900 dark:to-primary-800 rounded-lg p-8 text-center">
                <div class="text-5xl font-bold text-primary-600 dark:text-primary-400 mb-2">8+</div>
                <div class="text-lg text-gray-700 dark:text-gray-300 mb-4">Free Tools Available</div>
                <div class="text-5xl font-bold text-primary-600 dark:text-primary-400 mb-2">100%</div>
                <div class="text-lg text-gray-700 dark:text-gray-300">Free to Use</div>
            </div>
        </div>
    </div>

    <!-- Features -->
    <div class="mb-12">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 text-center mb-8">Why Choose ToolHub?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="card p-6 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-full mb-4">
                    <i class="fas fa-bolt text-2xl text-primary-600 dark:text-primary-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-3">Lightning Fast</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    All tools work instantly in your browser with no server processing delays
                </p>
            </div>

            <div class="card p-6 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-full mb-4">
                    <i class="fas fa-shield-alt text-2xl text-primary-600 dark:text-primary-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-3">Private & Secure</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Your data never leaves your device. All processing happens locally in your browser
                </p>
            </div>

            <div class="card p-6 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-full mb-4">
                    <i class="fas fa-mobile-alt text-2xl text-primary-600 dark:text-primary-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-3">Mobile Friendly</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Fully responsive design works perfectly on all devices and screen sizes
                </p>
            </div>

            <div class="card p-6 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-full mb-4">
                    <i class="fas fa-universal-access text-2xl text-primary-600 dark:text-primary-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-3">No Registration</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Start using our tools immediately without creating an account or signing up
                </p>
            </div>

            <div class="card p-6 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-full mb-4">
                    <i class="fas fa-moon text-2xl text-primary-600 dark:text-primary-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-3">Dark Mode</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Easy on the eyes with built-in dark mode that adapts to your system preferences
                </p>
            </div>

            <div class="card p-6 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-full mb-4">
                    <i class="fas fa-infinity text-2xl text-primary-600 dark:text-primary-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-3">Unlimited Usage</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    No limits, no restrictions. Use any tool as many times as you need, completely free
                </p>
            </div>
        </div>
    </div>

    <!-- Tool Categories -->
    <div class="card p-8 mb-8">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 text-center mb-8">Available Tools</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4 flex items-center">
                    <i class="fas fa-code text-primary-600 dark:text-primary-400 mr-3"></i>
                    Developer Tools
                </h3>
                <ul class="space-y-2 text-gray-600 dark:text-gray-400">
                    <li class="flex items-start">
                        <i class="fas fa-check text-primary-600 dark:text-primary-400 mt-1 mr-3"></i>
                        <span><strong>JSON Formatter:</strong> Format, validate, and beautify JSON</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-primary-600 dark:text-primary-400 mt-1 mr-3"></i>
                        <span><strong>Base64 Encoder/Decoder:</strong> Convert between text and Base64</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-primary-600 dark:text-primary-400 mt-1 mr-3"></i>
                        <span><strong>Hash Generator:</strong> Generate MD5, SHA-1, SHA-256, SHA-512</span>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4 flex items-center">
                    <i class="fas fa-globe text-primary-600 dark:text-primary-400 mr-3"></i>
                    Web Tools
                </h3>
                <ul class="space-y-2 text-gray-600 dark:text-gray-400">
                    <li class="flex items-start">
                        <i class="fas fa-check text-primary-600 dark:text-primary-400 mt-1 mr-3"></i>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-primary-600 dark:text-primary-400 mt-1 mr-3"></i>
                        <span><strong>Sitemap Generator:</strong> Generate XML sitemaps for SEO</span>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4 flex items-center">
                    <i class="fas fa-magic text-primary-600 dark:text-primary-400 mr-3"></i>
                    Generators
                </h3>
                <ul class="space-y-2 text-gray-600 dark:text-gray-400">
                    <li class="flex items-start">
                        <i class="fas fa-check text-primary-600 dark:text-primary-400 mt-1 mr-3"></i>
                        <span><strong>QR Code Generator:</strong> Create custom QR codes instantly</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-primary-600 dark:text-primary-400 mt-1 mr-3"></i>
                        <span><strong>Password Generator:</strong> Generate strong, secure passwords</span>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4 flex items-center">
                    <i class="fas fa-text-height text-primary-600 dark:text-primary-400 mr-3"></i>
                    Text Tools
                </h3>
                <ul class="space-y-2 text-gray-600 dark:text-gray-400">
                    <li class="flex items-start">
                        <i class="fas fa-check text-primary-600 dark:text-primary-400 mt-1 mr-3"></i>
                        <span><strong>Text Case Converter:</strong> Convert between different text cases</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="text-center card p-8 bg-gradient-to-r from-primary-50 to-primary-100 dark:from-primary-900 dark:to-primary-800">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">Ready to Get Started?</h2>
        <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">
            Explore our collection of free tools and boost your productivity today!
        </p>
        <a href="{{ route('tools.dashboard') }}" class="btn-primary inline-block">
            <i class="fas fa-tools mr-2"></i>Browse All Tools
        </a>
    </div>
</div>
@endsection
