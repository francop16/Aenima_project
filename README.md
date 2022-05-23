Pasos correr el sistema

luego del git clone ejecutar los comandos siguientes:

 1 - composer install
 2 - cp .env.example .env
 3 - php artisan key:generate
 4 - npm i
 5 - Crear la Base de datos aenima_project
 6 - php artisan migrate:refresh
 7 - php artisan storage:link
