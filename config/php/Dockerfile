# Use ARG to accept PHP version from build context
ARG PHP_VERSION=8.4
FROM php:${PHP_VERSION}-fpm

# Install base extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Install additional extensions needed for Laravel
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    libxml2-dev \
    libcurl4-openssl-dev \
    libonig-dev \
    && docker-php-ext-install zip xml curl mbstring tokenizer ctype bcmath

# Install Xdebug
RUN pecl install xdebug-3.1.6 || pecl upgrade xdebug \
    && docker-php-ext-enable xdebug

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Create session directory and set proper permissions
RUN mkdir -p /tmp && chmod 1777 /tmp

# Create log directory for PHP errors
RUN mkdir -p /var/log && chmod 755 /var/log