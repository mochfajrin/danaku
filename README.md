# Danaku - Expense Tracker

## Get Started

### Install Dependency

```sh
composer install
npm install
```

### Create PostgreSQL Database

```sh
CREATE DATABASE <YOUR_DATABASE_NAME>;
```

### Configure .env file

```sh
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

### Migrate Database and Seeder

```sh
php artisan migrate
php artisan db:seed
```

### Run Development Server

```sh
php artisan serve
```
