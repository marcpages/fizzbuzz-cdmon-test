# Fizz Buzz test #

Fizz Buzz test for cdmon.

### How to execute ###

First you should install dependencies for frontend & backend and also build frontend. Then init docker containers:

```
docker-compose up
```

Open frontend at `localhost:80`

## Frontend

Located at `/frontend`

Made with Vue 2. (https://vuejs.org/v2/guide/)

### Requirements

Tested with:

node 10.9.0

npm 6.2.0

### Setup

```
cd frontend
```

Install dependencies

```
npm install
```

Build for production (output at /dist)

```
npm run build
```

or run for developing

```
npm run serve
```

## Backend

Located at `/backend`

Made with Laravel Lumen 7. (https://lumen.laravel.com/docs/7.x)

### Requirements

php 7.2+

### Setup

```
cd backend
```

Install dependencies

```
composer install
```

### Common folders

Controllers

```
/app/Http/Controllers
```

App routes

```
/routes
```
