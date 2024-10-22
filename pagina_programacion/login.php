<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<a href="index.php">VOLVER</a>
    <form action="php/verifica.php" method="post">
        <h1 class="title">Inicio de sesion</h1>
        <label>
            <i class="fa-solid fa-user"></i>
            <input required placeholder="Mail" type="text" name="mail"  id="mail">
        </label>
        <label>
            <i class="fa-solid fa-lock"></i>
            <input required placeholder="Contraseña" type="Contraseña" name="contra" id="Contraseña">
        </label>
        
        <input type="submit" value="Login">
    </form>
<a href="register.php"><button>Registre</button></a>
</body>
</html>