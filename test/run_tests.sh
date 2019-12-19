#!/bin/bash
sleep 2
/root/.composer/vendor/phpunit/phpunit/phpunit /var/www/html/DevDefaultURLTest.php 
/root/.composer/vendor/phpunit/phpunit/phpunit /var/www/html/DevBlogURLTest.php 