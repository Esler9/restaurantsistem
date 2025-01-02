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
    public function crear($nombre, $descripcion, $precio, $categoria_id) {
        try {
            // Construir la consulta SQL
            $sql = "INSERT INTO productos (nombre, descripcion, precio, stock, categoria_id) 
                    VALUES ('" . addslashes($nombre) . "', 
                            '" . addslashes($descripcion) . "', 
                            '" . addslashes($precio) . "', 
                            '" . addslashes($categoria_id) . "')";

            // Ejecutar directamente la consulta
            $resultado = $this->db->query($sql);

            // Verificar si se ejecutó correctamente
            if (!$resultado) {
                throw new Exception('Error al registrar el producto.');
            }

            return true; // Registro exitoso
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
    public function actualizar($id_producto, $nombre, $descripcion, $precio, $stock, $categoria_id)
    {
        $sql = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, stock = :stock, categoria_id = :categoria_id WHERE id_producto = :id_producto";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id_producto' => $id_producto,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'stock' => $stock,
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
