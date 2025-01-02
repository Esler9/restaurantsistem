<!-- Modal -->
<div class="modal fade" id="editarProductoModal" tabindex="-1" aria-labelledby="editarProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarProductoModalLabel">Editar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="editar.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="id_producto" name="id_producto" value="">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripción del producto" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio del producto" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="categoria_id">Categoría</label>
                        <select class="form-control" id="categoria_id" name="categoria_id" required>
                            <option value="">Seleccione una categoría</option>
                            <!-- Las categorías serán cargadas dinámicamente desde la base de datos -->
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Scripts necesarios -->
<script src="/dist/plugins/jquery/jquery.min.js"></script>
<script src="/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    // Script para cargar datos en el modal de edición
    function cargarDatosEnModal(id, nombre, descripcion, precio, categoria_id) {
        document.getElementById('id_producto').value = id;
        document.getElementById('nombre').value = nombre;
        document.getElementById('descripcion').value = descripcion;
        document.getElementById('precio').value = precio;
        document.getElementById('categoria_id').value = categoria_id;
    }
</script>
