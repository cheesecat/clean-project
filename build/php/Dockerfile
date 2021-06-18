FROM php:8.0-fpm

MAINTAINER Paweł Galerczyk <pawel@napoleoncat.com>

RUN apt-get update && apt-get install -y apt-transport-https iputils-ping ca-certificates
RUN apt-get install -y libcurl4 libcurl4-openssl-dev libxml2-dev libz-dev libmemcached-dev libpng-dev libfreetype6-dev libjpeg-dev libzmq3-dev\
    && rm -rf /var/lib/apt/lists/*
RUN pecl install memcached

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install -j$(nproc) pdo mysqli json intl calendar curl bcmath mbstring pdo_mysql zip gd exif
RUN pecl install xdebug-2.9.2
RUN pecl install zmq-beta
RUN docker-php-ext-enable xdebug memcached zmq gd

# Install recommended extensions for Symfony
RUN apt-get update && apt-get install -y \
        libicu-dev \
    && docker-php-ext-install \
        intl \
        opcache \
    && docker-php-ext-enable \
        intl \
        opcache

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
COPY xdebug.ini $PHP_INI_DIR/conf.d/