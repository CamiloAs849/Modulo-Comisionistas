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
                    <li class="nav-item text-center mx-2 mx-lg-1">
                        <a class="nav-link" aria-current="page" href="catalogo.php">
                            <div>
                                <i class="material-icons">inventory_2</i>
                            </div>
                            Catálogo
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
                            <li><a class="dropdown-item" href="/nuevo-pedido.php">Nuevo pedido</a></li>
                            <li><a class="dropdown-item" href="historial-pedidos.php">Ver historial de pedidos</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Left links -->

                <!-- Right links -->
                <ul class="navbar-nav ms-auto d-flex flex-row mt-3 mt-lg-0">
                    <li class="nav-item dropdown text-center mx-2 mx-lg-1">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
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
        <center class="mt-4">
            <a href="inicio.php" class=" btn btn-primary">Regresar</a>
        </center>
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
            <center class="mb-3">
                <button type="submit" class="btn btn-success">Actualizar datos</button>
            </center>

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
                echo "<script>
                alert('Datos actualizados correctamente.');
                window.location.href = 'edit.php';
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Contactanos mediante: </span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Vision Limpieza
                        </h6>
                        <p>
                            Los mejores productos para tu hogar y demás
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <!-- Grid column -->

                    <!-- Grid column --> <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
                        <p><i class="material-icons">apartment</i> Cl 34B cra 115A</p>
                        <p>
                            <i class="material-icons">mail</i>
                            info@example.com
                        </p>
                        <p><i class="material-icons">call</i> + 57 321201</p>
                        <p><i class="material-icons">call</i> + 57 3230230</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © <?php echo date("Y"); ?> Copyright:
            <a class="text-reset fw-bold" href="https://www.google.com/?hl=es">visionlimpieza.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

</body>

</html>