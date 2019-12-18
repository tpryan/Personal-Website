FROM richarvey/nginx-php-fpm:latest
RUN apk add curl
RUN composer global require phpunit/phpunit

ADD main /var/www/html
ADD test /var/www/html
ADD main/config/default.conf /etc/nginx/sites-available/default.conf

COPY test/run_tests.sh /run_tests.sh
RUN chmod +x /run_tests.sh

EXPOSE 8080