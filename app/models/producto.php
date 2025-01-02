<?php
class producto
{
    private $db;

    public function __construct()
    {
        require_once 'config/database.php';
        global $conn; // Variable definida en database.php
        $this->db = $conn;
    }

    // Registrar un nuevo producto
    public function registrar($nombre, $descripcion, $precio, $categoria_id)
    {
        try {
            // Construir la consulta SQL
            $sql = "INSERT INTO productos (nombre, descripcion, precio, categoria_id) 
                    VALUES (:nombre, :descripcion, :precio, :categoria_id)";

            // Preparar la consulta
            $stmt = $this->db->prepare($sql);

            // Asignar parámetros
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
            $stmt->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                return true; // Registro exitoso
            } else {
                throw new Exception('Error al registrar el producto.');
            }
        } catch (Exception $e) {
            // Mostrar mensaje de error
            die('Error al registrar producto: ' . $e->getMessage());
        }
    }


    // Obtener un producto por ID
    public function obtenerPorId($id_producto)
    {
        $sql = "SELECT * FROM productos WHERE id_producto = :id_producto";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id_producto' => $id_producto]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar un producto
    public function actualizar($id_producto, $nombre, $descripcion, $precio, $categoria_id)
    {
        $sql = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio,  categoria_id = :categoria_id WHERE id_producto = :id_producto";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id_producto' => $id_producto,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'categoria_id' => $categoria_id
        ]);
    }

    // Listar todos los productos
    public function listar()
    {
        $sql = "SELECT * FROM productos";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Eliminar un producto
    public function eliminar($id_producto)
    {
        $sql = "DELETE FROM productos WHERE id_producto = :id_producto";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id_producto' => $id_producto]);
    }
}
