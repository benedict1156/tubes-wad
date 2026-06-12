<?php

// STEP 1: Test if PHP works at all
ini_set('display_errors', '1');
error_reporting(E_ALL);
ini_set('memory_limit', '256M');

$step = 'start';

try {
    // STEP 2: Check if vendor exists
    $step = 'checking vendor';
    $autoloadPath = __DIR__ . '/../vendor/autoload.php';
    
    if (!file_exists($autoloadPath)) {
        echo "FAIL: vendor/autoload.php not found at: $autoloadPath\n";
        echo "Directory listing of " . dirname(__DIR__) . ":\n";
        $files = scandir(dirname(__DIR__));
        foreach ($files as $f) {
            echo "  - $f\n";
        }
        exit(1);
    }
    
    echo "OK: vendor/autoload.php exists\n";
    
    // STEP 3: Load autoloader
    $step = 'loading autoloader';
    require $autoloadPath;
    echo "OK: autoloader loaded\n";
    
    // STEP 4: Check bootstrap
    $step = 'checking bootstrap';
    $bootstrapPath = __DIR__ . '/../bootstrap/app.php';
    if (!file_exists($bootstrapPath)) {
        echo "FAIL: bootstrap/app.php not found\n";
        exit(1);
    }
    echo "OK: bootstrap/app.php exists\n";
    
    // STEP 5: Check storage writable
    $step = 'checking storage';
    $tmpStorage = '/tmp/storage';
    if (!is_dir($tmpStorage)) {
        mkdir($tmpStorage . '/framework/cache/data', 0777, true);
        mkdir($tmpStorage . '/framework/sessions', 0777, true);
        mkdir($tmpStorage . '/framework/views', 0777, true);
        mkdir($tmpStorage . '/logs', 0777, true);
        mkdir($tmpStorage . '/app/public', 0777, true);
    }
    echo "OK: /tmp/storage created\n";
    
    // STEP 6: Set env defaults if not set
    $step = 'setting env defaults';
    if (!getenv('APP_KEY') && !isset($_ENV['APP_KEY']) && !isset($_SERVER['APP_KEY'])) {
        echo "WARNING: APP_KEY not set in environment!\n";
    } else {
        echo "OK: APP_KEY is set\n";
    }
    
    // STEP 7: Try to boot Laravel
    $step = 'booting Laravel';
    
    // Override storage path before Laravel boots
    putenv("APP_STORAGE=/tmp/storage");
    
    // Load Laravel through public/index.php
    $publicIndex = __DIR__ . '/../public/index.php';
    if (!file_exists($publicIndex)) {
        echo "FAIL: public/index.php not found\n";
        exit(1);
    }
    
    require $publicIndex;
    
} catch (\Throwable $e) {
    http_response_code(500);
    header('Content-Type: text/plain');
    echo "CRASHED at step: $step\n";
    echo "Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "Trace:\n" . $e->getTraceAsString() . "\n";
}
