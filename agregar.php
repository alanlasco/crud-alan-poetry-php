
<?php
require 'config.php';
$error="";
//$sql= 'INSERT INTO poemas (nombre, poema, fecha) VALUES ($nombre, $poema, $fecha_actual)';
// Verificar que se haya enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $poema = $_POST["poema"];

    // Preparar la consulta SQL
    $sql= "INSERT INTO poemas (nombre, poema, fecha) VALUES ('$nombre', '$poema', CURRENT_TIME())";
    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        $error.= "Elemento agregado correctamente.";
    } else {
        $error.= "Error al agregar el elemento: " . $conexion->error;
    }
}
    // Cerrar la conexión
    $conexion->close();
    
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
     <body>
        <h1><?php
        echo $error;
        ?></h1>
        <span style="text-align: center">Volver al form</span>
        <a href="index.php">prueba</a>
    </body>
    </html>