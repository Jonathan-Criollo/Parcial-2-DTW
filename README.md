# Parcial N°2 DTW GT01

## Integrantes parcial

### Tema: #5 Agenda de contactos

1. Jonathan Rolando Criollo Melchor - CM21020  
2. Mario Alexis Miranda Reyes - MR22058  
3. Marcos David Guillen Fernandez - GF21027  
4. José Ricardo Navarro Delgado - ND22002  
5. Victor Andres Hernandez Avilés - HA22027  

Luego de clonar el repositorio, abrir la consola dentro del proyecto, pueder ser CMD ó POWERSHELL.
debe de ejecurta el comando composer install. para que funcione bien su proyecto.
luego ejecutar el comando php artisan serve, para ejecutar el projecto, y abre la url que se le genera.
ejecutela en el navegador, y se le mostrara la ventana del login. 
Esto fue probado con XAMPP, MySQL y Apache, y funciono correctamente en todas las ramas

---

### Conexión con la base de datos

Paso 1: Configurar `.env`
Abre el archivo `.env` en la raíz del proyecto Laravel y revisa  las variables de conexión:
notaras que la base de datos a la que se conectar es laravel


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

---

Asegúrate de que la base de datos ya exista en MySQL. Puedes crearla manualmente desde phpMyAdmin o con:
bash
`mysql -u root -p`
`CREATE DATABASE laravel;`


Paso 2: Limpiar y recargar configuración de Laravel

`php artisan config:cache`

---

2. Ejecutar migraciones

Las migraciones crean las tablas en tu base de datos, en nuestro caso usaremos las que tiene el proyecto.

`php artisan migrate`

> Si necesitas forzar la migración (por ejemplo, si hay errores), puedes usar:

`php artisan migrate:fresh`

---

3. Ejecutar seeders

Los seeders llenan las tablas con datos de prueba o predeterminados.

Ejecutar todos los seeders registrados en `DatabaseSeeder.php`:

`php artisan db:seed`

O ejecutar un seeder específico:

`php artisan db:seed --class=NombreDelSeeder`

Ejemplo:

`php artisan db:seed --class=UsersTableSeeder`

---

4. Comando combinado (opcional)

Si quieres borrar todo, volver a migrar y ejecutar los seeders de una sola vez:

`php artisan migrate:fresh --seed`

