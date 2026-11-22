FROM php:8.4-cli

RUN apt-get update && apt-get install -y libzip-dev libicu-dev zip unzip \
    && docker-php-ext-install pdo pdo_mysql zip intl \
    && rm -rf /var/lib/apt/lists/*

# Batas upload foto lewat panel admin
RUN printf "upload_max_filesize=10M\npost_max_size=12M\n" > /usr/local/etc/php/conf.d/uploads.ini

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www