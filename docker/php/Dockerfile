# docker/php/Dockerfile
FROM php:8.2-fpm

WORKDIR /var/www

# 必要なパッケージをインストール
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Composer をインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
