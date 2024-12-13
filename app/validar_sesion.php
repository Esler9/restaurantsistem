<?php
session_start();

// Verificar si el usuario no ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header('Location: /login');
    exit;
}

// Opcional: Verificar roles específicos (si es necesario)
$usuario = $_SESSION['usuario'];
