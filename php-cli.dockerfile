FROM php:7.2-cli

RUN docker-php-ext-install pdo pdo_mysql

ENV COMPOSER_HOME /var/www/.composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/bin \
    --filename=composer

RUN mkdir -p $COMPOSER_HOME/cache && mkdir -p /var/www/.composer

RUN pecl install xdebug-2.9.0 && \
    docker-php-ext-enable xdebug

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
