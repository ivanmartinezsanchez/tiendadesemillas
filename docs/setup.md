# Configuración Inicial

Esta guía te ayudará a configurar el entorno de desarrollo para la Tienda de Semillas.

## Requisitos

- PHP 7.4 o superior
- MySQL 5.7 o superior
- Apache
- Composer
- XAMPP (opcional, pero recomendado)

## Instrucciones de Configuración

1. **Clonar el repositorio:**

   ```sh
   git clone https://github.com/tu-usuario/tienda-semillas.git
   cd tienda-semillas

2. Configurar la base de datos:

Crear una base de datos en MySQL llamada tienda_semillas.
Importar el archivo SQL que se encuentra en docs/database.sql.

3. Configurar el archivo de conexión a la base de datos:

Edita config/db.php con tus credenciales de MySQL.

4. Instalar dependencias:

composer install

5. Configurar el servidor web:

Configura Apache para apuntar al directorio del proyecto tienda-semillas.

### Crear la Documentación de la Base de Datos (database.md)**

**docs/database.md**
```markdown
# Base de Datos

Esta sección describe la estructura de la base de datos utilizada en la Tienda de Semillas.

## Estructura de la Base de Datos

### Tabla `productos`

```sql
CREATE TABLE productos (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT(11) NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    destacado BOOLEAN NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

### Tabla `usuarios`

CREATE TABLE usuarios (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

### Tabla `pagos`

CREATE TABLE pagos (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    monto DECIMAL(10, 2) NOT NULL,
    transaccion_id VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


### Crear la Documentación de los Controladores (controllers.md)**

**docs/controllers.md**
```markdown
# Controladores

Los controladores manejan la lógica de la aplicación y la comunicación entre el modelo y la vista.

## Lista de Controladores

1. [ProductController](#productcontroller)
2. [OrderController](#ordercontroller)
3. [UserController](#usercontroller)
4. [PaymentController](#paymentcontroller)

### ProductController

Ubicación: `admin/controllers/ProductController.php`

- `index()`: Muestra la lista de productos.
- `create()`: Muestra el formulario de creación y maneja la lógica para agregar un nuevo producto.
- `edit()`: Muestra el formulario de edición y maneja la lógica para actualizar un producto existente.
- `delete()`: Maneja la lógica para eliminar un producto.

### OrderController

Ubicación: `admin/controllers/OrderController.php`

- `index()`: Muestra la lista de pedidos.
- `delete()`: Maneja la lógica para eliminar un pedido.

### UserController

Ubicación: `admin/controllers/UserController.php`

- `index()`: Muestra la lista de usuarios.
- `delete()`: Maneja la lógica para eliminar un usuario.

### PaymentController

Ubicación: `admin/controllers/PaymentController.php`

- `pay()`: Muestra el formulario de pago y maneja la lógica para procesar pagos mediante Stripe.

