<?php
class ProductosController {

    // Mostrar todos los productos
    public function index() {
       // include_once '../../models/producto.php';
        //$productos = Producto::obtenerTodos();
        include '../../views/productos/index.php';
    }

    // Mostrar formulario para crear un nuevo producto
    public function crear() {
        include '../../views/productos/crear.php';
    }

    // Guardar un nuevo producto
    public function guardar() {
        include_once '../../models/producto.php';

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $categoria_id = $_POST['categoria_id'];

        Producto::crear([
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'stock' => $stock,
            'categoria_id' => $categoria_id
        ]);

        header('Location: index.php');
    }

    // Mostrar formulario para editar un producto existente
    public function editar($id) {
        include_once '../../models/producto.php';
        $producto = Producto::obtenerPorId($id);
        include '../../views/productos/editar.php';
    }

    // Actualizar un producto existente
    public function actualizar($id) {
        include_once '../../models/producto.php';

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $categoria_id = $_POST['categoria_id'];

        Producto::actualizar($id, [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'stock' => $stock,
            'categoria_id' => $categoria_id
        ]);

        header('Location: index.php');
    }

    // Eliminar un producto
    public function eliminar($id) {
        include_once '../../models/producto.php';
        Producto::eliminar($id);
        header('Location: index.php');
    }

    // Ver ingredientes de un producto
    public function ingredientes($producto_id) {
        include_once '../../models/producto.php';
        include_once '../../models/ingrediente.php';

        $producto = Producto::obtenerPorId($producto_id);
        $ingredientes = Ingrediente::obtenerPorProductoId($producto_id);

        include '../../views/productos/ingredientes.php';
    }
}

// Rutas básicas para el controlador
$controller = new ProductosController();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && $_GET['action'] === 'crear') {
        $controller->crear();
    } elseif (isset($_GET['action']) && $_GET['action'] === 'editar' && isset($_GET['id'])) {
        $controller->editar($_GET['id']);
    } elseif (isset($_GET['action']) && $_GET['action'] === 'ingredientes' && isset($_GET['producto_id'])) {
        $controller->ingredientes($_GET['producto_id']);
    } else {
        $controller->index();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['action']) && $_GET['action'] === 'guardar') {
        $controller->guardar();
    } elseif (isset($_GET['action']) && $_GET['action'] === 'actualizar' && isset($_GET['id'])) {
        $controller->actualizar($_GET['id']);
    } elseif (isset($_GET['action']) && $_GET['action'] === 'eliminar' && isset($_GET['id'])) {
        $controller->eliminar($_GET['id']);
    }
}
?>
