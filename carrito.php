<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

if (isset($_GET['add'])) {
    $producto_id = $_GET['add'];

    if (!isset($_SESSION['carrito'][$producto_id])) {
        $_SESSION['carrito'][$producto_id] = 1;
    } else {
        $_SESSION['carrito'][$producto_id]++;
    }

    header("Location: carrito.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito - Tienda de Semillas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <div class="container mt-5">
            <h2>Carrito de Compras</h2>
            <?php if (!empty($_SESSION['carrito'])): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Producto</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['carrito'] as $id => $cantidad): ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $cantidad; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No hay productos en el carrito.</p>
            <?php endif; ?>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>