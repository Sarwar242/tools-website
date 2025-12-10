# Google AdSense Setup Guide

## Current Status
✅ AdSense verification code added to layout  
✅ AdSense script added to head  
✅ Ad placements added to dashboard (3 locations)  
✅ Configuration files updated  

## What You Need To Do

### Step 1: Update Your .env File on cPanel
Add these two lines to your `.env` file:
```
ADSENSE_ENABLED=true
ADSENSE_CLIENT_ID=ca-pub-6179890788485964
```

### Step 2: Wait for AdSense Approval
Google needs to review your site first. This can take:
- 24-48 hours (typical)
- Up to 2 weeks (sometimes)

During review, you'll see placeholder boxes that say "Advertisement Space"

### Step 3: After Approval
Once approved:
1. Ads will automatically show (no code changes needed)
2. You can create specific ad units in AdSense dashboard if you want
3. Monitor performance in AdSense dashboard

## Ad Locations on Dashboard
1. **Top** - Right after the hero/stats section
2. **Middle** - Between popular tools and all tools
3. **Before Features** - Before the "Why Choose ToolHub?" section

## Testing
Right now with `ADSENSE_ENABLED=false`, you'll see placeholder boxes.
Once you set `ADSENSE_ENABLED=true`, real ads will appear (after approval).

## Important Notes
- The verification meta tag is in the `<head>` section
- The AdSense script is loaded on every page
- Ads are responsive and will adapt to screen size
- Auto ads are enabled (Google places ads automatically)

## Next Steps
1. Upload the modified files to cPanel
2. Update your .env file with the settings above
3. Submit your site for AdSense review (if not done already)
4. Wait for approval
5. Ads will start showing automatically
