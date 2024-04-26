# Laravel Sample

> Laravel sample website with content retrieving from [mnine.xyz](http://mnine.xyz)

This project runs with Laravel version 11.

## Getting started

Assuming you've already installed on your machine: PHP (>= 8.1.0), [Laravel](https://laravel.com), [Composer](https://getcomposer.org) and Node (>= 20)[Node.js](https://nodejs.org).

``` bash
# install dependencies
composer install
npm install

# create .env file and generate the application key
cp .env.example .env
php artisan key:generate

# update database credentials in the .env file
#run migrations and seeders
php artisan migrate --seed

# build CSS and JS assets
npm install && npm run dev
```

Then launch the server:

``` bash
php artisan serve
```

The Laravel sample project is now up and running! Access it at http://localhost:8000.