@extends('layouts.app')

@section('title', 'Free JSON Formatter - Beautify, Validate & Minify JSON Online | ToolHub')
@section('description', 'Format and validate JSON data instantly. Beautify minified JSON, validate syntax errors, and minify JSON for production. Free online JSON formatter with syntax highlighting. Perfect for API development.')
@section('keywords', 'JSON formatter, JSON validator, beautify JSON, minify JSON, JSON pretty print, format JSON, JSON beautifier, validate JSON, JSON syntax checker, JSON tool')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-full mb-4">
            <i class="fas fa-code text-2xl text-primary-600 dark:text-primary-400"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">JSON Formatter & Validator</h1>
        <p class="text-gray-600 dark:text-gray-400">Format, validate, and beautify your JSON data</p>
    </div>

    <!-- Top Ad -->
    @include('partials.adsense')

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Input Section -->
        <div class="card p-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">
                <i class="fas fa-file-import text-primary-600 dark:text-primary-400 mr-2"></i>
                Input JSON
            </h2>
            
            <div class="mb-4">
                <textarea id="jsonInput" 
                          class="w-full h-96 px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-primary-500 focus:border-transparent font-mono text-sm"
                          placeholder='Paste your JSON here... Example: {"name":"John","age":30}'></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-2 mb-4">
                <button id="formatBtn" class="btn-primary flex-1">
                    <i class="fas fa-magic mr-2"></i>Format
                </button>
                <button id="validateBtn" class="btn-outline-primary flex-1">
                    <i class="fas fa-check-circle mr-2"></i>Validate
                </button>
                <button id="minifyBtn" class="btn-outline-primary flex-1">
                    <i class="fas fa-compress mr-2"></i>Minify
                </button>
            </div>

            <!-- Options -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Indent Size
                    </label>
                    <select id="indentSize" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-primary-500">
                        <option value="2" selected>2 spaces</option>
                        <option value="4">4 spaces</option>
                        <option value="8">8 spaces</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button id="clearBtn" class="btn-outline-primary w-full">
                        <i class="fas fa-trash mr-2"></i>Clear
                    </button>
                </div>
            </div>
        </div>

        <!-- Output Section -->
        <div class="card p-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">
                <i class="fas fa-file-export text-primary-600 dark:text-primary-400 mr-2"></i>
                Output
            </h2>

            <!-- Status Message -->
            <div id="statusMessage" class="mb-4 hidden"></div>

            <div class="mb-4">
                <textarea id="jsonOutput" 
                          class="w-full h-96 px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 font-mono text-sm"
                          readonly></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-2 mb-4">
                <button id="copyBtn" class="btn-primary flex-1" disabled>
                    <i class="fas fa-copy mr-2"></i>Copy
                </button>
                <button id="downloadBtn" class="btn-outline-primary flex-1" disabled>
                    <i class="fas fa-download mr-2"></i>Download
                </button>
            </div>

            <!-- Stats -->
            <div id="jsonStats" class="grid grid-cols-2 gap-4 text-sm hidden">
                <div class="text-center p-3 bg-gray-50 dark:bg-gray-800 rounded-lg">
                    <div class="font-semibold text-gray-900 dark:text-gray-100" id="statSize">0</div>
                    <div class="text-gray-500 dark:text-gray-400">Characters</div>
                </div>
                <div class="text-center p-3 bg-gray-50 dark:bg-gray-800 rounded-lg">
                    <div class="font-semibold text-gray-900 dark:text-gray-100" id="statLines">0</div>
                    <div class="text-gray-500 dark:text-gray-400">Lines</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features -->
    <div class="mt-8 card p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Features</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="flex items-start">
                <i class="fas fa-check-circle text-primary-600 dark:text-primary-400 mt-1 mr-3"></i>
                <div>
                    <h4 class="font-medium text-gray-900 dark:text-gray-100">Format & Beautify</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Instantly format messy JSON</p>
                </div>
            </div>
            <div class="flex items-start">
                <i class="fas fa-check-circle text-primary-600 dark:text-primary-400 mt-1 mr-3"></i>
                <div>
                    <h4 class="font-medium text-gray-900 dark:text-gray-100">Validate Syntax</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Detect errors with helpful messages</p>
                </div>
            </div>
            <div class="flex items-start">
                <i class="fas fa-check-circle text-primary-600 dark:text-primary-400 mt-1 mr-3"></i>
                <div>
                    <h4 class="font-medium text-gray-900 dark:text-gray-100">Minify JSON</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Compress for production use</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Ad Space -->
    <div class="mt-8 p-8 bg-gray-50 dark:bg-gray-800 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-600">
        <div class="text-center text-gray-500 dark:text-gray-400">
            <i class="fas fa-ad text-2xl mb-2"></i>
            <p>Advertisement Space</p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const jsonInput = document.getElementById('jsonInput');
    const jsonOutput = document.getElementById('jsonOutput');
    const statusMessage = document.getElementById('statusMessage');
    const jsonStats = document.getElementById('jsonStats');
    const indentSize = document.getElementById('indentSize');
    
    const formatBtn = document.getElementById('formatBtn');
    const validateBtn = document.getElementById('validateBtn');
    const minifyBtn = document.getElementById('minifyBtn');
    const clearBtn = document.getElementById('clearBtn');
    const copyBtn = document.getElementById('copyBtn');
    const downloadBtn = document.getElementById('downloadBtn');

    let currentJSON = null;

    function showStatus(message, type = 'success') {
        statusMessage.className = `p-4 rounded-lg mb-4 ${
            type === 'success' ? 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200' :
            type === 'error' ? 'bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200' :
            'bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200'
        }`;
        statusMessage.innerHTML = `<i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'} mr-2"></i>${message}`;
        statusMessage.classList.remove('hidden');
    }

    function updateStats(text) {
        const size = text.length;
        const lines = text.split('\n').length;
        
        document.getElementById('statSize').textContent = size.toLocaleString();
        document.getElementById('statLines').textContent = lines.toLocaleString();
        jsonStats.classList.remove('hidden');
    }

    function enableOutputButtons() {
        copyBtn.disabled = false;
        downloadBtn.disabled = false;
        copyBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        downloadBtn.classList.remove('opacity-50', 'cursor-not-allowed');
    }

    formatBtn.addEventListener('click', function() {
        const input = jsonInput.value.trim();
        if (!input) {
            showStatus('Please enter JSON data', 'error');
            return;
        }

        try {
            const parsed = JSON.parse(input);
            currentJSON = parsed;
            const indent = parseInt(indentSize.value);
            const formatted = JSON.stringify(parsed, null, indent);
            
            jsonOutput.value = formatted;
            showStatus('✓ JSON formatted successfully!', 'success');
            updateStats(formatted);
            enableOutputButtons();
        } catch (e) {
            showStatus(`Invalid JSON: ${e.message}`, 'error');
            jsonOutput.value = '';
        }
    });

    validateBtn.addEventListener('click', function() {
        const input = jsonInput.value.trim();
        if (!input) {
            showStatus('Please enter JSON data', 'error');
            return;
        }

        try {
            const parsed = JSON.parse(input);
            currentJSON = parsed;
            showStatus('✓ Valid JSON!', 'success');
            
            // Show structure info
            const keys = Object.keys(parsed).length;
            showStatus(`✓ Valid JSON with ${keys} top-level ${keys === 1 ? 'key' : 'keys'}`, 'success');
        } catch (e) {
            showStatus(`Invalid JSON: ${e.message}`, 'error');
        }
    });

    minifyBtn.addEventListener('click', function() {
        const input = jsonInput.value.trim();
        if (!input) {
            showStatus('Please enter JSON data', 'error');
            return;
        }

        try {
            const parsed = JSON.parse(input);
            currentJSON = parsed;
            const minified = JSON.stringify(parsed);
            
            jsonOutput.value = minified;
            const saved = input.length - minified.length;
            showStatus(`✓ JSON minified! Saved ${saved} characters (${Math.round(saved/input.length*100)}%)`, 'success');
            updateStats(minified);
            enableOutputButtons();
        } catch (e) {
            showStatus(`Invalid JSON: ${e.message}`, 'error');
            jsonOutput.value = '';
        }
    });

    clearBtn.addEventListener('click', function() {
        jsonInput.value = '';
        jsonOutput.value = '';
        currentJSON = null;
        statusMessage.classList.add('hidden');
        jsonStats.classList.add('hidden');
        copyBtn.disabled = true;
        downloadBtn.disabled = true;
    });

    copyBtn.addEventListener('click', function() {
        jsonOutput.select();
        document.execCommand('copy');
        
        const originalText = copyBtn.innerHTML;
        copyBtn.innerHTML = '<i class="fas fa-check mr-2"></i>Copied!';
        setTimeout(() => {
            copyBtn.innerHTML = originalText;
        }, 2000);
    });

    downloadBtn.addEventListener('click', function() {
        const content = jsonOutput.value;
        const blob = new Blob([content], { type: 'application/json' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'formatted.json';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    });

    // Auto-format on Enter key (Ctrl/Cmd + Enter)
    jsonInput.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            formatBtn.click();
        }
    });
});
</script>

<!-- Educational Content -->
<div class="max-w-4xl mx-auto mt-12 space-y-8">
    <div class="card p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">What is JSON?</h2>
        <p class="text-gray-700 dark:text-gray-300 mb-4">
            JSON (JavaScript Object Notation) is a lightweight data-interchange format that's easy for humans to read and write, and easy for machines 
            to parse and generate. It's the most popular format for transmitting data between web servers and clients, APIs, configuration files, and 
            data storage.
        </p>
        <p class="text-gray-700 dark:text-gray-300">
            Our JSON formatter helps you beautify minified JSON, validate syntax errors, and make your data readable. Whether you're debugging APIs, 
            configuring applications, or analyzing data structures, this tool makes JSON work easier.
        </p>
    </div>

    <div class="card p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Common JSON Use Cases</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex items-start">
                <i class="fas fa-code text-2xl text-primary-600 mr-3 mt-1"></i>
                <div>
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">API Development</h3>
                    <p class="text-gray-700 dark:text-gray-300">Format and validate API responses for debugging RESTful services and GraphQL endpoints.</p>
                </div>
            </div>
            <div class="flex items-start">
                <i class="fas fa-cog text-2xl text-primary-600 mr-3 mt-1"></i>
                <div>
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Configuration Files</h3>
                    <p class="text-gray-700 dark:text-gray-300">Edit and beautify config files for Node.js, VS Code, package.json, and other applications.</p>
                </div>
            </div>
            <div class="flex items-start">
                <i class="fas fa-database text-2xl text-primary-600 mr-3 mt-1"></i>
                <div>
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Data Storage</h3>
                    <p class="text-gray-700 dark:text-gray-300">Structure and validate data for NoSQL databases like MongoDB, CouchDB, and Firebase.</p>
                </div>
            </div>
            <div class="flex items-start">
                <i class="fas fa-exchange-alt text-2xl text-primary-600 mr-3 mt-1"></i>
                <div>
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Data Exchange</h3>
                    <p class="text-gray-700 dark:text-gray-300">Transfer data between different programming languages and platforms with a universal format.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">JSON Formatting Features</h2>
        <div class="space-y-3">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                <span class="text-gray-700 dark:text-gray-300"><strong>Beautify/Pretty Print:</strong> Convert minified JSON into readable, indented format</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                <span class="text-gray-700 dark:text-gray-300"><strong>Minify/Compress:</strong> Remove whitespace to reduce file size for production</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                <span class="text-gray-700 dark:text-gray-300"><strong>Syntax Validation:</strong> Instantly detect and highlight JSON syntax errors</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                <span class="text-gray-700 dark:text-gray-300"><strong>Copy & Download:</strong> Quick actions to save formatted JSON</span>
            </div>
        </div>
    </div>

    <div class="card p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Frequently Asked Questions</h2>
        <div class="space-y-4">
            <div>
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Is my JSON data secure?</h3>
                <p class="text-gray-700 dark:text-gray-300">Yes! All formatting happens in your browser. Your JSON data never leaves your computer and is not sent to any server.</p>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">What's the difference between beautify and minify?</h3>
                <p class="text-gray-700 dark:text-gray-300">Beautify adds indentation and line breaks for readability. Minify removes all unnecessary whitespace to reduce file size.</p>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Can this tool fix invalid JSON?</h3>
                <p class="text-gray-700 dark:text-gray-300">No, but it will show you exactly where syntax errors occur so you can fix them manually. Common errors include missing commas, quotes, or brackets.</p>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Is there a size limit?</h3>
                <p class="text-gray-700 dark:text-gray-300">The tool can handle very large JSON files (several MB), but extremely large files may slow down your browser.</p>
            </div>
        </div>
    </div>

    <div class="card p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Related Tools</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('tools.base64-encoder') }}" class="flex items-center p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:border-primary-500 transition-colors">
                <i class="fas fa-code text-2xl text-primary-600 mr-3"></i>
                <div>
                    <div class="font-semibold text-gray-900 dark:text-gray-100">Base64 Encoder</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Encode JSON data</div>
                </div>
            </a>
            <a href="{{ route('tools.hash-generator') }}" class="flex items-center p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:border-primary-500 transition-colors">
                <i class="fas fa-hashtag text-2xl text-primary-600 mr-3"></i>
                <div>
                    <div class="font-semibold text-gray-900 dark:text-gray-100">Hash Generator</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Hash JSON strings</div>
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
