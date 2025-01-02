<?php
class Ingrediente {
    private $db;

    public function __construct() {
        require_once 'config/database.php';
        global $conn; // Variable definida en database.php
        $this->db = $conn;
    }

    // Listar todos los ingredientes
    public function listar() {
        try {
            $sql = "SELECT * FROM ingredientes";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error al listar ingredientes: ' . $e->getMessage());
        }
    }

    // Registrar un nuevo ingrediente
    public function registrar($nombre, $cantidad_disponible, $unidad_medida, $stock_minimo) {
        try {
            $sql = "INSERT INTO ingredientes (nombre, cantidad_disponible, unidad_medida, stock_minimo) 
                    VALUES (:nombre, :cantidad_disponible, :unidad_medida, :stock_minimo)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':cantidad_disponible', $cantidad_disponible, PDO::PARAM_STR);
            $stmt->bindParam(':unidad_medida', $unidad_medida, PDO::PARAM_STR);
            $stmt->bindParam(':stock_minimo', $stock_minimo, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (Exception $e) {
            die('Error al registrar el ingrediente: ' . $e->getMessage());
        }
    }

    // Actualizar un ingrediente existente
    public function actualizar($id_ingrediente, $nombre, $cantidad_disponible, $unidad_medida, $stock_minimo) {
        try {
            $sql = "UPDATE ingredientes 
                    SET nombre = :nombre, cantidad_disponible = :cantidad_disponible, unidad_medida = :unidad_medida, stock_minimo = :stock_minimo 
                    WHERE id_ingrediente = :id_ingrediente";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id_ingrediente', $id_ingrediente, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':cantidad_disponible', $cantidad_disponible, PDO::PARAM_STR);
            $stmt->bindParam(':unidad_medida', $unidad_medida, PDO::PARAM_STR);
            $stmt->bindParam(':stock_minimo', $stock_minimo, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (Exception $e) {
            die('Error al actualizar el ingrediente: ' . $e->getMessage());
        }
    }

    // Eliminar un ingrediente
    public function eliminar($id_ingrediente) {
        try {
            $sql = "DELETE FROM ingredientes WHERE id_ingrediente = :id_ingrediente";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id_ingrediente', $id_ingrediente, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            die('Error al eliminar el ingrediente: ' . $e->getMessage());
        }
    }

    // Obtener un ingrediente por su ID
    public function obtenerPorId($id_ingrediente) {
        try {
            $sql = "SELECT * FROM ingredientes WHERE id_ingrediente = :id_ingrediente";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id_ingrediente', $id_ingrediente, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error al obtener el ingrediente: ' . $e->getMessage());
        }
    }
}
?>
