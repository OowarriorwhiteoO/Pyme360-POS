FROM php:8.2-cli

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /app

# Copiar archivos del proyecto
COPY . .

# Instalar dependencias de PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Exponer puerto
EXPOSE 8080

# Comando de inicio
CMD php artisan migrate --force && \
    (php artisan db:seed --force || echo "Seeding skipped or failed, continuing...") && \
    php artisan serve --host=0.0.0.0 --port=8080
