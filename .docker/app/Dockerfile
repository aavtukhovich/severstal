FROM php:8.1-apache-buster

#
# Packages
#

RUN apt-get update -y  \
	&& apt-get install -y --no-install-recommends \
	graphviz libpng-dev libwebp-dev webp libzip-dev libicu-dev libfreetype6-dev libjpeg62-turbo-dev \
	default-mysql-client  git zip unzip wget gnupg2

RUN apt-get clean \
	&& apt-get autoremove -y \
	&& rm -rf /var/lib/apt/lists/*

#
# PHP
#

RUN docker-php-ext-configure zip; \
	docker-php-ext-configure intl; \
	docker-php-ext-configure mysqli --with-mysqli=mysqlnd; \
	docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd; \
    docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/ --with-webp-dir=/usr/include/; \
    docker-php-ext-install -j "$(nproc)" gd intl mysqli opcache pdo_mysql zip exif bcmath

RUN mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
RUN echo 'memory_limit = 512M' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini;

#
# Composer
#

ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_NO_INTERACTION=1
ENV COMPOSER_MEMORY_LIMIT=-1

RUN curl -sS https://getcomposer.org/installer | php \
	&& mv composer.phar /usr/local/bin/composer

#
# Apache
#

RUN a2enmod rewrite
COPY .docker/app/vhost.conf /etc/apache2/sites-available/000-default.conf

# Perms
RUN usermod -u 1000 www-data

# We can use project bin files from everywhere (like phpunit)
ENV PATH="/var/www/html/vendor/bin:${PATH}"
