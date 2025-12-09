#!/bin/bash

# Laravel Deployment Script for cPanel
# Run this after uploading your code to cPanel

echo "=========================================="
echo "Laravel Deployment Script for cPanel"
echo "=========================================="
echo ""

# Check if we're in the right directory
if [ ! -f "artisan" ]; then
    echo "Error: artisan file not found. Please run this script from your Laravel root directory."
    exit 1
fi

echo "Step 1: Clearing all caches..."
php artisan route:clear
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan optimize:clear
echo "✓ Caches cleared"
echo ""

echo "Step 2: Setting proper permissions..."
chmod -R 755 storage bootstrap/cache
chmod -R 775 storage/framework
chmod -R 775 storage/logs
echo "✓ Permissions set"
echo ""

echo "Step 3: Creating storage directories if missing..."
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/framework/cache
mkdir -p storage/logs
echo "✓ Directories created"
echo ""

echo "Step 4: Optimizing for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
echo "✓ Optimization complete"
echo ""

echo "Step 5: Running migrations (if needed)..."
read -p "Do you want to run migrations? (y/n): " -n 1 -r
echo ""
if [[ $REPLY =~ ^[Yy]$ ]]; then
    php artisan migrate --force
    echo "✓ Migrations complete"
else
    echo "⊘ Migrations skipped"
fi
echo ""

echo "Step 6: Verifying routes..."
php artisan route:list | grep -E "tools\.(qr-generator|url-shortener|json-formatter|password-generator|base64-encoder|hash-generator|text-case-converter|sitemap-generator)"
echo ""

echo "=========================================="
echo "Deployment Complete!"
echo "=========================================="
echo ""
echo "Your application should now be working properly."
echo "Visit your site to verify: https://webtools.sarwar.com.bd"
echo ""
echo "If you still have issues, visit: https://webtools.sarwar.com.bd/clear-cache-deploy"
echo ""
