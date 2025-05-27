# 🛍️TaponShop - Tienda en Línea

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

## ⚙️ Infraestructura y entorno

### 🔧 Tecnologías principales

| Componente       | Tecnología                         |
|------------------|-------------------------------------|
| Contenedor       | **Docker**                         |
| Orquestación     | **Docker Compose**                 |
| Servidor web     | **Apache**                         |
| Base de datos    | **MariaDB 11.3**                   |
| Backend          | **PHP 8.2**                        |
| Autenticación    | **Firebase Authentication**        |
| Frontend         | HTML, CSS, JavaScript, jQuery      |
| API de Tracking  | **Node.js + Express**              |
| Pagos            | **Wompi El Salvador**             |

### 📦 Dependencias PHP (Composer)

- **firebase/php-jwt**: Validación y decodificación de tokens JWT.
- **guzzlehttp/guzzle**: Cliente HTTP para peticiones (ej. Wompi).
- **vlucas/phpdotenv**: Manejo de variables de entorno.
- **monolog/monolog**: Logging.
- **symfony/***: Paquetes para manejo de consola, HTTP foundation, eventos, etc.

### 📦 Dependencias Node.js (API de seguimiento)

- **express**: Framework web para manejar rutas `/tracking`.
- **cors**: Middleware para permitir peticiones desde otros orígenes.
- **ngrok**: Exposición del servidor local a internet.
- **mysql2/promise**: Cliente MySQL con soporte para promesas.

---

## 📦 Estructura del proyecto

| Carpeta          | Descripción                                   |
|------------------|-----------------------------------------------|
| `/admin`         | Panel de administración                      |
| `/carrito`       | Carrito, historial, detalle de pedido         |
| `/productos`     | Catálogo y vista por categorías               |
| `/includes`      | Conexiones, headers, footers                  |
| `/assets/css`    | Archivos CSS organizados por módulo           |
| `/tracking.js`   | API Node.js para seguimiento de envíos        |
| `/firebase`      | Scripts de autenticación y logout             |

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
