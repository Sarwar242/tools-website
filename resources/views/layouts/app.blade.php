<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    <title>@yield('title', 'ToolHub - Free Online Tools')</title>
    <meta name="description" content="@yield('description', 'Free online tools for developers and professionals. QR code generator, URL shortener, and more useful utilities.')">
    <meta name="keywords" content="@yield('keywords', 'online tools, free tools, QR code generator, URL shortener, web utilities')">
    
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', 'ToolHub - Free Online Tools')">
    <meta property="og:description" content="@yield('description', 'Free online tools for developers and professionals.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6179890788485964"
     crossorigin="anonymous"></script>
    <!-- Vite CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('head')
</head>
<body class="min-h-screen bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">
    <!-- Theme Switcher -->
    <div class="theme-switcher">
        <button type="button" class="theme-btn" data-theme="light" title="Light Mode">
            <i class="fas fa-sun"></i>
        </button>
        <button type="button" class="theme-btn" data-theme="dark" title="Dark Mode">
            <i class="fas fa-moon"></i>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('tools.dashboard') }}" class="flex items-center space-x-2 text-xl font-bold text-primary-500">
                        <i class="fas fa-tools"></i>
                        <span>ToolHub</span>
                    </a>
                    
                    <div class="hidden md:flex ml-10 space-x-8">
                        <a href="{{ route('tools.dashboard') }}" class="flex items-center space-x-1 text-gray-700 dark:text-gray-300 hover:text-primary-500 px-3 py-2 text-sm font-medium transition-colors">
                            <i class="fas fa-home"></i>
                            <span>Tools</span>
                        </a>
                        <a href="{{ route('tools.qr-generator') }}" class="flex items-center space-x-1 text-gray-700 dark:text-gray-300 hover:text-primary-500 px-3 py-2 text-sm font-medium transition-colors">
                            <i class="fas fa-qrcode"></i>
                            <span>QR Generator</span>
                        </a>
                        <a href="{{ route('tools.url-shortener') }}" class="flex items-center space-x-1 text-gray-700 dark:text-gray-300 hover:text-primary-500 px-3 py-2 text-sm font-medium transition-colors">
                            <i class="fas fa-link"></i>
                            <span>URL Shortener</span>
                        </a>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <div class="relative">
                        <button type="button" class="flex items-center space-x-1 text-gray-700 dark:text-gray-300 hover:text-primary-500 px-3 py-2 text-sm font-medium transition-colors" onclick="toggleDropdown()">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div id="settingsDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg border border-gray-200 dark:border-gray-700">
                            <div class="py-1">
                                <div class="px-3 py-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Theme Color</div>
                                <a href="#" data-color="green" class="flex items-center space-x-2 px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                    <i class="fas fa-circle text-green-500"></i>
                                    <span>Green</span>
                                </a>
                                <a href="#" data-color="blue" class="flex items-center space-x-2 px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                    <i class="fas fa-circle text-blue-500"></i>
                                    <span>Blue</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Mobile menu button -->
                    <button type="button" class="md:hidden ml-3 p-2 rounded-md text-gray-700 dark:text-gray-300 hover:text-primary-500 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors" onclick="toggleMobileMenu()">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile menu -->
            <div id="mobileMenu" class="hidden md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="{{ route('tools.dashboard') }}" class="flex items-center space-x-2 text-gray-700 dark:text-gray-300 hover:text-primary-500 hover:bg-gray-100 dark:hover:bg-gray-700 block px-3 py-2 rounded-md text-base font-medium transition-colors">
                        <i class="fas fa-home"></i>
                        <span>Tools</span>
                    </a>
                    <a href="{{ route('tools.qr-generator') }}" class="flex items-center space-x-2 text-gray-700 dark:text-gray-300 hover:text-primary-500 hover:bg-gray-100 dark:hover:bg-gray-700 block px-3 py-2 rounded-md text-base font-medium transition-colors">
                        <i class="fas fa-qrcode"></i>
                        <span>QR Generator</span>
                    </a>
                    <a href="{{ route('tools.url-shortener') }}" class="flex items-center space-x-2 text-gray-700 dark:text-gray-300 hover:text-primary-500 hover:bg-gray-100 dark:hover:bg-gray-700 block px-3 py-2 rounded-md text-base font-medium transition-colors">
                        <i class="fas fa-link"></i>
                        <span>URL Shortener</span>
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
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 uppercase tracking-wider mb-4">Tools</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('tools.qr-generator') }}" class="text-gray-600 dark:text-gray-400 hover:text-primary-500 transition-colors">QR Code Generator</a></li>
                        <li><a href="{{ route('tools.url-shortener') }}" class="text-gray-600 dark:text-gray-400 hover:text-primary-500 transition-colors">URL Shortener</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 uppercase tracking-wider mb-4">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary-500 transition-colors">Help Center</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary-500 transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-primary-500 transition-colors">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                <p class="text-center text-gray-600 dark:text-gray-400">
                    &copy; {{ date('Y') }} ToolHub. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('settingsDropdown');
            dropdown.classList.toggle('hidden');
        }
        
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('settingsDropdown');
            const button = event.target.closest('button');
            if (!button || button.onclick !== toggleDropdown) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>