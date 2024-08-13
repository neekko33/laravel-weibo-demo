<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Setup

```shell
composer install
pnpm install
```

## Database Configuration

```
// weibo/.env
...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=weibo
DB_USERNAME=your_username
DB_PASSWORD=your_password
...
```

## Migration

```shell
php artisan migrate --seed
```
## Development

```shell
php artisan serve
```

```shell
pnpm run dev
```
