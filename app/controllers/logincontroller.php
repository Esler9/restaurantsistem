<?php
class logincontroller extends controller {
    // Página de inicio de sesión
    public function index() {
        $this->view('login/index');
    }

    // Manejar el inicio de sesión
    public function autenticar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correo = $_POST['correo'];
            $contraseña = $_POST['contraseña'];
            
            $usuarioModel = $this->model('usuario');
            $usuario = $usuarioModel->autenticar($correo, $contraseña);

            if ($usuario) {
                // Iniciar sesión
                session_start();
                $_SESSION['usuario_id'] = $usuario['id_usuario'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                $_SESSION['usuario_rol'] = $usuario['rol'];

                // Redirigir según el rol
                if ($usuario['rol'] == 'administrador') {
                    header('Location: /dashboard');
                } else if ($usuario['rol'] == 'mesero') {
                    header('Location: /pedidos');
                } else if ($usuario['rol'] == 'chef') {
                    header('Location: /pendientes');
                }
                exit;
            } else {
                $this->view('login/index', ['error' => 'Credenciales incorrectas.']);
            }
        }
    }

    // Cerrar sesión
    public function logout() {
        session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }
}
?>
