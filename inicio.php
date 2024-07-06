<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css" />
</head>

<body style="width: 100%; height: 100%;">
    <?php
    session_start();
    include("conexion.php");
    $usuario = $_SESSION['UsuarioID'];
    $sql = "SELECT * FROM gestion_productos.comisionista WHERE UsuarioID = '$usuario'";

    $resultado = mysqli_query($Link, $sql);

    $row = mysqli_fetch_array($resultado);
    $nombreUsuario = $row['NombreUsuario'];
    $apellidoUsuario = $row['ApellidosUsuario'];
    $Edad = $row['Edad'];
    $correoUsuario = $row['Correo'];
    $telefonoUsuario = $row['TelefonoUsuario'];
    $direccionUsuario = $row['Direccion'];
    $Ciudad = $row['Ciudad'];
    $usuarioID = $row['UsuarioID'];
    $contraseña = $row['Password'];
    ?>

    <nav class="navbar navbar-expand-lg fixed-top bg-light navbar-light">
        <div class="container">
            <a class="navbar-brand" href="">Bienvenid@ <?php echo $nombreUsuario ?></a>
            <div class="navbar" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#!"><i class="fas fa-plus-circle pe-2"></i>Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#!"><i class="fas fa-bell pe-2"></i>Alerts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="edit.php"><i class="fas fa-heart pe-2"></i>Editar Información</a>
                    </li>
                    <li class="nav-item ms-3">
                        <button class="btn btn-black btn-rounded" onclick="Confirm()">Cerrar sesion</button>
                        <script>
                            function Confirm() {
                                alertify.confirm('Confirmar', 'Quieres cerrar sesion?', function() {
                                    alertify.success('Si')
                                    window.location.href = "LogOut.php";
                                }, function() {});
                            }
                        </script>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


</body>

</html>