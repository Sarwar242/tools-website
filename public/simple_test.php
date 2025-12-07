<?php
echo "PHP is working!";
echo "\n<br>PHP Version: " . phpversion();
echo "\n<br>Current Directory: " . __DIR__;
echo "\n<br>Index.php exists: " . (file_exists(__DIR__ . '/index.php') ? 'YES' : 'NO');
echo "\n<br>Vendor exists: " . (file_exists(__DIR__ . '/../vendor/autoload.php') ? 'YES' : 'NO');
echo "\n<br>Bootstrap exists: " . (file_exists(__DIR__ . '/../bootstrap/app.php') ? 'YES' : 'NO');
