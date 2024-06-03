<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['role'] !== 'admin') {
    header("Location: /login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control - Tienda de Semillas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Panel de Control</h2>
        <ul>
            <li><a href="/admin/controllers/ProductController.php?action=index">Gestionar Productos</a></li>
            <li><a href="/admin/controllers/UserController.php?action=index">Gestionar Usuarios</a></li>
            <li><a href="/admin/controllers/OrderController.php?action=index">Gestionar Pedidos</a></li>
        </ul>
    </div>
</body>
</html>