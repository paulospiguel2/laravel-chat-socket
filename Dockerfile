FROM php:7.3-fpm-stretch

# Replace shell with bash so we can source files
RUN rm /bin/sh && ln -s /bin/bash /bin/sh

RUN apt-get update --fix-missing
RUN apt-get install -y curl apt-utils

ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions /usr/local/bin/

RUN apt-get update && apt-get install -y \
  libpq-dev libssl-dev zip libzip-dev \
  zlib1g-dev libpng-dev libjpeg-dev \
  libfreetype6-dev openssl

RUN docker-php-ext-configure zip \
  && docker-php-ext-configure gd \
  --with-freetype-dir=/usr/include/ \
  --with-jpeg-dir=/usr/include/

RUN docker-php-ext-install pdo pdo_pgsql \
  && docker-php-ext-install pgsql \
  && docker-php-ext-install gd \
  && docker-php-ext-install zip

COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/custom-php.ini

WORKDIR /var/www/html
