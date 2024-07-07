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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style.css">
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="inicio.php"><?php echo $nombreUsuario ?></a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left links -->
                <ul class="navbar-nav me-auto d-flex flex-row mt-3 mt-lg-0">
                    <li class="nav-item text-center mx-2 mx-lg-1">
                        <a class="nav-link" aria-current="page" href="inicio.php">
                            <div>
                                <i class="material-icons">home</i>
                            </div>
                            Inicio
                        </a>
                    </li>
                    <li class="nav-item dropdown text-center mx-2 mx-lg-1">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div>
                                <i class="material-icons">local_shipping</i>
                            </div>
                            Pedidos
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="show.php">Hacer un pedido</a></li>
                            <li><a class="dropdown-item" href="edit.php">Ver historial de pedidos</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Información del pedido actual</a></li>
                        </ul>
                    </li>
                </ul>
                </li>
                </ul>
                <!-- Left links -->

                <!-- Right links -->
                <ul class="navbar-nav ms-auto d-flex flex-row mt-3 mt-lg-0">
                    <li class="nav-item dropdown text-center mx-2 mx-lg-1">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div>
                                <i class="material-icons">settings</i>
                            </div>
                            Opciones
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="show.php">Ver información personal</a></li>
                            <li><a class="dropdown-item" href="edit.php">Editar información</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sobre las comisiones</a></li>
                        </ul>
                    </li>
                    <li class="nav-item text-center mx-2 mx-lg-1">
                        <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <div>
                                <i class=" material-icons">logout</i>
                            </div>
                            Cerrar Sesión
                        </button>

                    </li>
                </ul>
                <!-- Right links -->

                <!-- Search form -->
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-dark">
                <div class="modal-header ">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmarción</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    ¿Seguro que quieres cerrar sesión?
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="Confirm()">Cerrar Sesión</button>
                    <script>
                        function Confirm() {
                            window.location.href = "LogOut.php";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="text-center mb-3 mt-5">Editar información personal</h2>


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