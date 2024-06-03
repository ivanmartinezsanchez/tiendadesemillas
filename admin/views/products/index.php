<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Productos - Tienda de Semillas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Gestionar Productos</h2>
        <a href="/admin/controllers/ProductController.php?action=create" class="btn btn-primary mb-3">Agregar Producto</a>
        <a href="/admin/index.php" class="btn btn-secondary mb-3">Volver al Panel de Control</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Destacado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $product['id']; ?></td>
                            <td><?php echo $product['nombre']; ?></td>
                            <td><?php echo $product['descripcion']; ?></td>
                            <td><?php echo $product['precio']; ?></td>
                            <td><?php echo $product['stock']; ?></td>
                            <td><img src="/img/<?php echo $product['imagen']; ?>" alt="<?php echo $product['nombre']; ?>" width="50"></td>
                            <td><?php echo $product['destacado'] ? 'Sí' : 'No'; ?></td>
                            <td>
                                <a href="/admin/controllers/ProductController.php?action=edit&id=<?php echo $product['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="/admin/controllers/ProductController.php?action=delete&id=<?php echo $product['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No hay productos disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>