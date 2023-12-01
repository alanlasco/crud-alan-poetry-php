<?php



session_start();

session_destroy();                    //destruyo la sesion

header('Location:login.php');         //retorno a la pagina principal


 ?>