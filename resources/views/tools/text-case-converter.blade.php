@extends('layouts.app')

@section('title', 'Text Case Converter - ToolHub')
@section('description', 'Convert text to uppercase, lowercase, title case, sentence case, and more. Free online text case converter.')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-full mb-4">
            <i class="fas fa-font text-2xl text-primary-600 dark:text-primary-400"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">Text Case Converter</h1>
        <p class="text-gray-600 dark:text-gray-400">Convert text between different cases instantly</p>
    </div>

    <!-- Top Ad -->
    @include('partials.adsense')

    <!-- Input -->
    <div class="card p-6 mb-6">
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            <i class="fas fa-keyboard text-primary-600 dark:text-primary-400 mr-2"></i>
            Input Text
        </label>
        <textarea id="textInput" rows="8"
                  placeholder="Enter or paste your text here..."
                  class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-primary-500 focus:border-transparent"></textarea>
        
        <div class="mt-4 grid grid-cols-2 md:grid-cols-3 gap-2">
            <button id="clearBtn" class="btn-outline-primary">
                <i class="fas fa-trash mr-2"></i>Clear
            </button>
            <button id="copyBtn" class="btn-outline-primary" disabled>
                <i class="fas fa-copy mr-2"></i>Copy
            </button>
            <button id="downloadBtn" class="btn-outline-primary md:col-span-1 col-span-2" disabled>
                <i class="fas fa-download mr-2"></i>Download
            </button>
        </div>
    </div>

    <!-- Conversion Options -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
        <button class="case-btn card p-4 text-center hover:bg-primary-50 dark:hover:bg-primary-900 transition-colors" data-case="uppercase">
            <i class="fas fa-arrow-up text-2xl text-primary-600 dark:text-primary-400 mb-2"></i>
            <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-1">UPPERCASE</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">ALL CAPS TEXT</p>
        </button>

        <button class="case-btn card p-4 text-center hover:bg-primary-50 dark:hover:bg-primary-900 transition-colors" data-case="lowercase">
            <i class="fas fa-arrow-down text-2xl text-primary-600 dark:text-primary-400 mb-2"></i>
            <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-1">lowercase</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">all lowercase text</p>
        </button>

        <button class="case-btn card p-4 text-center hover:bg-primary-50 dark:hover:bg-primary-900 transition-colors" data-case="titlecase">
            <i class="fas fa-heading text-2xl text-primary-600 dark:text-primary-400 mb-2"></i>
            <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-1">Title Case</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">Capitalize Each Word</p>
        </button>

        <button class="case-btn card p-4 text-center hover:bg-primary-50 dark:hover:bg-primary-900 transition-colors" data-case="sentencecase">
            <i class="fas fa-align-left text-2xl text-primary-600 dark:text-primary-400 mb-2"></i>
            <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-1">Sentence case</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">Capitalize first letter</p>
        </button>

        <button class="case-btn card p-4 text-center hover:bg-primary-50 dark:hover:bg-primary-900 transition-colors" data-case="camelcase">
            <i class="fas fa-code text-2xl text-primary-600 dark:text-primary-400 mb-2"></i>
            <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-1">camelCase</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">firstWordLowercase</p>
        </button>

        <button class="case-btn card p-4 text-center hover:bg-primary-50 dark:hover:bg-primary-900 transition-colors" data-case="snakecase">
            <i class="fas fa-link text-2xl text-primary-600 dark:text-primary-400 mb-2"></i>
            <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-1">snake_case</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">words_with_underscores</p>
        </button>

        <button class="case-btn card p-4 text-center hover:bg-primary-50 dark:hover:bg-primary-900 transition-colors" data-case="kebabcase">
            <i class="fas fa-minus text-2xl text-primary-600 dark:text-primary-400 mb-2"></i>
            <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-1">kebab-case</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">words-with-hyphens</p>
        </button>

        <button class="case-btn card p-4 text-center hover:bg-primary-50 dark:hover:bg-primary-900 transition-colors" data-case="togglecase">
            <i class="fas fa-exchange-alt text-2xl text-primary-600 dark:text-primary-400 mb-2"></i>
            <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-1">tOGGLE cASE</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">iNVERT cASE</p>
        </button>

        <button class="case-btn card p-4 text-center hover:bg-primary-50 dark:hover:bg-primary-900 transition-colors" data-case="alternatecase">
            <i class="fas fa-random text-2xl text-primary-600 dark:text-primary-400 mb-2"></i>
            <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-1">aLtErNaTe CaSe</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">aLtErNaTiNg ChArS</p>
        </button>
    </div>

    <!-- Text Stats -->
    <div id="textStats" class="card p-6 hidden">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
            <i class="fas fa-chart-bar text-primary-600 dark:text-primary-400 mr-2"></i>
            Text Statistics
        </h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="text-center">
                <div class="text-2xl font-bold text-primary-600 dark:text-primary-400" id="charCount">0</div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Characters</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-primary-600 dark:text-primary-400" id="wordCount">0</div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Words</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-primary-600 dark:text-primary-400" id="lineCount">0</div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Lines</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-primary-600 dark:text-primary-400" id="sentenceCount">0</div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Sentences</div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const textInput = document.getElementById('textInput');
    const clearBtn = document.getElementById('clearBtn');
    const copyBtn = document.getElementById('copyBtn');
    const downloadBtn = document.getElementById('downloadBtn');
    const textStats = document.getElementById('textStats');
    const caseBtns = document.querySelectorAll('.case-btn');

    function updateStats() {
        const text = textInput.value;
        
        if (text.length > 0) {
            const chars = text.length;
            const words = text.trim().split(/\s+/).filter(w => w).length;
            const lines = text.split('\n').length;
            const sentences = text.split(/[.!?]+/).filter(s => s.trim()).length;

            document.getElementById('charCount').textContent = chars.toLocaleString();
            document.getElementById('wordCount').textContent = words.toLocaleString();
            document.getElementById('lineCount').textContent = lines.toLocaleString();
            document.getElementById('sentenceCount').textContent = sentences.toLocaleString();

            textStats.classList.remove('hidden');
            copyBtn.disabled = false;
            downloadBtn.disabled = false;
        } else {
            textStats.classList.add('hidden');
            copyBtn.disabled = true;
            downloadBtn.disabled = true;
        }
    }

    function convertCase(text, caseType) {
        switch(caseType) {
            case 'uppercase':
                return text.toUpperCase();
            
            case 'lowercase':
                return text.toLowerCase();
            
            case 'titlecase':
                return text.replace(/\w\S*/g, txt => txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase());
            
            case 'sentencecase':
                return text.toLowerCase().replace(/(^\s*\w|[.!?]\s*\w)/g, c => c.toUpperCase());
            
            case 'camelcase':
                return text.toLowerCase()
                    .replace(/[^a-zA-Z0-9]+(.)/g, (m, chr) => chr.toUpperCase());
            
            case 'snakecase':
                return text.toLowerCase()
                    .replace(/[^a-zA-Z0-9]+/g, '_')
                    .replace(/^_+|_+$/g, '');
            
            case 'kebabcase':
                return text.toLowerCase()
                    .replace(/[^a-zA-Z0-9]+/g, '-')
                    .replace(/^-+|-+$/g, '');
            
            case 'togglecase':
                return text.split('').map(c => 
                    c === c.toUpperCase() ? c.toLowerCase() : c.toUpperCase()
                ).join('');
            
            case 'alternatecase':
                return text.split('').map((c, i) => 
                    i % 2 === 0 ? c.toLowerCase() : c.toUpperCase()
                ).join('');
            
            default:
                return text;
        }
    }

    caseBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const text = textInput.value;
            if (!text) {
                alert('Please enter some text first');
                return;
            }
            
            const caseType = this.dataset.case;
            textInput.value = convertCase(text, caseType);
            updateStats();
        });
    });

    textInput.addEventListener('input', updateStats);

    clearBtn.addEventListener('click', function() {
        textInput.value = '';
        updateStats();
    });

    copyBtn.addEventListener('click', function() {
        textInput.select();
        document.execCommand('copy');
        
        const originalHTML = copyBtn.innerHTML;
        copyBtn.innerHTML = '<i class="fas fa-check mr-2"></i>Copied!';
        setTimeout(() => {
            copyBtn.innerHTML = originalHTML;
        }, 2000);
    });

    downloadBtn.addEventListener('click', function() {
        const content = textInput.value;
        const blob = new Blob([content], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'converted-text.txt';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    });

    // Initial stats update
    updateStats();
});
</script>
@endsection
