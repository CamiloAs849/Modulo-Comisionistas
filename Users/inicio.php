<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../Components/bootstrap.min.css">
    <script src="../Components/bootstrap.bundle.min.js"></script>
    <scrip src="../Components/alertify.min.js">
        </script>
        <link rel="stylesheet" href="../Components/alertify.min.css" />
        <link rel="stylesheet" href="../Components/default.min.css" />
        <link rel="stylesheet" href="../Components/icon.css">
        <link rel="stylesheet" href="../CSS/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

</head>

<body style="width: 100%; height: 100%;">
    <?php
    session_start();
    include("../DataBase/conexion.php");
    $usuario = $_SESSION['UsuarioID'];
    if (empty($_SESSION['UsuarioID'])) {
        header("Location:../index.php");
        exit();
    }
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
                        <a class="nav-link active" aria-current="page" href="inicio.php">
                            <div>
                                <i class="fa-solid fa-house"></i>
                            </div>
                            Inicio
                        </a>
                    </li>

                    <li class="nav-item dropdown text-center mx-2 mx-lg-1">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div>
                                <i class="fa-solid fa-truck"></i>
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div>
                                <i class="fa-solid fa-gear"></i>
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
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
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


    <div class="container mt-4">
        <div class="row">
            <div class="col-1">
                <div class="card">
                    <div class="img">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                        </svg>
                    </div>
                    <span><?php echo $nombreUsuario ?></span>
                    <p class="apellido text-center"><?php echo $apellidoUsuario ?></p>
                    <p class="text-center">Comisionista</p>
                    <div class="text-center mb-4">
                        <button data-bs-toggle="modal" data-bs-target="#info" class="perfil"><i class="fa-solid fa-user fa-sm" style="color: #3b685b;"></i></button>
                        <br>
                        <a href="" data-bs-toggle="modal" data-bs-target="#info" class="link-perfil"><strong>Mi perfil</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->

    <div class="modal fade" id="info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-dark">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Información personal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-5 text-center">
                            <div class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100" width="150" viewBox="0 0 448 512">
                                    <path fill="#bababa" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                </svg>
                                <br>
                                <br>
                                <span class="modal-name"><?php echo $nombreUsuario ?></span>
                                <br>
                                <span class="apellido"><?php echo $apellidoUsuario ?></span>
                                <p><?php echo $usuarioID ?></p>
                            </div>
                        </div>
                        <div class="col-7">
                            <p><i class="fa-solid fa-star"></i> <?php echo $Edad ?></p>
                            <p><i class="fa-solid fa-phone-flip fa-flip-horizontal"></i> <?php echo $telefonoUsuario ?></p>
                            <p><i class="fa-solid fa-envelope"></i> <?php echo $correoUsuario ?></p>
                            <p><i class="fa-solid fa-location-dot"></i> <?php echo $direccionUsuario ?></p>
                            <p><i class="fa-solid fa-city"></i> <?php echo $Ciudad ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("../footer.php") ?>
</body>

</html>