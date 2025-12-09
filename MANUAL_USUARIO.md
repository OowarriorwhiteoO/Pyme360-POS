# 📖 Manual de Usuario - Sistema POS Tornillo Dorado

**Versión 1.0** | Ferretería Tornillo Dorado  
**Plataforma**: Sistema de Punto de Venta Web

---

## 📑 Índice

1. [Introducción](#introducción)
2. [Acceso al Sistema](#acceso-al-sistema)
3. [Inicio de Sesión](#inicio-de-sesión)
4. [Panel Principal (Dashboard)](#panel-principal-dashboard)
5. [Módulo de Inventario](#módulo-de-inventario)
6. [Punto de Venta (POS)](#punto-de-venta-pos)
7. [Cerrar Sesión](#cerrar-sesión)
8. [Preguntas Frecuentes](#preguntas-frecuentes)
9. [Solución de Problemas](#solución-de-problemas)

---

## 🎯 Introducción

Bienvenido al Sistema POS de Ferretería Tornillo Dorado. Este sistema te permitirá:

-   ✅ Ver y buscar productos del inventario
-   ✅ Agregar nuevos productos al catálogo
-   ✅ Realizar ventas de manera rápida y eficiente
-   ✅ Controlar el stock de productos automáticamente
-   ✅ Ver estadísticas del negocio en el dashboard

Este manual te guiará paso a paso en el uso de todas las funcionalidades del sistema.

---

## 🌐 Acceso al Sistema

### Dirección Web

Para acceder al sistema, abre tu navegador web (Chrome, Firefox, Edge, etc.) e ingresa la siguiente dirección:

```
https://pyme360-pos.onrender.com
```

> **⚠️ IMPORTANTE**: Asegúrate de usar **https://** (con "s") para una conexión segura.

### Requisitos del Navegador

-   ✅ Google Chrome (recomendado)
-   ✅ Mozilla Firefox
-   ✅ Microsoft Edge
-   ✅ Safari (Mac)

---

## 🔐 Inicio de Sesión

### Paso 1: Abrir la Página de Login

Al acceder al sistema, verás la página de inicio de sesión con:

-   🔩 Logo de Tornillo Dorado (izquierda)
-   📝 Formulario de login (derecha)

### Paso 2: Ingresar Credenciales

1. **Email o Usuario**: Ingresa tu correo electrónico

2. **Contraseña**: Ingresa tu contraseña

    - La contraseña está oculta por seguridad

3. **(Opcional) Recuérdame**: Marca esta casilla si quieres que el sistema recuerde tu sesión

### Paso 3: Iniciar Sesión

-   Click en el botón **"Iniciar Sesión"** (morado)
-   El sistema validará tus credenciales
-   Si todo está correcto, serás redirigido al Dashboard

### ⚠️ Problemas al Iniciar Sesión

Si aparece el error **"Las credenciales no coinciden"**:

1. Verifica que el email esté escrito correctamente
2. Verifica que la contraseña sea la correcta
3. Asegúrate de NO tener activado MAYÚS (Caps Lock)

---

## 📊 Panel Principal (Dashboard)

Al iniciar sesión, llegarás al **Dashboard** (panel principal).

### ¿Qué muestra el Dashboard?

El Dashboard te presenta un resumen general del negocio:

#### 📈 Tarjetas de Estadísticas

1. **Productos Totales**

    - Muestra cuántos productos hay en el catálogo
    - Incluye productos con y sin stock

2. **Stock Total**

    - Suma de todas las unidades disponibles
    - Ayuda a controlar el inventario general

3. **Ventas del Mes**

    - Total de ventas realizadas en el mes actual
    - Se actualiza automáticamente con cada venta

4. **Productos Bajo Stock**
    - Lista productos con stock crítico (menos de 5 unidades)
    - ⚠️ ALERTA: Estos productos necesitan reposición urgente

### Navegación Principal

En la parte superior verás el **menú de navegación**:

-   🏠 **Inicio**: Volver al Dashboard
-   📦 **Productos**: Ver inventario completo
-   💰 **Vender**: Abrir punto de venta
-   🚪 **Salir**: Cerrar sesión

---

## 📦 Módulo de Inventario

Para acceder al inventario, click en **"Productos"** en el menú superior.

### Visualizar Productos

La pantalla de inventario muestra una tabla con:

| Columna      | Descripción                              |
| ------------ | ---------------------------------------- |
| **SKU**      | Código único del producto (ej: MAR-0001) |
| **Producto** | Nombre completo del producto             |
| **Precio**   | Precio de venta al público               |
| **Stock**    | Cantidad disponible en almacén           |

#### Indicadores de Stock

-   🟢 **Verde**: Stock normal (5 o más unidades)
-   🔴 **Rojo "Crítico"**: Stock bajo (menos de 5 unidades)

### Buscar Productos

Para buscar un producto específico:

1. Ubica el **cuadro de búsqueda** en la parte superior
2. Escribe el nombre del producto o su código SKU
3. Click en el botón **"Buscar"** (azul)
4. Los resultados se filtrarán automáticamente

**Ejemplos de búsqueda:**

-   "Martillo" → Muestra todos los martillos
-   "MAR-0001" → Muestra el producto con ese SKU específico
-   "Stanley" → Muestra todos los productos de esa marca

### Agregar Nuevo Producto

Para agregar un producto al catálogo:

#### Paso 1: Abrir Formulario

-   Click en el botón **"+ Nuevo Producto"** (verde, esquina superior derecha)
-   Se abrirá un modal/ventana emergente

#### Paso 2: Llenar Datos del Producto

**Campos obligatorios (marcados con \*):**

1. **SKU\***

    - Código único del producto
    - Ejemplo: `TAL-0025`
    - ⚠️ No puede repetirse con otro producto

2. **Nombre del Producto\***

    - Nombre descriptivo
    - Ejemplo: `Taladro Bosch Profesional 13mm`

3. **Precio Costo\***

    - Lo que nos costó comprar el producto
    - Ejemplo: `45000` (solo números, sin puntos ni símbolos)

4. **Precio Venta\***

    - Lo que cobraremos al cliente
    - Ejemplo: `63000`
    - Debe ser mayor al precio de costo para tener ganancia

5. **Stock Inicial\***

    - Cantidad de unidades que estamos ingresando
    - Ejemplo: `50`

6. **Stock Mínimo\***

    - Cantidad mínima antes de alertar reposición
    - Recomendado: `5`

7. **Categoría\***

    - Selecciona de la lista desplegable:
        - Herramientas Manuales
        - Herramientas Eléctricas
        - Fijaciones
        - Pinturas y Accesorios
        - Plomería
        - Electricidad
        - Seguridad
        - Medición
        - Adhesivos
        - Jardinería

8. **Descripción** (opcional)
    - Información adicional del producto
    - Ejemplo: `Taladro percutor con cable, potencia 650W`

#### Paso 3: Guardar

-   Verifica que todos los datos estén correctos
-   Click en **"Guardar Producto"** (botón morado)
-   El sistema validará los datos
-   Si todo está correcto, verás el mensaje: ✅ **"Producto creado exitosamente"**
-   La página se recargará mostrando el nuevo producto

#### Paso 4: Cancelar

Si deseas cancelar la creación:

-   Click en **"Cancelar"**
-   Click fuera del modal
-   Los datos no se guardarán

### Paginación

Si tienes más de 10 productos, verás controles de paginación en la parte inferior:

-   **← Anterior**: Ver página anterior
-   **Números**: Saltar a una página específica
-   **Siguiente →**: Ver página siguiente

---

## 💰 Punto de Venta (POS)

Para realizar una venta, click en **"Vender"** en el menú superior.

### Interfaz del POS

La pantalla se divide en dos secciones:

**Izquierda**: Catálogo de productos disponibles  
**Derecha**: Carrito de compras / Ticket actual

### Realizar una Venta - Paso a Paso

#### Paso 1: Buscar Producto

En el cuadro de búsqueda (parte superior izquierda):

1. Escribe el nombre del producto o su SKU
2. Los productos se filtran automáticamente mientras escribes
3. No necesitas presionar "Enter" o "Buscar"

**Ejemplo:**

-   Escribes "mart" → Aparecen todos los martillos
-   Escribes "MAR-0001" → Aparece ese producto específico

#### Paso 2: Agregar al Carrito

Cuando encuentres el producto que buscas:

1. **Click en el producto** (cualquier parte de su tarjeta)
2. El producto se agregará al carrito (lado derecho)
3. Verás una notificación: ✅ **"Producto agregado"**

#### Paso 3: Ajustar Cantidades

En el carrito (lado derecho), cada producto muestra:

-   Nombre del producto
-   Precio unitario
-   Cantidad
-   Subtotal

**Para aumentar cantidad:**

-   Click en el botón **"+"**
-   La cantidad aumentará de 1 en 1
-   El subtotal se recalcula automáticamente

**Para disminuir cantidad:**

-   Click en el botón **"-"**
-   La cantidad disminuirá de 1 en 1
-   Si llegas a 0, el producto se elimina automáticamente

**Para eliminar producto:**

-   Click en el ícono de **"🗑️ Basura"**
-   El producto se quita del carrito inmediatamente

#### Paso 4: Verificar Total

En la parte inferior derecha verás:

-   **"TOTAL A PAGAR"**: Suma de todos los subtotales
-   Formato: $41.300 (con puntos de miles)

#### Paso 5: Confirmar Venta

Cuando el carrito esté completo:

1. Click en el botón **"CONFIRMAR VENTA"** (verde, grande, parte inferior)

2. Se abrirá un **modal de confirmación** mostrando:

    - 💰 Ícono de dinero
    - "¿Confirmar Pago?"
    - Monto total a cobrar
    - Mensaje: "Se registrará la venta y se descontará el stock"

3. **Opciones:**

    - **"Cancelar"**: Cerrar el modal y volver a editar el carrito
    - **"✔ Aceptar"**: Procesar la venta

4. Click en **"✔ Aceptar"**

5. El sistema:

    - Guarda la venta en la base de datos
    - Descuenta el stock de cada producto vendido
    - Muestra notificación: ✅ **"¡Venta registrada exitosamente!"**
    - Recarga la página automáticamente

6. El carrito se vacía y puedes iniciar una nueva venta

### ⚠️ Alertas Durante la Venta

#### Stock Insuficiente

Si intentas agregar más unidades de las disponibles:

-   Verás una notificación: ⚠️ **"No hay más stock disponible"**
-   La cantidad NO aumentará
-   Verifica el stock disponible en la tarjeta del producto

#### Producto Sin Stock

Los productos sin stock NO aparecen en el catálogo del POS.

-   Solo se muestran productos con stock > 0
-   Si necesitas vender un producto sin stock, primero agrégalo al inventario

#### Carrito Vacío

Si intentas confirmar venta con el carrito vacío:

-   Verás: ❌ **"El carrito está vacío"**
-   Agrega al menos un producto antes de confirmar

---

## 🚪 Cerrar Sesión

Para salir del sistema de forma segura:

### Opción 1: Menú Superior

1. Click en **"Salir"** en el menú de navegación (esquina superior derecha)
2. Serás redirigido a la pantalla de login
3. Tu sesión se cerrará automáticamente

### Opción 2: Cerrar Navegador

-   Simplemente cierra la pestaña o el navegador
-   Si NO marcaste "Recuérdame", tu sesión expirará

> **💡 Tip**: Siempre cierra sesión si trabajas en una computadora compartida.

---

## ❓ Preguntas Frecuentes

### ¿Puedo ver las ventas realizadas?

Actualmente el sistema muestra:

-   Total de ventas del mes en el Dashboard
-   Los datos de ventas se almacenan en la base de datos

Una futura actualización incluirá un módulo de reportes de ventas.

### ¿Puedo editar un producto existente?

En la versión actual, puedes:

-   ✅ Ver productos
-   ✅ Buscar productos
-   ✅ Agregar nuevos productos

La funcionalidad de editar productos se agregará en una próxima actualización.

### ¿Puedo eliminar un producto?

Actualmente no hay opción de eliminar productos desde la interfaz.
Esto previene borrados accidentales.

### ¿Qué pasa si vendo un producto y luego me arrepiento?

El sistema NO permite cancelar ventas una vez confirmadas.
⚠️ **Importante**: Verifica bien el carrito antes de confirmar.

### ¿Puedo imprimir el ticket de venta?

La versión actual no incluye impresión de tickets.
Puedes usar la función de impresión del navegador (Ctrl+P) como alternativa.

### ¿El sistema funciona sin internet?

❌ No. El sistema requiere conexión a internet para:

-   Acceder a la aplicación web
-   Guardar ventas en la base de datos
-   Actualizar stock en tiempo real

---

## 🔧 Solución de Problemas

### Problema: No carga la página

**Posibles causas:**

1. No hay conexión a internet
2. El servidor está en mantenimiento (raro)
3. URL incorrecta

**Soluciones:**

-   Verifica tu conexión a internet
-   Verifica que la URL sea: `https://pyme360-pos.onrender.com`
-   Intenta recargar la página (F5)
-   Espera 1-2 minutos si el servidor estaba inactivo (Render free tier)

### Problema: Mensaje "Error de conexión"

**Causas:**

-   Conexión a internet inestable
-   Timeout del servidor

**Soluciones:**

-   Verifica tu conexión WiFi/Ethernet
-   Recarga la página
-   Intenta de nuevo en unos segundos

### Problema: "Las credenciales no coinciden"

**Causas:**

-   Email incorrecto
-   Contraseña incorrecta
-   MAYÚS (Caps Lock) activado

**Soluciones:**

-   Verifica que el email esté bien escrito
-   Verifica que la contraseña sea la correcta
-   Verifica que MAYÚS esté desactivado
-   Contacta al administrador si olvidaste tu contraseña

### Problema: Los productos no aparecen en el POS

**Causas:**

-   Los productos no tienen stock
-   Problema de carga de la página

**Soluciones:**

-   Verifica en "Productos" que haya stock disponible
-   Recarga la página del POS (F5)
-   Cierra sesión y vuelve a entrar

### Problema: El botón "Nuevo Producto" no responde

**Causas:**

-   JavaScript no cargó correctamente
-   Navegador no compatible

**Soluciones:**

-   Recarga la página (F5)
-   Limpia la caché del navegador (Ctrl+Shift+Del)
-   Prueba con otro navegador (Chrome recomendado)

### Problema: La página se ve mal o descuadrada

**Causas:**

-   Navegador desactualizado
-   Zoom del navegador alterado

**Soluciones:**

-   Actualiza tu navegador a la última versión
-   Restablece el zoom al 100% (Ctrl+0)
-   Recarga la página sin caché (Ctrl+Shift+R)

---

## 📞 Soporte Técnico

Si experimentas problemas que no puedes resolver con este manual:

1. **Anota el error**: Copia el mensaje de error exacto
2. **Toma captura**: Toma una captura de pantalla del problema
3. **Reporta**: Contacta al administrador del sistema
4. **Información útil**:
    - ¿Qué estabas haciendo cuando ocurrió?
    - ¿Qué navegador usas?
    - ¿El error se repite siempre?

---

## 📝 Notas Finales

-   **Seguridad**: Nunca compartas tu contraseña con nadie
-   **Navegador**: Usa siempre la última versión de Chrome para mejor experiencia
-   **HTTPS**: Verifica siempre que la URL tenga el candado 🔒 de seguridad
-   **Cierre de sesión**: Cierra sesión al terminar tu turno
-   **Datos sensibles**: El sistema NO almacena datos sensibles de clientes

---

## 📖 Historial de Versiones

### Versión 1.0 (Actual)

-   ✅ Sistema de login
-   ✅ Dashboard con estadísticas
-   ✅ Inventario con búsqueda
-   ✅ Creación de productos
-   ✅ Punto de venta completo
-   ✅ Control automático de stock

---

**© 2025 Ferretería Tornillo Dorado**  
Sistema desarrollado como proyecto académico para AIEP  
Taller de Proyecto de Especialidad
