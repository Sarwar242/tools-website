@extends('layouts.app')

@section('title', 'QR Code Generator - ToolHub')
@section('description', 'Generate QR codes for text, URLs, emails, WiFi passwords and more. Free online QR code generator with customizable size and download options.')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 dark:bg-primary-900 rounded-full mb-4">
            <i class="fas fa-qrcode text-2xl text-primary-600 dark:text-primary-400"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">QR Code Generator</h1>
        <p class="text-lg text-gray-600 dark:text-gray-400">Create custom QR codes for any text, URL, or data instantly</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Generator Form -->
        <div class="card p-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Generate QR Code</h2>
            
            <form id="qrForm" class="space-y-4">
                @csrf
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Type</label>
                    <select id="type" name="type" class="form-input">
                        <option value="text">Text</option>
                        <option value="url" selected>URL</option>
                        <option value="email">Email</option>
                        <option value="wifi">WiFi Password</option>
                        <option value="contact">Contact Info</option>
                    </select>
                </div>

                <div>
                    <label for="data" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Content</label>
                    <textarea id="data" name="data" rows="4" placeholder="Enter text, URL, email, or other data..." 
                              class="form-input" required maxlength="1000"></textarea>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Maximum 1000 characters</p>
                </div>

                <div>
                    <label for="size" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Size (pixels)</label>
                    <input type="range" id="size" name="size" min="100" max="1000" value="300" 
                           class="w-full h-2 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer">
                    <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400 mt-1">
                        <span>100px</span>
                        <span id="sizeValue">300px</span>
                        <span>1000px</span>
                    </div>
                </div>

                <div class="space-y-2">
                    <button type="submit" class="btn-primary w-full">
                        <i class="fas fa-qrcode mr-2"></i>
                        Generate QR Code
                    </button>
                </div>
            </form>

            <!-- Quick Templates -->
            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Quick Templates</h3>
                <div class="grid grid-cols-2 gap-2">
                    <button type="button" onclick="fillTemplate('url', 'https://example.com')" 
                            class="text-left p-2 text-sm bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md transition-colors">
                        <i class="fas fa-globe text-blue-500 mr-2"></i>Website URL
                    </button>
                    <button type="button" onclick="fillTemplate('email', 'mailto:name@example.com')" 
                            class="text-left p-2 text-sm bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md transition-colors">
                        <i class="fas fa-envelope text-green-500 mr-2"></i>Email
                    </button>
                    <button type="button" onclick="fillTemplate('wifi', 'WIFI:S:NetworkName;T:WPA;P:password;H:false;;')" 
                            class="text-left p-2 text-sm bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md transition-colors">
                        <i class="fas fa-wifi text-purple-500 mr-2"></i>WiFi
                    </button>
                    <button type="button" onclick="fillTemplate('contact', 'BEGIN:VCARD\nVERSION:3.0\nFN:John Doe\nORG:Company\nTEL:+1234567890\nEMAIL:john@example.com\nEND:VCARD')" 
                            class="text-left p-2 text-sm bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md transition-colors">
                        <i class="fas fa-address-card text-orange-500 mr-2"></i>Contact
                    </button>
                </div>
            </div>
        </div>

        <!-- Preview & Download -->
        <div class="card p-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Preview & Download</h2>
            
            <div id="qrPreview" class="flex items-center justify-center min-h-64 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-600 mb-4 overflow-auto">
                <div id="qrPlaceholder" class="text-center text-gray-500 dark:text-gray-400">
                    <i class="fas fa-qrcode text-4xl mb-2"></i>
                    <p>Your QR code will appear here</p>
                </div>
            </div>

            <div id="downloadSection" class="hidden space-y-3">
                <div class="flex gap-2">
                    <button type="button" onclick="downloadQR('svg')" class="btn-outline-primary flex-1">
                        <i class="fas fa-download mr-2"></i>SVG
                    </button>
                    <button type="button" onclick="downloadQR('png')" class="btn-outline-primary flex-1">
                        <i class="fas fa-download mr-2"></i>PNG
                    </button>
                    <button type="button" onclick="printQR()" class="btn-outline-primary flex-1">
                        <i class="fas fa-print mr-2"></i>Print
                    </button>
                </div>
                
                <div class="text-center">
                    <button type="button" id="shareBtn" class="text-sm text-primary-500 hover:text-primary-600 transition-colors">
                        <i class="fas fa-share-alt mr-1"></i>Share QR Code
                    </button>
                </div>
            </div>

            <!-- Usage Stats -->
            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Usage Tips</h3>
                <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                    <li>• Keep content short for better scanning</li>
                    <li>• Test QR codes before printing</li>
                    <li>• Use high contrast colors</li>
                    <li>• Ensure adequate quiet zone around code</li>
                </ul>
            </div>
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
let currentQrData = null;

// Update size value display
document.getElementById('size').addEventListener('input', function() {
    document.getElementById('sizeValue').textContent = this.value + 'px';
});

// Template filling
function fillTemplate(type, content) {
    document.getElementById('type').value = type;
    document.getElementById('data').value = content;
}

// Download functions
function downloadQR(format) {
    const qrElement = document.querySelector('#qrPreview svg');
    if (!qrElement) {
        alert('Please generate a QR code first');
        return;
    }
    
    if (format === 'svg') {
        const svgData = new XMLSerializer().serializeToString(qrElement);
        const svgBlob = new Blob([svgData], {type: 'image/svg+xml;charset=utf-8'});
        const svgUrl = URL.createObjectURL(svgBlob);
        
        const downloadLink = document.createElement('a');
        downloadLink.href = svgUrl;
        downloadLink.download = 'qrcode.svg';
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
        
        URL.revokeObjectURL(svgUrl);
    } else if (format === 'png') {
        const canvas = document.createElement('canvas');
        const size = parseInt(document.getElementById('size').value) || 300;
        canvas.width = size;
        canvas.height = size;
        const ctx = canvas.getContext('2d');
        
        // White background
        ctx.fillStyle = '#ffffff';
        ctx.fillRect(0, 0, size, size);
        
        const svgData = new XMLSerializer().serializeToString(qrElement);
        const svgBlob = new Blob([svgData], {type: 'image/svg+xml;charset=utf-8'});
        const url = URL.createObjectURL(svgBlob);
        const img = new Image();
        
        img.onload = function() {
            ctx.drawImage(img, 0, 0, size, size);
            
            canvas.toBlob(function(blob) {
                const pngUrl = URL.createObjectURL(blob);
                const downloadLink = document.createElement('a');
                downloadLink.href = pngUrl;
                downloadLink.download = 'qrcode.png';
                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);
                URL.revokeObjectURL(pngUrl);
            }, 'image/png');
            
            URL.revokeObjectURL(url);
        };
        
        img.src = url;
    }
}

function printQR() {
    const qrElement = document.querySelector('#qrPreview svg');
    if (!qrElement) return;
    
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
            <head><title>QR Code Print</title></head>
            <body style="text-align: center; margin: 50px;">
                ${qrElement.outerHTML}
            </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
}

// Share QR Code
document.getElementById('shareBtn')?.addEventListener('click', async function() {
    const qrElement = document.querySelector('#qrPreview svg');
    if (!qrElement) {
        alert('Please generate a QR code first');
        return;
    }
    
    try {
        // Convert SVG to PNG blob
        const canvas = document.createElement('canvas');
        const size = 512; // Good quality for sharing
        canvas.width = size;
        canvas.height = size;
        const ctx = canvas.getContext('2d');
        
        // White background
        ctx.fillStyle = '#ffffff';
        ctx.fillRect(0, 0, size, size);
        
        // Convert SVG to blob
        const svgData = new XMLSerializer().serializeToString(qrElement);
        const svgBlob = new Blob([svgData], {type: 'image/svg+xml;charset=utf-8'});
        const url = URL.createObjectURL(svgBlob);
        const img = new Image();
        
        img.onload = async function() {
            ctx.drawImage(img, 0, 0, size, size);
            URL.revokeObjectURL(url);
            
            // Convert canvas to blob
            canvas.toBlob(async function(blob) {
                if (navigator.share && navigator.canShare) {
                    // Check if we can share files
                    const file = new File([blob], 'qrcode.png', { type: 'image/png' });
                    const shareData = {
                        files: [file],
                        title: 'QR Code',
                        text: 'Check out this QR Code!'
                    };
                    
                    if (navigator.canShare(shareData)) {
                        try {
                            await navigator.share(shareData);
                            console.log('QR Code shared successfully');
                        } catch (error) {
                            console.log('Share cancelled or failed:', error);
                            // Fallback: download instead
                            downloadQRImage(blob);
                        }
                    } else {
                        // Web Share API doesn't support files on this device
                        downloadQRImage(blob);
                    }
                } else {
                    // No Web Share API - download instead
                    downloadQRImage(blob);
                }
            }, 'image/png');
        };
        
        img.src = url;
    } catch (error) {
        console.error('Error sharing QR code:', error);
        alert('Unable to share QR code. Please use the download button instead.');
    }
});

function downloadQRImage(blob) {
    const url = URL.createObjectURL(blob);
    const downloadLink = document.createElement('a');
    downloadLink.href = url;
    downloadLink.download = 'qrcode.png';
    document.body.appendChild(downloadLink);
    downloadLink.click();
    document.body.removeChild(downloadLink);
    URL.revokeObjectURL(url);
    
    if (window.ThemeManager) {
        window.ThemeManager.showNotification('QR Code downloaded! You can now share it manually.', 'success');
    } else {
        alert('QR Code downloaded!');
    }
}
</script>
@endsection