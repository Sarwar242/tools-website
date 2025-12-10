@extends('layouts.app')

@section('title', 'Sitemap Generator - ToolHub')
@section('description', 'Generate XML sitemaps for your website. Free online sitemap generator for better SEO.')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-full mb-4">
            <i class="fas fa-sitemap text-2xl text-primary-600 dark:text-primary-400"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">Sitemap Generator</h1>
        <p class="text-gray-600 dark:text-gray-400">Generate XML sitemaps for better SEO</p>
    </div>

    <!-- Form -->
    <div class="card p-6 mb-6">
        <form id="sitemapForm">
            @csrf
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    <i class="fas fa-link text-primary-600 dark:text-primary-400 mr-2"></i>
                    Website URL
                </label>
                <input type="url" id="websiteUrl" name="url" required
                       placeholder="https://example.com"
                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-primary-500 focus:border-transparent">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    <i class="fas fa-list text-primary-600 dark:text-primary-400 mr-2"></i>
                    Pages (one URL per line)
                </label>
                <textarea id="pagesList" name="pages" rows="8"
                          placeholder="/&#10;/about&#10;/contact&#10;/products&#10;/blog"
                          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-primary-500 focus:border-transparent font-mono text-sm"></textarea>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                    Enter page paths relative to your domain (e.g., /about, /products)
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Change Frequency
                    </label>
                    <select id="changefreq" name="changefreq"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-primary-500">
                        <option value="daily">Daily</option>
                        <option value="weekly" selected>Weekly</option>
                        <option value="monthly">Monthly</option>
                        <option value="yearly">Yearly</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Priority
                    </label>
                    <select id="priority" name="priority"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-primary-500">
                        <option value="1.0">1.0 (Highest)</option>
                        <option value="0.8" selected>0.8 (High)</option>
                        <option value="0.5">0.5 (Medium)</option>
                        <option value="0.3">0.3 (Low)</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn-primary w-full">
                <i class="fas fa-cog mr-2"></i>Generate Sitemap
            </button>
        </form>
    </div>

    <!-- Output -->
    <div id="outputSection" class="card p-6 hidden">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">
            <i class="fas fa-file-code text-primary-600 dark:text-primary-400 mr-2"></i>
            Generated Sitemap
        </h2>

        <div class="mb-4">
            <textarea id="sitemapOutput" readonly rows="12"
                      class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 font-mono text-sm"></textarea>
        </div>

        <div class="flex gap-2">
            <button id="copyBtn" class="btn-primary flex-1">
                <i class="fas fa-copy mr-2"></i>Copy
            </button>
            <button id="downloadBtn" class="btn-outline-primary flex-1">
                <i class="fas fa-download mr-2"></i>Download sitemap.xml
            </button>
        </div>

        <div class="mt-4 p-4 bg-blue-50 dark:bg-blue-900 rounded-lg">
            <p class="text-sm text-blue-800 dark:text-blue-200">
                <i class="fas fa-info-circle mr-2"></i>
                Upload this sitemap.xml to your website root and submit to Google Search Console.
            </p>
        </div>
    </div>

    <!-- Instructions -->
    <div class="mt-8 card p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">How to Use</h3>
        <ol class="space-y-3 text-gray-600 dark:text-gray-400">
            <li class="flex items-start">
                <span class="flex-shrink-0 w-6 h-6 bg-primary-600 text-white rounded-full flex items-center justify-center text-sm mr-3 mt-0.5">1</span>
                <span>Enter your website's base URL (e.g., https://example.com)</span>
            </li>
            <li class="flex items-start">
                <span class="flex-shrink-0 w-6 h-6 bg-primary-600 text-white rounded-full flex items-center justify-center text-sm mr-3 mt-0.5">2</span>
                <span>List all your pages (one per line), starting with /</span>
            </li>
            <li class="flex items-start">
                <span class="flex-shrink-0 w-6 h-6 bg-primary-600 text-white rounded-full flex items-center justify-center text-sm mr-3 mt-0.5">3</span>
                <span>Choose change frequency and priority settings</span>
            </li>
            <li class="flex items-start">
                <span class="flex-shrink-0 w-6 h-6 bg-primary-600 text-white rounded-full flex items-center justify-center text-sm mr-3 mt-0.5">4</span>
                <span>Generate, download, and upload to your website root directory</span>
            </li>
        </ol>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('sitemapForm');
    const outputSection = document.getElementById('outputSection');
    const sitemapOutput = document.getElementById('sitemapOutput');
    const copyBtn = document.getElementById('copyBtn');
    const downloadBtn = document.getElementById('downloadBtn');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const websiteUrl = document.getElementById('websiteUrl').value.trim().replace(/\/$/, '');
        const pagesText = document.getElementById('pagesList').value.trim();
        const changefreq = document.getElementById('changefreq').value;
        const priority = document.getElementById('priority').value;

        if (!websiteUrl || !pagesText) {
            alert('Please fill in all required fields');
            return;
        }

        // Parse pages
        const pages = pagesText.split('\n').map(p => p.trim()).filter(p => p);
        
        // Generate sitemap XML
        const sitemap = generateSitemap(websiteUrl, pages, changefreq, priority);
        
        // Display output
        sitemapOutput.value = sitemap;
        outputSection.classList.remove('hidden');
        outputSection.scrollIntoView({ behavior: 'smooth' });
    });

    function generateSitemap(baseUrl, pages, changefreq, priority) {
        const today = new Date().toISOString().split('T')[0];
        
        let xml = '{{ '<' }}?xml version="1.0" encoding="UTF-8"?>\n';
        xml += '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">\n';
        
        pages.forEach(page => {
            // Ensure page starts with /
            if (!page.startsWith('/')) {
                page = '/' + page;
            }
            
            xml += '  <url>\n';
            xml += `    <loc>${baseUrl}${page}</loc>\n`;
            xml += `    <lastmod>${today}</lastmod>\n`;
            xml += `    <changefreq>${changefreq}</changefreq>\n`;
            xml += `    <priority>${priority}</priority>\n`;
            xml += '  </url>\n';
        });
        
        xml += '</urlset>';
        
        return xml;
    }

    copyBtn.addEventListener('click', function() {
        sitemapOutput.select();
        document.execCommand('copy');
        
        const originalText = copyBtn.innerHTML;
        copyBtn.innerHTML = '<i class="fas fa-check mr-2"></i>Copied!';
        setTimeout(() => {
            copyBtn.innerHTML = originalText;
        }, 2000);
    });

    downloadBtn.addEventListener('click', function() {
        const content = sitemapOutput.value;
        const blob = new Blob([content], { type: 'application/xml' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'sitemap.xml';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    });
});
</script>
@endsection
