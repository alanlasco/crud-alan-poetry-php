
<?php
require 'config.php';
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID del poema enviado desde el formulario
    $id_poema = $_POST["id_poema"];

    // Preparar la consulta SQL con una consulta preparada
    //Utiliza un marcador de posición ? para el valor del ID.
    $sql = "SELECT id_poema, poema FROM poemas WHERE id_poema = ?";
    
    // Preparar la consulta y vincular el parámetro
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_poema);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        $resultado = $stmt->get_result();
        
        if ($resultado->num_rows > 0) {
            $error = "Se encontró el poema.";
            $poemaEncontrado = true;
            // Aquí puedes trabajar con los datos encontrados en $resultado
        } else {
            $error = "No se encontró ningún poema con ese ID.";
        }
    } else {
        $error = "Error al ejecutar la consulta: " . $conexion->error;
    }
    //preparar el borrado del elemento
    if ($poemaEncontrado && isset($_POST["eliminar"])) {
    // Preparar la consulta SQL para eliminar el poema por su ID
    $sql_delete = "DELETE FROM poemas WHERE id_poema = ?";
    
    // Preparar la consulta y vincular el parámetro
    $stmt_delete = $conexion->prepare($sql_delete);
    $stmt_delete->bind_param("i", $id_poema);
    
    // Ejecutar la consulta de eliminación
    if ($stmt_delete->execute()) {
        $error = "Poema eliminado exitosamente.";
        // Restablecer el estado
        $poemaEncontrado = false;
    } else {
        $error = "Error al eliminar el poema: " . $conexion->error;
    }
    
    // Cerrar la consulta de eliminación
    $stmt_delete->close();
}


    // Cerrar la consulta
    $stmt->close();
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
        <a href="eliminar-poema.php">Click Aqui</a>
    </body>
    </html>