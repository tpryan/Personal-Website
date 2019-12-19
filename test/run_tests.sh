#!/bin/bash
sleep 10
/root/.composer/vendor/phpunit/phpunit/phpunit /var/www/html/DevDefaultURLTest.php 
/root/.composer/vendor/phpunit/phpunit/phpunit /var/www/html/DevBlogURLTest.php 