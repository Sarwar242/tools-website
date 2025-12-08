import './bootstrap';
import '../css/app.css';

// Theme management
window.ThemeManager = {
    init() {
        this.bindEvents();
        this.loadTheme();
    },
    
    bindEvents() {
        // Single theme toggle button
        const themeSwitcher = document.getElementById('themeSwitcher');
        if (themeSwitcher) {
            themeSwitcher.addEventListener('click', () => {
                const currentTheme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                this.switchTheme(newTheme);
            });
        }
    },
    
    loadTheme() {
        const savedTheme = localStorage.getItem('theme') || 'light';
        this.applyTheme(savedTheme);
    },
    
    switchTheme(theme) {
        this.applyTheme(theme);
        localStorage.setItem('theme', theme);
        
        // Optional: Update server session (can be removed if not needed)
        fetch('/theme/switch', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ theme })
        }).catch(error => console.error('Theme switch error:', error));
    },
    
    applyTheme(theme) {
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    },
    
    changeColor(color) {
        fetch('/theme/color', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ color })
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  window.location.reload();
              }
          })
          .catch(error => console.error('Color change error:', error));
    },
    
    showNotification(message, type = 'info', duration = 3000) {
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-triangle' : 'info-circle'} mr-2"></i>
            ${message}
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => notification.classList.add('show'), 100);
        
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => notification.remove(), 300);
        }, duration);
    }
};

// QR Code Generator
window.QRGenerator = {
    init() {
        this.bindEvents();
    },
    
    bindEvents() {
        const form = document.getElementById('qrForm');
        if (form) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                this.generateQR();
            });
        }
    },
    
    async generateQR() {
        const form = document.getElementById('qrForm');
        const formData = new FormData(form);
        const submitBtn = form.querySelector('button[type="submit"]');
        
        this.setLoading(submitBtn, true);
        
        try {
            const response = await fetch('/tools/qr-generator', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            });
            
            const data = await response.json();
            
            console.log('Full QR Response:', data);
            
            if (data.success && data.qr_code) {
                const previewElement = document.getElementById('qrPreview');
                const placeholder = document.getElementById('qrPlaceholder');
                
                // Remove placeholder if exists
                if (placeholder) placeholder.remove();
                
                // Insert QR code
                previewElement.innerHTML = data.qr_code;
                
                // Style the SVG to fit properly
                const svg = previewElement.querySelector('svg');
                if (svg) {
                    svg.style.maxWidth = '100%';
                    svg.style.height = 'auto';
                    svg.style.display = 'block';
                    svg.style.margin = '0 auto';
                }
                
                // Show download section
                const downloadSection = document.getElementById('downloadSection');
                if (downloadSection) {
                    downloadSection.classList.remove('hidden');
                }
                
                window.currentQrData = data;
                window.ThemeManager.showNotification('QR Code generated successfully!', 'success');
            } else {
                console.error('QR Generation failed:', data);
                window.ThemeManager.showNotification(data.error || 'Error generating QR code', 'error');
            }
        } catch (error) {
            console.error('QR Generation error:', error);
            window.ThemeManager.showNotification('Network error occurred', 'error');
        } finally {
            this.setLoading(submitBtn, false);
        }
    },
    
    setLoading(button, loading) {
        if (loading) {
            button.disabled = true;
            button.dataset.originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner spin mr-2"></i>Loading...';
            button.classList.add('loading');
        } else {
            button.disabled = false;
            button.innerHTML = button.dataset.originalText || button.innerHTML;
            button.classList.remove('loading');
        }
    }
};

// URL Shortener
window.URLShortener = {
    init() {
        this.bindEvents();
    },
    
    bindEvents() {
        const form = document.getElementById('urlForm');
        if (form) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                this.shortenURL();
            });
        }
    },
    
    async shortenURL() {
        const form = document.getElementById('urlForm');
        const formData = new FormData(form);
        const submitBtn = form.querySelector('button[type="submit"]');
        
        window.QRGenerator.setLoading(submitBtn, true);
        
        try {
            const response = await fetch('/tools/url-shortener', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                document.getElementById('urlResult').innerHTML = `
                    <div class="card p-4">
                        <h5 class="font-semibold text-gray-900 dark:text-gray-100">Shortened URL:</h5>
                        <div class="flex items-center gap-2 mt-2">
                            <input type="text" value="${data.short_url}" readonly class="form-input flex-1">
                            <button onclick="navigator.clipboard.writeText('${data.short_url}')" class="btn-outline-primary">Copy</button>
                        </div>
                    </div>
                `;
                window.ThemeManager.showNotification('URL shortened successfully!', 'success');
            } else {
                window.ThemeManager.showNotification(data.error || 'Error shortening URL', 'error');
            }
        } catch (error) {
            console.error('URL Shortening error:', error);
            window.ThemeManager.showNotification('Network error occurred', 'error');
        } finally {
            window.QRGenerator.setLoading(submitBtn, false);
        }
    }
};

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    window.ThemeManager.init();
    window.QRGenerator.init();
    window.URLShortener.init();
});

// Auto-detect system theme on first visit
if (!localStorage.getItem('theme') && window.matchMedia) {
    const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
    const systemTheme = mediaQuery.matches ? 'dark' : 'light';
    window.ThemeManager.switchTheme(systemTheme);
}