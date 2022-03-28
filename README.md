## Reto tienda - Evertec

Tienda basica para compra de 1 solo item con integración al comercio de Place To Pay
Permite realizar y pagar ordenes de pago y consultar ordenes de pago.

## Manual de despliegue

1. Clonar repositorio con Git
~~~
git clone https://github.com/cvidal91/tienda_evertec.git
~~~
2. Ingresar al proyecto descargado (tienda_evertec) en el punto 1, y actualizar dependencias con composer
~~~
composer install
~~~

3. Crear base de datos (MySql or Postgresql or ..)
4. Crear archivo de entorno /.env en base al archivo /.env.example
5. Configurar las variables de entorno del archivo /.env (con el nombre de la base de datos creada en el punto 3), para Base de datos (DB_DATABASE) y servicio Place to Pay con credenciales validas
~~~
-PAYMENT_LOGIN=""
-PAYMENT_KEY=""
-PAYMENT_BASE_URL=""
~~~
6.Correr migraciones con Artisan (estando en la raiz del proyecto)
~~~
php artisan migrate:refresh
~~~
7. Correr Seeders con Artisan (estando en la raiz del proyecto)
~~~
php artisan db:seed --class=ProductsSeeder 
~~~
8. Generar el app key de la aplicación (estando en la raiz del proyecto)
~~~
php artisan key:generate
~~~
9. Ejecutar pruebas con PhpUnit (estando en la raiz del proyecto)
~~~
vendor/bin/phpunit
~~~
