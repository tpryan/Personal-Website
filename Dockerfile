FROM richarvey/nginx-php-fpm:latest
ADD main /var/www/html
ADD main/config/default.conf /etc/nginx/sites-available/default.conf
EXPOSE 8080