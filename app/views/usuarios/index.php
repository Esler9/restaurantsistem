<!DOCTYPE html>
<html lang="es">
<?php
require_once 'validar_sesion.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Gestión de Usuarios</h1>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#crearUsuarioModal">Nuevo Usuario</button>

        <!-- Tabla de usuarios -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['usuarios'] as $usuario): ?>
                    <tr>
                        <td><?= $usuario['id_usuario'] ?></td>
                        <td><?= $usuario['nombre'] ?></td>
                        <td><?= $usuario['correo'] ?></td>
                        <td><?= $usuario['rol'] ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarUsuarioModal<?= $usuario['id_usuario'] ?>">Editar</button>
                        </td>
                    </tr>

                    <!-- Modal para editar usuario -->
                    <div class="modal fade" id="editarUsuarioModal<?= $usuario['id_usuario'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="/usuarios/actualizar" method="POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Editar Usuario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id_usuario" value="<?= $usuario['id_usuario'] ?>">
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" value="<?= $usuario['nombre'] ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="correo" class="form-label">Correo</label>
                                            <input type="email" class="form-control" name="correo" value="<?= $usuario['correo'] ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="rol" class="form-label">Rol</label>
                                            <select class="form-control" name="rol" required>
                                                <option value="administrador" <?= $usuario['rol'] == 'administrador' ? 'selected' : '' ?>>Administrador</option>
                                                <option value="mesero" <?= $usuario['rol'] == 'mesero' ? 'selected' : '' ?>>Mesero</option>
                                                <option value="chef" <?= $usuario['rol'] == 'chef' ? 'selected' : '' ?>>Chef</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Modal para crear usuario -->
        <div class="modal fade" id="crearUsuarioModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/usuarios/crear" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="email" class="form-control" name="correo" required>
                            </div>
                            <div class="mb-3">
                                <label for="rol" class="form-label">Rol</label>
                                <select class="form-control" name="rol" required>
                                    <option value="administrador">Administrador</option>
                                    <option value="mesero">Mesero</option>
                                    <option value="chef">Chef</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="contraseña" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="contraseña" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Crear Usuario</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>