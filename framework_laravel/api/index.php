<?php

// Vercel entry point for Laravel
$_SERVER['REQUEST_URI'] = $_SERVER['REQUEST_URI'] ?? '/';
$_SERVER['SCRIPT_NAME'] = '/api/index.php';

require __DIR__ . '/../public/index.php';
