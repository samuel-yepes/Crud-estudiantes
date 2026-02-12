<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## CRUDE SPECIFICACIONES

# #

Proyecto desarrollado para la gestión de estudiantes.

## 💻 Requisitos
* **PostgreSQL**: 15.4
* **php**: 8.2.9
* **Laravel**: 12.0



## ejecutar el proyecto

1. **Clonar el proyecto:**
   `git clone https://github.com/samuel-yepes/Crud-estudiantes.git`

2. **Instalar dependencias:**
   `composer install`

3. **Configurar variables de entorno:**
   - Configurar la conexión a PostgreSQL en el `.env`.

4. **Importar la Base de Datos:**
   - Crear una base de datos llamada `practica` en PostgreSQL.
   - Importar el archivo ubicado en `/Backup_BD/estudiantes.sql` usando pgAdmin o la terminal:
     `psql -U postgres -d practica < db/tu_archivo.sql`

5. **Clave de aplicación y servidor:**
   ```bash
   php artisan key:generate
   php artisan storage:link
   php artisan serve

6. **Variables de entorno:**
    DB_CONNECTION=pgsql
    DB_HOST=local
    DB_PORT=5432
    DB_DATABASE=practica
    DB_USERNAME="nombre"
    DB_PASSWORD="contraseña"

7. **servidor local para corre el proyecto:**
   php artisan serve