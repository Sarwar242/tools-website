@extends('layouts.app')

@section('title', 'Free URL Shortener - Create Short Links with Click Tracking | ToolHub')
@section('description', 'Shorten long URLs instantly with our free URL shortener. Track clicks, create clean links for social media, email campaigns, and marketing. No registration required. Get analytics for every link.')
@section('keywords', 'URL shortener, short link, link shortener, shorten URL, tiny URL, free URL shortener, link tracker, click tracking, short URL, URL analytics')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-full mb-4">
            <i class="fas fa-link text-2xl text-primary-600 dark:text-primary-400"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">URL Shortener</h1>
        <p class="text-lg text-gray-600 dark:text-gray-400">Transform long URLs into short, shareable links</p>
    </div>

    <!-- Top Ad -->
    @include('partials.adsense')

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Shortener Form -->
        <div class="card p-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Shorten URL</h2>
            
            <form id="urlForm" class="space-y-4">
                @csrf
                <div>
                    <label for="url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Long URL</label>
                    <input type="url" id="url" name="url" placeholder="https://example.com/very/long/url/here" 
                           class="form-input" required maxlength="2048">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Enter a valid URL starting with http:// or https://</p>
                </div>

                <button type="submit" class="btn-primary w-full">
                    <i class="fas fa-compress-arrows-alt mr-2"></i>
                    Shorten URL
                </button>
            </form>

            <!-- Quick Examples -->
            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Quick Examples</h3>
                <div class="space-y-2">
                    <button type="button" onclick="fillUrl('https://www.google.com/maps/place/New+York,+NY/@40.7127,-74.0059,11z')" 
                            class="w-full text-left p-2 text-sm bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md transition-colors">
                        <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>Long Google Maps URL
                    </button>
                    <button type="button" onclick="fillUrl('https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstleyVEVO')" 
                            class="w-full text-left p-2 text-sm bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md transition-colors">
                        <i class="fas fa-play text-red-600 mr-2"></i>YouTube Video Link
                    </button>
                    <button type="button" onclick="fillUrl('https://docs.google.com/document/d/1234567890abcdefghijklmnopqrstuvwxyz/edit?usp=sharing')" 
                            class="w-full text-left p-2 text-sm bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md transition-colors">
                        <i class="fas fa-file-alt text-blue-500 mr-2"></i>Google Docs Link
                    </button>
                </div>
            </div>
        </div>

        <!-- Result & Management -->
        <div class="card p-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Shortened URL</h2>
            
            <div id="urlResult" class="space-y-4">
                <div class="flex items-center justify-center h-32 bg-gray-50 dark:bg-gray-800 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-600">
                    <div class="text-center text-gray-500 dark:text-gray-400">
                        <i class="fas fa-link text-3xl mb-2"></i>
                        <p>Your shortened URL will appear here</p>
                    </div>
                </div>
            </div>

            <!-- Features -->
            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Features</h3>
                <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                    <li class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                        No registration required
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                        Instant URL shortening
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                        Click tracking
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                        Custom short codes
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Recent Shortened URLs (Demo) -->
    <div class="mt-8 card p-6">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Recent Shortened URLs</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Short URL</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Original URL</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Clicks</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="recentUrls" class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            No shortened URLs yet. Create your first one above!
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Ad Zone -->
    <div class="mt-8 p-8 bg-gray-50 dark:bg-gray-800 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-600">
        <div class="text-center text-gray-500 dark:text-gray-400">
            <i class="fas fa-ad text-2xl mb-2"></i>
            <p>Advertisement Space</p>
        </div>
    </div>

    <!-- Educational Content -->
    <div class="mt-12 space-y-8">
        <div class="card p-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">What is a URL Shortener?</h2>
            <p class="text-gray-700 dark:text-gray-300 mb-4">
                A URL shortener is a tool that converts long, complex URLs into short, manageable links that are easier to share and remember. 
                Our free URL shortener creates compact links perfect for social media posts, email campaigns, text messages, and print materials.
            </p>
            <p class="text-gray-700 dark:text-gray-300">
                Short URLs not only look cleaner but also provide click tracking and analytics, helping you understand how many people engage with your links. 
                They're essential for digital marketing, social media management, and any scenario where character count matters.
            </p>
        </div>

        <div class="card p-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Benefits of URL Shortening</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex items-start">
                    <i class="fas fa-chart-line text-2xl text-primary-600 mr-3 mt-1"></i>
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Track Click Analytics</h3>
                        <p class="text-gray-700 dark:text-gray-300">Monitor how many people click your links. Perfect for measuring campaign success and user engagement.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <i class="fas fa-share-alt text-2xl text-primary-600 mr-3 mt-1"></i>
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Social Media Friendly</h3>
                        <p class="text-gray-700 dark:text-gray-300">Save precious characters on Twitter and other platforms with character limits while maintaining professional appearance.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <i class="fas fa-eye text-2xl text-primary-600 mr-3 mt-1"></i>
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Clean & Professional</h3>
                        <p class="text-gray-700 dark:text-gray-300">Replace ugly long URLs with clean, branded short links that build trust and improve click-through rates.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <i class="fas fa-qrcode text-2xl text-primary-600 mr-3 mt-1"></i>
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">QR Code Compatible</h3>
                        <p class="text-gray-700 dark:text-gray-300">Shorter URLs create simpler QR codes that scan faster and more reliably on mobile devices.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card p-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Common Use Cases</h2>
            <div class="space-y-3">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-600 mr-3"></i>
                    <span class="text-gray-700 dark:text-gray-300"><strong>Social Media Marketing:</strong> Share links on Twitter, Instagram, Facebook, and LinkedIn</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-600 mr-3"></i>
                    <span class="text-gray-700 dark:text-gray-300"><strong>Email Campaigns:</strong> Create trackable links for newsletters and email marketing</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-600 mr-3"></i>
                    <span class="text-gray-700 dark:text-gray-300"><strong>SMS Marketing:</strong> Fit links in text messages without eating up character count</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-600 mr-3"></i>
                    <span class="text-gray-700 dark:text-gray-300"><strong>Print Materials:</strong> Add easy-to-type URLs to business cards, flyers, and posters</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-600 mr-3"></i>
                    <span class="text-gray-700 dark:text-gray-300"><strong>Affiliate Marketing:</strong> Mask long affiliate links with clean, trustworthy short URLs</span>
                </div>
            </div>
        </div>

        <div class="card p-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Frequently Asked Questions</h2>
            <div class="space-y-4">
                <div>
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Is this URL shortener free?</h3>
                    <p class="text-gray-700 dark:text-gray-300">Yes! Our URL shortening service is completely free with no hidden costs or limitations.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Do shortened URLs expire?</h3>
                    <p class="text-gray-700 dark:text-gray-300">No, our shortened URLs never expire and will continue to redirect to your original URL indefinitely.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Can I track clicks on my shortened URLs?</h3>
                    <p class="text-gray-700 dark:text-gray-300">Yes! Each shortened URL includes click tracking. You can see the total number of clicks in your recent URLs list.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Are shortened URLs safe?</h3>
                    <p class="text-gray-700 dark:text-gray-300">Our service simply redirects to your original URL. We don't inject any code or tracking beyond the click counter. Always verify the destination before sharing.</p>
                </div>
            </div>
        </div>

        <div class="card p-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Related Tools</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="{{ route('tools.qr-generator') }}" class="flex items-center p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:border-primary-500 transition-colors">
                    <i class="fas fa-qrcode text-2xl text-primary-600 mr-3"></i>
                    <div>
                        <div class="font-semibold text-gray-900 dark:text-gray-100">QR Code Generator</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Create QR codes for your short URLs</div>
                    </div>
                </a>
                <a href="{{ route('tools.base64-encoder') }}" class="flex items-center p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:border-primary-500 transition-colors">
                    <i class="fas fa-code text-2xl text-primary-600 mr-3"></i>
                    <div>
                        <div class="font-semibold text-gray-900 dark:text-gray-100">Base64 Encoder</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Encode URL parameters</div>
                    </div>
                </a>
                <a href="{{ route('tools.dashboard') }}" class="flex items-center p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:border-primary-500 transition-colors">
                    <i class="fas fa-tools text-2xl text-primary-600 mr-3"></i>
                    <div>
                        <div class="font-semibold text-gray-900 dark:text-gray-100">All Tools</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Explore more free tools</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
let recentUrls = JSON.parse(localStorage.getItem('recentUrls') || '[]');

// Fill URL input with example
function fillUrl(url) {
    document.getElementById('url').value = url;
}

// Copy to clipboard
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        window.ThemeManager.showNotification('Copied to clipboard!', 'success');
    });
}

// Add to recent URLs
function addToRecent(data) {
    recentUrls.unshift({
        short_url: data.short_url,
        original_url: data.original_url,
        short_code: data.short_code,
        clicks: data.clicks,
        created_at: new Date().toISOString()
    });
    
    // Keep only last 5
    recentUrls = recentUrls.slice(0, 5);
    localStorage.setItem('recentUrls', JSON.stringify(recentUrls));
    updateRecentTable();
}

// Update recent URLs table
function updateRecentTable() {
    const tbody = document.getElementById('recentUrls');
    
    if (recentUrls.length === 0) {
        tbody.innerHTML = `
            <tr>
                <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                    No shortened URLs yet. Create your first one above!
                </td>
            </tr>
        `;
        return;
    }
    
    tbody.innerHTML = recentUrls.map(url => `
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <span class="text-sm font-medium text-primary-600 dark:text-primary-400">${url.short_url.replace(window.location.origin, '')}</span>
                </div>
            </td>
            <td class="px-6 py-4">
                <div class="text-sm text-gray-900 dark:text-gray-100 truncate max-w-xs" title="${url.original_url}">
                    ${url.original_url}
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                ${url.clicks}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                <button onclick="copyToClipboard('${url.short_url}')" class="text-primary-600 dark:text-primary-400 hover:text-primary-900 dark:hover:text-primary-300">
                    <i class="fas fa-copy"></i>
                </button>
                <a href="${url.original_url}" target="_blank" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300">
                    <i class="fas fa-external-link-alt"></i>
                </a>
            </td>
        </tr>
    `).join('');
}

// Initialize
updateRecentTable();

// Override URLShortener success handler
if (window.URLShortener) {
    const originalShortenURL = window.URLShortener.shortenURL;
    window.URLShortener.shortenURL = async function() {
        const form = document.getElementById('urlForm');
        const formData = new FormData(form);
        const submitBtn = form.querySelector('button[type="submit"]');
        
        window.QRGenerator.setLoading(submitBtn, true);
        
        try {
            const response = await fetch('/tools/url-shortener', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                document.getElementById('urlResult').innerHTML = `
                    <div class="space-y-4">
                        <div class="p-4 bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-800 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div class="flex-1 mr-4">
                                    <p class="text-sm font-medium text-green-800 dark:text-green-200">Shortened URL:</p>
                                    <p class="text-lg font-mono text-green-900 dark:text-green-100 break-all">${data.short_url}</p>
                                </div>
                                <button onclick="copyToClipboard('${data.short_url}')" class="btn-outline-primary shrink-0">
                                    <i class="fas fa-copy mr-2"></i>Copy
                                </button>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4 text-center">
                            <div class="p-3 bg-gray-50 dark:bg-gray-800 rounded-lg">
                                <p class="text-xs text-gray-500 dark:text-gray-400">Total Clicks</p>
                                <p class="text-xl font-semibold text-gray-900 dark:text-gray-100">${data.clicks}</p>
                            </div>
                            <div class="p-3 bg-gray-50 dark:bg-gray-800 rounded-lg">
                                <p class="text-xs text-gray-500 dark:text-gray-400">Short Code</p>
                                <p class="text-xl font-semibold text-gray-900 dark:text-gray-100">${data.short_code}</p>
                            </div>
                        </div>
                    </div>
                `;
                
                addToRecent(data);
                window.ThemeManager.showNotification('URL shortened successfully!', 'success');
            } else {
                window.ThemeManager.showNotification(data.error || 'Error shortening URL', 'error');
            }
        } catch (error) {
            console.error('URL Shortening error:', error);
            window.ThemeManager.showNotification('Network error occurred', 'error');
        } finally {
            window.QRGenerator.setLoading(submitBtn, false);
        }
    };
}
</script>
@endsection