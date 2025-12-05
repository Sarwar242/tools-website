<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Free Online Tools - QR Generator & URL Shortener')</title>
    <meta name="description" content="@yield('description', 'Free online tools for QR code generation and URL shortening. Fast, secure, and easy to use. No registration required.')">
    <meta name="keywords" content="@yield('keywords', 'QR code generator, URL shortener, free online tools, QR maker, short links')">
    
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', 'Free Online Tools')">
    <meta property="og:description" content="@yield('description', 'Free QR codes and URL shortener')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🔧</text></svg>">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #7c3aed;
            --success-color: #059669;
        }
        
        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
            font-size: 1.5rem;
        }
        
        .main-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            margin: 20px auto;
            padding: 30px;
            max-width: 1200px;
        }
        
        .tool-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            height: 100%;
        }
        
        .tool-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }
        
        .tool-icon {
            font-size: 3.5rem;
            margin-bottom: 1rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.3);
        }
        
        .stats-card {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            height: 100%;
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        /* Ad zones - optimized for AdSense */
        .ad-zone {
            background: linear-gradient(45deg, #f8fafc, #e2e8f0);
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            margin: 25px 0;
            min-height: 280px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        .ad-zone::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            animation: shimmer 3s infinite;
        }
        
        @keyframes shimmer {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }
        
        .ad-zone.horizontal {
            min-height: 100px;
            max-width: 728px;
            margin: 25px auto;
        }
        
        .loading {
            display: none;
        }
        
        .loading.active {
            display: inline-block;
        }
        
        /* Responsive design */
        @media (max-width: 768px) {
            .main-container {
                margin: 10px;
                padding: 20px;
                border-radius: 15px;
            }
            
            .tool-icon {
                font-size: 2.5rem;
            }
            
            .stats-number {
                font-size: 2rem;
            }
            
            .ad-zone.horizontal {
                min-height: 60px;
            }
        }
    </style>
    
    <!-- Google AdSense - Replace with your publisher ID -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-XXXXXXXXX" crossorigin="anonymous"></script>
    
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('tools.dashboard') }}">
                🔧 ToolHub
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tools.dashboard') }}">
                            <i class="bi bi-house"></i> Tools
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tools.qr-generator') }}">
                            <i class="bi bi-qr-code"></i> QR Generator
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tools.url-shortener') }}">
                            <i class="bi bi-link"></i> URL Shortener
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main style="padding-top: 80px;">
        <div class="container-fluid">
            <div class="main-container">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                @yield('content')
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center py-4" style="background: rgba(255,255,255,0.1); color: white;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">&copy; {{ date('Y') }} ToolHub. Made with ❤️ for productivity.</p>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-center justify-content-md-end gap-3">
                        <a href="#" class="text-white-50 text-decoration-none">Privacy</a>
                        <a href="#" class="text-white-50 text-decoration-none">Terms</a>
                        <a href="#" class="text-white-50 text-decoration-none">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- Global Scripts -->
    <script>
        // CSRF Token setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        // Track events (replace with your analytics)
        function trackEvent(category, action, label) {
            // Google Analytics 4
            if (typeof gtag !== 'undefined') {
                gtag('event', action, {
                    event_category: category,
                    event_label: label
                });
            }
            
            // Console log for development
            console.log('Event:', category, action, label);
        }
        
        // Initialize AdSense ads
        (adsbygoogle = window.adsbygoogle || []).push({});
        
        // Loading state helper
        function setLoading(element, state) {
            const btn = $(element);
            const loading = btn.find('.loading');
            
            if (state) {
                btn.prop('disabled', true);
                loading.addClass('active');
            } else {
                btn.prop('disabled', false);
                loading.removeClass('active');
            }
        }
        
        // Notification helper
        function showNotification(message, type = 'success') {
            const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
            const icon = type === 'success' ? 'bi-check-circle' : 'bi-exclamation-triangle';
            
            const alert = $(`
                <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                    <i class="bi ${icon}"></i> ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `);
            
            $('.main-container').prepend(alert);
            
            // Auto dismiss after 5 seconds
            setTimeout(() => {
                alert.alert('close');
            }, 5000);
        }
    </script>
    
    @stack('scripts')
</body>
</html>