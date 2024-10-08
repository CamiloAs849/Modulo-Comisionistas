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
                                <a class="nav-link text-white-50 d-flex align-items-center gap-2" href="../index.php#portafolio">
                                    <i class="fa-solid fa-boxes-stacked"></i> Catálogo
                                </a>
                            </li>
                        </ul>
                        <hr style="color: white;">
                        <ul class="nav flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 active" href="./edit.php">
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
                                    <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
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
                                <button type="button" class="btn btn-primary" onclick="Confirm()">Cerrar sesión</button>
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
                <p class="text-center mb-3 mt-5 title">Editar información personal</p>
                <p class="note text-center fs-6">Comunicate al <a href="https://wa.me/3127087946/?text=HOLA%20MUNDO" target="_blank"><i class="fa-brands fa-whatsapp"></i></a> para cambiar los datos en grises</p>
                <div class="mx-4">
                    <form method="post" id="FormEdit">
                        <div class="mb-3 row justify-content-md-center">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" maxlength="15" id="Documento" name="Documento" aria-describedby="emailHelp" placeholder="" disabled value="<?php echo $usuario ?>">
                                    <label for="Documento">Numero de documento</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-md-center">
                            <div class="mb-3 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" maxlength="50" id="NombreUsuario" name="NombreUsuario" placeholder="" disabled value="<?php echo $nombreUsuario ?>">
                                    <label for="Nombre" class="form-label">Nombre</label>
                                </div>
                            </div>

                            <div class="mb-3 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" maxlength="50" id="ApellidosUsuario" name="ApellidosUsuario" placeholder="" disabled value="<?php echo $apellidoUsuario ?>">
                                    <label for="Apellidos" class="form-label">Apellidos</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-md-center">
                            <div class="mb-3 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="form-floating">
                                    <input type="number" class="form-control" maxlength="3" id="Edad" name="Edad" placeholder="" disabled value="<?php echo $Edad ?>">
                                    <label for="Edad" class="form-label">Edad</label>
                                </div>
                            </div>

                            <div class="mb-3 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="form-floating">
                                    <input type="number" class="form-control" maxlength="15" id="Telefono" name="TelefonoUsuario" placeholder="" value="<?php echo $telefonoUsuario ?>">
                                    <label for="Telefono" class="form-label">Teléfono</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-md-center">
                            <div class=" mb-3 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="Correo" maxlength="100" name="Correo" placeholder="" value="<?php echo $correoUsuario ?>">
                                    <label for="Correo" class="form-label">Correo Electrónico</label>
                                    <div class="text-danger" id="mensaje-correo">

                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="form-floating">
                                    <textarea type="number " maxlength="70" class="form-control" id="Direccion" name="Dirrecion" placeholder="" rows="1"><?php echo $direccionUsuario ?></textarea>
                                    <label for="Dirrecion" class="form-label">Dirreción</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-md-center">
                            <div class="mb-3 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="form-floating">
                                    <input type="text" maxlength="50" class="form-control" id="Ciudad" name="Ciudad" placeholder="" value="<?php echo $Ciudad ?>">
                                    <label for="Ciudad" class="form-label">Ciudad</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="form-floating">
                                    <input type="password" maxlength="15" class="form-control" id="password" name="Password" disabled placeholder="" value="<?php echo $contraseña ?>">
                                    <label for="password" class="form-label">Contraseña</label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-4">
                            <button type="submit" class="btn btn-outline-success">Actualizar datos</button>
                        </div>
                        <center>
                            <div class="text-center w-25 " id="message">
                            </div>
                        </center>

                    </form>
                </div>

            </div>
            <?php
            include("../footer.php") ?>

        </div>

    </div>
    <script>
        $(document).ready(function() {
            $("#FormEdit").on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: '../Validation/editarDatos.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#message').html(response)
                    }
                })
            })
        });
    </script>
</body>

</html>