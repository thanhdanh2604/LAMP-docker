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
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install zip xml curl mbstring ctype bcmath gd \
    && docker-php-ext-enable zip xml curl mbstring ctype bcmath gd

# Install Xdebug based on PHP version
RUN if ! php -m | grep -q xdebug; then \
        if [ $(php -r "echo PHP_MAJOR_VERSION.PHP_MINOR_VERSION;") = "74" ]; then \
            pecl install xdebug-3.0.4; \
        elif [ $(php -r "echo PHP_MAJOR_VERSION.PHP_MINOR_VERSION;") = "80" ]; then \
            pecl install xdebug-3.1.6; \
        elif [ $(php -r "echo PHP_MAJOR_VERSION.PHP_MINOR_VERSION;") = "81" ]; then \
            pecl install xdebug-3.2.2; \
        elif [ $(php -r "echo PHP_MAJOR_VERSION.PHP_MINOR_VERSION;") = "82" ]; then \
            pecl install xdebug-3.3.2; \
        elif [ $(php -r "echo PHP_MAJOR_VERSION.PHP_MINOR_VERSION;") = "83" ]; then \
            pecl install xdebug-3.3.2; \
        else \
            pecl install xdebug || true; \
        fi; \
    fi \
    && docker-php-ext-enable xdebug

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Create session directory and set proper permissions
RUN mkdir -p /tmp && chmod 1777 /tmp

# Create log directory for PHP errors
RUN mkdir -p /var/log && chmod 755 /var/log