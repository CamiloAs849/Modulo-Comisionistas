<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body style="background-color: rgb(33, 37, 41);">

    <form class="form" action="/inicio-sesion.php" method="post">
        <div class="title">Bienvenido<br><span>Comisionista</span></div>
        <hr>
        <?php
        if (isset($_GET['error'])) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php
                echo $_GET['error']
                ?>
            </div>
        <?php
        }
        ?>
        <input type="text" placeholder="Numero de documento" name="UsuarioID" class="input">
        <input type="password" placeholder="Contraseña" name="password" class="input">

        <button class="button-confirm">Ingresar</button>
    </form>

</html>