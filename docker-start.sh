#!/bin/sh

# Ensure the SQLite database file exists
if [ ! -f /var/www/html/database/database.sqlite ]; then
    touch /var/www/html/database/database.sqlite
    chown www-data:www-data /var/www/html/database/database.sqlite
fi

# Run migrations and seed the database
php artisan migrate --force --seed

# Create storage link if it doesn't exist
php artisan storage:link --force

# Ensure correct permissions for storage and cache
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Start Apache in the foreground
exec apache2-foreground
