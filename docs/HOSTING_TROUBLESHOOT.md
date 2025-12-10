# Hosting Troubleshooting Guide

## 503 Service Unavailable - Common Causes & Solutions

### 1. Check Basic PHP Functionality
Visit: `https://yoursite.com/test.php`
- If this doesn't load, PHP is not working or configured incorrectly
- If it loads, check the output for any errors

### 2. Document Root Configuration
**Most Common Issue**: Web server pointing to wrong directory

**Shared Hosting Fix:**
- Most shared hosts expect files in `public_html` or `www` folder
- Upload all Laravel files to root, but set document root to `public/` folder
- Or move contents of `public/` to `public_html/` and adjust paths

**cPanel/Shared Hosting Steps:**
1. Upload entire Laravel project to your hosting account root
2. In cPanel, change document root from `public_html` to `public_html/public`
3. Or copy `public/*` to `public_html/` and update index.php paths

### 3. File Permissions (Linux/Unix hosts)
```bash
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
chmod 644 .env
```

### 4. PHP Version Compatibility
- Laravel 11 requires PHP 8.2 or higher
- Check hosting control panel for PHP version settings

### 5. Required PHP Extensions
Ensure these are enabled in hosting:
- BCMath
- Ctype
- Fileinfo
- JSON
- Mbstring
- OpenSSL
- PDO (with SQLite driver)
- Tokenizer
- XML

### 6. Memory Limits
Increase in `.htaccess` or hosting control panel:
```apache
php_value memory_limit 256M
php_value max_execution_time 300
```

### 7. Environment File
- Ensure `.env` exists and is properly configured
- Set `APP_ENV=production` and `APP_DEBUG=false` for production

### 8. Composer Dependencies
Run on server (if possible):
```bash
composer install --optimize-autoloader --no-dev
```

## Quick Diagnostic Steps

1. **Test PHP**: Visit `/test.php`
2. **Check Laravel**: Visit `/` (should show app or error)
3. **Check Logs**: Look in `storage/logs/laravel.log`
4. **Server Logs**: Check hosting provider's error logs

## Common Shared Hosting Fixes

### Option A: Move Public Contents
```bash
# Copy public folder contents to web root
cp public/* ./
cp public/.htaccess ./
# Update index.php paths
```

### Option B: Update Document Root
Set document root to `/public` folder in hosting control panel

### Option C: Use Symlink (if supported)
```bash
ln -s /path/to/laravel/public /path/to/public_html
```