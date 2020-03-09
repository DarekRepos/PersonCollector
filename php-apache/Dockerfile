FROM php:7.2.1-apache
MAINTAINER egido docile
RUN apt-get update && apt-get install -y libxml2-dev git zlib1g-dev mariadb-client libzip-dev
RUN docker-php-ext-install pdo pdo_mysql mysqli mbstring xml xmlrpc
RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini
RUN a2enmod rewrite
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer