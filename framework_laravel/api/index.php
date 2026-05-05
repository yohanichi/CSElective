<?php

// Handle Vercel's routing
if (isset($_GET['path'])) {
    $path = '/' . trim($_GET['path'], '/');
    $_SERVER['REQUEST_URI'] = $path;
    $_SERVER['PATH_INFO'] = $path;
} else {
    // Fallback to REQUEST_URI or default to /
    if (!isset($_SERVER['REQUEST_URI'])) {
        $_SERVER['REQUEST_URI'] = $_SERVER['PATH_INFO'] ?? '/';
    }
    if (!isset($_SERVER['PATH_INFO'])) {
        $_SERVER['PATH_INFO'] = $_SERVER['REQUEST_URI'];
    }
}

// Remove query string from REQUEST_URI if it exists
$request_uri = $_SERVER['REQUEST_URI'];
if (strpos($request_uri, '?') !== false) {
    $_SERVER['REQUEST_URI'] = substr($request_uri, 0, strpos($request_uri, '?'));
}

// Ensure REQUEST_METHOD is set
if (!isset($_SERVER['REQUEST_METHOD'])) {
    $_SERVER['REQUEST_METHOD'] = 'GET';
}

// Set SCRIPT_NAME to api/index.php for Laravel
$_SERVER['SCRIPT_NAME'] = '/api/index.php';
$_SERVER['SCRIPT_FILENAME'] = __FILE__;

require __DIR__ . '/../public/index.php';
