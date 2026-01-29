#!/bin/sh

# Ensure the SQLite database file exists
if [ ! -f /var/www/html/database/database.sqlite ]; then
    touch /var/www/html/database/database.sqlite
    chown www-data:www-data /var/www/html/database/database.sqlite
fi

# Run migrations and seed the database
php artisan migrate --force --seed

# Start Apache in the foreground
exec apache2-foreground
