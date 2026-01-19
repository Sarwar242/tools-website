<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap.xml file for SEO';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating sitemap.xml...');

        // Define all URLs with their priorities and change frequencies
        $urls = [
            ['loc' => url('/'), 'priority' => '1.0', 'changefreq' => 'daily'],
            ['loc' => route('tools.dashboard'), 'priority' => '1.0', 'changefreq' => 'daily'],
            ['loc' => route('about'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => route('privacy-policy'), 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['loc' => route('terms-of-service'), 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['loc' => route('contact'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => route('tools.qr-generator'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => route('tools.json-formatter'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => route('tools.password-generator'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => route('tools.base64-encoder'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => route('tools.hash-generator'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => route('tools.text-case-converter'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => route('tools.url-encoder'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => route('tools.sitemap-generator'), 'priority' => '0.9', 'changefreq' => 'weekly'],
        ];

        // Build the sitemap XML
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        foreach ($urls as $url) {
            $sitemap .= '  <url>' . PHP_EOL;
            $sitemap .= '    <loc>' . htmlspecialchars($url['loc']) . '</loc>' . PHP_EOL;
            $sitemap .= '    <lastmod>' . date('Y-m-d') . '</lastmod>' . PHP_EOL;
            $sitemap .= '    <changefreq>' . $url['changefreq'] . '</changefreq>' . PHP_EOL;
            $sitemap .= '    <priority>' . $url['priority'] . '</priority>' . PHP_EOL;
            $sitemap .= '  </url>' . PHP_EOL;
        }

        $sitemap .= '</urlset>' . PHP_EOL;

        // Write to public/sitemap.xml
        $path = public_path('sitemap.xml');
        File::put($path, $sitemap);

        $this->info('✓ Sitemap generated successfully!');
        $this->info('✓ Location: ' . $path);
        $this->info('✓ Total URLs: ' . count($urls));
        $this->line('');
        $this->comment('Next steps:');
        $this->comment('1. Visit: ' . url('/sitemap.xml'));
        $this->comment('2. Submit to Google Search Console');
        $this->comment('3. Add to robots.txt: Sitemap: ' . url('/sitemap.xml'));

        return Command::SUCCESS;
    }
}
