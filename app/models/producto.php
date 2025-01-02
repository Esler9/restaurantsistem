<?php
class Producto {
    private static function conectar() {
        include '../../config/database.php';
        return $conexion;
    }

    // Obtener todos los productos
    public static function obtenerTodos() {
        $conexion = self::conectar();
        $sql = "SELECT * FROM productos";
        $resultado = $conexion->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // Obtener un producto por su ID
    public static function obtenerPorId($id) {
        $conexion = self::conectar();
        $sql = "SELECT * FROM productos WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    // Crear un nuevo producto
    public static function crear($data) {
        $conexion = self::conectar();
        $sql = "INSERT INTO productos (nombre, descripcion, precio, stock, categoria_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('ssdii', $data['nombre'], $data['descripcion'], $data['precio'], $data['stock'], $data['categoria_id']);
        return $stmt->execute();
    }

    // Actualizar un producto existente
    public static function actualizar($id, $data) {
        $conexion = self::conectar();
        $sql = "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, stock = ?, categoria_id = ? WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('ssdiii', $data['nombre'], $data['descripcion'], $data['precio'], $data['stock'], $data['categoria_id'], $id);
        return $stmt->execute();
    }

    // Eliminar un producto
    public static function eliminar($id) {
        $conexion = self::conectar();
        $sql = "DELETE FROM productos WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
?>
