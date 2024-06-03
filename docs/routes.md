# Rutas

Esta sección describe las rutas disponibles en la Tienda de Semillas.

## Rutas Públicas

- `/index.php`: Página principal.
- `/login.php`: Página de inicio de sesión y registro.

## Rutas de Administración

- `/admin/ProductController.php?action=index`: Gestionar productos.
- `/admin/ProductController.php?action=create`: Crear un nuevo producto.
- `/admin/ProductController.php?action=edit&id=[id]`: Editar un producto existente.
- `/admin/ProductController.php?action=delete&id=[id]`: Eliminar un producto.
- `/admin/OrderController.php?action=index`: Gestionar pedidos.
- `/admin/OrderController.php?action=delete&id=[id]`: Eliminar un pedido.
- `/admin/UserController.php?action=index`: Gestionar usuarios.
- `/admin/UserController.php?action=delete&id=[id]`: Eliminar un usuario.
- `/admin/PaymentController.php?action=pay&id=[id]`: Realizar un pago.