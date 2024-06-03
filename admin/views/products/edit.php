<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto - Tienda de Semillas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Producto</h2>
        <form action="ProductController.php?action=edit" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <div class="form-group">
                <label for="nombre">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $product['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required><?php echo $product['descripcion']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="<?php echo $product['precio']; ?>" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $product['stock']; ?>" required>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen del Producto</label>
                <input type="file" class="form-control-file" id="imagen" name="imagen">
                <img src="../img/<?php echo $product['imagen']; ?>" alt="<?php echo $product['nombre']; ?>" width="100">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="destacado" name="destacado" <?php echo $product['destacado'] ? 'checked' : ''; ?>>
                <label class="form-check-label" for="destacado">Producto Destacado</label>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        </form>
    </div>
</body>
</html>