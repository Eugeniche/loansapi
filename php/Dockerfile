FROM php:8.1-fpm-alpine

RUN apk add --no-cache \
    postgresql-dev \
    libpng-dev \
    libzip-dev \
    unzip \
    nginx

RUN docker-php-ext-install \
    pdo_pgsql \
    gd \
    zip \
    pcntl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY src/. .

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

