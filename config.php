<?php
$servidor = 'localhost';
$usuarioBD = 'root';
$passBD = '';
$BaseDatos = 'db_poetry';

error_reporting(0);

/*$conexion = mysqli_connect($servidor, $usuarioBD, $passBD, $BaseDatos);
mysqli_set_charset($conexion, "utf8");*/
   $conexion = new mysqli($servidor, $usuarioBD, $passBD, $BaseDatos);

    // Verificar si hay algún error en la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }


?>