FROM php:8.0-apache

RUN docker-php-ext-install pdo pdo_mysql sockets
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer self-update

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .
RUN composer install