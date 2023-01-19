FROM php:8-fpm-alpine

RUN apk update \
        && apk add \
        curl zlib zlib-dev bash patch icu-dev vim git g++ libpng-dev libxml2-dev libzip-dev libxslt-dev unzip libpq-dev nodejs npm wget \
        lsb-release ca-certificates

RUN apk add --no-cache $PHPIZE_DEPS \
    && apk add --update linux-headers \
    && pecl install -f xdebug \
    && pecl install apcu \
    && docker-php-ext-install intl opcache bcmath sockets pdo pdo_mysql mysqli pdo_pgsql zip calendar dom gd xsl \
    && docker-php-ext-enable xdebug intl opcache bcmath sockets pdo pdo_mysql mysqli pdo_pgsql zip calendar dom gd xsl apcu \
    && rm -rf /var/lib/apt/lists/*

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer selfupdate

RUN curl -sS https://get.symfony.com/cli/installer | bash \
    &&  mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

# RUN docker-php-ext-configure \
#             intl \
#     &&  docker-php-ext-install \
#             pdo pdo_mysql mysqli pdo_pgsql opcache intl zip calendar dom gd xsl

# RUN pecl install apcu && docker-php-ext-enable apcu

RUN git config --global user.email "el.yassine.azami@gmail.com" \
    &&  git config --global user.name "Yassine EL-AZAMI"

RUN export PKG_CONFIG_PATH=/usr/lib/pkgconfig

CMD ["php-fpm", "-F"]

COPY . /var/www/backend
WORKDIR /var/www/backend

EXPOSE 9000