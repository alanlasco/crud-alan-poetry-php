<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario no ha iniciado sesión
if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Redirigir a la página de login
    exit();
}
$usuario_autenticado = $_SESSION['user'];
?>