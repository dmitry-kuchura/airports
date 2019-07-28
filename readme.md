<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

### Почему Laravel

### Описание работы

### Запуск работы (Если не будете использовать Docker)

Создать конфигурационный `.env` файл для фреймворка в корне `www`

Выполнить команду:

`docker-compose exec php php artisan key:generate`

И указать параметры подключения к БД в `.env` файле

```
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=airports
DB_USERNAME=airports
DB_PASSWORD=nACZXsMczjac2STden65vYwS
```
Настроить Ваш сервер на файл `/www/public/index.php`

### Запуск работы (Если используете Docker)

Склонируйте данный репозиторий в директорию где должне распологаться проект

Далее нужно отредатировать `.env` файл в корне проекта или скопировать `cp .env.example .env`

После этого нужно запустить команду `docker-compose up -d` соберутся контейнеры для работы

Сервер будет доступен на стандартном 80м порту `localhost:80` и PostgreSQL соответсвенно `localhost:5432`.

### Настройка

По умолчанию Composer запустится самостоятельно и начнет выполнять команду install

Следующим шагом будет создать конфигурационный `.env` файл для фреймворка в корне `www`

Выполнить команду:

`docker-compose exec php php artisan key:generate`

Необходимо указать параметры подключения к БД 

```
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=airports
DB_USERNAME=airports
DB_PASSWORD=nACZXsMczjac2STden65vYwS
```

После настройки подключения к Базе Данных нужно создать таблицы и заполнить их данными,
для создания воспользуемся миграционными файлами, а для наполнения начальных данных воспользуемся seed'ами

```
docker-compose exec php php artisan migrate
docker-compose exec php php artisan db:seed
```

После этого приложение готово к работе!

## Clear cache

```
docker-compose rm --all
docker-compose pull
docker-compose build --no-cache
docker-compose up -d --force-recreate
 ```