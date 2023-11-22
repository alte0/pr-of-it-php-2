FROM php:8.2.9-cli
#FROM php:8.2.9-fpm
RUN apt-get update && apt-get install -y libpq-dev curl git
RUN docker-php-ext-install -j$(nproc) pdo pdo_mysql pdo_pgsql
RUN pecl channel-update pecl.php.net && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug
# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /app
CMD php -S 0.0.0.0:8080 index.php