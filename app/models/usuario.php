<?php
class usuario {
    private $db;

    public function __construct() {
        require_once 'config/database.php';
        global $conn; // Variable definida en database.php
        $this->db = $conn;
    }

    // Registrar un nuevo usuario
    public function registrar($nombre, $correo, $contraseña, $rol) {
        $hashedPassword = password_hash($contraseña, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nombre, correo, contraseña, rol) VALUES (:nombre, :correo, :contraseña, :rol)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['nombre' => $nombre, 'correo' => $correo, 'contraseña' => $hashedPassword, 'rol' => $rol]);
    }

    // Autenticar un usuario
    public function autenticar($correo, $contraseña) {
        $sql = "SELECT * FROM usuarios WHERE correo = :correo";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['correo' => $correo]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
            return $usuario;
        }
        return false;
    }

    // Obtener un usuario por ID
    public function obtenerPorId($id_usuario) {
        $sql = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id_usuario' => $id_usuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
