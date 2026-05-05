<?php

// Diagnostic endpoint for debugging
http_response_code(200);
header('Content-Type: application/json');

$info = [
    'timestamp' => date('Y-m-d H:i:s'),
    'php_version' => phpversion(),
    'request_uri' => $_SERVER['REQUEST_URI'] ?? 'NOT_SET',
    'path_info' => $_SERVER['PATH_INFO'] ?? 'NOT_SET',
    'request_method' => $_SERVER['REQUEST_METHOD'] ?? 'NOT_SET',
    'script_name' => $_SERVER['SCRIPT_NAME'] ?? 'NOT_SET',
    'script_filename' => $_SERVER['SCRIPT_FILENAME'] ?? 'NOT_SET',
    'query_string' => $_SERVER['QUERY_STRING'] ?? 'NOT_SET',
    'server_name' => $_SERVER['SERVER_NAME'] ?? 'NOT_SET',
    'server_port' => $_SERVER['SERVER_PORT'] ?? 'NOT_SET',
    'http_host' => $_SERVER['HTTP_HOST'] ?? 'NOT_SET',
    'laravel_base' => dirname(__DIR__),
    'public_exists' => file_exists(dirname(__DIR__) . '/public'),
    'public_index_exists' => file_exists(dirname(__DIR__) . '/public/index.php'),
    'bootstrap_app_exists' => file_exists(dirname(__DIR__) . '/bootstrap/app.php'),
];

echo json_encode($info, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
