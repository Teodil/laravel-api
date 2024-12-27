# Laravel API Backend
### Запуск проекта (php, nginx, postgres)

```bash
   docker-compose up nginx -d
```
Composer
```bash
    docker-compose run --rm composer install
```
Запуск мигрцаии
```bash
    docker-compose run --rm artisan migrate
```
Запуск Seeder
```bash
    docker-compose run --rm artisan db:seed --class=CategoriesSeeder
```
```bash
    docker-compose run --rm artisan db:seed --class=DatabaseSeeder
```
```bash
    docker-compose run --rm artisan db:seed --class=ProductsSeeder
```
```bash
    docker-compose run --rm artisan db:seed --class=ReviewsSeeder
```
## Тестирование
В корневой папке есть файл testApi.postman_collection.json его можно импортировать в Postman и выполнить запросы

### Примечание
Была проблема с permission denied при попытке laravel открыть кэш страницы.
В рамках докера вроде бы поправил эту ошибку, но если вдруг она возникнет 
воспользуетесь командами ниже
```bash
   docker exec -u root -it laravel-docker-php-1 bash
   chown -R www-data:www-data /var/www/laravel
   exit
```



