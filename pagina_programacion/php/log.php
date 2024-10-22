<?php
include ('../conexion/conexion.php');

$nombre = $_POST['nombre'];
$Contraseña = $_POST['contra'];
$mail = $_POST['mail'];

$sql = "INSERT INTO usuarios (nombre, contra, mail) VALUES ('".$nombre."','".$Contraseña."','".$mail."')";

$resultado = mysqli_query($conexion,$sql);

if($resultado){
    header("Location: ../index.php");
    }else{
    echo "Error al registrar el usuario";
    }
?>