FROM php:7.4-fpm
WORKDIR /var/www

RUN apt-get update && apt-get install -y --no-install-recommends \
    cron \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    libmagickwand-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    git \
    libpq-dev \
    nano \
    libzip-dev \
    curl

# Чистим кеш APT
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install zip exif pcntl sockets

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --2


COPY ./docker/php/entrypoint.sh /var

USER root

RUN ["chmod", "+x", "/var/entrypoint.sh"]

# Открываем 9000 порт под FPM и запускаем PHP-FPM сервер
EXPOSE 9000
CMD ["bash", "-c", "/var/entrypoint.sh"]
