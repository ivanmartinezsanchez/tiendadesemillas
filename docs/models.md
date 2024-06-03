# Modelos

Los modelos representan la estructura de los datos y manejan las interacciones con la base de datos.

## Lista de Modelos

1. [Product](#product)
2. [Order](#order)
3. [User](#user)
4. [Payment](#payment)

### Product

Ubicación: `admin/models/Product.php`

Propiedades:
- `id`
- `nombre`
- `descripcion`
- `precio`
- `stock`
- `imagen`
- `destacado`

Métodos:
- `getAll()`
- `create()`
- `update()`
- `delete()`

### Order

Ubicación: `admin/models/Order.php`

Propiedades:
- `id`
- `usuario`
- `email`
- `monto`
- `transaccion_id`
- `created_at`

Métodos:
- `getAll()`
- `create()`
- `delete()`

### User

Ubicación: `admin/models/User.php`

Propiedades:
- `id`
- `usuario`
- `password`
- `role`
- `created_at`

Métodos:
- `getAll()`
- `create()`
- `delete()`

### Payment

Ubicación: `admin/models/Payment.php`

Propiedades:
- `id`
- `usuario`
- `email`
- `monto`
- `transaccion_id`
- `created_at`

Métodos:
- `create()`