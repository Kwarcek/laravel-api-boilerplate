FROM php:8.4.1-cli
WORKDIR "/app"

RUN curl -sL https://deb.nodesource.com/setup_23.x | bash

RUN apt-get update && apt-get install -y \
    vim \
    openssl \
    libcurl4-openssl-dev \
    libssl-dev \
    wget \
    git \
    nodejs \
    zip \
    unzip \
    procps \
    supervisor \
    htop \
    curl \
    gnupg && \
    mkdir -p /var/run && chmod 777 /var/run && \
    mkdir -p /var/log/supervisor && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN pecl install redis
RUN docker-php-ext-install pcntl mysqli pdo pdo_mysql sockets

RUN docker-php-ext-enable pcntl
RUN docker-php-ext-enable redis
RUN docker-php-ext-enable sockets

RUN curl https://frankenphp.dev/install.sh | sh && \
    mv frankenphp /usr/local/bin/frankenphp && \
    chmod +x /usr/local/bin/frankenphp

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1

COPY . .

RUN composer install --no-dev --optimize-autoloader && \
    composer require laravel/octane && \
    php artisan octane:install --server=frankenphp

RUN chmod -R 777 storage bootstrap/cache

COPY ./docker/supervisor.conf /etc/supervisor/conf.d/server.conf

CMD ["/usr/bin/supervisord","-c","/etc/supervisor/conf.d/server.conf"]
