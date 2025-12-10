# ToolHub - Setup & Deployment Guide

## 🚀 Quick Start

ToolHub is a professional online tools platform with 8+ free tools including QR Code Generator, URL Shortener, JSON Formatter, Password Generator, and more.

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & NPM
- SQLite or MySQL database

### Local Installation

1. **Clone the repository**
```bash
git clone <your-repo-url>
cd toolhub
```

2. **Install PHP dependencies**
```bash
composer install
```

3. **Install Node dependencies**
```bash
npm install
```

4. **Setup environment**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Setup database**
```bash
# For SQLite (default)
touch database/database.sqlite
php artisan migrate

# For MySQL, update .env first:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=toolhub
# DB_USERNAME=root
# DB_PASSWORD=
```

6. **Build assets**
```bash
npm run build
```

7. **Start development server**
```bash
php artisan serve
```

Visit `http://localhost:8000` to see your site!

---

## 🌐 Production Deployment (cPanel)

### Step 1: Prepare Files

1. **Build production assets locally**
```bash
npm run build
```

2. **Create deployment package**
   - Exclude: `node_modules/`, `.git/`, `tests/`, `storage/logs/*`, `.env`
   - Include: All other files including `public/build/` folder

### Step 2: Upload to cPanel

1. **File Structure**
```
public_html/           (or subdomain folder)
├── public/           ← Point your domain here
├── app/
├── bootstrap/
├── config/
├── database/
├── resources/
├── routes/
├── storage/
├── vendor/
└── .env
```

2. **Upload files via FTP/File Manager**

3. **Set document root to `/public` folder**
   - In cPanel → Domains → Domain management
   - Edit domain → Document Root → `/public_html/public`

### Step 3: Configure Environment

1. **Create `.env` file** (copy from `.env.example`)
```bash
APP_NAME=ToolHub
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

# Generate new key
APP_KEY=base64:YOUR_GENERATED_KEY_HERE
```

2. **Generate application key** (via cPanel Terminal or SSH)
```bash
php artisan key:generate
```

### Step 4: Set Permissions

```bash
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

### Step 5: Run Migrations

```bash
php artisan migrate --force
```

### Step 6: Optimize for Production

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 💰 Google AdSense Integration

### Step 1: Apply for AdSense

1. Visit [Google AdSense](https://www.google.com/adsense/)
2. Apply with your domain
3. Add the AdSense verification code to your site if required
4. Wait for approval (can take 1-2 weeks)

### Step 2: Configure AdSense

Once approved, update your `.env` file:

```bash
ADSENSE_ENABLED=true
ADSENSE_CLIENT_ID=ca-pub-1234567890123456
ADSENSE_SLOT_AUTO=1234567890
ADSENSE_SLOT_HORIZONTAL=1234567891
ADSENSE_SLOT_SIDEBAR=1234567892
ADSENSE_SLOT_IN_ARTICLE=1234567893
```

### Step 3: Add Ads to Your Pages

The AdSense partial is already included in tool pages. Ads will automatically appear once enabled.

**Manually add ads:**
```php
@include('partials.adsense', ['slot' => 'horizontal'])
@include('partials.adsense', ['slot' => 'sidebar'])
@include('partials.adsense', ['slot' => 'in-article'])
```

---

## 🔧 Available Tools

### 1. **QR Code Generator** (`/tools/qr-generator`)
- Generate QR codes for URLs, text, WiFi, vCards
- Customizable size and templates
- Download as SVG or PNG

### 2. **URL Shortener** (`/tools/url-shortener`)
- Shorten long URLs
- Track clicks and analytics
- Custom short codes

### 3. **JSON Formatter** (`/tools/json-formatter`)
- Format and beautify JSON
- Validate JSON syntax
- Minify JSON for production

### 4. **Password Generator** (`/tools/password-generator`)
- Generate strong passwords
- Customizable length and character sets
- Bulk password generation

### 5. **Base64 Encoder/Decoder** (`/tools/base64-encoder`)
- Encode text to Base64
- Decode Base64 strings
- Instant conversion

### 6. **Hash Generator** (`/tools/hash-generator`)
- Generate MD5, SHA-1, SHA-256, SHA-512 hashes
- One-click copy functionality
- Security information included

### 7. **Text Case Converter** (`/tools/text-case-converter`)
- Convert to uppercase, lowercase, title case
- camelCase, snake_case, kebab-case support
- Text statistics

### 8. **Sitemap Generator** (`/tools/sitemap-generator`)
- Generate XML sitemaps for SEO
- Customizable frequency and priority
- Download ready-to-upload file

---

## 🎨 Theme Customization

The site supports dark/light mode with a green primary color by default.

**Change theme settings in `.env`:**
```bash
THEME_DEFAULT=light              # or 'dark'
THEME_PRIMARY_COLOR=green        # or 'blue', 'red', etc.
THEME_ENABLE_DARK_MODE=true
THEME_AUTO_DETECT_SYSTEM=true
THEME_SHOW_SWITCHER=true
```

---

## 📊 SEO Optimization

### Already Included:
- ✅ Meta tags (title, description, keywords)
- ✅ Open Graph tags for social sharing
- ✅ Semantic HTML structure
- ✅ Mobile-responsive design
- ✅ Fast loading times
- ✅ Sitemap generator tool

### Recommended Next Steps:

1. **Create `sitemap.xml`** using the Sitemap Generator tool
2. **Submit to Google Search Console**
   - Add your property
   - Submit sitemap
   - Request indexing for main pages

3. **Add `robots.txt`** (already included)

4. **Create Google Analytics** (optional)
   - Get tracking ID
   - Add to layout template

---

## 🚦 Troubleshooting

### Common Issues:

**1. 500 Internal Server Error**
- Check `.htaccess` is present in `/public`
- Verify file permissions (755 for directories, 644 for files)
- Check PHP version (must be 8.2+)
- Review error logs in `storage/logs/`

**2. Assets not loading**
- Ensure `/public/build/` folder exists
- Run `npm run build` again
- Clear browser cache

**3. Database connection error**
- Verify database credentials in `.env`
- Check database exists in cPanel
- Test connection with MySQL client

**4. Routes not working**
- Clear route cache: `php artisan route:clear`
- Check `.htaccess` mod_rewrite is enabled
- Verify document root points to `/public`

**5. Permission denied errors**
```bash
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
chown -R www-data:www-data storage/ bootstrap/cache/
```

---

## 🔒 Security Checklist

- [x] `APP_DEBUG=false` in production
- [x] Strong `APP_KEY` generated
- [x] Database credentials secured
- [x] CSRF protection enabled on all forms
- [x] XSS protection in views
- [x] SQL injection prevention (Eloquent ORM)
- [ ] SSL certificate installed (HTTPS)
- [ ] Regular backups scheduled
- [ ] Keep Laravel and dependencies updated

---

## 📈 Monetization Strategy

### 1. **Google AdSense** (Primary)
- Display ads on tool pages
- Expected: $1-5 per 1000 pageviews
- Place ads strategically without disrupting UX

### 2. **Affiliate Links** (Future)
- Add relevant product recommendations
- Use Amazon Associates, ShareASale, etc.

### 3. **Premium Features** (Future)
- API access for developers
- Bulk operations
- Remove ads subscription
- Advanced analytics

### 4. **Sponsored Tools** (Future)
- Partner with SaaS companies
- Featured tool placements

---

## 🔄 Maintenance

### Regular Tasks:

**Weekly:**
- Check error logs
- Monitor site performance
- Review analytics

**Monthly:**
- Update dependencies: `composer update`, `npm update`
- Backup database
- Review AdSense earnings

**Quarterly:**
- Update Laravel framework
- Security audit
- Add new tools based on demand

---

## 📞 Support

For issues or questions:
- Check Laravel documentation: https://laravel.com/docs
- Review error logs: `storage/logs/laravel.log`
- Clear all caches: `php artisan optimize:clear`

---

## 📄 License

This project is open-source software. Feel free to modify and distribute.

---

## 🎉 You're All Set!

Your ToolHub platform is now ready to:
- ✅ Serve users with 8+ free tools
- ✅ Generate revenue through AdSense
- ✅ Scale with more tools and features
- ✅ Attract organic traffic through SEO

**Next Steps:**
1. Deploy to production
2. Submit sitemap to Google
3. Apply for AdSense
4. Share on social media
5. Monitor analytics and optimize

Good luck! 🚀
