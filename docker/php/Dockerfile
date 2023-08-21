FROM php:8.2.3-cli
WORKDIR "/app"

RUN curl -sL https://raw.githubusercontent.com/nodesource/distributions/master/deb/setup_18.x | bash

RUN apt-get update && apt-get install vim -y && \
    apt-get install openssl -y && \
    apt-get install libcurl4-openssl-dev -y && \
    apt-get install libssl-dev -y && \
    apt-get install wget -y && \
    apt-get install git -y && \
    apt-get install nodejs -y && \
    apt-get install zip -y && \
    apt-get install procps -y && \
    apt-get install supervisor -y && \
    apt-get install htop -y

RUN pecl install redis
RUN docker-php-ext-install pcntl mysqli pdo pdo_mysql sockets

RUN docker-php-ext-enable pcntl
RUN docker-php-ext-enable redis
RUN docker-php-ext-enable sockets

RUN pecl install -D 'enable-sockets="yes" enable-openssl="yes" enable-http2="yes" enable-mysqlnd="yes" enable-hook-curl="yes" enable-swoole-curl="yes" enable-cares="yes"' openswoole

RUN touch /usr/local/etc/php/conf.d/openswoole.ini && \
    echo 'extension=openswoole.so' > /usr/local/etc/php/conf.d/zzz_openswoole.ini

RUN apt-get autoremove -y && rm -rf /var/lib/apt/lists/*

COPY ./docker/supervisor.conf /etc/supervisor/conf.d/server.conf

COPY . .

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN set -eux

CMD ["/usr/bin/supervisord","-c","/etc/supervisor/supervisord.conf"]
