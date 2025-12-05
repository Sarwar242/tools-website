@extends('layouts.app')

@section('title', 'Free Online Tools - QR Generator & URL Shortener')
@section('description', 'Free online tools for productivity. Generate QR codes and shorten URLs instantly. No registration required, fast and secure.')
@section('keywords', 'free online tools, QR code generator, URL shortener, productivity tools')

@section('content')
<div class="text-center mb-5">
    <h1 class="display-4 fw-bold text-primary mb-3">🚀 Free Online Tools</h1>
    <p class="lead text-muted mb-4">Boost your productivity with our fast, free, and secure online tools</p>
</div>

<!-- Top Ad Zone -->
<div class="ad-zone horizontal">
    <div class="text-muted">
        <i class="bi bi-rectangle" style="font-size: 2rem; opacity: 0.3;"></i><br>
        <small>AdSense Banner - 728x90 / 320x50 (mobile)</small><br>
        <small class="text-success">Replace this div with your AdSense code</small>
    </div>
    <!-- 
    Replace with your AdSense code:
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-XXXXXXXXX"
         data-ad-slot="XXXXXXXXX"
         data-ad-format="auto"
         data-full-width-responsive="true"></ins>
    <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    -->
</div>

<!-- Stats Section -->
<div class="row mb-5">
    <div class="col-md-4 mb-3">
        <div class="stats-card">
            <div class="stats-number">{{ number_format($stats['total_tools'] ?? 2) }}+</div>
            <div>Free Tools</div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="stats-card">
            <div class="stats-number">{{ number_format($stats['monthly_users'] ?? 1250) }}+</div>
            <div>Monthly Users</div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="stats-card">
            <div class="stats-number">{{ number_format($stats['total_usage'] ?? 15800) }}+</div>
            <div>Tools Used</div>
        </div>
    </div>
</div>

<!-- Tools Grid -->
<div class="row">
    @foreach($tools as $tool)
    <div class="col-lg-6 mb-4">
        <div class="card tool-card">
            <div class="card-body text-center p-4">
                @if(isset($tool['popular']) && $tool['popular'])
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge bg-warning text-dark">
                            <i class="bi bi-star-fill"></i> Popular
                        </span>
                    </div>
                @endif
                
                <div class="tool-icon">{{ $tool['icon'] }}</div>
                
                <h3 class="card-title fw-bold mb-3">{{ $tool['name'] }}</h3>
                <p class="card-text text-muted mb-4">{{ $tool['description'] }}</p>
                
                <div class="d-grid">
                    <a href="{{ route($tool['route']) }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-arrow-right"></i> Use Tool
                    </a>
                </div>
                
                <!-- Category badge -->
                <div class="mt-3">
                    <span class="badge bg-light text-dark">
                        @switch($tool['category'])
                            @case('generators')
                                <i class="bi bi-gear"></i> Generators
                                @break
                            @case('web')
                                <i class="bi bi-globe"></i> Web Tools
                                @break
                            @default
                                <i class="bi bi-tools"></i> Utility
                        @endswitch
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Middle Ad Zone -->
<div class="ad-zone" style="margin: 40px 0;">
    <div class="text-muted">
        <i class="bi bi-square" style="font-size: 3rem; opacity: 0.3;"></i><br>
        <h5 class="mt-3">Medium Rectangle Ad</h5>
        <small>300x250 - High performing ad size</small><br>
        <small class="text-success">Replace with AdSense medium rectangle</small>
    </div>
    <!-- 
    <ins class="adsbygoogle"
         style="display:inline-block;width:300px;height:250px"
         data-ad-client="ca-pub-XXXXXXXXX"
         data-ad-slot="XXXXXXXXX"></ins>
    <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    -->
</div>

<!-- Features Section -->
<div class="row mt-5">
    <div class="col-12">
        <h2 class="text-center mb-5 fw-bold">Why Choose ToolHub?</h2>
        
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="text-center">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-lightning-charge text-primary" style="font-size: 2.5rem;"></i>
                    </div>
                    <h5 class="fw-bold">Lightning Fast</h5>
                    <p class="text-muted">Get results instantly. Our tools are optimized for speed and performance.</p>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="text-center">
                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-shield-check text-success" style="font-size: 2.5rem;"></i>
                    </div>
                    <h5 class="fw-bold">100% Free</h5>
                    <p class="text-muted">No registration required. No hidden fees. Just free tools that work.</p>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="text-center">
                    <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-phone text-info" style="font-size: 2.5rem;"></i>
                    </div>
                    <h5 class="fw-bold">Mobile Ready</h5>
                    <p class="text-muted">Works perfectly on all devices - desktop, tablet, and mobile.</p>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="text-center">
                    <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-lock text-warning" style="font-size: 2.5rem;"></i>
                    </div>
                    <h5 class="fw-bold">Secure</h5>
                    <p class="text-muted">Your data is processed securely and we don't store your files.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bottom Ad Zone -->
<div class="ad-zone horizontal mt-5">
    <div class="text-muted">
        <i class="bi bi-rectangle" style="font-size: 2rem; opacity: 0.3;"></i><br>
        <small>Bottom Banner - 728x90</small><br>
        <small class="text-success">Another AdSense opportunity</small>
    </div>
</div>

<!-- Call to Action -->
<div class="text-center mt-5 p-4" style="background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 15px; color: white;">
    <h3 class="fw-bold mb-3">Start Using Our Tools Now!</h3>
    <p class="mb-4">Join thousands of users who trust ToolHub for their daily productivity needs.</p>
    <div class="d-flex justify-content-center gap-3 flex-wrap">
        <a href="{{ route('tools.qr-generator') }}" class="btn btn-light btn-lg">
            📱 Generate QR Code
        </a>
        <a href="{{ route('tools.url-shortener') }}" class="btn btn-outline-light btn-lg">
            🔗 Shorten URL
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Track tool clicks
    $('.tool-card a').on('click', function() {
        const toolName = $(this).closest('.card').find('.card-title').text();
        trackEvent('Dashboard', 'Tool Click', toolName);
    });
    
    // Track CTA clicks
    $('a[href*="qr-generator"], a[href*="url-shortener"]').on('click', function() {
        const tool = $(this).text().includes('QR') ? 'QR Generator' : 'URL Shortener';
        trackEvent('Dashboard', 'CTA Click', tool);
    });
    
    // Animate stats on scroll
    let animated = false;
    $(window).on('scroll', function() {
        if (!animated && $('.stats-card').length) {
            const statsTop = $('.stats-card').first().offset().top;
            const scrollTop = $(window).scrollTop() + $(window).height();
            
            if (scrollTop > statsTop) {
                animated = true;
                $('.stats-number').each(function() {
                    const $this = $(this);
                    const target = parseInt($this.text().replace(/[^\d]/g, ''));
                    let current = 0;
                    const increment = target / 50;
                    
                    const timer = setInterval(function() {
                        current += increment;
                        if (current >= target) {
                            current = target;
                            clearInterval(timer);
                        }
                        $this.text(Math.floor(current).toLocaleString() + '+');
                    }, 20);
                });
            }
        }
    });
});
</script>
@endpush