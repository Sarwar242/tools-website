@extends('layouts.app')

@section('title', 'JSON Formatter & Validator - ToolHub')
@section('description', 'Format, validate, and beautify JSON data. Free online JSON formatter with syntax highlighting and error detection.')

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
@endsection
