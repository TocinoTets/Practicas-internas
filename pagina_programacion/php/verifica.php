<?php
include ('../conexion/conexion.php');

$mail = $_POST['mail'];
$Contraseña = $_POST['contra'];

$sql = "SELECT * FROM usuarios WHERE contra='".$Contraseña."' AND  mail='".$mail."'"; 


$resultado = mysqli_query($conexion, $sql);

$datos = mysqli_fetch_assoc($resultado);

if ($Contraseña == $datos['contra']) {
   session_start();
   $_SESSION['tipoUsuario'] = $datos['tipoUsuario'];
   $_SESSION['nombre'] = $datos['nombre'];
   $_SESSION['mail'] = $datos['mail'];
   $_SESSION['id'] = $datos['id'];
   header ("Location: ../index.php");
} else {
    echo "contaseña incorrecta";
}
?>