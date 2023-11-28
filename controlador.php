<?php
    if(!empty($_POST["btn-ingresar"])){
        if(empty($_POST["usuario"])) and (empty($_POST("contrasena"))){
            echo "Los campos estan vacios";
        }
    }


?>