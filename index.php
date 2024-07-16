<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="./Components/bootstrap.min.css">
    <script src="./Components/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./Components/icon.css">

</head>

<body class="background-login">

    <form class="form" action="./Validation/inicioSesion.php" method="post">
        <div class="title">
            <center>Bienvenido<br><span>Comisionista</span></center>
        </div>
        <hr>
        <?php
        if (isset($_GET['error'])) {
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php
                echo $_GET['error']
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>
        <input type="number" placeholder="Numero de documento" name="UsuarioID" class="input">
        <input type="password" placeholder="Contraseña" name="password" class="input">

        <button class="button-confirm">Ingresar</button>
    </form>

</html>