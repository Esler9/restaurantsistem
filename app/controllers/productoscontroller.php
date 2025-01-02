<?php
class productoscontroller extends controller {
    // Mostrar la lista de productos
    public function index() {
        $productoModel = $this->model('producto');
        $productos = $productoModel->listar();
        $this->view('productos/index', ['productos' => $productos]);
    }

    // Crear un nuevo producto
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = trim($_POST['nombre']);
            $descripcion = trim($_POST['descripcion']);
            $precio = trim($_POST['precio']);
            $stock = trim($_POST['stock']);
            $categoria_id = trim($_POST['categoria_id']);

            // Validar que los campos no estén vacíos
            if (empty($nombre) || empty($descripcion) || empty($precio) || empty($stock) || empty($categoria_id)) {
                die('Todos los campos son obligatorios.');
            }

            // Llamar al modelo para registrar el producto
            $productoModel = $this->model('producto');
            $registrado = $productoModel->registrar($nombre, $descripcion, $precio, $stock, $categoria_id);

            if ($registrado) {
                header('Location: /productos'); // Redirigir a la lista de productos
                exit;
            } else {
                die('Error al registrar el producto.');
            }
        }
    }

    // Actualizar un producto existente
    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_producto = $_POST['id_producto'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $categoria_id = $_POST['categoria_id'];

            $productoModel = $this->model('producto');
            $productoModel->actualizar($id_producto, $nombre, $descripcion, $precio, $stock, $categoria_id);
            header('Location: /productos');
            exit;
        }
    }
}
