<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/pag_principal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class= contenedor>
    <header>
        <div class="container text-center">
            <div class="row justify-content-around">
                <div class="col">
                LOGO
                </div>
                <div class="col">
                    <h1>CodeWorks</h1>
                </div>
                <?php
                session_start();
                if(isset($_SESSION['tipoUsuario'])){
                    echo '<div class="col">
                            <form action="php/cerrar_sesion.php" method="post">
                                <button type="submit">Cerrar Sesion</button>
                            </form>
                            <button>BOTON DE CONTACTO</button>
                        </div>';
                } else {
                    echo '<div class="col">
                            <form action="login.php" method="post">
                                <input type="submit" value="Inicie sesion">
                            </form>
                        </div>';
                }

                ?>
                
            </div>
        </div>
    </header>
    
            <?php
            ini_set('display_errors',0);
                if($_SESSION['tipoUsuario'] == 1){
                    echo '<nav>
                        <a href="phpProyectos/form_agregar_proyecto.php"><button>AGREGAR UN NUEVO PROYECTO</button></a>
                        <a href="phpUsuarios/tablaUsuarios.php"><button>Tabla de usuarios</button></a>
                    </nav>';
                }

            ?>
    

    <section>
    <div class="container text-center">
        <div class="row row-cols-3 justify-content-between">
            <?php
            require("conexion/conexion.php");

            $sql = "SELECT * FROM proyecto";

            $respuesta = mysqli_query($conexion, $sql);

            

            if(mysqli_num_rows($respuesta))
            {
                
                while($fila = mysqli_fetch_assoc($respuesta))
                {
                    $sql_imagen = "SELECT direccion_img_codigo FROM imagenes WHERE id_proyecto = ".$fila['idProyecto']."";
                    $respuesta_imagen = mysqli_query($conexion, $sql_imagen);

                    if(mysqli_num_rows($respuesta_imagen))
                        {
                
                        while($fila_img = mysqli_fetch_assoc($respuesta_imagen))
                            {

                                echo '
                                <div class="card" style="width: 18rem; margin-top: 10px;margin-bottom: 10px;">
                                    <div class="card-body">
                                        <img src="'.$fila_img['direccion_img_codigo'].'" class="card-img-top" alt="...">
                                        
                                        <div class="card-body">
                                            <h5 class="card-title">'.$fila['nombre'].'</h5>
                                            <form action="proyecto.php" method="post">
                                                <input type="hidden" value="'.$fila['idProyecto'].'" name="id_proyecto">
                                                <button type="submit" class="btn btn-primary">Ver proyecto</button>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                                ';
                            }
                        }
                    }
                }
            ?>
            
        </div>
    </div>
    </section>

    <footer>
    <div class="container text-center" >
        <div class="row justify-content-center">
            <div class="col">DATOS GENERALES DE LA EMPRESA
                <p>Nombre de la empresa</p>
                <p>Dirección</p>
                <p>Integrantes</p>
                <p>Ignacio Rodriguez</p>
                <p>Sebastian Cowan</p>
                <p>Leonardo Martinez</p>
            </div>
            <div class="col">CONTACTO
                <p>Telefono </p>
                <p>Correo </p>
            </div>
        </div>
    </div>
    </footer>
    </div>
    

</body>
</html>