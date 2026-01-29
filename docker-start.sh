#!/bin/sh

# Create folder for persistent database if it doesn't exist
mkdir -p /var/www/html/storage/database

# Ensure the SQLite database file exists in the persistent folder
if [ ! -f /var/www/html/storage/database/database.sqlite ]; then
    touch /var/www/html/storage/database/database.sqlite
    chown -R www-data:www-data /var/www/html/storage/database
fi

# Run migrations and seed the database
php artisan migrate --force --seed

# Start Apache in the foreground
exec apache2-foreground
