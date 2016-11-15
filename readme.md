BarkPost Messenger
====================

## Dev Prerequisites
### Automated
-  nodejs version 6.4.0.
-  [Laravel 5.3 Homestead](https://laravel.com/docs/5.3/homestead)

### Custom
If you don't want to use Homestead, you're environment must meet these requirements:
-  PHP >= 5.6.4
-  OpenSSL PHP Extension
-  PDO PHP Extension
-  Mbstring PHP Extension
-  Tokenizer PHP Extension
-  XML PHP Extension

## Setup
### Create Local DB
```shell
mysql
mysql --database forge -u root
grant ALL on forge.* to 'forge'@'localhost';
```
### Create .env file & modify whatever values you wish
```shell
cp .env.example .env
```
### Migrate DB
```shell
php artisan migrate
```

## Developing
### Launch local server
```shell
php artisan serve
```

### Run Watcher for CSS/JS changes
```shell
gulp watch
```
