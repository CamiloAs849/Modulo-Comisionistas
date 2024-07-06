<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css" />
</head>

<body>
    <?php
    include("conexion.php");
    session_start();
    $usuario = $_SESSION['UsuarioID'];
    $sql = "SELECT * FROM gestion_productos.comisionista WHERE UsuarioID= '$usuario'";

    $result = mysqli_query($Link, $sql);
    $row = mysqli_fetch_array($result);
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
    <nav class="navbar navbar-expand-lg " style="border: 1px solid; ">
        <div class="container">
            <a class="navbar-brand" href="inicio.php">Información Personal</a>
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
    <h2 class="text-center mb-3">Información personal</h2>
    <div class="container">

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="mb-3 row justify-content-md-center">
                <div class="col">
                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="NombreUsuario" name="NombreUsuario" placeholder="" disabled value="<?php echo $nombreUsuario ?>">
                </div>

                <div class="mb-3 col">
                    <label for="Apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="ApellidosUsuario" name="ApellidosUsuario" placeholder="" disabled value="<?php echo $apellidoUsuario ?>">
                </div>
            </div>
            <div class="mb-3 row justify-content-md-center">
                <div class="col">
                    <label for="Edad" class="form-label">Edad</label>
                    <input type="number" class="form-control" id="Edad" name="Edad" placeholder="" disabled value="<?php echo $Edad ?>">
                </div>

                <div class="mb-3 col">
                    <label for="Telefono" class="form-label">Telefono</label>
                    <input type="number" class="form-control" id="Telefono" name="TelefonoUsuario" placeholder="" value="<?php echo $telefonoUsuario ?>">
                </div>
            </div>
            <div class="mb-3 row justify-content-md-center">
                <div class="col">
                    <label for="Correo" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="Correo" name="Correo" placeholder="" value="<?php echo $correoUsuario ?>">
                </div>

                <div class="mb-3 col">
                    <label for="Dirrecion" class="form-label">Dirreción</label>
                    <textarea type="number" class="form-control" id="Direccion" name="Dirrecion" placeholder="" rows="1"><?php echo $direccionUsuario ?></textarea>
                </div>
            </div>
            <div class="mb-3 row justify-content-md-center">
                <div class="col">
                    <label for="Ciudad" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" id="Ciudad" name="Ciudad" placeholder="" value="<?php echo $Ciudad ?>">
                </div>
                <div class="col">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="Password" disabled placeholder="" value="<?php echo $contraseña ?>">
                </div>
            </div>
            <div class="mb-3 row justify-content-md-center">
                <button class="btn btn-success">Actualizar datos</button>
            </div>

        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $TelefonoUsuario = $_POST['TelefonoUsuario'];
            $Correo = $_POST['Correo'];
            $Dirrecion = $_POST['Dirrecion'];
            $Ciudad = $_POST['Ciudad'];

            $sql = "UPDATE gestion_productos.comisionista 
        SET TelefonoUsuario = '$TelefonoUsuario', Correo = '$Correo', Ciudad = '$Ciudad', Direccion = '$Dirrecion'
        WHERE UsuarioID = '$usuarioID'";

            $result = mysqli_query($Link, $sql);

            if ($result === true) {
                echo '<div class="alert alert-success d-flex align-items-center" role="alert" style="height: 50px">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        Datos Actualizados con exito
                    </div>
                </div>';
                echo "<script>
                    window.location.href = 'edit.php'
                    </script>";
            } else {
                echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                        An example warning alert with an icon
                    </div>
                </div>';
            }
        }
        ?>
    </div>
</body>

</html>