<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require("../conexion/conexion.php");

    $sql = "SELECT * FROM usuarios";

    $respuesta = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($respuesta) >0 ) {
        while($filas = mysqli_fetch_assoc($respuesta)){
            echo "ID: ".$filas['idUsuario']." Nombre: ".$filas['nombre']." Contraseña: ".$filas['contra'] ." Email: ".$filas['mail'] ." Tipo_usuario: ".$filas['tipoUsuario'] ."Estado del usuario:".$filas['estado'].
            '<form action="../phpUsuarios/eliminarUsuario.php" method="post">
                <input hidden value='.$filas['idUsuario'].' name="id" >
                <button type="submit">Suspender usuario</button>
            </form>
            <form action="../phpUsuarios/formModificarUsuario.php" method="post">
                <input hidden value='.$filas['idUsuario'].' name="idUsuario" >
                <button type="submit">Modificar usuario</button>
            </form>'
            ."<br>"; 
        }
    }
    echo'<form action="../index.php" method="post">
                <button type="submit">
                    volver
                </button>
            </form>';
    
    ?>
</body>
</html>