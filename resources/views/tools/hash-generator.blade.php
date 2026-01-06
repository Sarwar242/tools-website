@extends('layouts.app')

@section('title', 'Hash & Bcrypt Generator - ToolHub')
@section('description', 'Generate MD5, SHA-1, SHA-256, SHA-512, and Bcrypt hashes. Free online hash generator for Laravel developers and security.')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-full mb-4">
            <i class="fas fa-fingerprint text-2xl text-primary-600 dark:text-primary-400"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">Hash & Bcrypt Generator</h1>
        <p class="text-gray-600 dark:text-gray-400">Generate cryptographic hashes including Bcrypt for Laravel</p>
    </div>

    <!-- Top Ad -->
    @include('partials.adsense')

    <!-- Input -->
    <div class="card p-6 mb-6">
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            <i class="fas fa-keyboard text-primary-600 dark:text-primary-400 mr-2"></i>
            Input Text
        </label>
        <textarea id="hashInput" rows="5"
                  placeholder="Enter text to hash..."
                  class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-primary-500 focus:border-transparent mb-4"></textarea>
        
        <button id="generateAllBtn" class="btn-primary w-full">
            <i class="fas fa-cog mr-2"></i>Generate All Hashes
        </button>
        
    </div>

    <!-- Hash Results -->
    <div id="hashResults" class="space-y-4 hidden">
        <!-- Bcrypt (Laravel) -->
        <div class="card p-6 bg-primary-50 dark:bg-primary-900 border-2 border-primary-200 dark:border-primary-700">
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Bcrypt</h3>
                    <span class="ml-2 px-2 py-0.5 bg-primary-600 text-white text-xs rounded-full">Laravel</span>
                </div>
                <button class="copy-hash-btn text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300" data-hash="bcrypt">
                    <i class="fas fa-copy"></i>
                </button>
            </div>
            <div id="bcryptOutput" class="px-4 py-3 bg-white dark:bg-gray-800 rounded-lg font-mono text-sm text-gray-900 dark:text-gray-100 break-all"></div>
            <p class="text-xs text-gray-600 dark:text-gray-300 mt-2">
                <i class="fas fa-shield-alt text-primary-600 mr-1"></i>
                Recommended for password hashing in Laravel • Cost factor: 10 (default)
            </p>
            <div class="mt-3 p-3 bg-blue-50 dark:bg-blue-900 rounded-lg">
                <p class="text-xs text-blue-800 dark:text-blue-200">
                    <i class="fas fa-info-circle mr-1"></i>
                    <strong>Laravel Usage:</strong> Use <code class="bg-blue-100 dark:bg-blue-800 px-1 rounded">Hash::make('password')</code> or this hash in seeders/tests
                </p>
            </div>
        </div>

        <!-- MD5 -->
        <div class="card p-6">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">MD5</h3>
                <button class="copy-hash-btn text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300" data-hash="md5">
                    <i class="fas fa-copy"></i>
                </button>
            </div>
            <div id="md5Output" class="px-4 py-3 bg-gray-50 dark:bg-gray-800 rounded-lg font-mono text-sm text-gray-900 dark:text-gray-100 break-all"></div>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">128-bit hash (32 hex characters)</p>
        </div>

        <!-- SHA-1 -->
        <div class="card p-6">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">SHA-1</h3>
                <button class="copy-hash-btn text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300" data-hash="sha1">
                    <i class="fas fa-copy"></i>
                </button>
            </div>
            <div id="sha1Output" class="px-4 py-3 bg-gray-50 dark:bg-gray-800 rounded-lg font-mono text-sm text-gray-900 dark:text-gray-100 break-all"></div>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">160-bit hash (40 hex characters)</p>
        </div>

        <!-- SHA-256 -->
        <div class="card p-6">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">SHA-256</h3>
                <button class="copy-hash-btn text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300" data-hash="sha256">
                    <i class="fas fa-copy"></i>
                </button>
            </div>
            <div id="sha256Output" class="px-4 py-3 bg-gray-50 dark:bg-gray-800 rounded-lg font-mono text-sm text-gray-900 dark:text-gray-100 break-all"></div>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">256-bit hash (64 hex characters) - Recommended for security</p>
        </div>

        <!-- SHA-512 -->
        <div class="card p-6">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">SHA-512</h3>
                <button class="copy-hash-btn text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300" data-hash="sha512">
                    <i class="fas fa-copy"></i>
                </button>
            </div>
            <div id="sha512Output" class="px-4 py-3 bg-gray-50 dark:bg-gray-800 rounded-lg font-mono text-sm text-gray-900 dark:text-gray-100 break-all"></div>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">512-bit hash (128 hex characters) - Maximum security</p>
        </div>
    </div>

    <!-- Info -->
    <div class="mt-8 card p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
            <i class="fas fa-info-circle text-primary-600 dark:text-primary-400 mr-2"></i>
            About Hash Functions
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-2">What are Hash Functions?</h4>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                    Hash functions convert data of any size into a fixed-size string of characters. The same input always produces the same hash, but it's computationally infeasible to reverse the process.
                </p>
            </div>
            <div>
                <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-2">Common Uses</h4>
                <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                    <li>• <strong>Bcrypt:</strong> Laravel password hashing</li>
                    <li>• <strong>SHA-256/512:</strong> File integrity verification</li>
                    <li>• <strong>MD5/SHA-1:</strong> Legacy systems (not for passwords!)</li>
                    <li>• <strong>All:</strong> Data deduplication, checksums</li>
                </ul>
            </div>
            <div>
                <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-2">Security Recommendations</h4>
                <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                    <li>• <strong>For passwords:</strong> Use Bcrypt (Laravel default)</li>
                    <li>• <strong>For data integrity:</strong> Use SHA-256 or SHA-512</li>
                    <li>• <strong>Avoid MD5/SHA-1:</strong> Deprecated for security</li>
                    <li>• <strong>Bcrypt automatically salts</strong> your passwords</li>
                </ul>
            </div>
            <div>
                <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-2">Privacy Note</h4>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    All hashing is performed locally in your browser. Your data never leaves your device.
                </p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const hashInput = document.getElementById('hashInput');
    const generateAllBtn = document.getElementById('generateAllBtn');
    const hashResults = document.getElementById('hashResults');

    generateAllBtn.addEventListener('click', async function() {
        const input = hashInput.value;
        if (!input) {
            alert('Please enter text to hash');
            return;
        }

        // Disable button and show loading state
        generateAllBtn.disabled = true;
        generateAllBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Generating...';

        try {
            // Get CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Call the API to generate hashes
            const response = await fetch('/api/v1/hash', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ input: input })
            });

            const data = await response.json();

            if (data.success) {
                // Display all hashes
                document.getElementById('bcryptOutput').textContent = data.data.hashes.bcrypt;
                document.getElementById('md5Output').textContent = data.data.hashes.md5;
                document.getElementById('sha1Output').textContent = data.data.hashes.sha1;
                document.getElementById('sha256Output').textContent = data.data.hashes.sha256;
                document.getElementById('sha512Output').textContent = data.data.hashes.sha512;

                // Show results
                hashResults.classList.remove('hidden');
                hashResults.scrollIntoView({ behavior: 'smooth' });
            } else {
                alert('Error: ' + (data.error || 'Failed to generate hashes'));
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Failed to generate hashes. Please try again.');
        } finally {
            // Re-enable button
            generateAllBtn.disabled = false;
            generateAllBtn.innerHTML = '<i class="fas fa-cog mr-2"></i>Generate All Hashes';
        }
    });

    // Copy functionality
    document.querySelectorAll('.copy-hash-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const hashType = this.dataset.hash;
            const output = document.getElementById(hashType + 'Output');
            
            // Create temporary textarea
            const temp = document.createElement('textarea');
            temp.value = output.textContent;
            document.body.appendChild(temp);
            temp.select();
            document.execCommand('copy');
            document.body.removeChild(temp);

            // Visual feedback
            const icon = this.querySelector('i');
            const originalClass = icon.className;
            icon.className = 'fas fa-check';
            setTimeout(() => {
                icon.className = originalClass;
            }, 2000);
        });
    });

    // Auto-generate on Ctrl/Cmd+Enter
    hashInput.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            generateAllBtn.click();
        }
    });
});
</script>

<!-- Educational Content -->
<div class="max-w-4xl mx-auto mt-12 space-y-8">
    <div class="card p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">What is a Hash Function?</h2>
        <p class="text-gray-700 dark:text-gray-300 mb-4">
            A hash function is a one-way cryptographic algorithm that converts input data of any size into a fixed-size string of characters, 
            called a hash or digest. Hash functions are designed to be irreversible - you cannot recreate the original data from the hash. 
            Even a tiny change in input produces a completely different hash value.
        </p>
        <p class="text-gray-700 dark:text-gray-300">
            Our free hash generator supports multiple algorithms including MD5, SHA-1, SHA-256, SHA-512, and more. These hashes are essential 
            for password storage, data integrity verification, digital signatures, and blockchain technology.
        </p>
    </div>

    <div class="card p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Hash Algorithm Comparison</h2>
        <div class="space-y-4">
            <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">MD5 (128-bit)</h3>
                <p class="text-gray-700 dark:text-gray-300 text-sm mb-2">Fast but cryptographically broken. Use only for non-security purposes like checksums.</p>
                <div class="flex items-center text-xs">
                    <span class="px-2 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 rounded">Not Recommended for Security</span>
                </div>
            </div>
            <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">SHA-1 (160-bit)</h3>
                <p class="text-gray-700 dark:text-gray-300 text-sm mb-2">Deprecated for security. Still used in legacy systems and Git version control.</p>
                <div class="flex items-center text-xs">
                    <span class="px-2 py-1 bg-orange-100 dark:bg-orange-900 text-orange-800 dark:text-orange-200 rounded">Deprecated</span>
                </div>
            </div>
            <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">SHA-256 (256-bit)</h3>
                <p class="text-gray-700 dark:text-gray-300 text-sm mb-2">Industry standard for security. Used in SSL certificates, Bitcoin, and password hashing.</p>
                <div class="flex items-center text-xs">
                    <span class="px-2 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded">Recommended</span>
                </div>
            </div>
            <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">SHA-512 (512-bit)</h3>
                <p class="text-gray-700 dark:text-gray-300 text-sm mb-2">Stronger variant of SHA-256 with longer hash. Preferred for maximum security.</p>
                <div class="flex items-center text-xs">
                    <span class="px-2 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded">Highly Secure</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Common Use Cases</h2>
        <div class="space-y-3">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                <span class="text-gray-700 dark:text-gray-300"><strong>Password Storage:</strong> Hash passwords before storing in databases (use bcrypt/Argon2 for production)</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                <span class="text-gray-700 dark:text-gray-300"><strong>File Integrity:</strong> Verify downloads haven't been corrupted or tampered with</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                <span class="text-gray-700 dark:text-gray-300"><strong>Digital Signatures:</strong> Verify authenticity of documents and software</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                <span class="text-gray-700 dark:text-gray-300"><strong>Blockchain:</strong> Generate unique identifiers for blockchain transactions</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                <span class="text-gray-700 dark:text-gray-300"><strong>Data Deduplication:</strong> Identify duplicate files without comparing full content</span>
            </div>
        </div>
    </div>

    <div class="card p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Frequently Asked Questions</h2>
        <div class="space-y-4">
            <div>
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Can I reverse a hash to get the original data?</h3>
                <p class="text-gray-700 dark:text-gray-300">No. Hash functions are one-way by design. You cannot decrypt or reverse a hash back to its original input.</p>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Which hash algorithm should I use?</h3>
                <p class="text-gray-700 dark:text-gray-300">For security purposes, use SHA-256 or SHA-512. Avoid MD5 and SHA-1 as they have known vulnerabilities.</p>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Are hashes unique?</h3>
                <p class="text-gray-700 dark:text-gray-300">Practically yes, but theoretically collisions (two inputs producing the same hash) can occur. Modern algorithms like SHA-256 make this astronomically unlikely.</p>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Is this tool secure for sensitive data?</h3>
                <p class="text-gray-700 dark:text-gray-300">Yes! All hashing happens in your browser. No data is transmitted to our servers. However, remember that hashes can be looked up in rainbow tables.</p>
            </div>
        </div>
    </div>

    <div class="card p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Related Tools</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('tools.password-generator') }}" class="flex items-center p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:border-primary-500 transition-colors">
                <i class="fas fa-lock text-2xl text-primary-600 mr-3"></i>
                <div>
                    <div class="font-semibold text-gray-900 dark:text-gray-100">Password Generator</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Create strong passwords</div>
                </div>
            </a>
            <a href="{{ route('tools.base64-encoder') }}" class="flex items-center p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:border-primary-500 transition-colors">
                <i class="fas fa-code text-2xl text-primary-600 mr-3"></i>
                <div>
                    <div class="font-semibold text-gray-900 dark:text-gray-100">Base64 Encoder</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Encode/decode data</div>
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
