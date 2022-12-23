#! /bin/bash

# Start MySQL server in the background
service mysql start &

# Start NGINX in the background
service nginx start &

# Start PHP-FPM in the background
service php8.1-fpm start &

# Wait for both services to start
sleep 10

# Keep the container running
tail -f /dev/null