# Mnine - Project With Laravel 11.x
[Mnine](http://mnine.xyz)

## Getting started

Assuming you've already installed on your machine: PHP (>= 8.1.0), [Laravel](https://laravel.com), [Composer](https://getcomposer.org) and Node (>= 20)[Node.js](https://nodejs.org).

### Step by step
Clone this Repository
```sh
git clone https://github.com/charleschabvonga/mnine
```

Switch to the project folder
```sh
cd mnine
```

Create the .env file
```sh
cp .env.example .env
```

Log in or sign up for your RapidAPI account.
Navigate to any API documentation page by searching for or clicking on one of the collections from the homepage.
Scroll down to the "Header Parameters" section of the API console.
Your API Key should be visible in the "X-RapidAPI-Key" field.
Update environment variables in .env
```dosini
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=your_user_name
DB_PASSWORD=your_password

MAIL_MAILER=your_mail_mailer
MAIL_HOST=your_mail_host
MAIL_PORT=your_mail_port
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=yourmail@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

RAPID_API_KEY=your_X-RapidAPI-Key
```

Install project dependencies
```sh
composer install
npm install && npm run dev
```

Generate the Laravel project key
```sh
php artisan key:generate
```

Run migrations and seeds
```sh
php artisan migrate --seed
```

Then launch the server:
``` bash
php artisan serve
```

Access the project
[http://localhost:8080](http://localhost:8080)
