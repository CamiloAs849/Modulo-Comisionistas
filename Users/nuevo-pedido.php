<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo pedido</title>
    <link rel="stylesheet" href="../Components/bootstrap.min.css">
    <script src="../Components/bootstrap.bundle.min.js"></script>
    <scrip src="../Components/alertify.min.js">
        </script>
        <link rel="stylesheet" href="../Components/alertify.min.css" />
        <link rel="stylesheet" href="../Components/default.min.css" />
        <link rel="stylesheet" href="../Components/icon.css">
        <link rel="stylesheet" href="../CSS/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="icon" href="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png">

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
                <div class="offcanvas-md bg-dark offcanvas-start" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header bg-dark">
                        <h5 class="offcanvas-title text-white" id="sidebarMenuLabel"><img src="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png" width="20" height="20" alt=""> Visión Limpieza</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body  d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white-50 text-center d-flex align-items-center gap-2" aria-current="page" href="./inicio.php">
                                    <i class="fa-solid fa-house"></i> Inicio
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 active" href="./nuevo-pedido.php">
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
            <div class="col">
                <center>
                    <p class="title mt-4">Nuevo pedido</p>
                    <div class="mx-4">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="buscador" placeholder="">
                                    <label for="buscador">Buscar producto</label>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <?php
                            $sql = "SELECT * FROM gestion_productos.producto";

                            $result = mysqli_query($Link, $sql);

                            while ($row = mysqli_fetch_array($result)) {

                            ?>

                                <div class="col-xxl-3 col-xl-3 articulo col-lg-3 col-md-4 col-sm-4 col-12 mb-4 ">
                                    <div class="card mb-4 rounded-3 shadow-sm border-dark">
                                        <div class="card-header py-3 text-bg-dark border-dark">
                                            <h4 class="my-0 fw-normal"><?php echo $row['NombreProducto'] ?></h4>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="card-title pricing-card-title"><?php echo $row['Precio'] ?> $
                                            </h1>
                                            <p><?php echo $row['Descripcion'] ?></p>
                                            <div class="form-floating mb-3">
                                                <input class="form-control " placeholder="" type="number">
                                                <label class="form-label">Cantidad</label>
                                            </div>
                                            <button type="button" class="w-100 btn btn-lg btn-dark"><i class="fa-solid fa-plus"></i> Agregar</button>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </center>
                <?php include("../footer.php") ?>
            </div>

        </div>
    </div>


    <script src="../JS/busqueda.js"></script>
</body>

</html>