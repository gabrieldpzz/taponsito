# 🛍️ TaponShop - Tienda en Línea

**Perolito Shop** es una tienda en línea moderna y funcional desarrollada con PHP, MySQL, Firebase Authentication y Docker. Ofrece una experiencia completa de compra para clientes y herramientas de gestión eficientes para administradores.

---

## 🚀 Funcionalidades principales

### 🛒 Para los Clientes

- Registro e inicio de sesión con **Firebase Authentication**
- Catálogo de productos filtrado por categoría
- Carrito de compras con variantes (color, talla, etc.)
- Aplicación de cupones de descuento
- Métodos de entrega: **domicilio** o **recoger en sucursal**
- Pagos integrados con **Wompi El Salvador**
- Historial de pedidos y seguimiento de envíos
- Visualización del estado del pedido y copia de código de rastreo

### 🔐 Para los Administradores

- Gestión de productos (crear, editar, eliminar)
- Visualización y control de pedidos y sus estados
- Administración de cupones, usuarios y sucursales
- Generación de reportes gráficos de ventas y comportamiento
- Panel intuitivo y responsive con filtros dinámicos
- Edición de estado de envío y generación de seguimientos mediante API propia

---

## 🛠️ Funciones generales del sistema

| Categoría         | Funcionalidades                                                                 |
|-------------------|---------------------------------------------------------------------------------|
| **Infraestructura** | Docker, Apache, PHP 8.2, MariaDB, Node.js, Composer, npm                      |
| **Autenticación**   | Firebase Authentication (registro, login, logout)                            |
| **Asistente AI**    | Gemini (sugerencias de productos e interacción contextual)                    |
| **Pagos**           | Integración con Wompi El Salvador (token + enlaces + webhook)                |
| **Seguimiento**     | API propia en Node.js para seguimiento de envíos (/tracking)                 |
| **UI adaptable**    | Estilos CSS separados por página / módulo                                    |

---

## 📦 Módulos principales

### 🧾 Carrito y pedidos

| Archivo/Módulo               | Función                                                                 |
|------------------------------|-------------------------------------------------------------------------|
| `actions/add_to_cart.php`    | Agrega productos al carrito                                            |
| `actions/remove_from_cart.php` | Elimina productos del carrito                                         |
| `actions/apply_coupon.php`   | Aplica cupones de descuento al total del carrito                       |
| `actions/create_order.php`   | Crea un pedido, aplica cupones, genera enlace Wompi, y redirige al pago|
| `carrito/index.php`          | Vista principal del carrito del cliente                               |
| `carrito/checkout.php`       | Formulario de pago y entrega                                           |
| `carrito/confirmacion.php`   | Página que se muestra tras un pago exitoso                            |
| `carrito/historial.php`      | Historial de pedidos del cliente                                      |
| `carrito/generar_factura.php`| Genera un PDF con los datos de la compra                              |

### 📦 Productos

| Archivo/Módulo               | Función                                                                 |
|------------------------------|-------------------------------------------------------------------------|
| `productos/index.php`        | Catálogo general de productos                                          |
| `productos/detalle.php`      | Página de detalle individual del producto                             |
| `productos/categoria.php`    | Filtro y búsqueda por categoría                                       |

### 🧑‍💼 Administración (Panel admin)

| Archivo                      | Función                                                                 |
|------------------------------|-------------------------------------------------------------------------|
| `admin/index.php`            | Panel principal                                                       |
| `admin/productos.php`        | Gestión de productos (lista)                                          |
| `admin/nuevo_producto.php`   | Formulario para agregar productos                                      |
| `admin/editar_producto.php`  | Edición de productos existentes                                       |
| `admin/pedidos.php`          | Listado y gestión de pedidos                                          |
| `admin/detalle_pedido.php`   | Ver y editar detalles de pedidos                                      |
| `admin/cupones.php`          | Gestión de cupones de descuento                                       |
| `admin/usuarios.php`         | Gestión de usuarios registrados                                       |
| `admin/actualizar_estado_envio.php` | Cambia estado del envío en pedidos                             |
| `admin/reportes.php`         | Estadísticas y reportes de ventas                                     |
| `admin/generar-etiqueta.php` | Generación de etiquetas de envío                                      |

### 💳 Pagos Wompi

| Archivo                      | Función                                                                 |
|------------------------------|-------------------------------------------------------------------------|
| `wompi/wompi_token.php`      | Solicita token OAuth2 a Wompi                                          |
| `wompi/response.php`         | Procesa la respuesta del cliente tras pagar                           |
| `wompi/webhook.php`          | Webhook para recibir notificaciones de estado desde Wompi             |

### 📦 Seguimiento de pedidos

| Archivo                      | Función                                                                 |
|------------------------------|-------------------------------------------------------------------------|
| `taponshop_api/tracking.js`  | API REST para registrar y consultar estado de envíos (/tracking)       |
| `tracking.php`               | Página pública para rastrear un pedido                                |
| `admin/actualizar_estado_envio.php` | Actualiza manualmente el estado del envío en el admin           |

### 🧠 Asistente IA Gemini

| Archivo                      | Función                                                                 |
|------------------------------|-------------------------------------------------------------------------|
| `gemini/consulta.php`        | Endpoint que recibe preguntas del usuario                              |
| `gemini/registrar_sugerencia.php` | Guarda sugerencias si el producto no existe                      |
| `includes/ver_sugerencias.php` | Admin puede revisar lo que buscan los clientes                      |

---

## 📈 Reportes inteligentes

Incluye gráficos avanzados:

- **Ventas** por día, semana, mes o año
- **Productos más vendidos**
- **Promedio por pedido** por categoría
- **Análisis de ventas** por categoría
- **Exportación de gráficos a PDF**

---

## 🌐 Requisitos del entorno

### Para PHP:
- **PHP 8.2** con extensiones:
  - `pdo_mysql`
  - `gd`
  - `json`
  - `curl`
- **Apache** con `mod_rewrite` habilitado.

### Para Node.js:
- **Node.js >= v18** (para compatibilidad con `express@5`).
- Permisos para usar puertos (3000) y conexión a MariaDB.

### Para MariaDB:
- Expuesto en el puerto **3306** en Docker.
- Usuarios configurados correctamente (`root`, `tienda_user`).
- Permitir conexiones desde `%`.

---

## 🔧 Tecnologías combinadas

- **PHP 8.2**
- **MariaDB 11.x**
- **JavaScript (ES6+, Vanilla)**
- **Firebase Auth**
- **Node.js 18+ con Express y MySQL**
- **Composer (Guzzle, JWT, Dotenv, etc.)**
- **Docker + Docker Compose**
- **CSS modularizado por página**
- **API REST privada /tracking**
- **Wompi API (OAuth2, pagos, webhooks)**
- **Gemini IA (preguntas y sugerencias)**

---

## 🧪 Cómo probar la app

1. **Clona el repositorio**:
   ```bash
   git clone https://github.com/tu-repositorio/perolito-shop.git
   cd perolito-shop
   ```

2. **Configura tu archivo `.env`**:
   - Variables de entorno para PHP:
     ```
     DB_HOST=html_db_1
     DB_NAME=perolito_db
     DB_USER=root
     DB_PASS=tu_contraseña
     API_URL=http://localhost
     ```
   - Variables de entorno para Node.js:
     ```json
     {
       "DB_HOST": "localhost",
       "DB_USER": "root",
       "DB_PASS": "tu_contraseña",
       "DB_NAME": "perolito_db"
     }
     ```

3. **Levanta los contenedores con Docker Compose**:
   ```bash
   docker-compose up -d
   ```

4. **Configura Firebase**:
   - Integra las claves de tu Firebase Web App en el frontend.

5. **Ejecuta el servicio de tracking**:
   ```bash
   cd tracking.js
   npm install
   node tracking.js
   ```

6. **Accede a la app**:
   - Navega a [http://localhost](http://localhost).

---

## 🔐 Seguridad

- Autenticación gestionada con **Firebase**.
- Rutas protegidas por sesión de usuario y roles.
- Código estructurado para evitar inyecciones SQL (PDO preparado).
- Webhooks de Wompi accesibles desde el exterior (usando `ngrok`).

---

## ✨ Contribuciones

Este proyecto fue desarrollado como parte de un ejercicio académico, pero su arquitectura permite escalarlo fácilmente.

---

## 📅 Fecha del último despliegue

**26 de mayo de 2025**

---

## 👤 Desarrollado por

**TaponsitoWorks 🧠**  
Contacto: [taponsitoaeiou@gmail.com](mailto:taponsitoaeiou@gmail.com)
