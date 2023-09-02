
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require 'links.php'
    ?>
    <link rel="stylesheet" href="editar-poema.css">
    <title>Editar</title>
</head>
<body>
    <?php
    require 'navbar.php';
    require 'mostrar-poemas.php';
    ?>
    <div class='editar'>
    <form action="editar.php" method="post">
    <label for="id_poema">Ingrese el ID a Editar: </label>
    <br>
    <input type="text" id="id_poema" name="id_poema" required>
    <br>
    <label for="nuevo-titulo">Ingrese el nuevo titulo: </label>
    <input type="text" name="nuevo-titulo" id="titulo" required>
    <br>
    <label for="nuevo-poema">Nuevo poema: </label>
    <textarea name="nuevo-poema" id="poema" cols="30" rows="10" required>
    </textarea>
    <br>
    <label for="nuevo-favorita">Es un poema favorito? 1=Si 0=No  </label>
    <input type="number" name="nuevo-favorita" id="favorita" required>
    <br>
    <input type="submit" name='editar' value="Editar">
    </form>
    </div>
    <br><br>
</body>
</html>