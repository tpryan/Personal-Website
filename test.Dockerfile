FROM richarvey/nginx-php-fpm:latest
RUN apk add curl
RUN composer global require phpunit/phpunit

ADD main /var/www/html
ADD test /var/www/html
ADD main/config/default.conf /etc/nginx/sites-available/default.conf

EXPOSE 8080