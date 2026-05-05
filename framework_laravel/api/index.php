<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

// Ensure REQUEST_URI is set for Vercel
if (!isset($_SERVER['REQUEST_URI'])) {
    $_SERVER['REQUEST_URI'] = '/';
}

// Clean up the REQUEST_URI
$_SERVER['REQUEST_URI'] = str_replace('/api/index.php', '', $_SERVER['REQUEST_URI']);
if (empty($_SERVER['REQUEST_URI'])) {
    $_SERVER['REQUEST_URI'] = '/';
}

// Set the public path
define('LARAVEL_START', microtime(true));

require __DIR__ . '/../public/index.php';
