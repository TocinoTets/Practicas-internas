<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="agregar_proyecto.php" method="post" enctype="multipart/form-data">
  Seleccionar imagen:
  <input type="file" name="fileToUpload" id="fileToUpload"><br>
  <label for="nombre">Nombre del proyecto</label>
  <input type="text" name="nombre"><br>
  <label for="nombre">Ingrese la fecha de creacion del proyecto</label>
  <input type="date" name="fechaCreado"><br>
  <label for="nombre">Ingrese a los involicrados en el proyecto</label>
  <input type="text" name="involucrados"><br>
  <input type="submit" value="Subir ptoyecto">
</form>

</body>
</html>