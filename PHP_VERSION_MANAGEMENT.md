# PHP Version Management cho LAMP Docker

## Tổng quan
Dự án này hỗ trợ linh hoạt thay đổi phiên bản PHP từ 7.4 đến 8.4 mà không cần chỉnh sửa file cấu hình phức tạp.

## Các phiên bản PHP được hỗ trợ
- PHP 7.4
- PHP 8.0
- PHP 8.1
- PHP 8.2
- PHP 8.3
- PHP 8.4 (mặc định)

## Cách thay đổi phiên bản PHP

### Phương pháp 1: Sử dụng Script tự động (Khuyến nghị)
```bash
# Thay đổi sang PHP 8.3
./change-php-version.sh 8.3

# Thay đổi sang PHP 8.1
./change-php-version.sh 8.1

# Thay đổi sang PHP 7.4
./change-php-version.sh 7.4
```

Script sẽ tự động:
- Cập nhật file .env
- Stop containers hiện tại
- Rebuild PHP container với phiên bản mới
- Start lại tất cả containers
- Kiểm tra và xác nhận phiên bản mới

### Phương pháp 2: Thay đổi thủ công qua file .env
```bash
# 1. Chỉnh sửa file .env
echo "PHP_VERSION=8.3" > .env

# 2. Rebuild containers
docker compose down
docker compose build --no-cache php
docker compose up -d
```

### Phương pháp 3: Sử dụng biến môi trường trực tiếp
```bash
# Chạy với PHP 8.1 mà không thay đổi file .env
PHP_VERSION=8.1 docker compose up -d --build
```

## Cấu hình tùy chỉnh cho từng phiên bản

Mỗi phiên bản PHP có file cấu hình riêng trong `config/php/versions/`:
- `php-7.4.ini` - Cấu hình cho PHP 7.4
- `php-8.0.ini` - Cấu hình cho PHP 8.0  
- `php-8.1.ini` - Cấu hình cho PHP 8.1
- `php-8.2.ini` - Cấu hình cho PHP 8.2
- `php-8.3.ini` - Cấu hình cho PHP 8.3
- `php-8.4.ini` - Cấu hình cho PHP 8.4

### Để sử dụng cấu hình riêng cho từng phiên bản:

1. Chỉnh sửa docker-compose.yml để mount file cấu hình theo phiên bản:
```yaml
volumes:
  - ./src:/usr/share/nginx/html
  - ./config/php/versions/php-${PHP_VERSION:-8.4}.ini:/usr/local/etc/php/conf.d/custom.ini
```

2. Hoặc sử dụng script để tự động copy file cấu hình phù hợp:
```bash
# Copy cấu hình cho PHP 8.3
cp config/php/versions/php-8.3.ini config/php/php.ini
```

## Kiểm tra phiên bản hiện tại

```bash
# Kiểm tra phiên bản PHP trong container
docker compose exec php php -v

# Kiểm tra cấu hình PHP chi tiết
docker compose exec php php -i

# Kiểm tra phiên bản trong file .env
cat .env | grep PHP_VERSION

# Tạo file phpinfo để kiểm tra qua web
echo "<?php phpinfo(); ?>" > src/info.php
# Truy cập: http://localhost/info.php
```

## Troubleshooting

### Lỗi khi build image
```bash
# Xóa cache và rebuild
docker system prune -f
docker compose build --no-cache --pull php
```

### Container không khởi động
```bash
# Xem logs
docker compose logs php

# Restart container
docker compose restart php
```

### Extensions bị thiếu cho phiên bản PHP cũ
Một số extensions có thể không tương thích với PHP cũ. Chỉnh sửa `config/php/Dockerfile` để thêm điều kiện:

```dockerfile
ARG PHP_VERSION=8.4
FROM php:${PHP_VERSION}-fpm

# Install extensions based on PHP version
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Install zip extension (available for all versions)
RUN apt-get update && apt-get install -y libzip-dev zip
RUN docker-php-ext-install zip

# Install additional extensions for PHP 8.0+
RUN if [ "${PHP_VERSION}" != "7.4" ]; then \
    docker-php-ext-install opcache; \
    fi
```

## Performance Tips

### Cho PHP 7.4:
- memory_limit: 256M
- max_execution_time: 300s

### Cho PHP 8.0+:
- memory_limit: 512M  
- max_execution_time: 600s
- Bật OPcache cho performance tốt hơn

### Cho môi trường production:
```ini
display_errors = Off
error_reporting = E_ERROR | E_WARNING | E_PARSE
opcache.enable = 1
opcache.memory_consumption = 256
```

## Examples

### Switching để test ứng dụng với nhiều phiên bản:
```bash
# Test với PHP 8.1
./change-php-version.sh 8.1
# Run tests...

# Test với PHP 8.3  
./change-php-version.sh 8.3
# Run tests...

# Quay lại PHP 8.4
./change-php-version.sh 8.4
```

### Development workflow:
```bash
# Development với PHP 8.4
./change-php-version.sh 8.4

# Deploy testing với PHP 8.3 (stable)
./change-php-version.sh 8.3

# Production với PHP 8.2 (LTS)
./change-php-version.sh 8.2
```
