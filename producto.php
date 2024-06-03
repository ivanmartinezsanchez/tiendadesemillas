<?php
require_once 'config/db.php';
require_once 'admin/models/Product.php';

$db = (new Database())->getConnection();
$product = new Product($db);
$productos = $product->getAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - Tienda de Semillas</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <div class="container mt-5">
            <h2>Productos Disponibles</h2>
            <div class="row">
                <?php if ($productos->num_rows > 0): ?>
                    <?php while ($row = $productos->fetch_assoc()): ?>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img class="card-img-top" src="img/<?php echo $row['imagen']; ?>" alt="<?php echo $row['nombre']; ?>" style="border: 1px solid #ddd; padding: 10px;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                                    <p class="card-text" style="border: 1px solid #ddd; padding: 10px;"><?php echo $row['descripcion']; ?></p>
                                    <p class="card-text" style="border: 1px solid #ddd; padding: 10px;">Precio: $<?php echo $row['precio']; ?></p>
                                    <a href="carrito.php?add=<?php echo $row['id']; ?>" class="btn btn-primary">Comprar</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No hay productos disponibles.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>