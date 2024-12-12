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
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $rol = $_POST['rol'];
            $contraseña = $_POST['contraseña'];

            $usuarioModel = $this->model('usuario');
            $usuarioModel->registrar($nombre, $correo, $contraseña, $rol);
            header('Location: /usuarios');
            exit;
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
