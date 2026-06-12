<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and create the application...
$app = require_once __DIR__.'/../bootstrap/app.php';

// VERCEL SPECIFIC: Ensure storage directories exist in /tmp
$tmpStorage = '/tmp/storage';
if (!is_dir($tmpStorage)) {
    mkdir($tmpStorage . '/app/public', 0777, true);
    mkdir($tmpStorage . '/framework/cache/data', 0777, true);
    mkdir($tmpStorage . '/framework/sessions', 0777, true);
    mkdir($tmpStorage . '/framework/testing', 0777, true);
    mkdir($tmpStorage . '/framework/views', 0777, true);
    mkdir($tmpStorage . '/logs', 0777, true);
}

// Tell Laravel to use the /tmp directory for storage (since Vercel is Read-Only)
$app->useStoragePath($tmpStorage);

// Handle the request...
$app->handleRequest(Request::capture());
