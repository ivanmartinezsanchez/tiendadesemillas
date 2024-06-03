<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario - Tienda de Semillas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Crear Usuario</h2>
        <form action="/admin/controllers/UserController.php?action=create" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="role">Rol</label>
                <select class="form-control" id="role" name="role">
                    <option value="user">Usuario</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </form>
        <a href="/admin/controllers/UserController.php?action=index" class="btn btn-secondary mt-3">Volver</a>
    </div>
</body>
</html>