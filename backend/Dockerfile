FROM php:8.2-cli

# Instalar dependências do sistema e extensões do PHP necessárias
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Rodar o servidor Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
