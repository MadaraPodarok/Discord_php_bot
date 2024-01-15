FROM php:8.3-fpm
WORKDIR /var/www/Discord_php_bot

RUN set -eux && apt-get update && apt-get -y full-upgrade && apt-get install -y \
            cron \
            build-essential \
            libpng-dev \
            libxml2-dev \
            libjpeg62-turbo-dev \
            libfreetype6-dev \
            locales \
            zip \
            jpegoptim optipng pngquant gifsicle \
            unzip \
            git \
            libpq-dev \
            libonig-dev \
            nano \
            libzip-dev \
            sudo \
            mc \
            net-tools \
            curl \
            tzdata \
            wget

# Чистим кеш APT
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mbstring exif pcntl sockets soap bcmath zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --2


COPY ./docker/php/entrypoint.sh /var

USER root

RUN ["chmod", "+x", "/var/entrypoint.sh"]

# Открываем 9000 порт под FPM и запускаем PHP-FPM сервер
EXPOSE 9000
CMD ["bash", "-c", "/var/entrypoint.sh"]
