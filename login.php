<?php
session_start();

require 'config.php';

$usuario = "";
$pass = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['user'])) {
        $usuario = $_POST['user'];
    } else {
        $error .= "Debe introducir el nombre<br>";
    }

    if (!empty($_POST['password'])) {
        $pass = $_POST['password'];
    } else {
        $error .= "Debe introducir la contraseña<br>";
    }

    if (empty($error)) {
        $sql = "SELECT id, username, password FROM usuarios WHERE username=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $respuesta = $resultado->fetch_assoc();

            // Comparación de contraseñas en texto plano
            if ($pass === $respuesta['password']) {
                $_SESSION = [
                    'id' => $respuesta['id'],
                    'user' => $usuario,
                ];
                header('Location: index.php');
                exit();
            } else {
                $error .= "No coinciden los datos ingresados";
            }
        } else {
            $error .= "El usuario ingresado no existe";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form method="post" action="">
        <div>
            <label for="user">Usuario: </label>
            <input type="text" name="user" id="">
        </div>
        <div>
            <label for="password">Contraseña: </label>
            <input type="password" name="password">
        </div>
        <br>
        <input name="btn-ingresar" type="submit" value="Iniciar Sesión">
        <?php
        if (!empty($error)) {
            echo $error;
        }
        ?>
    </form>
</body>

</html>
