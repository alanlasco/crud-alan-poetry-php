<?php
require 'config.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

$sql="SELECT fecha, id_poema, nombre, poema FROM poemas";

$resultado = mysqli_query($conexion, $sql);

// En el caso de que la consulta traiga una respuesta, entonces la decodifico
if (mysqli_num_rows($resultado)!=0) {
  $resultado = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}else{
  $error = "Error";
}
echo json_encode($resultado);


?>