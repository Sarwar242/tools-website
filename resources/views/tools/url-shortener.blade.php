@extends('layouts.app')

@section('title', 'URL Shortener - ToolHub')
@section('description', 'Shorten long URLs and create custom short links. Track clicks and manage your shortened URLs easily.')

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