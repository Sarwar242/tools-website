@extends('layouts.app')

@section('title', 'Password Generator - ToolHub')
@section('description', 'Generate strong, secure passwords with customizable options. Free online password generator.')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-full mb-4">
            <i class="fas fa-key text-2xl text-primary-600 dark:text-primary-400"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">Password Generator</h1>
        <p class="text-gray-600 dark:text-gray-400">Generate strong, secure passwords instantly</p>
    </div>

    <!-- Top Ad -->
    @include('partials.adsense')

    <!-- Generator -->
    <div class="card p-6 mb-6">
        <!-- Password Display -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Generated Password
            </label>
            <div class="flex gap-2">
                <input type="text" id="passwordOutput" readonly
                       class="flex-1 px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 font-mono text-lg text-center tracking-wider"
                       placeholder="Click generate to create password">
                <button id="copyBtn" class="px-4 py-3 bg-primary-600 hover:bg-primary-700 text-white rounded-lg transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                    <i class="fas fa-copy"></i>
                </button>
            </div>
        </div>

        <!-- Strength Indicator -->
        <div id="strengthIndicator" class="mb-6 hidden">
            <div class="flex justify-between items-center mb-2">
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Password Strength</span>
                <span id="strengthText" class="text-sm font-semibold"></span>
            </div>
            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                <div id="strengthBar" class="h-2 rounded-full transition-all duration-300"></div>
            </div>
        </div>

        <!-- Options -->
        <div class="space-y-4 mb-6">
            <div>
                <label class="flex justify-between text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    <span>Password Length: <span id="lengthValue">16</span></span>
                </label>
                <input type="range" id="passwordLength" min="8" max="64" value="16" 
                       class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" id="includeUppercase" checked
                           class="w-5 h-5 text-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600">
                    <span class="ml-3 text-gray-700 dark:text-gray-300">Uppercase (A-Z)</span>
                </label>
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" id="includeLowercase" checked
                           class="w-5 h-5 text-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600">
                    <span class="ml-3 text-gray-700 dark:text-gray-300">Lowercase (a-z)</span>
                </label>
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" id="includeNumbers" checked
                           class="w-5 h-5 text-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600">
                    <span class="ml-3 text-gray-700 dark:text-gray-300">Numbers (0-9)</span>
                </label>
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" id="includeSymbols" checked
                           class="w-5 h-5 text-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600">
                    <span class="ml-3 text-gray-700 dark:text-gray-300">Symbols (!@#$%)</span>
                </label>
            </div>

            <label class="flex items-center cursor-pointer">
                <input type="checkbox" id="excludeAmbiguous"
                       class="w-5 h-5 text-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600">
                <span class="ml-3 text-gray-700 dark:text-gray-300">Exclude ambiguous characters (0, O, l, I)</span>
            </label>
        </div>

        <button id="generateBtn" class="btn-primary w-full">
            <i class="fas fa-sync-alt mr-2"></i>Generate Password
        </button>
    </div>

    <!-- Bulk Generator -->
    <div class="card p-6 mb-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
            <i class="fas fa-layer-group text-primary-600 dark:text-primary-400 mr-2"></i>
            Generate Multiple Passwords
        </h3>
        
        <div class="flex gap-2 mb-4">
            <input type="number" id="bulkCount" min="1" max="100" value="10"
                   class="w-32 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-primary-500">
            <button id="generateBulkBtn" class="btn-outline-primary">
                <i class="fas fa-list mr-2"></i>Generate Multiple
            </button>
        </div>

        <div id="bulkOutput" class="hidden">
            <textarea id="bulkPasswords" readonly rows="10"
                      class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 font-mono text-sm mb-2"></textarea>
            <div class="flex gap-2">
                <button id="copyBulkBtn" class="btn-primary flex-1">
                    <i class="fas fa-copy mr-2"></i>Copy All
                </button>
                <button id="downloadBulkBtn" class="btn-outline-primary flex-1">
                    <i class="fas fa-download mr-2"></i>Download
                </button>
            </div>
        </div>
    </div>

    <!-- Security Tips -->
    <div class="card p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
            <i class="fas fa-shield-alt text-primary-600 dark:text-primary-400 mr-2"></i>
            Password Security Tips
        </h3>
        <ul class="space-y-2 text-gray-600 dark:text-gray-400">
            <li class="flex items-start">
                <i class="fas fa-check text-primary-600 dark:text-primary-400 mt-1 mr-3"></i>
                <span>Use at least 12-16 characters for strong security</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check text-primary-600 dark:text-primary-400 mt-1 mr-3"></i>
                <span>Include a mix of uppercase, lowercase, numbers, and symbols</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check text-primary-600 dark:text-primary-400 mt-1 mr-3"></i>
                <span>Never reuse passwords across different accounts</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check text-primary-600 dark:text-primary-400 mt-1 mr-3"></i>
                <span>Use a password manager to store your passwords securely</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check text-primary-600 dark:text-primary-400 mt-1 mr-3"></i>
                <span>All passwords are generated locally in your browser for maximum security</span>
            </li>
        </ul>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const passwordOutput = document.getElementById('passwordOutput');
    const passwordLength = document.getElementById('passwordLength');
    const lengthValue = document.getElementById('lengthValue');
    const generateBtn = document.getElementById('generateBtn');
    const copyBtn = document.getElementById('copyBtn');
    const strengthIndicator = document.getElementById('strengthIndicator');
    const strengthBar = document.getElementById('strengthBar');
    const strengthText = document.getElementById('strengthText');

    // Bulk generator elements
    const bulkCount = document.getElementById('bulkCount');
    const generateBulkBtn = document.getElementById('generateBulkBtn');
    const bulkOutput = document.getElementById('bulkOutput');
    const bulkPasswords = document.getElementById('bulkPasswords');
    const copyBulkBtn = document.getElementById('copyBulkBtn');
    const downloadBulkBtn = document.getElementById('downloadBulkBtn');

    // Character sets
    const charSets = {
        uppercase: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
        lowercase: 'abcdefghijklmnopqrstuvwxyz',
        numbers: '0123456789',
        symbols: '!@#$%^&*()_+-=[]{}|;:,.<>?'
    };

    const ambiguous = '0O1lI';

    // Update length display
    passwordLength.addEventListener('input', function() {
        lengthValue.textContent = this.value;
    });

    // Generate password
    function generatePassword() {
        const length = parseInt(passwordLength.value);
        const includeUppercase = document.getElementById('includeUppercase').checked;
        const includeLowercase = document.getElementById('includeLowercase').checked;
        const includeNumbers = document.getElementById('includeNumbers').checked;
        const includeSymbols = document.getElementById('includeSymbols').checked;
        const excludeAmbiguous = document.getElementById('excludeAmbiguous').checked;

        let chars = '';
        if (includeUppercase) chars += charSets.uppercase;
        if (includeLowercase) chars += charSets.lowercase;
        if (includeNumbers) chars += charSets.numbers;
        if (includeSymbols) chars += charSets.symbols;

        if (!chars) {
            alert('Please select at least one character type');
            return null;
        }

        if (excludeAmbiguous) {
            chars = chars.split('').filter(c => !ambiguous.includes(c)).join('');
        }

        let password = '';
        const array = new Uint32Array(length);
        crypto.getRandomValues(array);
        
        for (let i = 0; i < length; i++) {
            password += chars[array[i] % chars.length];
        }

        return password;
    }

    function calculateStrength(password) {
        let strength = 0;
        if (password.length >= 8) strength += 20;
        if (password.length >= 12) strength += 20;
        if (password.length >= 16) strength += 10;
        if (/[a-z]/.test(password)) strength += 15;
        if (/[A-Z]/.test(password)) strength += 15;
        if (/[0-9]/.test(password)) strength += 10;
        if (/[^a-zA-Z0-9]/.test(password)) strength += 10;

        return Math.min(strength, 100);
    }

    function updateStrengthIndicator(password) {
        const strength = calculateStrength(password);
        strengthIndicator.classList.remove('hidden');
        
        let color, text;
        if (strength < 40) {
            color = 'bg-red-500';
            text = 'Weak';
        } else if (strength < 70) {
            color = 'bg-yellow-500';
            text = 'Medium';
        } else if (strength < 90) {
            color = 'bg-blue-500';
            text = 'Strong';
        } else {
            color = 'bg-green-500';
            text = 'Very Strong';
        }

        strengthBar.className = `h-2 rounded-full transition-all duration-300 ${color}`;
        strengthBar.style.width = strength + '%';
        strengthText.textContent = text;
        strengthText.className = `text-sm font-semibold ${color.replace('bg-', 'text-')}`;
    }

    generateBtn.addEventListener('click', function() {
        const password = generatePassword();
        if (password) {
            passwordOutput.value = password;
            updateStrengthIndicator(password);
            copyBtn.disabled = false;
        }
    });

    copyBtn.addEventListener('click', function() {
        passwordOutput.select();
        document.execCommand('copy');
        
        const originalHTML = copyBtn.innerHTML;
        copyBtn.innerHTML = '<i class="fas fa-check"></i>';
        setTimeout(() => {
            copyBtn.innerHTML = originalHTML;
        }, 2000);
    });

    // Bulk generator
    generateBulkBtn.addEventListener('click', function() {
        const count = parseInt(bulkCount.value);
        if (count < 1 || count > 100) {
            alert('Please enter a number between 1 and 100');
            return;
        }

        const passwords = [];
        for (let i = 0; i < count; i++) {
            const password = generatePassword();
            if (password) passwords.push(password);
        }

        bulkPasswords.value = passwords.join('\n');
        bulkOutput.classList.remove('hidden');
    });

    copyBulkBtn.addEventListener('click', function() {
        bulkPasswords.select();
        document.execCommand('copy');
        
        const originalHTML = copyBulkBtn.innerHTML;
        copyBulkBtn.innerHTML = '<i class="fas fa-check mr-2"></i>Copied!';
        setTimeout(() => {
            copyBulkBtn.innerHTML = originalHTML;
        }, 2000);
    });

    downloadBulkBtn.addEventListener('click', function() {
        const content = bulkPasswords.value;
        const blob = new Blob([content], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'passwords.txt';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    });

    // Generate on load
    generateBtn.click();
});
</script>
@endsection
