<?php
$host = 'localhost';
$dbname = 'u229362226_restaurant';
$username = 'u229362226_restaurant';
$password = 'H3xa124578.';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
