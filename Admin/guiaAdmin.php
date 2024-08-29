<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../Components/bootstrap.min.css">
    <script src="../Components/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../Components/icon.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png">
</head>

<body>
    <?php
    include("../DataBase/conexion.php");
    session_start();
    $usuario = $_SESSION['AdminID'];
    if (empty($_SESSION['AdminID'])) {
        header("Location:../index.php");
        exit();
    }

    $sql = "SELECT * FROM gestion_productos.administrador WHERE AdminID = '$usuario'";

    $result = mysqli_query($Link, $sql);

    $row = mysqli_fetch_array($result);

    $nombreUsuario = $row['NombreUsuario'];
    $apellidoUsuario = $row['ApellidosUsuario'];
    $emailUsuario = $row['Email'];
    $telefonoUsuario = $row['Telefono'];
    $password = $row['Password'];

    ?>


    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#"><img src="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png" width="20" height="20" alt=""> Vision Limpieza</a>

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
            <div class="sidebar  col-md-3 col-lg-2 p-0 ">
                <div class="offcanvas-md min-vh-100 bg-dark offcanvas-end" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header bg-dark">
                        <h5 class="offcanvas-title text-white" id="sidebarMenuLabel"><img src="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png" width="20" height="20" alt=""> Visión Limpieza</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body min-vh-100  d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white-50 text-center d-flex align-items-center gap-2" aria-current="page" href="./Inicio-Admin.php">
                                    <i class="fa-solid fa-house"></i> Inicio
                                </a>
                            </li>
                        </ul>
                        <hr class="text-white">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link  text-white-50 d-flex align-items-center gap-2" href="./comisionistas.php">
                                    <i class="fa-solid fa-user"></i> Gestión de comisionistas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white-50 d-flex align-items-center gap-2" href="./proveedores.php">
                                    <i class="fa-solid fa-building"></i> Gestión de proveedores
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white-50 d-flex align-items-center gap-2" href="./comision.php">
                                    <i class="fa-solid fa-percent"></i> Gestión de comisión
                                </a>
                            </li>
                        </ul>
                        <hr class="text-white">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white-50 d-flex align-items-center gap-2" href="./solicitudComisionistas.php"><i class="fa-solid fa-hand"></i> Solicitudes comisionistas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active d-flex align-items-center gap-2" href="./guiaAdmin.php"><i class="fa-solid fa-question"></i> Uso de herramientas</a>
                            </li>
                        </ul>
                        <hr class="text-white">
                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a href="" class="nav-link text-white-50 d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
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
            <div class="col-md-8 col-xl-10 col-lg-9">
                <div class="text-center mb-5">
                    <p class="fw-bold title my-4">Guía de uso</p>
                    <p class="note fs-5">A continuación veras la guía de cada una de las herramientas del administrador.</p>
                    <div class="btn-group">
                        <button type="button" class="btn btn-dark dropdown-toggle my-3" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                            Sobre
                        </button>
                        <ul class="dropdown-menu  shadow w-220px" data-bs-theme="dark">
                            <li>
                                <a class="dropdown-item d-flex gap-2 align-items-center" href="#menu">
                                    <i class="fa-solid fa-bars"></i> Menú
                                </a>
                            </li>
                            <li>
                                <div class="btn-group dropend w-100">
                                    <a class="dropdown-item d-flex  gap-2 align-items-center" href="#tablas">
                                        <i class="fa-solid fa-table-list"></i> Tablas
                                    </a>
                                    <button type="button" class="border border-0 text-center  dropdown-item dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#comisionistasYProveedores" class="dropdown-item d-flex gap-2 align-items-center"> <i class="fa-solid fa-users"></i> Tablas de comisionistas y proveedores</a>
                                        </li>
                                        <li>
                                            <a href="#tablaComision" class="dropdown-item d-flex gap-2 align-items-center"><i class="fa-solid fa-percent"></i> Tabla de comisión</a>
                                        </li>
                                        <li>
                                            <a href="#tablaSolicitudes" class="dropdown-item d-flex gap-2 align-items-center"><i class="fa-solid fa-hand"></i> Tabla de solicitudes</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div id="menu">
                        <h2 class="fw-bold">Menú</h2>
                        <p class="fs-5">Este es el menú principal de la página web, donde vas acceder a los diferentes apartados del administrador y cerrar la sesión de manera segura.</p>
                        <img src="https://i.ibb.co/h1P4yXh/menu-Admin.png" alt="menu-Admin" class="border border-dark" height="500">
                    </div>
                    <div id="tablas">
                        <h2 class="fw-bold mt-5">Tablas</h2>
                        <p class="fs-5">En toda la web vas a encontrar tablas con un aspecto similar que almacenan todos los datos. Estas tablas son las que se utilizan para almacenar y mostrar los datos de la empresa. Cada tabla tiene sus diferentes opciones.</p>
                        <img src="https://i.ibb.co/S3C8VXv/tablaC.png" alt="tablaC" class="border border-dark w-100">

                        <div id="comisionistasYProveedores">
                            <h3 class="fw-bold mt-5">Tabla de Comisionistas y Proveedores</h3>
                            <p class="fs-5">Ambas tablas almacenan los datos de todos los comisionistas y proveedores de la empresa. Puedes agregar, editar, borrar y ver los datos de estos comisionistas y proveedores, también se puede buscar un comisionista o proveedor en específico. </p>
                            <img src="https://i.ibb.co/LvBK7HW/tablaP.png" alt="tablaP" class="border border-dark w-100">
                        </div>
                        <div id="tablaComision">
                            <h3 class="fw-bold mt-5">Tabla de Comisión</h3>
                            <p class="fs-5">Esta tabla almacena los datos de la comisión de cada comisionistas. Puedes editar la comisión y también puedes buscar un comisionista en específico. podrás generar un reporte en PDF de esta tabla para descargar y ver los datos del acumulado de comisión.</p>
                            <img src="https://i.ibb.co/z2pvD4m/tabla-Comision.png" alt="tabla-Comision" class="border border-dark w-100">
                        </div>
                        <div id="tablaSolicitudes">
                            <h3 class="fw-bold mt-5">Tabla de Solicitudes</h3>
                            <p class="fs-5">Esta tabla almacena los datos de las solicitudes de comisionistas. Aqui puedes aceptar y rechazar la solicitud, buscar una solicitud en específico y poder editar el estado de la solicitud en tal caso de estar aceptado o rechazado. También puedes ver la información de la persona que hizo la solicitud.</p>
                            <img src="https://i.ibb.co/8xdKKYq/tabla-Solicitudes.png" alt="tabla-Solicitudes" class="border border-dark w-100">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php include("../footer.php"); ?>
    </div>
</body>

</html>