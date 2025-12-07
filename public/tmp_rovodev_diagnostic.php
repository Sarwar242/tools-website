<?php
/**
 * Server Diagnostic Script for 403 Permission Issues
 * Access this file directly: http://yourdomain.com/tmp_rovodev_diagnostic.php
 */

header('Content-Type: text/plain');

echo "=== SERVER DIAGNOSTIC REPORT ===\n\n";

// 1. PHP Version
echo "1. PHP VERSION:\n";
echo "   PHP Version: " . phpversion() . "\n";
echo "   Required: 8.2+\n\n";

// 2. Current User & Permissions
echo "2. CURRENT USER & PERMISSIONS:\n";
if (function_exists('posix_getpwuid') && function_exists('posix_geteuid')) {
    $processUser = posix_getpwuid(posix_geteuid());
    echo "   PHP Process User: " . $processUser['name'] . " (UID: " . $processUser['uid'] . ")\n";
} else {
    echo "   POSIX functions not available (Windows or restricted)\n";
}
echo "   Current Script: " . __FILE__ . "\n";
echo "   Script Perms: " . substr(sprintf('%o', fileperms(__FILE__)), -4) . "\n\n";

// 3. Directory Paths
echo "3. DIRECTORY PATHS:\n";
echo "   Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "\n";
echo "   Current Dir: " . __DIR__ . "\n";
echo "   Script Name: " . $_SERVER['SCRIPT_NAME'] . "\n\n";

// 4. Check Critical Files
echo "4. CRITICAL FILES CHECK:\n";
$files_to_check = [
    'index.php' => __DIR__ . '/index.php',
    '.htaccess' => __DIR__ . '/.htaccess',
    'vendor/autoload.php' => __DIR__ . '/../vendor/autoload.php',
    'bootstrap/app.php' => __DIR__ . '/../bootstrap/app.php',
    'storage/framework' => __DIR__ . '/../storage/framework',
    'storage/logs' => __DIR__ . '/../storage/logs',
    'bootstrap/cache' => __DIR__ . '/../bootstrap/cache',
    '.env' => __DIR__ . '/../.env',
];

foreach ($files_to_check as $name => $path) {
    $exists = file_exists($path);
    $readable = $exists ? is_readable($path) : false;
    $writable = $exists ? is_writable($path) : false;
    $perms = $exists ? substr(sprintf('%o', fileperms($path)), -4) : 'N/A';
    
    echo "   [$name]\n";
    echo "      Path: $path\n";
    echo "      Exists: " . ($exists ? 'YES' : 'NO') . "\n";
    if ($exists) {
        echo "      Readable: " . ($readable ? 'YES' : 'NO') . "\n";
        echo "      Writable: " . ($writable ? 'YES' : 'NO') . "\n";
        echo "      Permissions: $perms\n";
    }
    echo "\n";
}

// 5. Apache Modules (if available)
echo "5. APACHE MODULES:\n";
if (function_exists('apache_get_modules')) {
    $modules = apache_get_modules();
    $important = ['mod_rewrite', 'mod_negotiation'];
    foreach ($important as $mod) {
        echo "   $mod: " . (in_array($mod, $modules) ? 'ENABLED' : 'DISABLED') . "\n";
    }
} else {
    echo "   apache_get_modules() not available\n";
}
echo "\n";

// 6. PHP Configuration
echo "6. PHP CONFIGURATION:\n";
echo "   memory_limit: " . ini_get('memory_limit') . "\n";
echo "   max_execution_time: " . ini_get('max_execution_time') . "\n";
echo "   display_errors: " . ini_get('display_errors') . "\n";
echo "   error_reporting: " . ini_get('error_reporting') . "\n";
echo "   open_basedir: " . (ini_get('open_basedir') ?: 'Not set') . "\n\n";

// 7. Required PHP Extensions
echo "7. REQUIRED PHP EXTENSIONS:\n";
$required_extensions = [
    'BCMath', 'Ctype', 'Fileinfo', 'JSON', 'Mbstring', 
    'OpenSSL', 'PDO', 'pdo_sqlite', 'Tokenizer', 'XML'
];
foreach ($required_extensions as $ext) {
    echo "   $ext: " . (extension_loaded($ext) ? 'LOADED' : 'MISSING') . "\n";
}
echo "\n";

// 8. Server Software
echo "8. SERVER SOFTWARE:\n";
echo "   " . ($_SERVER['SERVER_SOFTWARE'] ?? 'Unknown') . "\n\n";

// 9. Test Laravel Bootstrap
echo "9. LARAVEL BOOTSTRAP TEST:\n";
try {
    if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
        require __DIR__ . '/../vendor/autoload.php';
        echo "   Autoloader: LOADED ✓\n";
        
        if (file_exists(__DIR__ . '/../bootstrap/app.php')) {
            $app = require_once __DIR__ . '/../bootstrap/app.php';
            echo "   Bootstrap: LOADED ✓\n";
            echo "   Laravel Ready: YES ✓\n";
        } else {
            echo "   Bootstrap: NOT FOUND ✗\n";
        }
    } else {
        echo "   Autoloader: NOT FOUND ✗\n";
        echo "   Run: composer install\n";
    }
} catch (Exception $e) {
    echo "   ERROR: " . $e->getMessage() . "\n";
}

echo "\n=== END DIAGNOSTIC REPORT ===\n";
echo "\nAccess your site at: http://" . $_SERVER['HTTP_HOST'] . "/\n";
echo "If you see this file, PHP is working!\n";
