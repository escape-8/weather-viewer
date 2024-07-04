# weather-viewer

## Project "Weather-viewer"

A web application for viewing the current weather. The user can register and add one or more locations (cities, villages, other points) to the collection, after which the main page of the application begins to display a list of locations with their current weather.

## Features
- PHP 8.1
- PostgreSQL
- Laravel Framework
- Bootstrap 5
- Docker / Docker Compose
- Open Weather API

## Project motivation

- Implementation of a multi-user application.
- Working with external APIs.
- Get hands-on experience with Docker / Docker Compose.
- Introduction to Laravel Framework.
- Working on integration tests in PHP Unit.

## Application functionality

##### Working with users:
- Registration
- Authorization
- Logout
- Email verification
- Password recovery

##### Working with locations:
- Search
- Add to list
- View list of locations, for each location the name and temperature are displayed
- View weather forecast for 24 hours
- Removing from list

## Setup

### Common
```
git clone https://github.com/escape-8/weather-viewer.git
```
```
cp .env.example .env
```
Open .env and fill in the following fields
```
APP_NAME="Weather Viewer"
```
```
WEATHER_API_KEY=""your_key"
```
```
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=your_database_name
DB_USERNAME=your_user
DB_PASSWORD=your_password (It is recommended to encrypt the password SHA256)
```
```
MAIL_MAILER=smtp
MAIL_HOST=your_host
MAIL_PORT=your_port
MAIL_USERNAME=your_user
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls/ssl
MAIL_FROM_ADDRESS=your_user
MAIL_FROM_NAME="${APP_NAME}"
```

### Local
```
docker compose up -d --build
```
```
docker compose run composer install
```
```
docker compose run artisan migrate
```
```
docker compose run artisan key:generate
```
```
docker compose run npm install && npm run build
```
For frontend dev-server. The development server automatically opens changes to your files and instantly displays them in any open browser windows.
```
docker compose run -p 5173:5173 --rm npm run dev -- --host
```

Check in browser localhost:8885
