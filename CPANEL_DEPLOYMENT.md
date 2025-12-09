# cPanel Deployment Guide - Route Not Found Fix

## Problem
Getting `RouteNotFoundException: Route [tools.json-formatter] not defined` on cPanel with PHP 8.4

## Root Cause
The issue is caused by **cached routes** from a previous deployment. Laravel caches routes for performance, and when you upload new code, the old cached routes remain and cause conflicts.

## Quick Fix (Recommended)

### Option 1: Use the Cache Clearing URL
1. Visit this URL in your browser:
   ```
   https://webtools.sarwar.com.bd/clear-cache-deploy
   ```

2. You should see a JSON response confirming all caches are cleared:
   ```json
   {
     "message": "All caches cleared successfully!",
     "commands": {
       "route:clear": "Done",
       "cache:clear": "Done",
       "config:clear": "Done",
       "view:clear": "Done"
     }
   }
   ```

3. **IMPORTANT**: After your site works, comment out or remove the cache-clearing route in `routes/web.php` for security:
   ```php
   // Comment out these lines after fixing:
   // Route::get('/clear-cache-deploy', function () { ... });
   ```

### Option 2: Use cPanel Terminal (If SSH Access Available)
1. Log in to cPanel
2. Go to **Terminal** or use SSH
3. Navigate to your Laravel directory:
   ```bash
   cd /home/yourusername/public_html
   # or
   cd /home/yourusername/webtools.sarwar.com.bd
   ```

4. Run the deployment script:
   ```bash
   chmod +x deploy-cpanel.sh
   ./deploy-cpanel.sh
   ```

   Or manually run:
   ```bash
   php artisan route:clear
   php artisan cache:clear
   php artisan config:clear
   php artisan view:clear
   php artisan optimize:clear
   ```

5. Then optimize for production:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

### Option 3: Manual File Deletion (If No Terminal Access)
1. Using cPanel File Manager, delete these cache files:
   - `bootstrap/cache/routes-v7.php`
   - `bootstrap/cache/config.php`
   - All files in `storage/framework/cache/`
   - All files in `storage/framework/views/`

2. Visit your site - Laravel will regenerate the caches automatically

## Verify the Fix

After clearing cache, verify routes are working:

1. Check if the dashboard loads:
   ```
   https://webtools.sarwar.com.bd/tools
   ```

2. Test individual tool pages:
   - QR Generator: `https://webtools.sarwar.com.bd/tools/qr-generator`
   - JSON Formatter: `https://webtools.sarwar.com.bd/tools/json-formatter`
   - Password Generator: `https://webtools.sarwar.com.bd/tools/password-generator`

## Prevention for Future Deployments

### Create a .cpanel.yml file
Create `.cpanel.yml` in your project root:

```yaml
---
deployment:
  tasks:
    - export DEPLOYPATH=/home/yourusername/public_html
    - /bin/cp -R * $DEPLOYPATH
    - cd $DEPLOYPATH
    - php artisan route:clear
    - php artisan cache:clear
    - php artisan config:clear
    - php artisan view:clear
    - php artisan config:cache
    - php artisan route:cache
    - php artisan view:cache
```

### Always Clear Cache After Upload
Make it a habit to clear Laravel caches after every deployment to cPanel.

## Additional Checks

### 1. Verify PHP Version
Ensure PHP 8.4 is being used:
```bash
php -v
```

### 2. Check .htaccess
Make sure `.htaccess` in the public directory exists and is correct:
```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

### 3. Check Environment File
Verify `.env` is properly configured:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://webtools.sarwar.com.bd

# Make sure these are set
DB_CONNECTION=mysql
DB_HOST=localhost
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Check File Permissions
Ensure proper permissions:
```bash
chmod -R 755 storage bootstrap/cache
chmod -R 775 storage/framework
```

## Troubleshooting

### Issue: "500 Internal Server Error"
- Check `storage/logs/laravel.log` for detailed errors
- Ensure all storage directories have write permissions
- Clear all caches again

### Issue: Routes still not found after clearing cache
1. Delete `bootstrap/cache/routes-v7.php` manually
2. Run `php artisan route:list` to verify routes exist
3. Don't run `route:cache` until all routes are confirmed working

### Issue: CSS/JS not loading
- Run `npm run build` locally before uploading
- Upload the `public/build` directory
- Check if `APP_URL` in `.env` is correct

## Summary

The error occurs because:
1. ✅ Routes ARE defined in `routes/web.php`
2. ✅ Controller methods exist
3. ❌ But cached routes from old deployment are causing conflicts

**Solution**: Clear all caches, especially route cache!

Most reliable method: Visit `https://webtools.sarwar.com.bd/clear-cache-deploy`
