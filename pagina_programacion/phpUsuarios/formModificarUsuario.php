<?php

require ("../conexion/conexion.php");

$id = $_POST['idUsuario'];

if (isset($_POST['id_usuario'])){
    $sql = "SELECT * FROM usuarios WHERE idUsuario='".$id."'";

$resultado = mysqli_query($conexion, $sql);

$fila = mysqli_fetch_assoc($resultado);

echo "
    <form action='modificarUsuario.php' method='post'>
        <input hidden value='".$id."' name='idUsuario'>
        <p>Nombre:</p>
        <input type='text' name='nombre' value='".$fila['nombre']."'required>
        <p>Email:</p>
        <input type='email' name='mail' value='".$fila['mail']."'required>
        <br>
        <p>Contraseña:</p>
        <input type='string' name='contra' value='".$fila['contra']."'required>
        <br>
        <p>Tipo de usuario:</p>
        <input type='number' name='tipoUsuario' value='".$fila['tipoUsuario']."'required>
        <br>
        <button type='submit'>Modificar Usuario</button>
    </form>
";
} else {
    header ("Location: index.php"); 
 }

?>