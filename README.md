# 🛒 Catálogo de Productos - Laravel

Aplicación web desarrollada con **Laravel 11** que permite gestionar un catálogo de productos mediante operaciones CRUD completas, aplicando arquitectura **MVC**.

---

## 📸 Características

- ✅ Listar productos con paginación
- ✅ Crear, editar y eliminar productos
- ✅ Validación de formularios
- ✅ Interfaz responsiva con Bootstrap 5
- ✅ Arquitectura MVC con Eloquent ORM
- ✅ Vistas dinámicas con Blade Templates

---

## ⚙️ Requisitos previos

Antes de instalar el proyecto asegúrate de tener lo siguiente:

| Herramienta | Versión mínima | Descarga |
|-------------|---------------|----------|
| PHP | 8.1+ | https://www.php.net |
| Composer | 2.x | https://getcomposer.org |
| MySQL | 5.7+ | https://www.mysql.com (o via XAMPP) |
| XAMPP | 8.x | https://www.apachefriends.org |
| Git | cualquiera | https://git-scm.com |

---

## 🚀 Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/Robert-021/LaravelProducto.git
cd LaravelProducto
```

### 2. Instalar dependencias

```bash
composer install
```

### 3. Configurar el entorno

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configurar la base de datos

Abre el archivo `.env` y edita estas líneas con tus datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=catalogo_productos
DB_USERNAME=root
DB_PASSWORD=
```

> 💡 En XAMPP el usuario por defecto es `root` y la contraseña está vacía.

### 5. Crear la base de datos

Abre **phpMyAdmin** en `http://localhost/phpmyadmin` y crea una base de datos llamada `catalogo_productos`.

### 6. Ejecutar las migraciones

```bash
php artisan migrate
```

### 7. Iniciar el servidor

```bash
php artisan serve
```

Abre tu navegador en: **http://localhost:8000**

---

## 📁 Estructura del proyecto

```
catalogo-productos/
├── app/
│   ├── Http/Controllers/
│   │   └── ProductoController.php   # Controlador CRUD
│   └── Models/
│       └── Producto.php             # Modelo Eloquent
├── database/
│   └── migrations/
│       └── ..._create_productos_table.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php        # Layout principal
│       └── productos/
│           ├── index.blade.php      # Lista de productos
│           ├── create.blade.php     # Formulario crear
│           ├── edit.blade.php       # Formulario editar
│           ├── show.blade.php       # Detalle del producto
│           └── _form.blade.php      # Formulario parcial
└── routes/
    └── web.php                      # Rutas de la aplicación
```

---

## 🗄️ Estructura de la tabla `productos`

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | bigint | Clave primaria |
| nombre | varchar | Nombre del producto |
| descripcion | text | Descripción (opcional) |
| precio | decimal(8,2) | Precio del producto |
| stock | integer | Cantidad disponible |
| categoria | varchar | Categoría del producto |
| created_at | timestamp | Fecha de creación |
| updated_at | timestamp | Fecha de actualización |

---

## 🛣️ Rutas disponibles

| Método | URL | Descripción |
|--------|-----|-------------|
| GET | /productos | Lista todos los productos |
| GET | /productos/create | Formulario de creación |
| POST | /productos | Guarda un nuevo producto |
| GET | /productos/{id} | Muestra un producto |
| GET | /productos/{id}/edit | Formulario de edición |
| PUT | /productos/{id} | Actualiza un producto |
| DELETE | /productos/{id} | Elimina un producto |

---

## 🧰 Tecnologías utilizadas

- **Laravel 11** - Framework PHP
- **Eloquent ORM** - Mapeo objeto-relacional
- **Blade** - Motor de plantillas
- **Bootstrap 5** - Framework CSS
- **MySQL** - Base de datos
- **XAMPP** - Entorno de desarrollo local

---

## 👤 Autor

**Robert-021**  
GitHub: [@Robert-021](https://github.com/Robert-021)

---

## 📄 Licencia

Este proyecto es de uso educativo y está bajo la licencia [MIT](https://opensource.org/licenses/MIT).