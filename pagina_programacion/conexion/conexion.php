<?php

$servidor = "localhost";
$usuario = "root";
$contra = "";
$DB = "internas_db";

$conexion = mysqli_connect($servidor, $usuario, $contra, $DB);

if (!$conexion) {
    die("la conexion fallo por: ". mysqli_connect_error());
}

?>