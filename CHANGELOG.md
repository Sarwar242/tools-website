# ToolHub Changelog

## [1.2.0] - Bcrypt Hash Generator Added

### Added
- **Bcrypt Hash Generator**: Added Bcrypt hashing for Laravel developers
  - Generates Bcrypt hashes with cost factor 10 (Laravel default)
  - Highlighted as recommended for passwords
  - Laravel-specific usage tips included
  - Badge showing "Laravel" for easy identification
  - Uses bcrypt.js library for client-side generation
  - Perfect for database seeders and testing

### Changed
- **Hash Generator**: Renamed to "Hash & Bcrypt Generator"
  - Bcrypt shown first (most important for Laravel devs)
  - Updated descriptions to emphasize Bcrypt for passwords
  - Better security recommendations
  - Highlighted use cases for each hash type

### Technical
- Added bcrypt.js CDN library
- Bcrypt hash appears in highlighted card at the top
- Updated page title and meta description for SEO
- Cost factor 10 matches Laravel's default

---

## [1.1.3] - Share QR Code Image Fix

### Fixed
- **Share QR Code**: Now shares the actual QR code image instead of just the URL
  - Converts SVG to PNG (512x512) for sharing
  - Mobile: Uses Web Share API to share image file
  - Desktop: Downloads the QR code image for manual sharing
  - Proper fallback if device doesn't support file sharing
  - Shows helpful notifications

### Technical
- Share button now creates PNG blob from SVG
- Uses File API and Web Share API Level 2 (file sharing)
- Graceful degradation on unsupported devices
- 512x512px high-quality PNG for sharing

---

## [1.1.2] - QR Code Improvements

### Fixed
- **Advanced Generator Button**: Removed non-functional "Advanced Generator" button
  - The button required Endroid QR library which wasn't needed
  - Regular generator works perfectly for all use cases
  - Simplified UI with single generate button

- **Share Button**: Fixed share QR code functionality
  - Now uses Web Share API on mobile devices
  - Falls back to copy link on desktop
  - Shows proper notifications
  - Validates QR code exists before sharing

### Changed
- Cleaner QR generator interface with one generate button
- Better share functionality with mobile support
- Improved user feedback with notifications

---

## [1.1.1] - QR Code Generator Fixes

### Fixed
- **QR Code Display**: Fixed QR code image overlapping the preview box
  - Changed from fixed height to min-height with overflow-auto
  - QR code now scales properly within the container
  - Added proper centering and responsive styling
  
- **Download Buttons**: Fixed SVG and PNG download functionality
  - SVG download now works correctly with proper blob handling
  - PNG download fixed with proper canvas rendering
  - Added white background to PNG exports
  - Proper file attachment to DOM before clicking
  
- **Preview Styling**: Improved QR code preview appearance
  - SVG elements styled with max-width, auto height, centered
  - Placeholder properly removed when QR is generated
  - Better visual feedback

### Technical Changes
- Updated `resources/views/tools/qr-generator.blade.php`:
  - Preview box: `h-64` → `min-h-64 p-4 overflow-auto`
  - Added `qrPlaceholder` ID for better removal
  - Improved download functions with proper blob and canvas handling
  - PNG export now uses canvas with white background
  
- Updated `resources/js/app.js`:
  - QRGenerator properly styles SVG elements after insertion
  - Removes placeholder before inserting QR code
  - Cleaner console logging

---

## [1.1.0] - Theme Switcher Update

### Changed
- **Simplified Theme Switcher**: Replaced dual-button theme switcher with single toggle button
  - Shows moon icon 🌙 in light mode
  - Shows sun icon ☀️ in dark mode
  - Fixed position at bottom-right corner
  - Smooth hover animations and scale effect
  
- **Removed Settings Dropdown**: Removed non-functional settings menu from navigation
  - Cleaner navigation bar
  - Less cluttered interface
  - Better mobile experience

### Improved
- **User Experience**: 
  - More intuitive theme switching (one click instead of choosing from two buttons)
  - Saves navigation space
  - Better visual feedback with icon change
  
- **Mobile Friendly**:
  - Floating button doesn't interfere with content
  - Easy to reach with thumb on mobile devices
  - Consistent positioning across all pages

### Technical Changes
- Updated `resources/views/layouts/app.blade.php`:
  - Replaced `.theme-switcher` div with single `#themeSwitcher` button
  - Removed settings dropdown markup
  - Removed dropdown toggle functions
  
- Updated `resources/js/app.js`:
  - Simplified theme toggle logic
  - Removed color switching functionality (for future implementation)
  - Toggle between light/dark with single button click
  
- Rebuilt assets with `npm run build`

---

## [1.0.0] - Initial Release

### Added
- **8 Free Online Tools**:
  1. QR Code Generator
  2. URL Shortener
  3. JSON Formatter
  4. Password Generator
  5. Base64 Encoder/Decoder
  6. Hash Generator
  7. Text Case Converter
  8. Sitemap Generator

### Features
- Modern UI with Tailwind CSS
- Dark/Light theme support
- Mobile responsive design
- Google AdSense integration ready
- SEO optimized pages
- Professional About page
- Complete documentation

### Technical
- Laravel 11.x framework
- Vite for asset bundling
- SQLite/MySQL database support
- Client-side tool processing for privacy
- CSRF protection on all forms
