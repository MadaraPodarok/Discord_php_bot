ROOT_DIR=/var/www
cd $ROOT_DIR # Меняем рабочую директорию
whoami

# Установка пакетов Composer
/usr/local/bin/composer install
/usr/local/bin/composer dump-autoload

# Местоположение php-fpm
PHP_FPM=$(which php-fpm)
# Создаем новый процесс php-fpm
$PHP_FPM
echo "PHP_FPM Подключен"
