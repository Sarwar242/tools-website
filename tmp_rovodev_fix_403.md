# 403 Forbidden Error - Troubleshooting Steps

## Step 1: Run Diagnostic Script
1. Upload `public/tmp_rovodev_diagnostic.php` to your server
2. Access it directly: `http://yourdomain.com/tmp_rovodev_diagnostic.php`
3. Review the output to identify the issue

## Step 2: Common 403 Causes & Solutions

### A. Apache Configuration Issue (Most Common)
**Problem**: Apache denies access to the directory

**Solution 1** - I've updated `public/.htaccess` to include:
```apache
<IfModule mod_authz_core.c>
    Require all granted
</IfModule>
```

**Solution 2** - Check your Apache configuration file (usually `/etc/apache2/apache2.conf` or `/etc/httpd/conf/httpd.conf`):
```apache
<Directory /path/to/your/laravel/public>
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>
```

### B. SELinux Blocking Access (Linux servers)
If on Linux with SELinux enabled, run these commands:
```bash
# Check SELinux status
getenforce

# If "Enforcing", run:
sudo chcon -R -t httpd_sys_content_t /path/to/laravel/
sudo chcon -R -t httpd_sys_rw_content_t /path/to/laravel/storage/
sudo chcon -R -t httpd_sys_rw_content_t /path/to/laravel/bootstrap/cache/

# Or temporarily disable SELinux to test:
sudo setenforce 0
```

### C. Wrong Document Root
**Check your web server configuration**:
- Document root should point to: `/path/to/laravel/public`
- NOT to: `/path/to/laravel` or `/path/to/public_html`

**For cPanel/Shared Hosting**:
1. Go to cPanel → "Domains" → "Manage"
2. Edit your domain
3. Change "Document Root" to point to the `public` folder

### D. Ownership Issues
Even with correct permissions (644/755), if the owner is wrong, Apache may be denied.

**Check ownership**:
```bash
# See current owner
ls -la /path/to/laravel/

# Change to web server user (common users: www-data, apache, nginx, nobody)
sudo chown -R www-data:www-data /path/to/laravel/
# OR
sudo chown -R apache:apache /path/to/laravel/
# OR (for shared hosting)
sudo chown -R yourusername:yourusername /path/to/laravel/
```

### E. .htaccess Not Being Read
**Check if AllowOverride is enabled**:

Your main Apache config needs:
```apache
<Directory /path/to/laravel/public>
    AllowOverride All
</Directory>
```

**Test without .htaccess**:
1. Rename `public/.htaccess` to `public/.htaccess.disabled`
2. Try accessing `http://yourdomain.com/index.php` directly
3. If this works, the issue is with .htaccess or mod_rewrite

### F. Missing index.php
**Direct test**:
Try accessing: `http://yourdomain.com/index.php`
- If this works → .htaccess/mod_rewrite issue
- If this gives 403 → Apache configuration/permissions issue

## Step 3: Check Apache Error Logs

The error logs will tell you exactly why 403 is happening:
```bash
# Common log locations:
tail -f /var/log/apache2/error.log
tail -f /var/log/httpd/error_log
tail -f /usr/local/apache/logs/error_log

# For cPanel:
tail -f /usr/local/apache/logs/error_log
# Or check in cPanel → "Errors" section
```

## Step 4: Verify Apache is Reading .htaccess

Create a test .htaccess:
```bash
# In public/.htaccess, add at the very top:
# This should cause a 500 error if .htaccess is being read
InvalidDirective
```

If you get a 500 error → .htaccess is being read
If you still get 403 → .htaccess is being ignored (AllowOverride issue)

## Step 5: Quick Test Commands

Run these on your server:
```bash
# 1. Check permissions
ls -la /path/to/laravel/public/
ls -la /path/to/laravel/public/index.php

# 2. Check Apache status
sudo systemctl status apache2
# OR
sudo systemctl status httpd

# 3. Test Apache configuration
sudo apache2ctl -t
# OR
sudo apachectl -t

# 4. Check if mod_rewrite is enabled
apache2ctl -M | grep rewrite
# OR
apachectl -M | grep rewrite

# 5. Enable mod_rewrite if missing
sudo a2enmod rewrite
sudo systemctl restart apache2
```

## Step 6: Shared Hosting Specific

If on shared hosting (cPanel, Plesk, etc.):

1. **Check PHP Version**: Ensure PHP 8.2+ is selected
2. **Check Document Root**: Should be `/public` or move files accordingly
3. **Check .htaccess**: Sometimes hosts require specific directives
4. **Disable Options**: Some hosts don't allow "Options" directive:
   ```apache
   # Comment out in public/.htaccess:
   # Options -MultiViews -Indexes
   ```

## Step 7: Alternative - Use index_shared_hosting.php

If nothing else works, try:
```bash
# In your public folder
cp index.php index.php.backup
cp index_shared_hosting.php index.php
```

## Need More Help?

After running the diagnostic script, share:
1. The output of `tmp_rovodev_diagnostic.php`
2. The Apache error log entries
3. Your hosting type (VPS, shared hosting, dedicated)
4. Operating system of the server

This will help identify the exact issue!
