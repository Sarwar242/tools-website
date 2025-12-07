<?php
// Simple test to see if we can load Laravel
echo "Starting Laravel test...\n<br>";

try {
    if (file_exists(__DIR__.'/../vendor/autoload.php')) {
        echo "Loading autoloader...\n<br>";
        require __DIR__.'/../vendor/autoload.php';
        echo "Autoloader loaded!\n<br>";
        
        if (file_exists(__DIR__.'/../bootstrap/app.php')) {
            echo "Loading Laravel bootstrap...\n<br>";
            $app = require_once __DIR__.'/../bootstrap/app.php';
            echo "Bootstrap loaded!\n<br>";
            echo "Laravel is ready!\n<br>";
        } else {
            echo "ERROR: bootstrap/app.php not found\n<br>";
        }
    } else {
        echo "ERROR: vendor/autoload.php not found\n<br>";
        echo "You need to run: composer install\n<br>";
    }
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n<br>";
    echo "File: " . $e->getFile() . "\n<br>";
    echo "Line: " . $e->getLine() . "\n<br>";
}
