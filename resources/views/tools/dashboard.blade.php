@extends('layouts.app')

@section('title', 'ToolHub - Free Online Tools')
@section('description', 'Free online tools for developers and professionals. QR code generator, URL shortener, and more useful utilities.')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Hero Section -->
    <div class="text-center mb-12">
        <div class="inline-flex items-center justify-center w-20 h-20 bg-primary-100 dark:bg-primary-900 rounded-full mb-6">
            <i class="fas fa-tools text-3xl text-primary-600 dark:text-primary-400"></i>
        </div>
        <h1 class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-4">Welcome to ToolHub</h1>
        <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
            Your one-stop destination for free online tools. Generate QR codes, shorten URLs, and access more useful utilities to boost your productivity.
        </p>
        
        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8 max-w-lg mx-auto">
            <div class="text-center">
                <div class="text-2xl font-bold text-primary-600 dark:text-primary-400">{{ $stats['total_tools'] }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">Available Tools</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-primary-600 dark:text-primary-400">{{ number_format($stats['monthly_users']) }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">Monthly Users</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-primary-600 dark:text-primary-400">{{ number_format($stats['total_usage']) }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">Total Usage</div>
            </div>
        </div>
    </div>

    <!-- Ad Space - Top -->
    @include('partials.adsense')

    <!-- Popular Tools -->
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6 text-center">Popular Tools</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach(collect($tools)->where('popular', true) as $tool)
            <div class="tool-card card p-6 group">
                <div class="flex items-center mb-4">
                    <div class="text-3xl mr-3">{{ $tool['icon'] }}</div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                            {{ $tool['name'] }}
                        </h3>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-200">
                            {{ ucfirst($tool['category']) }}
                        </span>
                    </div>
                </div>
                <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $tool['description'] }}</p>
                @php
                    try {
                        $toolUrl = route($tool['route']);
                    } catch (\Exception $e) {
                        $toolUrl = '#';
                        \Log::error('Route not found: ' . $tool['route']);
                    }
                @endphp
                <a href="{{ $toolUrl }}" class="btn-primary w-full text-center">
                    Use Tool <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Ad Space - Middle -->
    @include('partials.adsense')

    <!-- All Tools -->
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6 text-center">All Tools</h2>
        
        <!-- Categories -->
        <div class="flex justify-center mb-6">
            <div class="inline-flex flex-wrap justify-center gap-2 rounded-lg border border-gray-200 dark:border-gray-700 p-2">
                <button class="category-btn active px-4 py-2 text-sm font-medium text-primary-600 bg-primary-50 dark:text-primary-400 dark:bg-primary-900 rounded-lg transition-colors" data-category="all">
                    All Tools
                </button>
                <button class="category-btn px-4 py-2 text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 rounded-lg transition-colors" data-category="generators">
                    Generators
                </button>
                <button class="category-btn px-4 py-2 text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 rounded-lg transition-colors" data-category="web">
                    Web Tools
                </button>
                <button class="category-btn px-4 py-2 text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 rounded-lg transition-colors" data-category="developers">
                    Developers
                </button>
                <button class="category-btn px-4 py-2 text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 rounded-lg transition-colors" data-category="text">
                    Text Tools
                </button>
            </div>
        </div>

        <!-- Tools Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" id="toolsGrid">
            @foreach(collect($tools) as $tool)
            <div class="tool-item card p-4 text-center group" data-category="{{ $tool['category'] }}">
                <div class="text-2xl mb-2">{{ $tool['icon'] }}</div>
                <h3 class="font-medium text-gray-900 dark:text-gray-100 mb-2 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                    {{ $tool['name'] }}
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">{{ $tool['description'] }}</p>
                @php
                    try {
                        $toolUrl = route($tool['route']);
                    } catch (\Exception $e) {
                        $toolUrl = '#';
                        \Log::error('Route not found: ' . $tool['route']);
                    }
                @endphp
                <a href="{{ $toolUrl }}" class="btn-outline-primary text-sm">
                    Launch <i class="fas fa-external-link-alt ml-1"></i>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Ad Space - Before Features -->
    @include('partials.adsense')

    <!-- Features -->
    <div class="bg-gradient-to-r from-primary-500 to-primary-600 rounded-xl p-8 text-white text-center mb-12">
        <h2 class="text-2xl font-bold mb-4">Why Choose ToolHub?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <div class="text-3xl mb-2">🚀</div>
                <h3 class="font-semibold mb-2">Fast & Efficient</h3>
                <p class="text-primary-100">Lightning-fast tools designed for productivity</p>
            </div>
            <div>
                <div class="text-3xl mb-2">🔒</div>
                <h3 class="font-semibold mb-2">Privacy First</h3>
                <p class="text-primary-100">No data collection, your privacy matters</p>
            </div>
            <div>
                <div class="text-3xl mb-2">💯</div>
                <h3 class="font-semibold mb-2">Always Free</h3>
                <p class="text-primary-100">All tools are completely free to use</p>
            </div>
        </div>
    </div>

    <!-- Ad Space - Bottom -->
    @include('partials.adsense')
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Category filtering
    const categoryBtns = document.querySelectorAll('.category-btn');
    const toolItems = document.querySelectorAll('.tool-item');

    categoryBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const category = this.dataset.category;
            
            // Update active button
            categoryBtns.forEach(b => {
                b.classList.remove('active', 'text-primary-600', 'bg-primary-50', 'dark:text-primary-400', 'dark:bg-primary-900');
                b.classList.add('text-gray-500', 'dark:text-gray-400');
            });
            this.classList.add('active', 'text-primary-600', 'bg-primary-50', 'dark:text-primary-400', 'dark:bg-primary-900');
            this.classList.remove('text-gray-500', 'dark:text-gray-400');
            
            // Filter tools
            toolItems.forEach(item => {
                if (category === 'all' || item.dataset.category === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // Add some animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.tool-card, .tool-item').forEach(card => {
        observer.observe(card);
    });
});
</script>

<style>
.animate-fade-in {
    animation: fadeIn 0.6s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
@endsection