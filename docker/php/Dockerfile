FROM php:8.1-fpm
WORKDIR /var/www

ENV TZ=Europe/Moscow

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

RUN docker-php-ext-install mbstring exif pcntl sockets soap bcmath zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --2


RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

COPY ./docker/php/entrypoint.sh /var

USER root

RUN ["chmod", "+x", "/var/entrypoint.sh"]


# Открываем 9000 порт под FPM и запускаем PHP-FPM сервер
EXPOSE 9000
CMD ["bash", "-c", "/var/entrypoint.sh"]
