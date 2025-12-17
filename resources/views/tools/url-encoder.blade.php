@extends('layouts.app')

@section('title', 'URL Encoder/Decoder - ToolHub')
@section('description', 'Encode and decode URLs. Free online URL encoder and decoder tool for web developers.')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-full mb-4">
            <i class="fas fa-link text-2xl text-primary-600 dark:text-primary-400"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">URL Encoder/Decoder</h1>
        <p class="text-gray-600 dark:text-gray-400">Encode and decode URL strings instantly</p>
    </div>

    <!-- Top Ad -->
    @include('partials.adsense')

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Encode -->
        <div class="card p-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">
                <i class="fas fa-lock text-primary-600 dark:text-primary-400 mr-2"></i>
                Encode URL
            </h2>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Plain Text / URL
                </label>
                <textarea id="encodeInput" rows="10"
                          placeholder="Enter text or URL to encode...&#10;&#10;Example:&#10;https://example.com/search?q=hello world&lang=en"
                          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-primary-500 focus:border-transparent"></textarea>
            </div>

            <div class="mb-4">
                <label class="flex items-center text-sm text-gray-700 dark:text-gray-300">
                    <input type="checkbox" id="encodeFullUrl" class="mr-2 rounded border-gray-300 dark:border-gray-600 text-primary-600 focus:ring-primary-500">
                    <span>Encode full URL (including special characters like :, /, ?, &)</span>
                </label>
            </div>

            <button id="encodeBtn" class="btn-primary w-full mb-4">
                <i class="fas fa-arrow-down mr-2"></i>Encode
            </button>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Encoded Output
                </label>
                <textarea id="encodeOutput" readonly rows="10"
                          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 font-mono text-sm"></textarea>
            </div>

            <div class="flex gap-2">
                <button id="copyEncodeBtn" class="btn-outline-primary flex-1" disabled>
                    <i class="fas fa-copy mr-2"></i>Copy
                </button>
                <button id="clearEncodeBtn" class="btn-outline-primary flex-1">
                    <i class="fas fa-trash mr-2"></i>Clear
                </button>
            </div>
        </div>

        <!-- Decode -->
        <div class="card p-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">
                <i class="fas fa-unlock text-primary-600 dark:text-primary-400 mr-2"></i>
                Decode URL
            </h2>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Encoded URL String
                </label>
                <textarea id="decodeInput" rows="10"
                          placeholder="Enter encoded URL string to decode...&#10;&#10;Example:&#10;https%3A%2F%2Fexample.com%2Fsearch%3Fq%3Dhello%20world%26lang%3Den"
                          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-primary-500 focus:border-transparent font-mono text-sm"></textarea>
            </div>

            <button id="decodeBtn" class="btn-primary w-full mb-4">
                <i class="fas fa-arrow-up mr-2"></i>Decode
            </button>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Decoded Output
                </label>
                <textarea id="decodeOutput" readonly rows="10"
                          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100"></textarea>
            </div>

            <div class="flex gap-2">
                <button id="copyDecodeBtn" class="btn-outline-primary flex-1" disabled>
                    <i class="fas fa-copy mr-2"></i>Copy
                </button>
                <button id="clearDecodeBtn" class="btn-outline-primary flex-1">
                    <i class="fas fa-trash mr-2"></i>Clear
                </button>
            </div>

            <div id="decodeError" class="mt-4 p-4 bg-red-100 dark:bg-red-900 rounded-lg text-red-800 dark:text-red-200 hidden">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <span id="errorMessage"></span>
            </div>
        </div>
    </div>

    <!-- Bottom Ad -->
    @include('partials.adsense')

    <!-- Info -->
    <div class="mt-8 card p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">About URL Encoding</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-600 dark:text-gray-400">
            <div>
                <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-2">What is URL Encoding?</h4>
                <p class="text-sm mb-3">URL encoding (also called percent-encoding) converts characters into a format that can be safely transmitted over the internet. Special characters are replaced with a "%" followed by two hexadecimal digits.</p>
                <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-2">Encoding Types</h4>
                <ul class="text-sm space-y-1">
                    <li>• <strong>Standard:</strong> Encodes only special characters (recommended for query parameters)</li>
                    <li>• <strong>Full URL:</strong> Encodes all characters including :, /, ?, & (for complete URL encoding)</li>
                </ul>
            </div>
            <div>
                <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-2">Common Uses</h4>
                <ul class="text-sm space-y-1 mb-3">
                    <li>• Encoding URL query parameters</li>
                    <li>• Safely passing data in URLs</li>
                    <li>• API request parameters</li>
                    <li>• Form data submission</li>
                </ul>
                <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-2">Examples</h4>
                <ul class="text-sm space-y-1 font-mono">
                    <li>• Space → %20</li>
                    <li>• ! → %21</li>
                    <li>• @ → %40</li>
                    <li>• # → %23</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Encode elements
    const encodeInput = document.getElementById('encodeInput');
    const encodeOutput = document.getElementById('encodeOutput');
    const encodeBtn = document.getElementById('encodeBtn');
    const encodeFullUrl = document.getElementById('encodeFullUrl');
    const copyEncodeBtn = document.getElementById('copyEncodeBtn');
    const clearEncodeBtn = document.getElementById('clearEncodeBtn');

    // Decode elements
    const decodeInput = document.getElementById('decodeInput');
    const decodeOutput = document.getElementById('decodeOutput');
    const decodeBtn = document.getElementById('decodeBtn');
    const copyDecodeBtn = document.getElementById('copyDecodeBtn');
    const clearDecodeBtn = document.getElementById('clearDecodeBtn');
    const decodeError = document.getElementById('decodeError');
    const errorMessage = document.getElementById('errorMessage');

    // Encode
    encodeBtn.addEventListener('click', function() {
        const input = encodeInput.value;
        if (!input) {
            alert('Please enter text or URL to encode');
            return;
        }

        try {
            let encoded;
            if (encodeFullUrl.checked) {
                // Encode all characters including URL special characters
                encoded = encodeURIComponent(input);
            } else {
                // Standard encoding (preserves URL structure)
                encoded = encodeURI(input);
            }
            encodeOutput.value = encoded;
            copyEncodeBtn.disabled = false;
        } catch (e) {
            alert('Error encoding URL: ' + e.message);
        }
    });

    // Decode
    decodeBtn.addEventListener('click', function() {
        const input = decodeInput.value.trim();
        if (!input) {
            alert('Please enter encoded URL string to decode');
            return;
        }

        try {
            // Try decodeURIComponent first (handles both encoding types)
            const decoded = decodeURIComponent(input);
            decodeOutput.value = decoded;
            copyDecodeBtn.disabled = false;
            decodeError.classList.add('hidden');
        } catch (e) {
            try {
                // Fallback to decodeURI
                const decoded = decodeURI(input);
                decodeOutput.value = decoded;
                copyDecodeBtn.disabled = false;
                decodeError.classList.add('hidden');
            } catch (e2) {
                errorMessage.textContent = 'Invalid encoded URL string: ' + e2.message;
                decodeError.classList.remove('hidden');
                decodeOutput.value = '';
            }
        }
    });

    // Copy encode
    copyEncodeBtn.addEventListener('click', function() {
        encodeOutput.select();
        document.execCommand('copy');
        
        const originalHTML = copyEncodeBtn.innerHTML;
        copyEncodeBtn.innerHTML = '<i class="fas fa-check mr-2"></i>Copied!';
        setTimeout(() => {
            copyEncodeBtn.innerHTML = originalHTML;
        }, 2000);
    });

    // Copy decode
    copyDecodeBtn.addEventListener('click', function() {
        decodeOutput.select();
        document.execCommand('copy');
        
        const originalHTML = copyDecodeBtn.innerHTML;
        copyDecodeBtn.innerHTML = '<i class="fas fa-check mr-2"></i>Copied!';
        setTimeout(() => {
            copyDecodeBtn.innerHTML = originalHTML;
        }, 2000);
    });

    // Clear encode
    clearEncodeBtn.addEventListener('click', function() {
        encodeInput.value = '';
        encodeOutput.value = '';
        copyEncodeBtn.disabled = true;
    });

    // Clear decode
    clearDecodeBtn.addEventListener('click', function() {
        decodeInput.value = '';
        decodeOutput.value = '';
        copyDecodeBtn.disabled = true;
        decodeError.classList.add('hidden');
    });

    // Auto-encode on Ctrl/Cmd+Enter in encode input
    encodeInput.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            encodeBtn.click();
        }
    });

    // Auto-decode on Ctrl/Cmd+Enter in decode input
    decodeInput.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            decodeBtn.click();
        }
    });
});
</script>
@endsection
