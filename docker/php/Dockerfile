FROM php:7.4-fpm-alpine

MAINTAINER Ilya Goryachev <ilyatos.gor@gmail.com>

# Install Apline packages
RUN apk add --update --no-cache libxml2-dev autoconf g++ make

# Install PHP extensions
RUN docker-php-ext-install \
    bcmath \
    opcache \
    pdo_mysql

COPY ./conf.d/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

# Install PHP extensions via PECL
RUN pecl install igbinary && docker-php-ext-enable igbinary

# Install php-redis with enabled igbinary
RUN mkdir -p /usr/src/php/ext \
    && cd /usr/src/php/ext \
    && curl -fsSL https://github.com/phpredis/phpredis/archive/5.1.1.tar.gz -o redis.tar.gz \
    && mkdir -p redis \
    && tar -xf redis.tar.gz -C redis --strip-components=1 \
    && rm redis.tar.gz \
    && docker-php-ext-configure redis --enable-redis-igbinary \
    && docker-php-ext-install redis

# Install Composer
RUN curl --silent --show-error https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/ \
    && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer
