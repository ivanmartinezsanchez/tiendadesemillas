<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Semillas</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/menu.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/index.php">Tienda de Semillas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="/index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="/producto.php">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contacto.php">Contacto</a></li>
                    <?php if (isset($_SESSION['usuario'])): ?>
                        <?php if ($_SESSION['role'] == 'admin'): ?>
                            <li class="nav-item"><a class="nav-link" href="/admin/index.php">Panel de Control</a></li>
                        <?php endif; ?>
                        <li class="nav-item"><a class="nav-link" href="/logout.php">Cerrar Sesión</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="/login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="/register.php">Registrarse</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
</body>
</html>