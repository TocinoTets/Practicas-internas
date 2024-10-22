<?php

 require ("../conexion/conexion.php");

 $id = $_POST['id'];

 if (isset($_POST['id'])){
   $sql = "UPDATE usuarios SET estado='suspendido' WHERE idUsuario=$id";
 
 $resultado = mysqli_query($conexion, $sql);
 
 if ($resultado){

     header("Location: tablaUsuarios.php");
 } else {
     echo "error";
 }  
 }else {
     header ("Location: tablaUsuarios.php"); 
  }
?>