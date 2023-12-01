
<?php
require 'config.php';
require 'loginchecker.php';
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID del poema enviado desde el formulario
    $id_poema = $_POST["id_poema"];
    $nuevo_poema = $_POST["nuevo-poema"];
    $nuevo_titulo = $_POST["nuevo-titulo"];
    $favorita = $_POST["nuevo-favorita"];
    // Preparar la consulta SQL con una consulta preparada
    //Utiliza un marcador de posición ? para el valor del ID.
    $sql = "SELECT id_poema, poema, nombre, favorita FROM poemas WHERE id_poema = ?";
    
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
    if ($poemaEncontrado && isset($_POST["editar"])) {
    // Preparar la consulta SQL para eliminar el poema por su ID
    $sql_update = "UPDATE poemas SET poema = ? , nombre = ? , favorita = ? WHERE id_poema = ?";
    
    // Preparar la consulta y vincular el parámetro
    $stmt_update = $conexion->prepare($sql_update);
    // es ssii porque mando dos string y dos integer
    $stmt_update->bind_param("ssii", $nuevo_poema, $nuevo_titulo, $favorita, $id_poema);
    
    // Ejecutar la consulta de edicion
    if ($stmt_update->execute()) {
        $error = "El poema se edito exitosamente.";
        // Restablecer el estado
        $poemaEncontrado = false;
    } else {
        $error = "Error al Editar el poema: " . $conexion->error;
    }
    
    // Cerrar la consulta de eliminación
    $stmt_update->close();
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
        <title>Editar</title>
    </head>
    <body>
        <h1><?php
        echo $error;
        ?></h1>
        <span style="text-align: center">Volver al form</span>
        <a href="editar-poema.php">Click Aqui</a>
    </body>
    </html>