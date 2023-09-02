<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="formulario.css">
    <title>Agregar</title>
</head>
<body>
    <?php
    require 'navbar.php';
    ?>
      <h1 class='titulo'>Agregar Elemento</h1>
  <form class='formulario' action="agregar.php" method="post">
    <label for="nombre">Nombre poema:</label>
    <br>
    <input type="text" id="nombre" name="nombre" required>
    <br>
    <label for="poema">poema:</label>
    <br>
    <textarea name="poema" id="poema" cols="30" rows="10" required>
    </textarea>
    <br>
    <label for="favorita">Es un poema favorito? 1=Si 2=No  </label>
    <input type="number" name="favorita" id="favorita" required>
    <br>
    <input type="submit" value="Agregar">
  </form>
    
</body>
</html>