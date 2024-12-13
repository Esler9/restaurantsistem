<?php
class usuarioscontroller extends controller {
    // Mostrar la lista de usuarios
    public function index() {
        $usuarioModel = $this->model('usuario');
        $usuarios = $usuarioModel->listar();
        $this->view('usuarios/index', ['usuarios' => $usuarios]);
    }

    // Crear un nuevo usuario
    public function crear() {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = trim($_POST['nombre']);
            $correo = trim($_POST['correo']);
            $rol = trim($_POST['rol']);
            $contraseña = trim($_POST['contraseña']);
    
            // Validar que los campos no estén vacíos
            if (empty($nombre) || empty($correo) || empty($rol) || empty($contraseña)) {
                die('Todos los campos son obligatorios.');
            }
    
            // Llamar al modelo para registrar el usuario
            $usuarioModel = $this->model('usuario');
            $registrado = $usuarioModel->registrar($nombre, $correo, $contraseña, $rol);
            var_dump($_POST);
            exit;
            if ($registrado) {
                header('Location: /usuarios'); // Redirigir a la lista de usuarios
                exit;
            } else {
                die('Error al registrar el usuario.');
            }
        }
    }
    

    // Actualizar un usuario existente
    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_usuario = $_POST['id_usuario'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $rol = $_POST['rol'];

            $usuarioModel = $this->model('usuario');
            $usuarioModel->actualizar($id_usuario, $nombre, $correo, $rol);
            header('Location: /usuarios');
            exit;
        }
    }
}
?>
