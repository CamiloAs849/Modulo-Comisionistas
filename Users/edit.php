<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información</title>
    <link rel="stylesheet" href="../Components/bootstrap.min.css">
    <script src="../Components/bootstrap.bundle.min.js"></script>
    <scrip src="../Components/alertify.min.js">
        </script>
        <link rel="stylesheet" href="../Components/alertify.min.css" />
        <link rel="stylesheet" href="../Components/default.min.css" />
        <link rel="stylesheet" href="../Components/icon.css">
        <link rel="stylesheet" href="../CSS/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script src="../Components/sweetalert2@11.js"></script>

</head>

<body>
    <?php
    include("../DataBase/conexion.php");
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
                            <li><a class="dropdown-item" href="nuevo-pedido.php">Nuevo pedido</a></li>
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
                        <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-dark">
                <div class="modal-header ">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmación</h1>
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

        <center>
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
        </center>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="mb-3 row justify-content-md-center">
                <div class="col">
                    <label for="Documento" class="form-label">Numero de documento</label>
                    <input type="email" class="form-control" id="Documento" name="Documento" aria-describedby="emailHelp" placeholder="" disabled value="<?php echo $usuario ?>">
                </div>
            </div>
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
                    <label for="Telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="Telefono" name="TelefonoUsuario" placeholder="" value="<?php echo $telefonoUsuario ?>">
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
            function validar($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $TelefonoUsuario = validar($_POST['TelefonoUsuario']);
            $Correo = validar($_POST['Correo']);
            $Dirrecion = validar($_POST['Dirrecion']);
            $Ciudad = validar($_POST['Ciudad']);

            if (!empty($TelefonoUsuario) && !empty($Correo) && !empty($Dirrecion) && !empty($Ciudad)) {
                if ($TelefonoUsuario == $row['TelefonoUsuario'] && $Correo == $row['Correo'] && $Dirrecion == $row['Dirrecion'] && $Ciudad == $row['Ciudad']) {
                    echo '<script>
                        Swal.fire({
                            title: "No se ha modificado ningún dato!",
                            icon: "warning",
                            confirmButtonText: "Aceptar"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "./edit.php";
                            }
                        });
                    </script>';
                } else {
                    $sql = "UPDATE gestion_productos.comisionista 
                    SET TelefonoUsuario = '$TelefonoUsuario', Correo = '$Correo', Ciudad = '$Ciudad', Direccion = '$Dirrecion'
                    WHERE UsuarioID = '$usuarioID'";

                    $result = mysqli_query($Link, $sql);

                    if ($result === true) {
                        echo '<script>
                        Swal.fire({
                            title: "Datos actualizados exitosamente!",
                            icon: "success",
                            confirmButtonText: "Aceptar"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "./edit.php";
                            }
                        });
                    </script>';
                    } else {
                        echo  '<script>
                    Swal.fire({
                        title: "Error al actualizar los datos!",
                        text: "Por favor, intenta de nuevo.",
                        icon: "error",
                        confirmButtonText: "Aceptar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./edit.php";
                        }
                    });
                </script>';
                    }
                }
            } else { ?><center>
                    <div class="alert alert-danger" role="alert">
                        Faltan campos por llenar.
                </center>
    </div>
<?php
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
<?php include("../footer.php") ?>

</body>

</html>