FROM php:7.4-fpm-alpine

MAINTAINER Ilya Goryachev <ilyatos.gor@gmail.com>

# Install Apline packages
RUN apk add --update --no-cache libxml2-dev

# Install PHP extensions
RUN docker-php-ext-install \
    bcmath \
    pdo_mysql \
    tokenizer \
    xml \
    opcache

COPY ./conf.d/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

# Install Composer
RUN curl --silent --show-error https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
