FROM php:8.4-fpm

# Install mysqli extension
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Install additional extensions WordPress might need
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install zip