@extends('layouts.app')

@section('title', 'Free URL Shortener - Create Short Links Instantly')
@section('description', 'Shorten long URLs for free. Create short links, track clicks, and share easily on social media. Fast, reliable, and secure URL shortening service.')
@section('keywords', 'URL shortener, short links, link shortener, free URL shortener, shorten links, click tracking')

@section('content')
<div class="text-center mb-4">
    <h1 class="display-5 fw-bold">🔗 URL Shortener</h1>
    <p class="lead text-muted">Transform long URLs into short, shareable links with click tracking</p>
</div>

<!-- Top Ad Zone -->
<div class="ad-zone horizontal mb-4">
    <div class="text-muted">
        <i class="bi bi-rectangle" style="font-size: 1.5rem; opacity: 0.4;"></i><br>
        <small>Top Banner Ad - High visibility</small>
    </div>
</div>

<div class="row">
    <!-- URL Shortener Form -->
    <div class="col-lg-8 mx-auto mb-4">
        <div class="card border-0 shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h5 class="mb-0"><i class="bi bi-link-45deg"></i> Shorten Your URL</h5>
            </div>
            <div class="card-body p-4">
                <form id="urlShortenerForm">
                    <div class="input-group input-group-lg mb-3">
                        <span class="input-group-text bg-light"><i class="bi bi-globe"></i></span>
                        <input type="url" class="form-control" id="originalUrl" name="url" 
                               placeholder="https://example.com/very/long/url/that/needs/shortening"
                               required>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-scissors"></i> Shorten
                            <span class="loading spinner-border spinner-border-sm ms-2" role="status"></span>
                        </button>
                    </div>
                    
                    <div class="form-text text-center">
                        <i class="bi bi-shield-check text-success"></i>
                        Your URLs are processed securely and safely
                    </div>
                </form>

                <!-- Results Section -->
                <div id="resultsSection" style="display: none;">
                    <hr class="my-4">
                    
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="fw-bold">Your shortened URL:</h6>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="shortUrl" readonly>
                                <button class="btn btn-outline-secondary" type="button" id="copyBtn">
                                    <i class="bi bi-clipboard"></i> Copy
                                </button>
                            </div>
                            
                            <div class="small text-muted mb-3">
                                <i class="bi bi-info-circle"></i>
                                <span id="originalUrlDisplay"></span>
                            </div>
                        </div>
                        
                        <div class="col-md-4 text-center">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="card-title">Click Statistics</h6>
                                    <div class="h3 text-primary mb-0" id="clickCount">0</div>
                                    <small class="text-muted">Total Clicks</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Share Options -->
                    <div class="mt-4">
                        <h6 class="fw-bold mb-3">Share your link:</h6>
                        <div class="d-flex gap-2 flex-wrap">
                            <button class="btn btn-outline-primary btn-sm" id="shareTwitter">
                                <i class="bi bi-twitter"></i> Twitter
                            </button>
                            <button class="btn btn-outline-primary btn-sm" id="shareFacebook">
                                <i class="bi bi-facebook"></i> Facebook
                            </button>
                            <button class="btn btn-outline-primary btn-sm" id="shareLinkedin">
                                <i class="bi bi-linkedin"></i> LinkedIn
                            </button>
                            <button class="btn btn-outline-primary btn-sm" id="shareWhatsapp">
                                <i class="bi bi-whatsapp"></i> WhatsApp
                            </button>
                            <button class="btn btn-outline-secondary btn-sm" id="shareEmail">
                                <i class="bi bi-envelope"></i> Email
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent URLs Section -->
<div class="row mt-4" id="recentSection" style="display: none;">
    <div class="col-lg-10 mx-auto">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-light">
                <h6 class="mb-0"><i class="bi bi-clock-history"></i> Your Recent Short URLs</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="recentUrlsTable">
                        <thead>
                            <tr>
                                <th>Short URL</th>
                                <th>Original URL</th>
                                <th>Clicks</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="recentUrlsBody">
                            <!-- Recent URLs will be populated here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Middle Ad Zone -->
<div class="ad-zone mt-5" style="min-height: 280px;">
    <div class="text-muted">
        <i class="bi bi-square" style="font-size: 3rem; opacity: 0.4;"></i><br>
        <h5 class="mt-3">Medium Rectangle</h5>
        <small>300x250 - Great for monetization</small>
    </div>
</div>

<!-- Features Section -->
<div class="row mt-5">
    <div class="col-12">
        <h3 class="text-center mb-5 fw-bold">Why Use Our URL Shortener?</h3>
        
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="text-center">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-speedometer2 text-primary" style="font-size: 2.5rem;"></i>
                    </div>
                    <h6 class="fw-bold">Lightning Fast</h6>
                    <p class="text-muted small">Instant URL shortening with fast redirects worldwide.</p>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="text-center">
                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-graph-up text-success" style="font-size: 2.5rem;"></i>
                    </div>
                    <h6 class="fw-bold">Click Tracking</h6>
                    <p class="text-muted small">Monitor how many people click your shortened links.</p>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="text-center">
                    <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-shield-check text-info" style="font-size: 2.5rem;"></i>
                    </div>
                    <h6 class="fw-bold">Safe & Secure</h6>
                    <p class="text-muted small">All links are scanned for safety and security.</p>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="text-center">
                    <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-share text-warning" style="font-size: 2.5rem;"></i>
                    </div>
                    <h6 class="fw-bold">Easy Sharing</h6>
                    <p class="text-muted small">Perfect for social media, emails, and messaging.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Use Cases Section -->
<div class="row mt-5">
    <div class="col-lg-10 mx-auto">
        <h4 class="text-center mb-4">Perfect For</h4>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="d-flex align-items-start">
                    <div class="bg-primary bg-opacity-10 rounded p-2 me-3">
                        <i class="bi bi-share text-primary"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Social Media</h6>
                        <p class="text-muted mb-0 small">Share content on Twitter, Facebook, Instagram without character limits.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="d-flex align-items-start">
                    <div class="bg-success bg-opacity-10 rounded p-2 me-3">
                        <i class="bi bi-envelope text-success"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Email Campaigns</h6>
                        <p class="text-muted mb-0 small">Clean, professional links for newsletters and marketing emails.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="d-flex align-items-start">
                    <div class="bg-info bg-opacity-10 rounded p-2 me-3">
                        <i class="bi bi-qr-code text-info"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">QR Codes</h6>
                        <p class="text-muted mb-0 small">Shorter URLs create cleaner, more scannable QR codes.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="d-flex align-items-start">
                    <div class="bg-warning bg-opacity-10 rounded p-2 me-3">
                        <i class="bi bi-graph-up text-warning"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Analytics</h6>
                        <p class="text-muted mb-0 small">Track engagement and understand your audience better.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bottom Ad -->
<div class="ad-zone horizontal mt-5">
    <div class="text-muted">
        <i class="bi bi-rectangle" style="font-size: 1.5rem; opacity: 0.4;"></i><br>
        <small>Bottom Banner - 728x90</small>
    </div>
</div>

<!-- CTA Section -->
<div class="text-center mt-5 p-4" style="background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 15px; color: white;">
    <h3 class="fw-bold mb-3">Ready to Shorten More URLs?</h3>
    <p class="mb-4">Create multiple short links and track their performance</p>
    <button class="btn btn-light btn-lg" onclick="$('#originalUrl').focus()">
        🚀 Create Another Short Link
    </button>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    let currentShortData = null;
    let recentUrls = JSON.parse(localStorage.getItem('recentUrls') || '[]');

    // Load recent URLs
    loadRecentUrls();

    // Handle form submission
    $('#urlShortenerForm').on('submit', function(e) {
        e.preventDefault();
        
        const url = $('#originalUrl').val().trim();
        if (!url) {
            showNotification('Please enter a URL to shorten', 'error');
            return;
        }

        setLoading('#urlShortenerForm button[type="submit"]', true);
        
        $.ajax({
            url: '{{ route("tools.shorten-url") }}',
            method: 'POST',
            data: { url: url },
            success: function(response) {
                if (response.success) {
                    currentShortData = response;
                    displayResults(response);
                    saveToRecent(response);
                    loadRecentUrls();
                    
                    trackEvent('URL Shortener', 'Shorten', 'Success');
                    showNotification('URL shortened successfully!', 'success');
                } else {
                    showNotification(response.error || 'Error shortening URL', 'error');
                }
            },
            error: function(xhr) {
                const error = xhr.responseJSON?.message || 'Error shortening URL';
                showNotification(error, 'error');
                trackEvent('URL Shortener', 'Error', error);
            },
            complete: function() {
                setLoading('#urlShortenerForm button[type="submit"]', false);
            }
        });
    });

    function displayResults(data) {
        $('#shortUrl').val(data.short_url);
        $('#originalUrlDisplay').text(data.original_url);
        $('#clickCount').text(data.clicks || 0);
        $('#resultsSection').show();
        
        // Setup share buttons
        setupShareButtons(data.short_url, data.original_url);
    }

    function setupShareButtons(shortUrl, originalUrl) {
        const encodedUrl = encodeURIComponent(shortUrl);
        const text = encodeURIComponent('Check out this link: ');
        
        $('#shareTwitter').off('click').on('click', function() {
            window.open(`https://twitter.com/intent/tweet?url=${encodedUrl}&text=${text}`, '_blank');
            trackEvent('URL Shortener', 'Share', 'Twitter');
        });
        
        $('#shareFacebook').off('click').on('click', function() {
            window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodedUrl}`, '_blank');
            trackEvent('URL Shortener', 'Share', 'Facebook');
        });
        
        $('#shareLinkedin').off('click').on('click', function() {
            window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${encodedUrl}`, '_blank');
            trackEvent('URL Shortener', 'Share', 'LinkedIn');
        });
        
        $('#shareWhatsapp').off('click').on('click', function() {
            window.open(`https://wa.me/?text=${text}${encodedUrl}`, '_blank');
            trackEvent('URL Shortener', 'Share', 'WhatsApp');
        });
        
        $('#shareEmail').off('click').on('click', function() {
            window.location.href = `mailto:?subject=Check out this link&body=${text}${shortUrl}`;
            trackEvent('URL Shortener', 'Share', 'Email');
        });
    }

    // Copy to clipboard
    $('#copyBtn').on('click', function() {
        const shortUrl = $('#shortUrl').val();
        navigator.clipboard.writeText(shortUrl).then(function() {
            showNotification('Short URL copied to clipboard!', 'success');
            trackEvent('URL Shortener', 'Copy', 'Success');
            
            // Visual feedback
            const btn = $('#copyBtn');
            const originalText = btn.html();
            btn.html('<i class="bi bi-check"></i> Copied!');
            setTimeout(() => {
                btn.html(originalText);
            }, 2000);
        }).catch(function() {
            showNotification('Could not copy to clipboard', 'error');
        });
    });

    function saveToRecent(data) {
        const recentItem = {
            short_url: data.short_url,
            original_url: data.original_url,
            short_code: data.short_code,
            clicks: data.clicks || 0,
            created_at: new Date().toISOString()
        };
        
        // Remove if already exists
        recentUrls = recentUrls.filter(item => item.short_code !== data.short_code);
        
        // Add to beginning
        recentUrls.unshift(recentItem);
        
        // Keep only last 10
        recentUrls = recentUrls.slice(0, 10);
        
        localStorage.setItem('recentUrls', JSON.stringify(recentUrls));
    }

    function loadRecentUrls() {
        if (recentUrls.length === 0) {
            $('#recentSection').hide();
            return;
        }

        $('#recentSection').show();
        const tbody = $('#recentUrlsBody');
        tbody.empty();

        recentUrls.forEach(function(item) {
            const row = $(`
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <code class="me-2">${item.short_url}</code>
                            <button class="btn btn-sm btn-outline-secondary copy-recent-btn" data-url="${item.short_url}">
                                <i class="bi bi-clipboard"></i>
                            </button>
                        </div>
                    </td>
                    <td>
                        <div class="text-truncate" style="max-width: 300px;" title="${item.original_url}">
                            ${item.original_url}
                        </div>
                    </td>
                    <td><span class="badge bg-primary">${item.clicks}</span></td>
                    <td><small class="text-muted">${new Date(item.created_at).toLocaleDateString()}</small></td>
                    <td>
                        <a href="${item.original_url}" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </td>
                </tr>
            `);
            tbody.append(row);
        });

        // Handle copy buttons in recent URLs
        $('.copy-recent-btn').on('click', function() {
            const url = $(this).data('url');
            navigator.clipboard.writeText(url).then(function() {
                showNotification('URL copied!', 'success');
            });
        });
    }

    // Auto-focus on URL input
    $('#originalUrl').focus();

    // Track page engagement
    trackEvent('URL Shortener', 'Page View', 'Tool Access');
    
    // Track input engagement
    $('#originalUrl').on('focus', function() {
        trackEvent('URL Shortener', 'Input Focus', 'URL Field');
    });
});
</script>
@endpush