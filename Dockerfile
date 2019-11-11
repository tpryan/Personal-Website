FROM richarvey/nginx-php-fpm:latest

# INSTALL memcached
RUN apk update\
  && apk upgrade \
  && apk add libmemcached \
    libmemcached-libs \
    libmemcached-dev \
    build-base \
    zlib-dev \
    git \
    autoconf \
    cyrus-sasl-dev \
  && pecl config-set php_ini  /usr/local/etc/php/php.ini \
  && pecl install -f memcached \ #Add any Additional packages \
  && echo extension=memcached.so >> /usr/local/etc/php/conf.d/docker-php-ext-memcached.ini \
  && rm -rf /tmp/pear 

ADD main /var/www/html