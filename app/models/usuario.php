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
        try {
            // Encriptar contraseña
            $hashedPassword = password_hash($contraseña, PASSWORD_BCRYPT);
    
            // Consulta SQL
            $sql = "INSERT INTO usuarios (nombre, correo, contraseña, rol) VALUES (:nombre, :correo, :contraseña, :rol)";
            $stmt = $this->db->prepare($sql);
    
            // Ejecutar la consulta
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->bindParam(':contraseña', $hashedPassword, PDO::PARAM_STR);
            $stmt->bindParam(':rol', $rol, PDO::PARAM_STR);
    
            if (!$stmt->execute()) {
                // Capturar error de SQL
                $errorInfo = $stmt->errorInfo();
                throw new Exception('Error en SQL: ' . $errorInfo[2]);
            }
    
            return true;
        } catch (Exception $e) {
            // Manejo de errores
            die('Error al registrar usuario: ' . $e->getMessage());
        }
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

    // Actualiza el Usuario
    public function actualizar($id_usuario, $nombre, $correo, $rol) {
        $sql = "UPDATE usuarios SET nombre = :nombre, correo = :correo, rol = :rol WHERE id_usuario = :id_usuario";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id_usuario' => $id_usuario,
            'nombre' => $nombre,
            'correo' => $correo,
            'rol' => $rol
        ]);
    }

    // Listar todos los usuarios
    public function listar() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
}
?>
