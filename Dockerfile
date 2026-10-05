FROM php:8.3-fpm-alpine

WORKDIR /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . /var/www/html

# Install dependencies if vendor not already copied
RUN composer install --no-dev --optimize-autoloader --no-interaction

EXPOSE 9000

CMD ["php-fpm"]
