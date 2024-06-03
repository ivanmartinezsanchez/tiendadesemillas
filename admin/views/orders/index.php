<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Pedidos - Tienda de Semillas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Gestionar Pedidos</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Usuario</th>
                    <th>ID Producto</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($orders)): ?>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo $order['usuario_id']; ?></td>
                            <td><?php echo $order['producto_id']; ?></td>
                            <td><?php echo $order['cantidad']; ?></td>
                            <td><?php echo $order['total']; ?></td>
                            <td><?php echo $order['fecha']; ?></td>
                            <td>
                                <a href="/admin/controllers/OrderController.php?action=edit&id=<?php echo $order['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="/admin/controllers/OrderController.php?action=delete&id=<?php echo $order['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No hay pedidos disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="/admin/index.php" class="btn btn-secondary">Volver al Panel de Control</a>
    </div>
</body>
</html>