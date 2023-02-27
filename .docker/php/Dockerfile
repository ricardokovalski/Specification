FROM php:8.2.1-fpm-alpine

RUN apk add --update linux-headers

RUN apk add --no-cache bash

RUN apk add --no-cache $PHPIZE_DEPS \
	&& pecl install xdebug \
	&& docker-php-ext-enable xdebug

ENV DOCKERIZE_VERSION v0.6.1
RUN wget https://github.com/jwilder/dockerize/releases/download/$DOCKERIZE_VERSION/dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && tar -C /usr/local/bin -xzvf dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && rm dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz

WORKDIR /var/www
RUN rm -rf /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ENV PHP_IDE_CONFIG="serverName=specification"
COPY ./php.ini.development "$PHP_INI_DIR/php.ini"
COPY ./xdebug.ini "$PHP_INI_DIR/conf.d/z-xdebug.ini"

RUN ln -s public html

EXPOSE 9000

ENTRYPOINT ["php-fpm"]
