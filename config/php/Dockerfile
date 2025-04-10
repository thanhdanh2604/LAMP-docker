FROM wordpress:latest

# Sử dụng cấu hình php.ini-production làm mặc định
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Copy file php.ini tùy chỉnh từ project vào container
COPY php.ini $PHP_INI_DIR/php.ini