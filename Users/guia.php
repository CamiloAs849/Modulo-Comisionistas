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
        <script src="../Components/jquery-3.7.1.min.js"></script>
        <link rel="icon" type="image/x-icon" href="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png">

</head>

<body>
    <?php
    include("../DataBase/conexion.php");
    session_start();
    $usuario = $_SESSION['UsuarioID'];
    if (empty($_SESSION['UsuarioID'])) {
        header("Location:../index.php");
        exit();
    }

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
    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#"><img src="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png" width="20" height="20" alt=""> Visión Limpieza</a>

        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa-solid fa-bars"></i>
                </button>
            </li>
        </ul>
    </header>
    <div class="container-fluid">
        <a href="#" class="btn btn-dark buttonFloat"><i class="fa-solid fa-arrow-up"></i></a>
        <div class="row">
            <div class="sidebar col-xl-2  col-md-3 col-lg-3 p-0 ">
                <div class="offcanvas-md bg-dark offcanvas-end min-vh-100" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header bg-dark">
                        <h5 class="offcanvas-title text-white" id="sidebarMenuLabel"><img src="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png" width="20" height="20" alt=""> Visión Limpieza</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body min-vh-100  d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white-50 text-center d-flex align-items-center gap-2" aria-current="page" href="./inicio.php">
                                    <i class="fa-solid fa-house"></i> Inicio
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white-50 d-flex align-items-center gap-2" href="./nuevo-pedido.php">
                                    <i class="fa-solid fa-cart-shopping"></i> Nuevo pedido
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white-50 d-flex align-items-center gap-2" href="#">
                                    <i class="fa-solid fa-boxes-stacked"></i> Catálogo
                                </a>
                            </li>
                        </ul>
                        <hr style="color: white;">
                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link text-white-50 d-flex align-items-center gap-2" href="./edit.php">
                                    <i class="fa-solid fa-pen-to-square"></i> Actualizar datos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white-50 d-flex align-items-center gap-2" href="#">
                                    <i class="fa-solid fa-circle-question"></i> Sobre las comisiones
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 active" href="./guia.php">
                                    <i class="fa-solid fa-circle-info"></i> Guía
                                </a>
                            </li>
                        </ul>

                        <hr class="" style="color: white;">

                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a href="" class="nav-link text-white-50 d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Log Out Modal -->
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
            </div>
            <div class="col-md-9 col-xl-10 col-lg-9">
                <div class="text-center mb-5">
                    <p class="title mt-4 ">Guía de usuario</p>
                    <p class="note fs-5">A continuación veras la guía de cada una de las herramientas de la página web.</p>

                    <div class="btn-group">
                        <button type="button" class="btn btn-dark dropdown-toggle my-3" data-bs-toggle="dropdown" aria-expanded="false">
                            Sobre
                        </button>
                        <ul class="dropdown-menu  shadow w-220px" data-bs-theme="dark">
                            <li>
                                <a class="dropdown-item d-flex gap-2 align-items-center" href="#menu">
                                    <i class="fa-solid fa-bars"></i> Menú
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex gap-2 align-items-center" href="#inicio">
                                    <i class="fa-solid fa-house"></i> Inicio
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex gap-2 align-items-center" href="#pedido">
                                    <i class="fa-solid fa-cart-shopping"></i> Nuevo Pedido
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex gap-2 align-items-center" href="#editar">
                                    <i class="fa-solid fa-pen-to-square"></i> Editar
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div id="menu">
                        <h2 class="fw-bold">Menú</h2>
                        <p class="fs-5">Este es el menú principal de la página web, donde vas acceder a los diferentes apartados y cerrar la sesión de manera segura.</p>
                        <img src="https://i.ibb.co/X20r7Dh/Menu.png" class="border border-dark" height="500" alt="Menu">
                    </div>
                    <div id="inicio">
                        <h2 class=" fw-bold">Inicio</h2>
                        <p class="fs-5">En este apartado podrás ver toda tu informacíon personal.</p>
                        <img src="https://i.ibb.co/4Jyr3Rj/Captura-de-pantalla-2024-08-23-151818.png" class="border border-dark" alt="Inicio perfil.">

                        <p class="fs-5 mt-5">En este apartado podrás ver el historial de tus pedidos, organizar de orden ascendente o descendente, buscar un dato en especifico o agrupar por cantidades. </p>
                        <img src="https://i.ibb.co/n3Z06mR/Captura-de-pantalla-2024-08-23-154912.png" class="border border-dark w-100" alt="Historial de pedidos">
                    </div>
                    <div id="pedido">
                        <h2 class="fw-bold mt-5">Nuevo Pedido</h2>
                        <p class="fs-5">Aquí podrás crear un nuevo pedido, seleccionar la cantidad y el producto deseado y también buscar un producto en específico.</p>
                        <img src="https://i.ibb.co/dc8X05Y/Captura-de-pantalla-2024-08-23-164735.png" class="border border-dark w-100" alt="Nuevo pedido">

                        <p class="fs-5 mt-5">Al abrir el carrito podrás ver el nombre del producto, cantidad, precio, comisión y el total, podrás eliminar el producto, editar la cantidad o vaciar el carrito, tambíen se puede ver el total a pagar del pedido y la comisión del mismo.</p>
                        <img src="https://i.ibb.co/pW0FyLr/Captura-de-pantalla-2024-08-23-165248.png" alt="Captura-de-pantalla-2024-08-23-165248" class="border border-dark w-100">

                        <p class="fs-5 mt-5">Al hacer el pedido tendrás que poner todos los datos que se te piden, automaticamente tu pedido será hecho y en estado de espera.</p>
                        <img src="https://i.ibb.co/swjBNBd/Hacer-Pedido.png" class="border border-dark w-100" alt="Hacer-Pedido">
                    </div>
                    <div id="editar">
                        <h2 class="fw-bold mt-5">Actualizar datos</h2>
                        <p class="fs-5">Aquí podrás actualizar tus datos personales, como telefono, correo, dirección y ciudad, para los demás datos tienes que comunicarte al WhatsApp.</p>
                        <img src="https://i.ibb.co/mvt8GRN/Actualizar-Datos.png" class="border border-dark w-100" alt="Actualizar-Datos">
                    </div>
                </div>
            </div>
        </div>
        <?php include("../footer.php"); ?>
    </div>
</body>

</html>