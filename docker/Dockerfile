FROM php:5.6-apache

RUN apt-get update && apt-get -y install \
	curl \
	libmemcached-dev \
	libncurses5-dev \
	memcached \
	php5-memcache \
	php5-memcached \
	php5-mysqlnd \
	php-pear \
	zlib1g-dev 
	
# Install Memcache - needed for Wordpress
RUN curl -L http://pecl.php.net/get/memcache-2.2.7.tgz >> /usr/src/php/ext/memcache.tgz && \
	tar -xf /usr/src/php/ext/memcache.tgz -C /usr/src/php/ext/ && \
	rm /usr/src/php/ext/memcache.tgz && \
	docker-php-ext-install memcache-2.2.7

# Install Memcached - needed for main site
RUN curl -L http://pecl.php.net/get/memcached-2.2.0.tgz >> /usr/src/php/ext/memcached.tgz && \
	tar -xf /usr/src/php/ext/memcached.tgz -C /usr/src/php/ext/ && \
	rm /usr/src/php/ext/memcached.tgz && \
	docker-php-ext-install memcached-2.2.0

# Install MySQLi - needed for main site
RUN docker-php-ext-install mysqli

COPY php.ini /usr/local/etc/php/
COPY startup.sh /usr/local/bin/
RUN chmod 755 /usr/local/bin/startup.sh

CMD ["/usr/local/bin/startup.sh"] 
