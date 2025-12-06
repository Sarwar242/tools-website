<?php
/**
 * Alternative index.php for shared hosting where you can't change document root
 * Rename this to index.php if your hosting doesn't support changing document root
 */

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Adjust paths for shared hosting (if Laravel is in subdirectory)
$laravel_path = __DIR__;

// Try to find the Laravel installation
$possible_paths = [
    __DIR__ . '/..',              // Standard: public is subdirectory
    __DIR__,                      // Alternative: all files in web root
    __DIR__ . '/laravel',         // Alternative: Laravel in subfolder
];

$base_path = null;
foreach ($possible_paths as $path) {
    if (file_exists($path . '/vendor/autoload.php')) {
        $base_path = $path;
        break;
    }
}

if (!$base_path) {
    die('Laravel installation not found. Please check your file structure.');
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = $base_path.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
if (!file_exists($autoloader = $base_path.'/vendor/autoload.php')) {
    die('Autoloader not found. Run: composer install');
}
require $autoloader;

// Bootstrap Laravel and handle the request...
if (!file_exists($app_bootstrap = $base_path.'/bootstrap/app.php')) {
    die('Laravel bootstrap file not found.');
}

/** @var Application $app */
$app = require_once $app_bootstrap;

$app->handleRequest(Request::capture());