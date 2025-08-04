# examen1p-edubatery1
Proyecto Laravel para tienda de baterías de autos
---
## Requisitos Previos

Antes de ejecutar este proyecto, asegúrate de tener instalado:

- PHP >= 8.2
- Composer
- MySQL o MariaDB
- Laravel >= 12
- Postman
- XAMPP o similar (Apache + MySQL)
- Visual Studio Code (opcional)

## Instalación y Configuración

1. **Clonar el repositorio**
```bash
git clone https://github.com/EduardoMaida89/examen1p-edubatery1.git
cd examen1p-edubatery1
Instalar dependencias
composer install

Copiar,Editar
cp .env.example .env
Configura en .env tu conexión a la base de datos:

DB_CONNECTION=mysql,sqlite u otro.
DB_DATABASE=examen1p
DB_USERNAME=root
DB_PASSWORD=

Generar clave de aplicación
php artisan key:generate

Ejecutar migraciones
php artisan migrate

Instalar Laravel Sanctum
(Si no está ya instalado)
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate

Levantar el servidor
php artisan serve
Accede a: http://127.0.0.1:8000

