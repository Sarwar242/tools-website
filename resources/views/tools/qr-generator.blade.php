@extends('layouts.app')

@section('title', 'Free QR Code Generator - Create QR Codes Instantly')
@section('description', 'Generate QR codes for free. Create QR codes for URLs, text, WiFi, email, phone numbers and more. High quality, customizable, instant download.')
@section('keywords', 'QR code generator, free QR codes, QR maker, WiFi QR code, URL QR code, text QR code, download QR code')

@section('content')
<div class="text-center mb-4">
    <h1 class="display-5 fw-bold">📱 QR Code Generator</h1>
    <p class="lead text-muted">Create QR codes instantly for URLs, text, WiFi, and more</p>
</div>

<!-- Top Ad Zone -->
<div class="ad-zone horizontal mb-4">
    <div class="text-muted">
        <i class="bi bi-rectangle" style="font-size: 1.5rem; opacity: 0.4;"></i><br>
        <small>Header Ad - Perfect for tool-specific monetization</small>
    </div>
</div>

<div class="row">
    <!-- Generator Form -->
    <div class="col-lg-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-gear-fill"></i> QR Code Settings</h5>
            </div>
            <div class="card-body">
                <form id="qrForm">
                    <!-- QR Type Selection -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">QR Code Type</label>
                        <select class="form-select form-select-lg" id="qrType" name="type">
                            <option value="url" selected>🌐 Website URL</option>
                            <option value="text">📝 Plain Text</option>
                            <option value="email">📧 Email Address</option>
                            <option value="phone">📞 Phone Number</option>
                            <option value="wifi">📶 WiFi Network</option>
                        </select>
                    </div>

                    <!-- Dynamic Input Fields -->
                    <div id="inputFields">
                        <!-- URL/Text Input (default) -->
                        <div class="mb-4" id="textInput">
                            <label class="form-label fw-bold">Content</label>
                            <textarea class="form-control form-control-lg" id="qrData" name="data" rows="3" 
                                     placeholder="https://example.com" required></textarea>
                            <div class="form-text">Enter the URL or text you want to encode in the QR code</div>
                        </div>
                    </div>

                    <!-- WiFi Fields (hidden by default) -->
                    <div id="wifiFields" style="display: none;">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Network Name (SSID)</label>
                            <input type="text" class="form-control form-control-lg" id="wifiSSID" name="ssid" placeholder="MyWiFiNetwork">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Password</label>
                            <input type="text" class="form-control form-control-lg" id="wifiPassword" name="password" placeholder="password123">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Security Type</label>
                            <select class="form-select form-select-lg" id="wifiSecurity">
                                <option value="WPA">WPA/WPA2</option>
                                <option value="WEP">WEP</option>
                                <option value="nopass">Open Network</option>
                            </select>
                        </div>
                    </div>

                    <!-- Size Selection -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">QR Code Size</label>
                        <select class="form-select form-select-lg" id="qrSize" name="size">
                            <option value="200">200x200 (Small)</option>
                            <option value="300" selected>300x300 (Medium)</option>
                            <option value="400">400x400 (Large)</option>
                            <option value="500">500x500 (Extra Large)</option>
                        </select>
                    </div>

                    <!-- Generate Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-qr-code"></i> Generate QR Code
                            <span class="loading spinner-border spinner-border-sm ms-2" role="status"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- QR Code Preview -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="bi bi-eye-fill"></i> Preview & Download</h5>
            </div>
            <div class="card-body text-center">
                <div id="qrPreview" class="mb-4 p-4" style="min-height: 300px; background: #f8f9fa; border-radius: 10px;">
                    <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                        <div>
                            <i class="bi bi-qr-code" style="font-size: 5rem; opacity: 0.3;"></i>
                            <p class="mt-3 mb-0">Your QR code will appear here</p>
                            <small>Fill the form and click "Generate QR Code"</small>
                        </div>
                    </div>
                </div>

                <div id="downloadSection" style="display: none;">
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-success btn-lg" id="downloadPngBtn">
                            <i class="bi bi-download"></i> Download PNG
                        </button>
                        <button type="button" class="btn btn-outline-secondary" id="downloadSvgBtn">
                            <i class="bi bi-download"></i> Download SVG
                        </button>
                    </div>
                    
                    <div class="mt-3 p-3 bg-light rounded">
                        <small class="text-muted">
                            <i class="bi bi-info-circle"></i> 
                            <strong>PNG</strong> for images & social media<br>
                            <strong>SVG</strong> for print & scalable designs
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Side Ad Zone -->
        <div class="ad-zone mt-4" style="min-height: 250px;">
            <div class="text-muted">
                <i class="bi bi-square" style="font-size: 2rem; opacity: 0.4;"></i><br>
                <h6 class="mt-2">Square Ad Zone</h6>
                <small>250x250 or 300x300</small><br>
                <small class="text-info">Great conversion spot</small>
            </div>
        </div>
    </div>
</div>

<!-- Usage Tips -->
<div class="row mt-5">
    <div class="col-lg-8 mx-auto">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-info text-white">
                <h6 class="mb-0"><i class="bi bi-lightbulb-fill"></i> Pro Tips for Better QR Codes</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Keep URLs short for better scanning</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Test before printing or sharing</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Use high contrast colors</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Ensure adequate size for distance</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Add a call-to-action near QR code</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Avoid placing on curved surfaces</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="row mt-5">
    <div class="col-lg-10 mx-auto">
        <h4 class="text-center mb-4">Frequently Asked Questions</h4>
        <div class="accordion" id="qrFAQ">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        What is a QR Code and how does it work?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#qrFAQ">
                    <div class="accordion-body">
                        A QR (Quick Response) code is a 2D barcode that can store various types of information like URLs, text, contact details, WiFi credentials, etc. When scanned with a smartphone camera or QR reader app, it instantly performs the encoded action (opens a website, displays text, connects to WiFi, etc.).
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        Are the QR codes free to use commercially?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#qrFAQ">
                    <div class="accordion-body">
                        Yes! All QR codes generated here are completely free to use for personal and commercial purposes. No attribution required, no watermarks, no restrictions. Use them in marketing materials, business cards, menus, or anywhere else.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        Do QR codes expire? How long do they last?
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#qrFAQ">
                    <div class="accordion-body">
                        Static QR codes (like the ones generated here) never expire and will work forever. However, if the content they point to (like a website URL) becomes unavailable, the QR code won't be able to complete its action. The QR code itself remains valid indefinitely.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bottom Ad -->
<div class="ad-zone horizontal mt-5">
    <div class="text-muted">
        <i class="bi bi-rectangle" style="font-size: 1.5rem; opacity: 0.4;"></i><br>
        <small>Bottom Content Ad - 728x90</small>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    let currentQrData = null;

    // Handle QR type change
    $('#qrType').on('change', function() {
        const type = $(this).val();
        updateInputFields(type);
    });

    function updateInputFields(type) {
        // Show/hide appropriate fields
        if (type === 'wifi') {
            $('#textInput').hide();
            $('#wifiFields').show();
        } else {
            $('#wifiFields').hide();
            $('#textInput').show();
            
            // Update placeholder based on type
            let placeholder = '';
            switch(type) {
                case 'url':
                    placeholder = 'https://example.com';
                    break;
                case 'email':
                    placeholder = 'user@example.com';
                    break;
                case 'phone':
                    placeholder = '+1234567890';
                    break;
                default:
                    placeholder = 'Enter your text here...';
            }
            $('#qrData').attr('placeholder', placeholder);
        }
    }

    // Handle form submission
    $('#qrForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const type = $('#qrType').val();
        
        // Add WiFi data if WiFi type
        if (type === 'wifi') {
            formData.append('ssid', $('#wifiSSID').val());
            formData.append('password', $('#wifiPassword').val());
        }
        
        // Validate required fields
        if (type === 'wifi') {
            if (!$('#wifiSSID').val()) {
                showNotification('Please enter WiFi network name', 'error');
                return;
            }
        } else {
            if (!$('#qrData').val()) {
                showNotification('Please enter content for the QR code', 'error');
                return;
            }
        }
        
        setLoading('#qrForm button[type="submit"]', true);
        
        $.ajax({
            url: '{{ route("tools.generate-qr") }}',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    // Display QR code
                    $('#qrPreview').html(response.qr_code);
                    $('#downloadSection').show();
                    
                    // Store data for download
                    currentQrData = response;
                    
                    // Track successful generation
                    trackEvent('QR Generator', 'Generate', type);
                    
                    showNotification('QR Code generated successfully!', 'success');
                } else {
                    showNotification(response.error || 'Error generating QR code', 'error');
                }
            },
            error: function(xhr) {
                const error = xhr.responseJSON?.message || 'Error generating QR code';
                showNotification(error, 'error');
            },
            complete: function() {
                setLoading('#qrForm button[type="submit"]', false);
            }
        });
    });

    // Handle PNG download
    $('#downloadPngBtn').on('click', function() {
        if (currentQrData) {
            downloadQrAsPng();
            trackEvent('QR Generator', 'Download', 'PNG');
        }
    });

    // Handle SVG download
    $('#downloadSvgBtn').on('click', function() {
        if (currentQrData) {
            downloadQrAsSvg();
            trackEvent('QR Generator', 'Download', 'SVG');
        }
    });

    function downloadQrAsPng() {
        const svg = $('#qrPreview svg')[0];
        if (!svg) return;
        
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        const data = new XMLSerializer().serializeToString(svg);
        const img = new Image();
        
        canvas.width = currentQrData.size || 300;
        canvas.height = currentQrData.size || 300;
        
        img.onload = function() {
            // White background
            ctx.fillStyle = 'white';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            ctx.drawImage(img, 0, 0);
            
            const link = document.createElement('a');
            link.download = `qr-code-${currentQrData.type || 'custom'}.png`;
            link.href = canvas.toDataURL('image/png');
            link.click();
            
            showNotification('QR Code downloaded as PNG!', 'success');
        };
        
        img.src = 'data:image/svg+xml;base64,' + btoa(unescape(encodeURIComponent(data)));
    }

    function downloadQrAsSvg() {
        const svgData = $('#qrPreview').html();
        const blob = new Blob([svgData], {type: 'image/svg+xml'});
        const url = URL.createObjectURL(blob);
        
        const link = document.createElement('a');
        link.download = `qr-code-${currentQrData.type || 'custom'}.svg`;
        link.href = url;
        link.click();
        
        URL.revokeObjectURL(url);
        showNotification('QR Code downloaded as SVG!', 'success');
    }

    // Track page engagement
    trackEvent('QR Generator', 'Page View', 'Tool Access');
    
    // Track form interactions
    $('#qrType').on('change', function() {
        trackEvent('QR Generator', 'Type Change', $(this).val());
    });
});
</script>
@endpush