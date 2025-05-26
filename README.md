# Parcial N°2 DTW GT01

## Integrantes parcial

### Tema: #5 Agenda de contactos

1. Jonathan Rolando Criollo Melchor - CM21020  
2. Mario Alexis Miranda Reyes - MR22058  
3. Marcos David Guillen Fernandez - GF21027  
4. José Ricardo Navarro Delgado - ND22002  
5. Victor Andres Hernandez Avilés - HA22027  

Luego de clonar el repositorio, abrir la consola dentro del proyecto, pueder ser CMD ó POWERSHELL, debe de ejecurta el comando: ` "composer install"`, para que funcione bien su proyecto.  
Luego ejecutar el comando: `"php artisan serve"` para ejecutar el projecto y luego abre la url que se le genera.  
Ejecutela en el navegador y se le mostrara la ventana del login.  
Esto fue probado con XAMPP, MySQL y Apache, y funciono correctamente en todas las ramas.  

---

### Conexión con la base de datos

Paso 1: Configurar `.env`  
Abrimos el archivo `.env` en la raíz del proyecto Laravel y revisa  las variables de conexión:  

DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=laravel  
DB_USERNAME=root  
DB_PASSWORD=  

---

Asegúrate de que la base de datos ya exista en MySQL. Puedes crearla manualmente desde phpMyAdmin o con:
bash:  
`mysql -u root -p`  
`CREATE DATABASE laravel;`  

Paso 2: Limpiar y recargar configuración de Laravel.  

`php artisan config:cache`  

---

2. Ejecutar migraciones.

Las migraciones crean las tablas en la base de datos, en nuestro caso usaremos las que tiene el proyecto.  

`php artisan migrate`

> Si se necesita forzar la migración (por ejemplo, si hay errores), se puede usar:

`php artisan migrate:fresh`

---

3. Ejecutar seeders.  

Los seeders llenan las tablas con datos de prueba o predeterminados.  
Ejecutar todos los seeders registrados en `DatabaseSeeder.php`:  

`php artisan db:seed`

---

4. Comando combinado 

Si quieres borrar todo, volver a migrar y ejecutar los seeders de una sola vez:

`php artisan migrate:fresh --seed`


5. Agregamos un menú para mejorar la experiencia del usuario.
Sin embargo dejamos las rutas para ser verificadas manualmente.

Rutas principales utilizadas en el proyecto:

Panel de control (acceso común):
`/panel → Redireccionamiento general para usuarios estándar y administradores.`

Gestión de roles y permisos (admin):
`/admin/roles/index`
`/admin/permisos/index`

Perfil del usuario:
`/admin/editar-perfil/index`

Contactos:
`/admin/contactos`
`/admin/contactos/tabla`

Servicios adicionales:
`/clima → Consulta de clima por API.`
`/soap-form y /soap-calcular → Prueba de servicios SOAP.`
`/contactos-xml → Lectura de contactos desde archivo XML.`

6. Modificaciones de permisos al usuario.

Se modifico el acceso a algunas funcionalidades con @can y condicionales:
`EL usuario no admin ya no tiene acceso a la vista de roles y permisos`
`El usuario no admin ya no tiene permisos para modificar o agregar contactos solo vista de lectura`

