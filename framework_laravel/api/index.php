<?php

// Ensure proper SERVER variables for Vercel
if (!isset($_SERVER['REQUEST_METHOD'])) {
    $_SERVER['REQUEST_METHOD'] = 'GET';
}

// For Vercel's route rewriting
if (!isset($_SERVER['REQUEST_URI'])) {
    $request_uri = $_SERVER['PATH_INFO'] ?? '/';
    // Remove /api/index.php from the path if it exists
    $request_uri = preg_replace('|^/api/index\.php|', '', $request_uri);
    if (empty($request_uri)) {
        $request_uri = '/';
    }
    $_SERVER['REQUEST_URI'] = $request_uri;
    $_SERVER['PATH_INFO'] = $request_uri;
}

require __DIR__ . '/../public/index.php';
