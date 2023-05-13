Pasos para descargar el proyecto de GitHub, instalar XAMPP, realizar las migraciones y seeders en Laravel:

1. Descargar e instalar XAMPP desde la página oficial: https://www.apachefriends.org/es/index.html



3. Descargar e instalar Composer: Descargar e instalar Composer en tu ordenador
4.  Clonar el repositorio  git clone https://github.com/davidriano02/Cafeteria.git
5. Navegar a la carpeta del proyecto descargado: cd nombre_proyecto
5. Instalar las dependencias de Laravel con Composer. Para esto, se debe ejecutar el siguiente comando en    la    terminal dentro de la carpeta del proyecto:composer install
6. Generar la clave de aplicación de Laravel con el siguiente comando en la terminal dentro de la carpeta del proyecto:php artisan key:generate
8. Configurar la conexión a la base de datos en el archivo ".env" según las credenciales de la base de datos local.

9. Crear la base de datos en el servidor local de MySQL.

10. Realizar las migraciones de la base de datos con el siguiente comando en la terminal dentro de la carpeta del proyecto: php artisan migrate

11.Generar datos aleatorios en la base de datos con los siguientes comandos en la terminal dentro de la carpeta del proyecto:
correr estos comandos 
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=seederTableCategoria
Una vez realizados estos pasos, se tendrá el proyecto de Laravel instalado y con datos de prueba en la base de datos local. importante realizar los seeder  ya que se necesitan datos en la tabla categoria y en la tabla cliente para el correcto funcionamiento.
12. En la ruta database queda el exportable de la base de datos 
11. puedes resgistrarte o ingresar con el usuario creado por el seeder 
