FROM node:latest as frontendDeps
WORKDIR /app
COPY ./resources/css ./resources/css
COPY ./resources/js ./resources/js
COPY ./vite.config.js ./vite.config.js
RUN --mount=type=bind,source=package.json,target=package.json \
    --mount=type=bind,source=package-lock.json,target=package-lock.json,readonly=false \
    --mount=type=cache,target=/tmp/npm-cache \
    npm install && npm run build

FROM php:8.1.28-fpm

WORKDIR /var/www/html

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libcurl4-openssl-dev \
      nano \
      libzip-dev \
      zip unzip && \
      docker-php-ext-install pdo_pgsql  && \
      docker-php-ext-install bcmath && \
      docker-php-ext-install gd && \
      docker-php-ext-install curl && \
      docker-php-ext-install zip && \
      apt-get clean && \
      rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY --from=frontendDeps --chown=www-data:www-data /app/public/build/manifest.json /var/www/html/public/build/manifest.json
COPY --chown=www-data:www-data ./ /var/www/html

RUN composer install --no-dev --no-interaction --optimize-autoloader

ENTRYPOINT ["/tmp/docker-php-entrypoint/php-init.sh"]
