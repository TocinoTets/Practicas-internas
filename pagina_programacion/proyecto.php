<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos Web</title>
    <link rel="stylesheet" href="css/proyecto.css">
</head>
<body>
    <header>
        <a href="index.php">VOLVER</a>
    </header>
    <div class="container">
        <?php
        include("conexion/conexion.php");

        $id_proyecto = $_POST['id_proyecto'];
        
        $sql = "SELECT * FROM proyecto WHERE idProyecto=$id_proyecto";

        $respuesta = mysqli_query($conexion, $sql);
        if ($respuesta) {
            while ($fila = mysqli_fetch_array($respuesta)) {
                
        
        ?>
        <div class="caja">
            <h2><?php echo $fila['nombre'];?></h2>
        </div>
        <div class="ejemplo">
            <a href="" class="box"><img src="<?php
            $sql_imgs = "SELECT direccion_img_codigo , direccion_img_web FROM imagenes WHERE id_proyecto = $id_proyecto";
            $respuesta_imgs = mysqli_query($conexion, $sql_imgs);

            if ($respuesta_imgs) {
                while ($fila_imgs = mysqli_fetch_array($respuesta_imgs)) {

            echo $fila_imgs['direccion_img_codigo'];?>" alt=""></a>
            <a href="" class="box">IMAGEN EJEMPLO DE LA PAGINA WEB <img src="<?php echo $fila_imgs['direccion_img_web'];?>" alt=""></a>
            <a href="" class="box">DATOS GENERALES DEL PROYECTO<img src="" alt=""></a>
        </div>
        <?php
                    }
                }
            }
        }
        ?>
    </div>
    <footer></footer>
</body>
</html>