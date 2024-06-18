FROM node:latest as frontendDeps
WORKDIR /app
COPY ./resources/css ./resources/css
COPY ./resources/js ./resources/js
COPY ./vite.config.js ./vite.config.js
RUN --mount=type=bind,source=package.json,target=package.json \
    --mount=type=bind,source=package-lock.json,target=package-lock.json,readonly=false \
    --mount=type=cache,target=/tmp/npm-cache \
    npm install && npm run build

FROM nginx:latest

WORKDIR /var/www/html

COPY /public /var/www/html/public
COPY --from=frontendDeps /app/public /var/www/html/public
