# Use ARG to accept PHP version from build context
ARG PHP_VERSION=8.4
FROM php:${PHP_VERSION}-fpm

# Install mysqli extension
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Install additional extensions WordPress might need
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install zip

# Create session directory and set proper permissions
RUN mkdir -p /tmp && chmod 1777 /tmp

# Create log directory for PHP errors
RUN mkdir -p /var/log && chmod 755 /var/log