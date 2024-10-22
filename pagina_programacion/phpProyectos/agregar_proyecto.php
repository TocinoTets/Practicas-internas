<?php
include("../conexion/conexion.php");

$id_proyecto;
$nombre = $_POST['nombre'];
$integrantes = $_POST['involucrados'];
$fecha = $_POST['fechaCreado'];

$target_dir = "img/";
$target_dir_carpeta = "../img/";
$archivo_img_codigo = $target_dir . basename($_FILES["imagenCodigo"]["name"]); //archivo
$archivo_img_web = $target_dir . basename($_FILES["imagenWeb"]["name"]);
$imageFileType = strtolower(pathinfo($archivo_img_codigo,PATHINFO_EXTENSION)); //tipo
$imageFileType = strtolower(pathinfo($archivo_img_web,PATHINFO_EXTENSION)); //tipo
$uploadOk = 1; //variable de control

// var_dump($_FILES);

$tipo_img_codigo = strtolower(pathinfo($archivo_img_codigo,PATHINFO_EXTENSION)); //extension del archivo
$tipo_img_web = strtolower(pathinfo($archivo_img_web,PATHINFO_EXTENSION)); //extension del archivo

if(isset($_POST["submit"])) { //chequea si el archivo es una imagen
  $check_img_codigo = getimagesize($_FILES["imagenCodigo"]["tmp_name"]);
  $check_img_web = getimagesize($_FILES["imagenWeb"]["tmp_name"]);
  if($check_img_codigo !== false && $check_img_web !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
}

if($tipo_img_codigo != "jpg" && $tipo_img_codigo != "png" && $tipo_img_codigo != "jpeg"){ //admite solo archivos de imagen
  echo "Lo lamentamos, solo JPG, JPEG y PNG son permitidos";
  $uploadOk = 0;
}

if($tipo_img_web != "jpg" && $tipo_img_web != "png" && $tipo_img_web != "jpeg"){ //admite solo archivos de imagen
  echo "Lo lamentamos, solo JPG, JPEG y PNG son permitidos";
  $uploadOk = 0;
}

$sql =  "INSERT INTO `proyecto`(`nombre`, `fechaCreado`, `involucrados`) VALUES ('$nombre','$fecha','$integrantes')";
$resultado = mysqli_query($conexion,$sql);
if ($resultado) {
  // agarramos el ultimo id guardado
    $sql_id = "SELECT idProyecto FROM proyecto ORDER BY idProyecto DESC LIMIT 1";
    $ultimo_id = mysqli_query($conexion,$sql_id);

    $id_proyecto = mysqli_fetch_array($ultimo_id);

  // guardamos la ultimas imagenes subidas
    $modificar_imgs = "INSERT INTO imagenes(direccion_img_codigo, direccion_img_web, id_proyecto) VALUES ('$archivo_img_codigo','$archivo_img_web','$id_proyecto[0]')";
    $modificar = mysqli_query($conexion,$modificar_imgs);
    if ($modificar) {
        if ($uploadOk == 0) {
            echo "<br>";
            echo "las imagenes no han sido subidos";  
          } else {
            if (move_uploaded_file($_FILES["imagenCodigo"]["tmp_name"], $target_dir_carpeta.$_FILES["imagenCodigo"]["name"])) {
              echo "subio imagen_codigo";
            } else {
              echo "Ha habido un error subiendo el archivo de imagen_codigo";
            }
            if (move_uploaded_file($_FILES["imagenWeb"]["tmp_name"], $target_dir_carpeta.$_FILES["imagenWeb"]["name"])) {
              header("Location: ../index.php");
            } else {
              echo "Ha habido un error subiendo el archivo de imagen_web";
            }
          }  
    }
    
} else {
    echo "El proyecto no ha sido subido";
}

?>