FROM php:5.6-apache
COPY php.ini /usr/local/etc/php/
COPY startup.sh /usr/local/bin/

RUN apt-get update
RUN apt-get -y install memcached php5-mysqlnd php5-memcache php5-memcached php-pear curl libmemcached-dev zlib1g-dev libncurses5-dev

RUN curl -L http://pecl.php.net/get/memcache-2.2.7.tgz >> /usr/src/php/ext/memcache.tgz && \
tar -xf /usr/src/php/ext/memcache.tgz -C /usr/src/php/ext/ && \
rm /usr/src/php/ext/memcache.tgz && \
docker-php-ext-install memcache-2.2.7


RUN curl -L http://pecl.php.net/get/memcached-2.2.0.tgz >> /usr/src/php/ext/memcached.tgz && \
tar -xf /usr/src/php/ext/memcached.tgz -C /usr/src/php/ext/ && \
rm /usr/src/php/ext/memcached.tgz && \
docker-php-ext-install memcached-2.2.0

RUN docker-php-ext-install mysqli


EXPOSE 11211/tcp 11211/udp
RUN /etc/init.d/apache2 restart
RUN chmod 755 /usr/local/bin/startup.sh
ENV DEV=true
CMD ["/usr/local/bin/startup.sh"] 
