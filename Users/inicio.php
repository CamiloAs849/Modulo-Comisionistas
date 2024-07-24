<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../Components/bootstrap.min.css">
    <script src="../Components/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../Components/default.min.css" />
    <link rel="stylesheet" href="../Components/icon.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="../Components/datatables.min.css">


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
        <div class="row">
            <div class="sidebar bg-dark col-md-3 col-lg-2 p-0 ">
                <div class="offcanvas-md bg-dark offcanvas-end" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header bg-dark">
                        <h5 class="offcanvas-title text-white" id="sidebarMenuLabel"><img src="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png" width="20" height="20" alt=""> Visión Limpieza</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body  d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-light text-center d-flex align-items-center gap-2 active" aria-current="page" href="./inicio.php">
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
                                <a class="nav-link text-white-50 d-flex align-items-center gap-2" href="#">
                                    <i class="fa-solid fa-circle-info"></i> Acumulado de comisión
                                </a>
                            </li>
                        </ul>

                        <hr class="" style="color: white;">

                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link text-white-50 d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
                                </a>
                            </li>
                        </ul>
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
            </div>
            <div class="col mt-4">
                <center>
                    <p class="title">Perfil</p>
                    <div class="card mb-4 ">
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
                </center>
                <p class="text-center title">Historial de pedidos</p>
                <div class="table-responsive">
                    <table class="table" id="historial">
                        <thead>
                            <tr>
                                <th scope="col">Pedido ID</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Shampoo</td>
                                <td>$15.00</td>
                                <td>2</td>
                                <td>2022-01-01</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Crema</td>
                                <td>$10.00</td>
                                <td>1</td>
                                <td>2022-01-02</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                include("../footer.php");
                include("./show.php");
                ?>
            </div>
        </div>
    </div>
    <script src="../Components/jquery-3.7.1.min.js"></script>
    <script src="../Components/bootstrap.bundle.min.js"></script>
    <script src="../Components/datatables.min.js"></script>
    <script src="../JS/scripts.js"></script>
</body>

</html>