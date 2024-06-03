# Uso de la Aplicación

Esta guía proporciona información sobre cómo utilizar las características de la Tienda de Semillas.

## Gestión de Productos

1. **Agregar un Producto:**
   - Navega a `/admin/ProductController.php?action=create`
   - Llena el formulario con los detalles del producto y sube una imagen.

2. **Editar un Producto:**
   - Navega a `/admin/ProductController.php?action=edit&id=[id]`
   - Actualiza la información del producto y guarda los cambios.

3. **Eliminar un Producto:**
   - Navega a `/admin/ProductController.php?action=delete&id=[id]`
   - Confirma la eliminación del producto.

## Gestión de Pedidos

1. **Ver Pedidos:**
   - Navega a `/admin/OrderController.php?action=index`

2. **Eliminar un Pedido:**
   - Navega a `/admin/OrderController.php?action=delete&id=[id]`
   - Confirma la eliminación del pedido.

## Gestión de Usuarios

1. **Ver Usuarios:**
   - Navega a `/admin/UserController.php?action=index`

2. **Eliminar un Usuario:**
   - Navega a `/admin/UserController.php?action=delete&id=[id]`
   - Confirma la eliminación del usuario.

## Realizar un Pago

1. **Realizar un Pago:**
   - Navega a `/admin/PaymentController.php?action=pay&id=[id]`
   - Llena el formulario con los detalles de la tarjeta y realiza el pago.