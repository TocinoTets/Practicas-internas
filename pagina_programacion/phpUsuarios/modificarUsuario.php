<?php

include('../conexion/conexion.php');

$id = $_POST['idUsuario'];
$nombre = $_POST['nombre'];
$mail = $_POST['mail'];
$contraseña = $_POST['contra'];
$tipoUsuario = $_POST['tipoUsuario'];


if (isset($_POST['id_usuario'])){
   $sql = "UPDATE usuarios SET nombre='$nombre',contra='$contraseña', mail='$mail', tipo_usuario='$tipoUsuario' WHERE id_usuario=$id";

$resultado = mysqli_query($conexion,$sql);

if ($resultado){
    header("Location: ../index.php");
} else {
    echo "error";
}
 
} else {
    header ("Location: ../index.php"); 
 }


?>