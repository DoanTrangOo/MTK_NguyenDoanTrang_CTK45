FROM php:8.0-apache

# Install dependencies and enable PDO MySQL extension
RUN apt-get update \
    && apt-get install -y --no-install-recommends libzip-dev zlib1g-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mysqli \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable apache rewrite (optional, helpful for many PHP apps)
RUN a2enmod rewrite

WORKDIR /var/www/html
