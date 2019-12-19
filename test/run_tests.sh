#!/bin/bash
sleep 3
/root/.composer/vendor/phpunit/phpunit/phpunit /var/www/html/DevDefaultURLTest.php 
/root/.composer/vendor/phpunit/phpunit/phpunit /var/www/html/DevBlogURLTest.php 