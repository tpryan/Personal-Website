#!/bin/bash
memcached -u nobody -d -m 24 -p 11211
chmod -R 755 /var/www/html
/usr/local/bin/apache2-foreground
