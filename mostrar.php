<?php
require 'config.php';
session_start();
$sql="SELECT fecha, id_poema, nombre, poema FROM poemas";

$resultado = mysqli_query($conexion, $sql);


// En el caso de que la consulta traiga una respuesta, entonces la decodifico
if (mysqli_num_rows($resultado)!=0) {
  $resultado = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}else{
  $error = "Error";
}
//var_dump($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>
    <?php for($i=0; $i < count($resultado); $i++){ ?>
    <div id="prueba"><?php echo $resultado[$i]['nombre'] ?><br>
    <?php echo $resultado[$i]['poema'] ?>
    <?php
                 $fecha = date_create($resultado[$i]['fecha']);
              echo date_format($fecha, 'd-m-Y');
    ?>
    </div>
       <?php } ?> 
</body>
</html>
