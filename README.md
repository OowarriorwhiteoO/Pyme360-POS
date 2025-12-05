# 🏪 Pyme360 POS

Sistema de Punto de Venta (POS) completo diseñado específicamente para pequeñas y medianas empresas. Desarrollado con Laravel, ofrece una solución moderna, intuitiva y eficiente para la gestión de ventas, inventario y reportes.

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green.svg)

## 📋 Descripción

Pyme360 POS es una aplicación web que permite gestionar de manera integral las operaciones diarias de un negocio, desde el registro de productos hasta la generación de reportes de ventas. Diseñado pensando en la facilidad de uso y la eficiencia operativa.

## ✨ Características Principales

-   🛒 **Gestión de Ventas**: Interfaz intuitiva para procesar ventas rápidamente
-   📦 **Control de Inventario**: Gestión completa de productos y stock
-   👥 **Administración de Clientes**: Base de datos de clientes con historial de compras
-   📊 **Dashboard Analítico**: Visualización de métricas clave del negocio
-   🧾 **Generación de Facturas**: Creación automática de documentos de venta
-   📈 **Reportes Detallados**: Informes de ventas, productos más vendidos y más
-   🔐 **Sistema de Autenticación**: Control de acceso seguro para usuarios
-   💰 **Múltiples Métodos de Pago**: Efectivo, tarjeta, transferencia, etc.

## 🛠️ Tecnologías Utilizadas

-   **Framework**: Laravel 12.x
-   **Base de Datos**: MySQL
-   **Frontend**: Blade Templates, Tailwind CSS
-   **Autenticación**: Laravel Breeze
-   **Vite**: Para compilación de assets

## 📋 Requisitos Previos

-   PHP >= 8.2
-   Composer
-   MySQL >= 5.7 o MariaDB >= 10.3
-   Node.js >= 18.x
-   NPM o Yarn

## 🚀 Instalación

1. **Clonar el repositorio**

    ```bash
    git clone https://github.com/OowarriorwhiteoO/Pyme360-POS.git
    cd Pyme360-POS
    ```

2. **Instalar dependencias de PHP**

    ```bash
    composer install
    ```

3. **Instalar dependencias de Node.js**

    ```bash
    npm install
    ```

4. **Configurar el archivo de entorno**

    ```bash
    cp .env.example .env
    ```

5. **Generar la clave de la aplicación**

    ```bash
    php artisan key:generate
    ```

6. **Configurar la base de datos**

    Edita el archivo `.env` y configura tus credenciales de base de datos:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=pyme360_pos
    DB_USERNAME=tu_usuario
    DB_PASSWORD=tu_contraseña
    ```

7. **Ejecutar las migraciones**

    ```bash
    php artisan migrate
    ```

8. **Ejecutar los seeders (opcional)**

    ```bash
    php artisan db:seed
    ```

9. **Compilar los assets**

    ```bash
    npm run dev
    ```

10. **Iniciar el servidor de desarrollo**
    ```bash
    php artisan serve
    ```

La aplicación estará disponible en: `http://localhost:8000`

## 📊 Estructura de la Base de Datos

El sistema incluye las siguientes tablas principales:

-   `users` - Usuarios del sistema
-   `products` - Catálogo de productos
-   `categories` - Categorías de productos
-   `customers` - Clientes
-   `sales` - Registro de ventas
-   `sale_details` - Detalles de cada venta
-   `inventory` - Control de stock

## 🎯 Uso

### Acceso al Sistema

1. Accede a la aplicación en tu navegador
2. Inicia sesión con tus credenciales
3. Navega por el dashboard para acceder a las diferentes funcionalidades

### Procesar una Venta

1. Ve a la sección **"Ventas"**
2. Selecciona o busca el cliente
3. Agrega productos al carrito
4. Selecciona el método de pago
5. Confirma la venta

### Gestionar Productos

1. Accede a **"Productos"**
2. Crea, edita o elimina productos
3. Administra categorías y stock

## 🤝 Contribuciones

Las contribuciones son bienvenidas. Por favor:

1. Haz un Fork del proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📝 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 👨‍💻 Autor

**OowarriorwhiteoO**

-   GitHub: [@OowarriorwhiteoO](https://github.com/OowarriorwhiteoO)
-   Email: warriorwhite@gmail.com

## 🙏 Agradecimientos

-   Laravel Framework
-   Comunidad de código abierto
-   Todos los contribuidores

---

⭐ Si este proyecto te ha sido útil, considera darle una estrella en GitHub!
