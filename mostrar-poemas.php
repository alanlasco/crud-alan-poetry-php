<?php
require 'config.php';
require 'loginchecker.php';
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
 <br><br>
 <table>
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Fecha</th>
  </tr>
   <?php for($i=0; $i < count($resultado); $i++){ ?>
    <tr class="poema"><td>
     <?php echo $resultado[$i]['id_poema'].' ' ?>
    </td>
    <td>
     <?php echo $resultado[$i]['nombre'].' ' ?>
    </td>
    <td>
    <?php
    $fecha = date_create($resultado[$i]['fecha']);
    echo date_format($fecha, 'd-m-Y');
    ?>        
    </td>
    </tr>
       <?php } ?>
