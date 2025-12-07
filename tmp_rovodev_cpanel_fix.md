# cPanel 403 Error - Quick Fix Guide

Since your other Laravel projects work fine on the same cPanel, this is likely a simple configuration issue.

## Quick Fixes to Try (in order):

### Fix 1: Try the Updated .htaccess (MOST LIKELY)
I've reorganized the Options directive in `public/.htaccess`. Upload and test.

### Fix 2: Try Without Options Directive
If Fix 1 doesn't work, use `public/.htaccess.cpanel_safe` which removes the Options directive entirely:
```bash
# Rename files:
mv public/.htaccess public/.htaccess.old
mv public/.htaccess.cpanel_safe public/.htaccess
```

### Fix 3: Check Index File
Some cPanel configurations need DirectoryIndex explicitly:

Add this to the TOP of `public/.htaccess`:
```apache
DirectoryIndex index.php index.html
```

### Fix 4: Compare with Working Project
Since you have other working Laravel projects:
1. Compare the `public/.htaccess` file from your working project
2. Copy that .htaccess to this project's public folder
3. If it works, then we know it's an .htaccess issue

### Fix 5: Check .env File
Make sure `.env` file exists in the Laravel root (not in public/):
```bash
# Should be at: /home/username/yourdomain/.env
# NOT at: /home/username/yourdomain/public/.env
```

### Fix 6: Storage Permissions via cPanel
Even though you set 755, try setting via cPanel File Manager:
1. Right-click `storage` folder → Change Permissions
2. Set to 755 and check "Recurse into subdirectories"
3. Do the same for `bootstrap/cache`

### Fix 7: Check Document Root in cPanel
1. cPanel → Domains → Your Domain → Manage
2. Document Root should be: `public` (relative path)
3. NOT: `/public` or `/public_html/public` or full path

### Fix 8: Hidden .htaccess Issues
Sometimes cPanel adds hidden characters or BOM:
1. Delete the `.htaccess` file completely
2. Re-create it fresh in cPanel File Manager
3. Copy and paste the content

## What Error Message Do You See?

**"403 Forbidden"** - Usually means:
- Options directive issue
- Missing DirectoryIndex
- Wrong document root

**"You don't have permission to access this resource"** - Usually means:
- Apache config blocking access
- Need "Require all granted"

**Blank white page** - Usually means:
- PHP error (check error logs in cPanel)
- Missing .env file

## Quick Diagnostic

Can you test these URLs on your cPanel and tell me what happens?

1. `http://yourdomain.com/` - What shows?
2. `http://yourdomain.com/index.php` - What shows?
3. `http://yourdomain.com/tmp_rovodev_diagnostic.php` - What shows?

If #3 works, it means PHP is working and it's an .htaccess/routing issue.
If #2 works but #1 doesn't, it's definitely an .htaccess issue.

## Next Step

**Try Fix 1** first (the updated .htaccess I just created), then let me know what happens!
