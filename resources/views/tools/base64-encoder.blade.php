@extends('layouts.app')

@section('title', 'Free Base64 Encoder & Decoder - Encode/Decode Online | ToolHub')
@section('description', 'Encode and decode Base64 strings instantly. Free online Base64 encoder/decoder for text, URLs, and data. Perfect for API development, authentication tokens, and data transmission. Secure and private.')
@section('keywords', 'Base64 encoder, Base64 decoder, encode Base64, decode Base64, Base64 tool, Base64 converter, Base64 online, Base64 encode decode')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-full mb-4">
            <i class="fas fa-exchange-alt text-2xl text-primary-600 dark:text-primary-400"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">Base64 Encoder/Decoder</h1>
        <p class="text-gray-600 dark:text-gray-400">Encode and decode Base64 strings instantly</p>
    </div>

    <!-- Top Ad -->
    @include('partials.adsense')

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Encode -->
        <div class="card p-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">
                <i class="fas fa-lock text-primary-600 dark:text-primary-400 mr-2"></i>
                Encode to Base64
            </h2>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Plain Text
                </label>
                <textarea id="encodeInput" rows="10"
                          placeholder="Enter text to encode..."
                          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-primary-500 focus:border-transparent"></textarea>
            </div>

            <button id="encodeBtn" class="btn-primary w-full mb-4">
                <i class="fas fa-arrow-down mr-2"></i>Encode
            </button>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Base64 Output
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
                Decode from Base64
            </h2>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Base64 String
                </label>
                <textarea id="decodeInput" rows="10"
                          placeholder="Enter Base64 string to decode..."
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

    <!-- Info -->
    <div class="mt-8 card p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">About Base64</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-600 dark:text-gray-400">
            <div>
                <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-2">What is Base64?</h4>
                <p class="text-sm">Base64 is a binary-to-text encoding scheme that represents binary data in ASCII string format. It's commonly used for encoding data in emails, URLs, and data URIs.</p>
            </div>
            <div>
                <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-2">Common Uses</h4>
                <ul class="text-sm space-y-1">
                    <li>• Embedding images in HTML/CSS</li>
                    <li>• Encoding data in URLs</li>
                    <li>• Email attachments</li>
                    <li>• API authentication tokens</li>
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
            alert('Please enter text to encode');
            return;
        }

        try {
            const encoded = btoa(unescape(encodeURIComponent(input)));
            encodeOutput.value = encoded;
            copyEncodeBtn.disabled = false;
        } catch (e) {
            alert('Error encoding text: ' + e.message);
        }
    });

    // Decode
    decodeBtn.addEventListener('click', function() {
        const input = decodeInput.value.trim();
        if (!input) {
            alert('Please enter Base64 string to decode');
            return;
        }

        try {
            const decoded = decodeURIComponent(escape(atob(input)));
            decodeOutput.value = decoded;
            copyDecodeBtn.disabled = false;
            decodeError.classList.add('hidden');
        } catch (e) {
            errorMessage.textContent = 'Invalid Base64 string: ' + e.message;
            decodeError.classList.remove('hidden');
            decodeOutput.value = '';
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

<!-- Educational Content -->
<div class="max-w-4xl mx-auto mt-12 space-y-8">
    <div class="card p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">What is Base64 Encoding?</h2>
        <p class="text-gray-700 dark:text-gray-300 mb-4">
            Base64 is a binary-to-text encoding scheme that converts binary data into ASCII string format. It's commonly used to transmit binary 
            data over text-based protocols like email, URLs, and JSON, which don't support binary data directly. The encoding uses 64 ASCII characters 
            (A-Z, a-z, 0-9, +, /) to represent binary data.
        </p>
        <p class="text-gray-700 dark:text-gray-300">
            Our free Base64 encoder/decoder tool works entirely in your browser, ensuring your data stays private and secure. It's perfect for 
            developers working with APIs, data transmission, authentication tokens, and embedding images in HTML/CSS.
        </p>
    </div>

    <div class="card p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Common Use Cases</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex items-start">
                <i class="fas fa-image text-2xl text-primary-600 mr-3 mt-1"></i>
                <div>
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Embed Images in HTML/CSS</h3>
                    <p class="text-gray-700 dark:text-gray-300">Convert images to data URIs for inline embedding, reducing HTTP requests and improving load times.</p>
                </div>
            </div>
            <div class="flex items-start">
                <i class="fas fa-key text-2xl text-primary-600 mr-3 mt-1"></i>
                <div>
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Authentication Tokens</h3>
                    <p class="text-gray-700 dark:text-gray-300">Encode credentials and tokens for HTTP Basic Authentication and JWT tokens in API requests.</p>
                </div>
            </div>
            <div class="flex items-start">
                <i class="fas fa-envelope text-2xl text-primary-600 mr-3 mt-1"></i>
                <div>
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Email Attachments</h3>
                    <p class="text-gray-700 dark:text-gray-300">Transfer binary files via email using MIME protocols that require text-based encoding.</p>
                </div>
            </div>
            <div class="flex items-start">
                <i class="fas fa-database text-2xl text-primary-600 mr-3 mt-1"></i>
                <div>
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Store Binary in Text</h3>
                    <p class="text-gray-700 dark:text-gray-300">Save binary data in JSON, XML, or text databases that only support text formats.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">How Base64 Works</h2>
        <p class="text-gray-700 dark:text-gray-300 mb-4">
            Base64 encoding converts every 3 bytes (24 bits) of binary data into 4 ASCII characters (6 bits each). This results in approximately 
            33% increase in data size, which is the trade-off for text compatibility.
        </p>
        <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
            <p class="font-mono text-sm text-gray-700 dark:text-gray-300 mb-2"><strong>Example:</strong></p>
            <p class="font-mono text-sm text-gray-700 dark:text-gray-300">Original Text: <span class="text-primary-600">"Hello"</span></p>
            <p class="font-mono text-sm text-gray-700 dark:text-gray-300">Base64 Encoded: <span class="text-green-600">"SGVsbG8="</span></p>
        </div>
    </div>

    <div class="card p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Frequently Asked Questions</h2>
        <div class="space-y-4">
            <div>
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Is Base64 encryption?</h3>
                <p class="text-gray-700 dark:text-gray-300">No! Base64 is encoding, not encryption. It's easily reversible and provides no security. Never use it to protect sensitive data.</p>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Why does Base64 end with "=" symbols?</h3>
                <p class="text-gray-700 dark:text-gray-300">The "=" is padding to ensure the output length is a multiple of 4 characters, which Base64 requires.</p>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Can I encode images?</h3>
                <p class="text-gray-700 dark:text-gray-300">Yes, but use a specialized tool for file encoding. This tool is designed for text data. For images, look for Base64 image encoders.</p>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Is my data secure?</h3>
                <p class="text-gray-700 dark:text-gray-300">Yes! All encoding/decoding happens in your browser. Nothing is sent to our servers or stored anywhere.</p>
            </div>
        </div>
    </div>

    <div class="card p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Related Tools</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('tools.hash-generator') }}" class="flex items-center p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:border-primary-500 transition-colors">
                <i class="fas fa-hashtag text-2xl text-primary-600 mr-3"></i>
                <div>
                    <div class="font-semibold text-gray-900 dark:text-gray-100">Hash Generator</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Generate cryptographic hashes</div>
                </div>
            </a>
            <a href="{{ route('tools.url-encoder') }}" class="flex items-center p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:border-primary-500 transition-colors">
                <i class="fas fa-link text-2xl text-primary-600 mr-3"></i>
                <div>
                    <div class="font-semibold text-gray-900 dark:text-gray-100">URL Encoder</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Encode URL strings</div>
                </div>
            </a>
            <a href="{{ route('tools.dashboard') }}" class="flex items-center p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:border-primary-500 transition-colors">
                <i class="fas fa-tools text-2xl text-primary-600 mr-3"></i>
                <div>
                    <div class="font-semibold text-gray-900 dark:text-gray-100">All Tools</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Explore more tools</div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
