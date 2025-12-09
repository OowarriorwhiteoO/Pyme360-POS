# 🔩 Sistema POS - Ferretería Tornillo Dorado

Sistema de Punto de Venta (POS) desarrollado como proyecto académico para **AIEP** - Ramo: **TALLER DE PROYECTO DE ESPECIALIDAD**.

Aplicación web para gestión de inventario y ventas de la Ferretería Tornillo Dorado, desarrollada con Laravel 12 y PostgreSQL.

## 📋 Descripción del Proyecto

Sistema completo de gestión para ferretería que incluye:

-   **Punto de Venta (POS)** con interfaz intuitiva
-   **Gestión de Inventario** con control de stock
-   **Búsqueda en tiempo real** de productos
-   **Registro de ventas** con descuento automático de stock
-   **Dashboard** con métricas del negocio

## 🚀 Demo en Vivo

🌐 **URL**: [https://pyme360-pos.onrender.com](https://pyme360-pos.onrender.com)

> **Nota**: La aplicación está desplegada en Render con plan gratuito. El primer acceso puede tardar ~50 segundos mientras el servidor se activa.

## 🛠️ Tecnologías Utilizadas

### Backend

-   **Laravel 12** - Framework PHP
-   **PostgreSQL** - Base de datos relacional
-   **PHP 8.2** - Lenguaje de programación

### Frontend

-   **Blade Templates** - Motor de plantillas de Laravel
-   **Alpine.js** - Framework JavaScript reactivo
-   **Tailwind CSS** - Framework de CSS

### DevOps

-   **Docker** - Contenedorización
-   **Render.com** - Plataforma de deployment
-   **GitHub** - Control de versiones

## 📦 Estructura del Proyecto

```
Pyme360-POS/
├── app/
│   ├── Http/Controllers/    # Controladores de la aplicación
│   └── Models/              # Modelos de datos (Product, Sale, User)
├── database/
│   ├── migrations/          # Migraciones de base de datos
│   └── seeders/             # Datos de prueba
├── resources/
│   └── views/               # Vistas Blade
│       ├── auth/            # Login y autenticación
│       ├── sales/           # Punto de venta
│       └── products/        # Gestión de inventario
├── routes/
│   └── web.php             # Definición de rutas
├── Dockerfile              # Configuración Docker
└── README.md
```

## 🎯 Funcionalidades Principales

### 1. Autenticación

-   Sistema de login seguro
-   Sesiones protegidas con middleware
-   Validación de credenciales

### 2. Punto de Venta

-   Búsqueda rápida de productos por nombre o SKU
-   Carrito de compras interactivo
-   Cálculo automático de totales
-   Confirmación de venta con modal
-   Descuento automático de stock

### 3. Gestión de Inventario

-   Vista completa del catálogo de productos
-   Información de stock en tiempo real
-   Categorización de productos
-   Precios de costo y venta

### 4. Dashboard

-   Resumen de ventas
-   Alertas de stock bajo
-   Estadísticas del negocio

## 💻 Instalación Local

### Requisitos Previos

-   PHP >= 8.2
-   Composer
-   PostgreSQL (o SQLite para desarrollo)
-   Node.js (opcional, para assets)

### Pasos de Instalación

1. **Clonar el repositorio**

```bash
git clone https://github.com/OowarriorwhiteoO/Pyme360-POS.git
cd Pyme360-POS
```

2. **Instalar dependencias**

```bash
composer install
```

3. **Configurar variables de entorno**

```bash
cp .env.example .env
php artisan key:generate
```

4. **Configurar base de datos** (editar `.env`)

```env
DB_CONNECTION=sqlite
# O para PostgreSQL:
# DB_CONNECTION=pgsql
# DB_HOST=127.0.0.1
# DB_PORT=5432
# DB_DATABASE=pyme360
```

5. **Ejecutar migraciones y seeders**

```bash
php artisan migrate --seed
```

6. **Iniciar servidor de desarrollo**

```bash
php artisan serve
```

7. **Acceder a la aplicación**

```
http://localhost:8000
```

## 🗄️ Base de Datos

### Diagrama Entidad-Relación

```
┌─────────────┐       ┌─────────────┐       ┌──────────────┐
│   users     │       │    sales    │       │   products   │
├─────────────┤       ├─────────────┤       ├──────────────┤
│ id          │       │ id          │       │ id           │
│ name        │       │ total       │       │ sku          │
│ email       │       │ items_count │       │ name         │
│ password    │       │ status      │       │ price_cost   │
│ created_at  │       │ created_at  │       │ price_sale   │
│ updated_at  │       └─────────────┘       │ stock        │
└─────────────┘              │              │ stock_min    │
                             │              │ category     │
                             ▼              └──────────────┘
                    ┌──────────────┐               │
                    │ sale_details │               │
                    ├──────────────┤               │
                    │ id           │               │
                    │ sale_id      │◄──────────────┘
                    │ product_id   │
                    │ quantity     │
                    │ price        │
                    │ subtotal     │
                    └──────────────┘
```

### Tablas Principales

-   **users**: Usuarios del sistema
-   **products**: Catálogo de productos
-   **sales**: Cabecera de ventas
-   **sale_details**: Detalle de productos vendidos

## 🎨 Interfaz de Usuario

### Diseño Responsivo

-   ✅ Desktop (1920x1080)
-   ✅ Tablet (768x1024)
-   ✅ Mobile (375x667)

### Paleta de Colores

-   **Principal**: Morado (`#7C3AED`) - Identidad de marca
-   **Éxito**: Verde (`#10B981`) - Confirmaciones
-   **Error**: Rojo (`#EF4444`) - Alertas
-   **Neutro**: Grises - Contenido

## 🔒 Seguridad

-   ✅ Protección CSRF en formularios
-   ✅ Validación de datos en backend
-   ✅ Sanitización de inputs
-   ✅ Sesiones seguras
-   ✅ Passwords hasheados (bcrypt)
-   ✅ HTTPS en producción

## 📊 Datos de Prueba

El seeder incluye:

-   **1 usuario** administrador
-   **300 productos** distribuidos en 10 categorías:
    -   Herramientas Manuales
    -   Herramientas Eléctricas
    -   Fijaciones
    -   Pinturas y Accesorios
    -   Plomería
    -   Electricidad
    -   Seguridad
    -   Medición
    -   Adhesivos
    -   Jardinería

## 🚢 Deployment

### Plataforma: Render.com

La aplicación está desplegada usando Docker en Render con:

-   **Runtime**: PHP 8.2 en contenedor Docker
-   **Base de Datos**: PostgreSQL (gestionada por Render)
-   **Auto-deploy**: Activado en rama `main`

### Variables de Entorno Requeridas

```env
APP_KEY=               # Generado con php artisan key:generate
APP_ENV=production
APP_DEBUG=false
DB_CONNECTION=pgsql
DB_HOST=               # Provisto por Render
DB_DATABASE=           # Provisto por Render
DB_USERNAME=           # Provisto por Render
DB_PASSWORD=           # Provisto por Render
```

## 📝 Licencia

Este proyecto fue desarrollado con fines educativos como parte del ramo **TALLER DE PROYECTO DE ESPECIALIDAD** en **AIEP**.

## 👨‍💻 Autor

Proyecto desarrollado para:

-   **Instituto**: AIEP
-   **Ramo**: Taller de Proyecto de Especialidad
-   **Cliente**: Ferretería Tornillo Dorado
-   **Año**: 2025

---

**Nota**: Este es un proyecto académico desarrollado para demostrar conocimientos en desarrollo web full-stack con Laravel y despliegue en producción.
