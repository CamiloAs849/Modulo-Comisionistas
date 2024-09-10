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
    setlocale(LC_TIME, 'es_CO UTF-8');
    $sql = "SELECT * FROM gestion_productos.comisionista WHERE UsuarioID = '$usuario'";
    $sql2 = "SELECT * FROM gestion_productos.comision WHERE UsuarioID = $usuario";
    $result2 = mysqli_query($Link, $sql2);
    $row2 = mysqli_fetch_array($result2);

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
    $dia = date('d');
    if ($dia == '01') {
        $sql = "UPDATE  gestion_productos.comision SET AcumuladoComision = 0 WHERE UsuarioID = $usuario";
        $stmt = $Link->prepare($sql);
        $stmt->execute();
    }
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
    <div class="container-fluid ">
        <a href="#" class="btn btn-dark buttonFloat"><i class="fa-solid fa-arrow-up"></i></a>
        <div class="row">
            <div class="sidebar col-xl-2  col-md-3 col-lg-3 p-0 ">
                <div class=" offcanvas-md bg-dark offcanvas-end min-vh-100 " tabindex=" -1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header bg-dark ">
                        <h5 class="offcanvas-title text-white" id="sidebarMenuLabel"><img src="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png" width="20" height="20" alt=""> Visión Limpieza</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body  d-md-flex flex-column p-0 pt-lg-3  overflow-y-auto min-vh-100">
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
                                <a class="nav-link text-white-50 d-flex align-items-center gap-2" href="../index.php#portafolio">
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
                                <a class="nav-link text-white-50 d-flex align-items-center gap-2" href="./guia.php">
                                    <i class="fa-solid fa-circle-info"></i> Guía de usuario ㅤㅤ
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
            <div class="col-md-9 col-xl-10 col-lg-9 mt-4">
                <div class="row">
                    <div class="col-xxl-3 col-xl-4 col-lg-12 col-md-12">
                        <center>
                            <div class="tarjeta mb-4 ">
                                <div class="image mb-3"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                    </svg>
                                </div>
                                <div class="tarjeta-info">
                                    <span><?php echo $nombreUsuario ?></span>
                                    <span><?php echo $apellidoUsuario ?></span>
                                    <p>Comisionista</p>
                                </div>
                                <button type="button" class="button" data-bs-target="#info" data-bs-toggle="modal"><i class="fa-solid fa-user fa-sm" style="color: #3b685b;"></i> Mi perfil</button>
                            </div>
                        </center>
                    </div>
                    <div class="col-xxl-8 col-xl-8 col-lg-12 col-md-12 ">
                        <div class="d-flex justify-content-center">
                            <div class="cards ">
                                <div class="outlinePage">
                                    <p class="ranking_number"><?php echo date('d') ?>/<span class="ranking_word"> <?php echo date('m') ?></span></p>
                                    <div class="splitLine"></div>
                                    <p class="userName">Haz click aquí y mira el acumulado</p>
                                </div>
                                <div class="detailPage">
                                    <svg
                                        class=" medals slide-in-top"
                                        viewBox="0 0 1024 1024"
                                        version="1.1"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="80"
                                        height="80">
                                        <path
                                            d="M896 42.666667h-128l-170.666667 213.333333h128z"
                                            fill="#FF4C4C"></path>
                                        <path
                                            d="M768 42.666667h-128l-170.666667 213.333333h128z"
                                            fill="#3B8CFF"></path>
                                        <path d="M640 42.666667h-128L341.333333 256h128z" fill="#F1F1F1"></path>
                                        <path
                                            d="M128 42.666667h128l170.666667 213.333333H298.666667z"
                                            fill="#FF4C4C"></path>
                                        <path
                                            d="M256 42.666667h128l170.666667 213.333333h-128z"
                                            fill="#3B8CFF"></path>
                                        <path
                                            d="M384 42.666667h128l170.666667 213.333333h-128z"
                                            fill="#FBFBFB"></path>
                                        <path
                                            d="M298.666667 256h426.666666v213.333333H298.666667z"
                                            fill="#E3A815"></path>
                                        <path
                                            d="M512 661.333333m-320 0a320 320 0 1 0 640 0 320 320 0 1 0-640 0Z"
                                            fill="#FDDC3A"></path>
                                        <path
                                            d="M512 661.333333m-256 0a256 256 0 1 0 512 0 256 256 0 1 0-512 0Z"
                                            fill="#E3A815"></path>
                                        <path
                                            d="M512 661.333333m-213.333333 0a213.333333 213.333333 0 1 0 426.666666 0 213.333333 213.333333 0 1 0-426.666666 0Z"
                                            fill="#F5CF41"></path>
                                        <path
                                            d="M277.333333 256h469.333334a21.333333 21.333333 0 0 1 0 42.666667h-469.333334a21.333333 21.333333 0 0 1 0-42.666667z"
                                            fill="#D19A0E"></path>
                                        <path
                                            d="M277.333333 264.533333a12.8 12.8 0 1 0 0 25.6h469.333334a12.8 12.8 0 1 0 0-25.6h-469.333334z m0-17.066666h469.333334a29.866667 29.866667 0 1 1 0 59.733333h-469.333334a29.866667 29.866667 0 1 1 0-59.733333z"
                                            fill="#F9D525"></path>
                                        <path
                                            d="M512 746.666667l-100.309333 52.736 19.157333-111.701334-81.152-79.104 112.128-16.298666L512 490.666667l50.176 101.632 112.128 16.298666-81.152 79.104 19.157333 111.701334z"
                                            fill="#FFF2A0"></path>
                                    </svg>
                                    <div class="gradesBox">
                                        <svg
                                            class=" gradesIcon"
                                            viewBox="0 0 1024 1024"
                                            version="1.1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="60"
                                            height="60">
                                            <path
                                                d="M382.6 805H242.2c-6.7 0-12.2-5.5-12.2-12.2V434.3c0-6.7 5.5-12.2 12.2-12.2h140.4c6.7 0 12.2 5.5 12.2 12.2v358.6c0 6.6-5.4 12.1-12.2 12.1z"
                                                fill="#558c93"
                                                data-spm-anchor-id="a313x.search_index.0.i36.40193a81WcxQiT"
                                                class=""></path>
                                            <path
                                                d="M591.1 805H450.7c-6.7 0-12.2-5.5-12.2-12.2V254.9c0-6.7 5.5-12.2 12.2-12.2h140.4c6.7 0 12.2 5.5 12.2 12.2v537.9c0 6.7-5.5 12.2-12.2 12.2z"
                                                fill="#284346"
                                                data-spm-anchor-id="a313x.search_index.0.i35.40193a81WcxQiT"
                                                class=""></path>
                                            <path
                                                d="M804.4 805H663.9c-6.7 0-12.2-5.5-12.2-12.2v-281c0-6.7 5.5-12.2 12.2-12.2h140.4c6.7 0 12.2 5.5 12.2 12.2v281c0.1 6.7-5.4 12.2-12.1 12.2z"
                                                fill="#558c93"
                                                data-spm-anchor-id="a313x.search_index.0.i37.40193a81WcxQiT"
                                                class=""></path>
                                        </svg>
                                        <p class="gradesBoxLabel">Comisión</p>
                                        <p class="gradesBoxNum">$ <?php echo number_format($row2['AcumuladoComision'], 0, '', '.') ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center mt-3  ms-lg-0 ms-xl-5 ms-xxl-5">Recuerda que este este valor será un acumulado mensual, el primer día de cada mes empezará desde cero.</p>
                    </div>
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
                    include("./show.php");
                    ?>
                </div>
            </div>
            <?php include("../footer.php"); ?>
        </div>
        <script src="../Components/jquery-3.7.1.min.js"></script>
        <script src="../Components/bootstrap.bundle.min.js"></script>
        <script src="../Components/datatables.min.js"></script>
        <script src="../JS/scripts.js"></script>
</body>

</html>