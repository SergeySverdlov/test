Необходимо создать файл .env заполнить конфигурации для базы данных, пример
````
 DB_CONNECTION=pgsql
 DB_HOST=db
 DB_PORT=5432
 DB_DATABASE=postgres
 DB_USERNAME=postgres
 DB_PASSWORD=postgrespw
 ````
Так же необходимо добавить в .env строки
````
DOCKER_DB_PORT=5432
DOCKER_NGINX_FRONT_PORT=80
DOCKER_NGINX_BACK_PORT=8000
````
После настройки .env запускаем команду docker compose up -d ждем пока соберутся контейнеры db, nginx, php_fpm_test.
 После сборки заходим в контейнер php_fpm_test  выполняем cd/test-back после пишем php artisan migrate --seed 
база данных заполниться тестовыми данными. После по http://127.0.0.1:8000/api/goods (метод get)можем получить информацию о имеющихся товарах.
по http://127.0.0.1:8000/api/goods/buy (метод post) можем совершить покупку. Вид данных которые должны быть указаны при совершении покупки указаны в задании.


Пример запроса на совершение покупки:
````
{
    "userId": 1,
    "goods": [
        {
            "count": 1,
            "id": 5
        },
        {
            "count": 1,
            "id": 6
        },
        {
            "count": 1,
            "id": 7
        }
    ]
}
````
