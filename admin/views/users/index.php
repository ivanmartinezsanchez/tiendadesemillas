<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Usuarios - Tienda de Semillas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Gestionar Usuarios</h2>
        <a href="/admin/controllers/UserController.php?action=create" class="btn btn-primary mb-3">Agregar Usuario</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo isset($user['id']) ? $user['id'] : ''; ?></td>
                            <td><?php echo isset($user['nombre']) ? $user['nombre'] : ''; ?></td>
                            <td><?php echo isset($user['email']) ? $user['email'] : ''; ?></td>
                            <td><?php echo isset($user['role']) ? $user['role'] : ''; ?></td>
                            <td>
                                <a href="/admin/controllers/UserController.php?action=edit&id=<?php echo isset($user['id']) ? $user['id'] : ''; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="/admin/controllers/UserController.php?action=delete&id=<?php echo isset($user['id']) ? $user['id'] : ''; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                <a href="/admin/controllers/UserController.php?action=changePassword&id=<?php echo isset($user['id']) ? $user['id'] : ''; ?>" class="btn btn-info btn-sm">Cambiar Contraseña</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No hay usuarios disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="/admin/index.php" class="btn btn-secondary">Volver al Panel de Control</a>
    </div>
</body>
</html>