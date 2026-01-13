<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/x-icon">
    
    <title>@yield('title', 'ToolHub - Free Online Tools')</title>
    <meta name="description" content="@yield('description', 'Free online tools for developers and professionals. QR code generator, URL shortener, and more useful utilities.')">
    <meta name="keywords" content="@yield('keywords', 'online tools, free tools, QR code generator, URL shortener, web utilities')">
    
    <!-- Google AdSense -->
    <meta name="google-adsense-account" content="ca-pub-6179890788485964">
    
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og_title', @yield('title', 'ToolHub - Free Online Tools'))">
    <meta property="og:description" content="@yield('og_description', @yield('description', 'Free online tools for developers and professionals.'))">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:site_name" content="ToolHub">
    <meta property="og:image" content="@yield('og_image', asset('favicon.svg'))">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', @yield('title', 'ToolHub - Free Online Tools'))">
    <meta name="twitter:description" content="@yield('twitter_description', @yield('description', 'Free online tools for developers and professionals.'))">
    <meta name="twitter:image" content="@yield('twitter_image', asset('favicon.svg'))">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ request()->url() }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6179890788485964"
     crossorigin="anonymous"></script>
    <!-- Vite CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('head')
</head>
<body class="min-h-screen bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">
    <!-- Theme Switcher - Single Button -->
    <button type="button" id="themeSwitcher" class="fixed bottom-6 right-6 z-50 w-12 h-12 bg-white dark:bg-gray-800 border-2 border-gray-300 dark:border-gray-600 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 flex items-center justify-center text-gray-700 dark:text-gray-300 hover:scale-110">
        <i class="fas fa-moon dark:hidden text-lg"></i>
        <i class="fas fa-sun hidden dark:inline text-lg"></i>
    </button>

    <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('tools.dashboard') }}" class="flex items-center space-x-2 text-xl font-bold text-primary-500">
                        <i class="fas fa-tools"></i>
                        <span>ToolHub</span>
                    </a>
                    
                    <div class="hidden md:flex ml-10 space-x-6">
                        @php
                            try { $dashboardUrl = route('tools.dashboard'); } catch (\Exception $e) { $dashboardUrl = '/tools'; }
                            try { $aboutUrl = route('about'); } catch (\Exception $e) { $aboutUrl = '/about'; }
                        @endphp
                        <a href="{{ $dashboardUrl }}" class="flex items-center space-x-1 text-gray-700 dark:text-gray-300 hover:text-primary-500 px-3 py-2 text-sm font-medium transition-colors">
                            <i class="fas fa-home"></i>
                            <span>All Tools</span>
                        </a>
                        <a href="https://sarwar.com.bd" class="flex items-center space-x-1 text-gray-700 dark:text-gray-300 hover:text-primary-500 px-3 py-2 text-sm font-medium transition-colors">
                            <i class="fas fa-user"></i>
                            <span>Portfolio</span>
                        </a>
                        <a href="https://blog.sarwar.com.bd" class="flex items-center space-x-1 text-gray-700 dark:text-gray-300 hover:text-primary-500 px-3 py-2 text-sm font-medium transition-colors">
                            <i class="fas fa-blog"></i>
                            <span>Blog</span>
                        </a>
                        <a href="{{ $aboutUrl }}" class="flex items-center space-x-1 text-gray-700 dark:text-gray-300 hover:text-primary-500 px-3 py-2 text-sm font-medium transition-colors">
                            <i class="fas fa-info-circle"></i>
                            <span>About</span>
                        </a>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <!-- Mobile menu button -->
                    <button type="button" class="md:hidden ml-3 p-2 rounded-md text-gray-700 dark:text-gray-300 hover:text-primary-500 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors" onclick="toggleMobileMenu()">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile menu -->
            <div id="mobileMenu" class="hidden md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    @php
                        try { $dashboardUrl = route('tools.dashboard'); } catch (\Exception $e) { $dashboardUrl = '/tools'; }
                        try { $aboutUrl = route('about'); } catch (\Exception $e) { $aboutUrl = '/about'; }
                    @endphp
                    <a href="{{ $dashboardUrl }}" class="flex items-center space-x-2 text-gray-700 dark:text-gray-300 hover:text-primary-500 hover:bg-gray-100 dark:hover:bg-gray-700 block px-3 py-2 rounded-md text-base font-medium transition-colors">
                        <i class="fas fa-home"></i>
                        <span>All Tools</span>
                    </a>
                    <a href="https://sarwar.com.bd" class="flex items-center space-x-2 text-gray-700 dark:text-gray-300 hover:text-primary-500 hover:bg-gray-100 dark:hover:bg-gray-700 block px-3 py-2 rounded-md text-base font-medium transition-colors">
                        <i class="fas fa-user"></i>
                        <span>Portfolio</span>
                    </a>
                    <a href="https://blog.sarwar.com.bd" class="flex items-center space-x-2 text-gray-700 dark:text-gray-300 hover:text-primary-500 hover:bg-gray-100 dark:hover:bg-gray-700 block px-3 py-2 rounded-md text-base font-medium transition-colors">
                        <i class="fas fa-blog"></i>
                        <span>Blog</span>
                    </a>
                    <a href="{{ $aboutUrl }}" class="flex items-center space-x-2 text-gray-700 dark:text-gray-300 hover:text-primary-500 hover:bg-gray-100 dark:hover:bg-gray-700 block px-3 py-2 rounded-md text-base font-medium transition-colors">
                        <i class="fas fa-info-circle"></i>
                        <span>About</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center space-x-2 text-xl font-bold text-primary-500 mb-4">
                        <i class="fas fa-tools"></i>
                        <span>ToolHub</span>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 max-w-md">
                        Free online tools for developers and professionals. Create QR codes, shorten URLs, and access more useful utilities.
                    </p>
                </div>
                
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 uppercase tracking-wider mb-4">Popular Tools</h3>
                    @php
                        try { $qrUrl = route('tools.qr-generator'); } catch (\Exception $e) { $qrUrl = '/tools/qr-generator'; }
                        try { $urlUrl = route('tools.url-shortener'); } catch (\Exception $e) { $urlUrl = '/tools/url-shortener'; }
                        try { $jsonUrl = route('tools.json-formatter'); } catch (\Exception $e) { $jsonUrl = '/tools/json-formatter'; }
                        try { $passUrl = route('tools.password-generator'); } catch (\Exception $e) { $passUrl = '/tools/password-generator'; }
                    @endphp
                    <ul class="space-y-2">
                        <li><a href="{{ $qrUrl }}" class="text-gray-600 dark:text-gray-400 hover:text-primary-500 transition-colors">QR Code Generator</a></li>
                        <li><a href="{{ $urlUrl }}" class="text-gray-600 dark:text-gray-400 hover:text-primary-500 transition-colors">URL Shortener</a></li>
                        <li><a href="{{ $jsonUrl }}" class="text-gray-600 dark:text-gray-400 hover:text-primary-500 transition-colors">JSON Formatter</a></li>
                        <li><a href="{{ $passUrl }}" class="text-gray-600 dark:text-gray-400 hover:text-primary-500 transition-colors">Password Generator</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 uppercase tracking-wider mb-4">Links</h3>
                    @php
                        try { $aboutUrl = route('about'); } catch (\Exception $e) { $aboutUrl = '/about'; }
                        try { $dashboardUrl = route('tools.dashboard'); } catch (\Exception $e) { $dashboardUrl = '/tools'; }
                    @endphp
                    <ul class="space-y-2">
                        <li><a href="https://sarwar.com.bd" class="text-gray-600 dark:text-gray-400 hover:text-primary-500 transition-colors">Portfolio</a></li>
                        <li><a href="https://blog.sarwar.com.bd" class="text-gray-600 dark:text-gray-400 hover:text-primary-500 transition-colors">Blog</a></li>
                        <li><a href="{{ $aboutUrl }}" class="text-gray-600 dark:text-gray-400 hover:text-primary-500 transition-colors">About Us</a></li>
                        <li><a href="{{ $dashboardUrl }}" class="text-gray-600 dark:text-gray-400 hover:text-primary-500 transition-colors">All Tools</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                <div class="text-center mb-4">
                    <strong class="text-gray-700 dark:text-gray-300">Explore More:</strong>
                    <a href="https://sarwar.com.bd" class="mx-2 text-primary-600 hover:text-primary-500 transition-colors">🏠 Portfolio</a>
                    <a href="https://webtools.sarwar.com.bd" class="mx-2 text-primary-600 hover:text-primary-500 transition-colors">🛠️ Free Tools</a>
                    <a href="https://blog.sarwar.com.bd" class="mx-2 text-primary-600 hover:text-primary-500 transition-colors">📝 Blog</a>
                </div>
                <p class="text-center text-gray-600 dark:text-gray-400">
                    &copy; {{ date('Y') }} ToolHub. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
    </script>
    
    @stack('scripts')
</body>
</html>