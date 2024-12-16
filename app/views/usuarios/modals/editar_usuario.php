<div class="modal fade" id="editarUsuarioModal<?= $usuario['id_usuario'] ?>" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/usuarios/actualizar" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
