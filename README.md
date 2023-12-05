## Getting started

Clone Project
```
$ git clone git@github.com/cinoyraz31/kurs-dollar
$ cd kurs-dollar
$ cp .env.example .env
$ composer install
```
Depedency Driver Redis
```
$ docker pull redis
$ docker run -d --name name-redis -p 6379:6379 redis
```
Depedency Library
```
$ composer require predis/predis
$ composer require weidner/goutte
```
Run Schedule Get Rate For https://kursdollar.org/ per 7 Minutes
```
$ php artisan schedule:work
every 7 minutes file will save on storage json/
```
Run Laravel
```
php artisan serve
```
Web Service
```
Index rate: yourdomain/rates [GET]
Show rate: yourdomain/rates/:key.json [GET]
Delete All rate: yourdomain/rates/deleteAll [GET] -> delete storage & redis
```
Pattern Design
```
- Controller
- Service
- Model (Repository)
```
Command For Scraping rate & delete
```
app/console/commands
```
