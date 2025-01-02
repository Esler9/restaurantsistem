<?php
class ingredientescontroller extends controller {
    // Mostrar la lista de ingredientes
    public function index() {
        $ingredienteModel = $this->model('ingrediente');
        $ingredientes = $ingredienteModel->listar();
        $this->view('ingredientes/index', ['ingredientes' => $ingredientes]);
    }

    // Crear un nuevo ingrediente
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = trim($_POST['nombre']);
            $cantidad_disponible = trim($_POST['cantidad_disponible']);
            $unidad_medida = trim($_POST['unidad_medida']);
            $stock_minimo = trim($_POST['stock_minimo']);

            // Validar que los campos no estén vacíos
            if (empty($nombre) || empty($cantidad_disponible) || empty($unidad_medida) || empty($stock_minimo)) {
                die('Todos los campos son obligatorios.');
            }

            // Llamar al modelo para registrar el ingrediente
            $ingredienteModel = $this->model('ingrediente');
            $registrado = $ingredienteModel->registrar($nombre, $cantidad_disponible, $unidad_medida, $stock_minimo);

            if ($registrado) {
                header('Location: /ingredientes'); // Redirigir a la lista de ingredientes
                exit;
            } else {
                die('Error al registrar el ingrediente.');
            }
        }
    }

    // Actualizar un ingrediente existente
    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_ingrediente = $_POST['id_ingrediente'];
            $nombre = $_POST['nombre'];
            $cantidad_disponible = $_POST['cantidad_disponible'];
            $unidad_medida = $_POST['unidad_medida'];
            $stock_minimo = $_POST['stock_minimo'];

            $ingredienteModel = $this->model('ingrediente');
            $ingredienteModel->actualizar($id_ingrediente, $nombre, $cantidad_disponible, $unidad_medida, $stock_minimo);
            header('Location: /ingredientes');
            exit;
        }
    }

    // Eliminar un ingrediente
    public function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_ingrediente'])) {
            $id_ingrediente = $_GET['id_ingrediente'];

            $ingredienteModel = $this->model('ingrediente');
            $ingredienteModel->eliminar($id_ingrediente);
            header('Location: /ingredientes');
            exit;
        }
    }
}
?>
