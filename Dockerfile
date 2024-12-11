# Stage 1: Build Stage
FROM php:8.2-cli AS build

# Set the working directory
WORKDIR /var/www/html/app

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    zip unzip curl libpng-dev libonig-dev libxml2-dev libzip-dev git \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && apt-get clean

# Install Composer globally
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . .

# Install application dependencies
RUN composer install --no-dev --optimize-autoloader

# Set proper permissions for Laravel
# RUN chown -R www-data:www-data /var/www/html/app/storage /var/www/html/app/bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/app \
    && chmod -R 775 /var/www/html/app/storage /var/www/html/app/bootstrap/cache

# ---

# Stage 2: Production Stage
FROM php:8.2-apache AS production

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy built application from the previous stage
COPY --from=build /var/www/html/app /var/www/html/app

# Ensure correct permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/app/storage /var/www/html/app/bootstrap/cache

# Expose the default Apache port
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]
