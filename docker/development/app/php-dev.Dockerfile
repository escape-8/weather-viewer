FROM php:8.1.28-fpm

WORKDIR /var/www/html

ARG user
ARG uid

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y \
      apt-utils \
      libpq-dev \
      libpng-dev \
      curl \
      nano \
      libzip-dev \
      zip unzip && \
      docker-php-ext-install pdo_pgsql  && \
      docker-php-ext-install bcmath && \
      docker-php-ext-install gd && \
      docker-php-ext-install zip && \
      apt-get clean && \
      rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN pecl install xdebug && \
    docker-php-ext-enable xdebug

RUN useradd -G www-data,root -u $uid -d /home/$user $user

USER $user
