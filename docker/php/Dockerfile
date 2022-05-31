FROM php:8.1.0-apache

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y git unzip zip

WORKDIR /var/www/html
## Making use of package for php extension installers 
## (Allows us to install many php packages with ease) - https://github.com/mlocati/docker-php-extension-installer
## TODO: Add mysqli to packages to install
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

#standard sites available
COPY apache/config/sites/*.conf /etc/apache2/sites-available/

RUN install-php-extensions gd pdo_mysql bcmath zip intl opcache

#composer install
COPY --from=composer:2.1.9 /usr/bin/composer /usr/bin/composer
