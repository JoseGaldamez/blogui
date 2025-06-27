#!/bin/bash

apt-get update
apt-get install -y unzip curl
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
composer install
docker-php-ext-install mysqli
apache2-foreground