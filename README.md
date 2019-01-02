# Tets AIVO - API TWITTER

### Instalación

- Clonar el repositorio en su carpeta local del servidor.
```sh
git clone https://github.com/sergioc6/test-aivo.git
```
- Crear una nueva DB mysql local de nombre 'test-aivo'

- Instalar dependencias de Composer.
```sh
composer install
```
- Crear su archivo .env y asegurarse que contenga la siguiente información
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test-aivo
DB_USERNAME=<your user>
DB_PASSWORD=<your pass>

TWITTER_CONSUMER_KEY=coj0Zb8vn0MDSA9ps6W1Yqz4q
TWITTER_CONSUMER_SECRET=E335V3RXnN6Ai9IVjvDRljRAdCh5XKn3Z5RdMLrQL0T85K7HFX
TWITTER_ACCESS_TOKEN=1079488600008548357-xRtuE6qGmecYZsgLebMZi3GaquvWCd
TWITTER_ACCESS_TOKEN_SECRET=dltuI0GjdWFr9tsrD4Q0lxHlh4lgXYMxosTqXeZlkQHXk
```

- Ejecutar las migrations.
```sh
php artisan migrate
```
- Ejecutar los seeders.
```sh
php artisan db:seed --class=ConfigurationTableSeeder
```
- Generar Key Application de Laravel
```sh
php artisan key:generate
```

### Ejecución de la App
Para ejecutar la aplicación ingrese a la carpeta /public, del servidor donde usted instaló la app. Por ejemplo:
http://localhost/test-aivo/public/

### Ejecucion de la API
Para ejecutar la API que obtiene los tweets, deberá ingresar a la siguiente url:
http://localhost/test-aivo/public/api/get_tweets?twitter_account=<your-account>&count=<cantidad>&format=<format>

La misma acepta los siguientes parametros por GET:
twitter_account -> your twitter account (default SCabral6)
count -> numeric (default 20)
format -> object|json|array default (json)