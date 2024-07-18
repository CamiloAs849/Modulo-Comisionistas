<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link rel="stylesheet" href="../Components/bootstrap.min.css">
    <script src="../Components/bootstrap.bundle.min.js"></script>
    <scrip src="../Components/alertify.min.js">
        </script>
        <link rel="stylesheet" href="../Components/alertify.min.css" />
        <link rel="stylesheet" href="../Components/default.min.css" />
        <link rel="stylesheet" href="../Components/icon.css">
        <link rel="stylesheet" href="../CSS/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
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
                        <a class="nav-link" aria-current="page" href="inicio.php">
                            <div>
                                <i class="fa-solid fa-house"></i>
                            </div>
                            Inicio
                        </a>
                    </li>
                    <li class="nav-item text-center mx-2 mx-lg-1">
                        <a class="nav-link active" aria-current="page" href="catalogo.php">
                            <div>
                                <i class="fa-solid fa-cart-shopping"></i>
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
    <div class="container">
        <center class="mt-5 mb-5">
            <h2>Nuestros productos</h2>
        </center>
        <div class="mb-3 d-flex justify-content-center flex-wrap flex-row align-items-center ">
            <div class="mt-4 mx-2">
                <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path>
                    </svg>
                    <div class="card__content">
                        <p class="card__title">Card Title</p>
                        <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                </div>
            </div>
            <div class="mt-4 mx-2">
                <div class="card">
                    <img src="https://www.exito.com/_next/image?url=https%3A%2F%2Fexitomt-4 mx-2.vtexassets.com%2Farquivos%2Fids%2F23196652%2FDETERGENTE-POLVO-1624495_a.jpg%3Fv%3D638542608948900000&w=256&q=75" alt="" width="300" height="240">
                    <div class="card__content">
                        <p class="card__title">Jabón en polvo</p>
                        <p class="card__description">Descripción</p>
                    </div>
                </div>
            </div>
            <div class="mt-4 mx-2">
                <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z" />
                    </svg>
                    <div class="card__content">
                        <p class="card__title">Card Title</p>
                        <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                </div>
            </div>
            <div class="mt-4 mx-2">
                <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z" />
                    </svg>
                    <div class="card__content">
                        <p class="card__title">Card Title</p>
                        <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3 mt-5 d-flex justify-content-center flex-wrap flex-row align-items-center ">
            <div class="mt-4 mx-2">
                <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path>
                    </svg>
                    <div class="card__content">
                        <p class="card__title">Card Title</p>
                        <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                </div>
            </div>
            <div class="mt-4 mx-2">
                <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path>
                    </svg>
                    <div class="card__content">
                        <p class="card__title">Card Title</p>
                        <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                </div>
            </div>
            <div class="mt-4 mx-2">
                <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path>
                    </svg>
                    <div class="card__content">
                        <p class="card__title">Card Title</p>
                        <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                </div>
            </div>
            <div class="mt-4 mx-2">
                <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path>
                    </svg>
                    <div class="card__content">
                        <p class="card__title">Card Title</p>
                        <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3 mt-5 d-flex justify-content-center flex-wrap flex-row align-items-center ">
            <div class="mt-4 mx-2">
                <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path>
                    </svg>
                    <div class="card__content">
                        <p class="card__title">Card Title</p>
                        <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                </div>
            </div>
            <div class="mt-4 mx-2">
                <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path>
                    </svg>
                    <div class="card__content">
                        <p class="card__title">Card Title</p>
                        <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                </div>
            </div>
            <div class="mt-4 mx-2">
                <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path>
                    </svg>
                    <div class="card__content">
                        <p class="card__title">Card Title</p>
                        <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                </div>
            </div>
            <div class="mt-4 mx-2">
                <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path>
                    </svg>
                    <div class="card__content">
                        <p class="card__title">Card Title</p>
                        <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                </div>
            </div>
        </div>
        <center class="mt-5 mb-5">
            <a href="nuevo-pedido.php" class="btn btn-primary">Hacer un pedido</a>
        </center>
    </div>



    <?php include("../footer.php") ?>


</body>

</html>