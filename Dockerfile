# Pega a imagem base do PHP
FROM php:8.4-fpm

# Instala as ferramentas do sistema necessárias para o MongoDB
RUN apt-get update && apt-get install -y \
    libssl-dev \
    pkg-config

# Instala a extensão pdo_mysql (para o MariaDB) e a extensão do MongoDB
RUN docker-php-ext-install pdo pdo_mysql \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb
