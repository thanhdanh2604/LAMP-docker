FROM php:8.4-fpm

# Install mysqli extension
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Install additional extensions WordPress might need
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    libxml2-dev \
    libcurl4-openssl-dev \
    libonig-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install zip xml curl mbstring ctype gd \
    && docker-php-ext-enable zip xml curl mbstring ctype gd