<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña - Tienda de Semillas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Cambiar Contraseña</h2>
        <form action="/admin/controllers/UserController.php?action=changePassword" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="password">Nueva Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
        </form>
        <a href="/admin/controllers/UserController.php?action=index" class="btn btn-secondary mt-3">Volver</a>
    </div>
</body>
</html>