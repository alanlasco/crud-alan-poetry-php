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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="index.css">
    <title>Gestion-Poemas</title>
</head>
<body>
    <?php
    require 'navbar.php';
    ?>
    <br><br><br><br>
    <div class='contenedor'>
    <h1>Gestion de poemas</h1>
    </div>
</body>
</html>