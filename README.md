## Persyaratan
•	PHP 7.3 or higher <br>
•	Node 12.13.0 or higher <br>

## Penggunaan <br>
Setting di direktori lokal : <br>
```
git clone git@github.com:alifzidanr/sobatsehat-blog.git
cd laravel-8-complete-blog
cp .env.example .env
composer install
php artisan key:generate
php artisan cache:clear && php artisan config:clear
php artisan serve
```

## Sebelum Mulai <br>
Buat Database <br>
```
mysql
create database laravelblog;
exit;
```

Setup kredensial database dalam .env file <br>
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelblog
DB_USERNAME={USERNAME}
DB_PASSWORD={PASSWORD}
```

Migrate tabel
```
php artisan migrate
```
