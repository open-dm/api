FROM php:7.2-fpm

WORKDIR /var/www/html

RUN pecl install redis
RUN apt-get update -yqq
RUN apt-get install -y libgmp-dev libpng-dev

RUN docker-php-ext-install mysqli gd zip pdo_mysql gmp
RUN docker-php-ext-enable redis

COPY ./docker/config/php.conf /usr/local/etc/php/php.ini
