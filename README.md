# test_proj
Test project on Codeigniter 3

## INSTALLATION
- Склонировать проект в любую директорию
- Зайти в директорию `php_code` и запустить команду `composer install`
- Переименовать файл `.example.env` в `.env`
- Зайти в корневую директорию и запустить команду `docker-compose up -d`
- Выполнить команду `docker exec -it <mycontainer> bash` где `<mycontainer>` - ID контейнера PHP
- В контейнере PHP выполнить команду `php index.php matches do:migration` что бы запустить миграции и наполнить базу данных нужными таблицами
- Зайти по адресу `localhost:80`