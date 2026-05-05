FROM php:8.2-cli-alpine

RUN apk add --no-cache \
    curl zip unzip git \
    sqlite-dev \
    && docker-php-ext-install pdo pdo_sqlite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN cp .env.production .env

RUN composer install --no-dev --optimize-autoloader

RUN mkdir -p storage/framework/sessions \
    storage/framework/views \
    storage/framework/cache \
    storage/logs \
    bootstrap/cache \
    && touch database/database.sqlite \
    && chmod -R 777 storage bootstrap/cache \
    && php artisan migrate --force

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=$PORT