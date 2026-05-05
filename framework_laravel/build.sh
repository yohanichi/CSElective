#!/bin/bash

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Install JavaScript dependencies
npm install

# Build assets
npm run build

# Generate cache
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Generate app key if it doesn't exist
php artisan key:generate --force || true

echo "Build complete!"
