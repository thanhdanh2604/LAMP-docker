#!/bin/bash

# Script để thay đổi phiên bản PHP dễ dàng
# Usage: ./change-php-version.sh 8.3

set -e

# Màu sắc cho output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Hàm hiển thị usage
show_usage() {
    echo -e "${BLUE}Usage: $0 <php_version>${NC}"
    echo "Available PHP versions: 7.4, 8.0, 8.1, 8.2, 8.3, 8.4"
    echo ""
    echo "Examples:"
    echo "  $0 8.3    # Switch to PHP 8.3"
    echo "  $0 8.1    # Switch to PHP 8.1"
    exit 1
}

# Kiểm tra tham số
if [ $# -eq 0 ]; then
    echo -e "${RED}Error: PHP version is required${NC}"
    show_usage
fi

PHP_VERSION=$1

# Kiểm tra phiên bản PHP hợp lệ
VALID_VERSIONS=("7.4" "8.0" "8.1" "8.2" "8.3" "8.4")
if [[ ! " ${VALID_VERSIONS[@]} " =~ " ${PHP_VERSION} " ]]; then
    echo -e "${RED}Error: Invalid PHP version: $PHP_VERSION${NC}"
    echo -e "${YELLOW}Valid versions: ${VALID_VERSIONS[*]}${NC}"
    exit 1
fi

echo -e "${BLUE}Switching to PHP $PHP_VERSION...${NC}"

# Cập nhật file .env
if [ -f .env ]; then
    sed -i "s/^PHP_VERSION=.*/PHP_VERSION=$PHP_VERSION/" .env
    echo -e "${GREEN}✓ Updated .env file${NC}"
else
    echo "PHP_VERSION=$PHP_VERSION" > .env
    echo -e "${GREEN}✓ Created .env file${NC}"
fi

# Hiển thị phiên bản hiện tại
echo -e "${YELLOW}Current configuration:${NC}"
grep "PHP_VERSION" .env

# Stop containers
echo -e "${BLUE}Stopping containers...${NC}"
docker compose down

# Rebuild PHP container với phiên bản mới
echo -e "${BLUE}Building PHP $PHP_VERSION container...${NC}"
docker compose build --no-cache php

# Start containers
echo -e "${BLUE}Starting containers...${NC}"
docker compose up -d

# Chờ containers khởi động
echo -e "${YELLOW}Waiting for containers to start...${NC}"
sleep 10

# Kiểm tra trạng thái
echo -e "${BLUE}Checking container status...${NC}"
docker compose ps

# Kiểm tra phiên bản PHP
echo -e "${BLUE}Verifying PHP version...${NC}"
ACTUAL_VERSION=$(docker compose exec php php -v | head -n 1)
echo -e "${GREEN}✓ $ACTUAL_VERSION${NC}"

echo -e "${GREEN}✅ Successfully switched to PHP $PHP_VERSION!${NC}"
echo -e "${YELLOW}You can access:${NC}"
echo -e "  - Website: http://localhost"
echo -e "  - phpMyAdmin: http://localhost:8081"
