<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comisionistas</title>
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
        <link rel="stylesheet" href="../Components/datatables.min.css">
        <script src="https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"></script>
        <script src="../Components/jquery-3.7.1.min.js"></script>
        <link rel="icon" type="image/x-icon" href="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png">

</head>

<body>
    <?php
    include("../DataBase/conexion.php");
    session_start();
    $usuario = $_SESSION['AdminID'];
    if (empty($_SESSION['AdminID'])) {
        header("Location: ../index.php");
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
            <div class="sidebar col-xl-2  col-md-4 col-lg-3 p-0  ">
                <div class="offcanvas-md min-vh-100 bg-dark offcanvas-end" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header bg-dark">
                        <h5 class="offcanvas-title text-white" id="sidebarMenuLabel"><img src="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png" width="20" height="20" alt=""> Visión Limpieza</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body min-vh-100 d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active text-center text-white-50 d-flex align-items-center gap-2" aria-current="page" href="./Inicio-Admin.php">
                                    <i class="fa-solid fa-house"></i> Inicio
                                </a>
                            </li>
                        </ul>
                        <hr class="text-white">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link  text-white-50  d-flex align-items-center gap-2" href="./comisionistas.php">
                                    <i class="fa-solid fa-user"></i> Gestión de comisionistas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white-50 d-flex align-items-center gap-2" href="./proveedores.php">
                                    <i class="fa-solid fa-building"></i> Gestión de proveedores
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  text-white-50 d-flex align-items-center gap-2" href="./comision.php">
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
                                <a class="nav-link text-white-50 d-flex align-items-center gap-2" href="./guiaAdmin.php"><i class="fa-solid fa-question"></i> Uso de herramientas</a>
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
            <div class="col-md-8 col-xl-10 col-lg-9 ">
                <center>
                    <p class="mt-4 mb-4 title">Información de los productos</p>
                </center>
                <div class="row">
                    <div class="col-xxl-9 col-xl-9 col-lg-8 ">
                        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#agregar"><i class="fa-solid fa-plus"></i> Agregar producto</button>
                    </div>
                </div>
                <div class="table-responsive mb-5">
                    <table class="table table-bordered border-dark table-hover" id="tablaProductos">
                        <thead class="table-success">
                            <tr>
                                <th scope="col">Nombre del producto</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Tamaño</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Etiqueta</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('../DataBase/conexion.php');
                            $sql = "SELECT ProductoID, NombreProducto, imagen, Descripcion, tamaño, Precio, Etiqueta FROM gestion_productos.producto";
                            $conexion = $Link;
                            $result = mysqli_query($conexion, $sql);

                            while ($key = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $key['NombreProducto'] ?>
                                    </td>
                                    <td><img width="100" src="<?php echo './imagenes/' . $key['imagen'] ?>"
                                            alt="<?php echo $key['NombreProducto'] ?>">
                                    </td>
                                    <td>
                                        <?php echo $key['Descripcion'] ?>
                                    </td>
                                    <td>
                                        <?php echo $key['tamaño'] ?>
                                    </td>
                                    <td>
                                        $<?php echo number_format($key['Precio'], 0, '', '.') ?>
                                    </td>
                                    <td>
                                        <?php echo $key['Etiqueta'] ?>
                                    </td>
                                    <td class="d-flex justify-content-around mb-3">
                                        <button data-bs-target=" #Editar<?php echo $key['ProductoID'] ?>" data-bs-toggle="modal"
                                            class="btn me-2 btn-success"><i class="fas fa-pencil-alt"></i>Editar</button>
                                        <button class="btn btn-danger"
                                            onclick="confirmacion('<?php echo $key['ProductoID']; ?>')">
                                            <i class="fas fa-trash-alt"></i>Eliminar
                                        </button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
            include("../footer.php");
            ?>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#registroFormulario").on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: './CrudProductos/formularioAdmin.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $("#responseMessage").html(response);
                    }
                });
            });
        });
    </script>

    <?php include("../footer.php"); ?>
    <script src="../Components/jquery-3.7.1.min.js"></script>
    <script src="../Components/bootstrap.bundle.min.js"></script>
    <script src="../Components/datatables.min.js"></script>
    <script src="../JS/scripts.js"></script>
    <?php
    include("./Crud-comisionistas/create.php");
    include("./crud-proveedores/create.php");
    ?>
    <script>
        function confirmacion(id) {
            Swal.fire({
                title: "¿Estás seguro en eliminar este producto?",
                text: "Este proceso puede tardar unos segundos",
                icon: "warning",
                iconColor: "#ff0000",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Eliminar",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `./CrudProductos/eliminarProducto.php?id=${id}`;
                }
            });
        }
    </script>
    <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="agregar">Registrar producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!--FORMULARIO PARA AGREGAR PRODUCTOS-->

                <div class="modal-body">
                    <div id="responseMessage"></div>
                    <form id="registroFormulario" action="" method="post"
                        enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nombre del
                                producto</label>
                            <input type="text" class="form-control" id="NombreProducto" name="nombre">
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here"
                                id="floatingTextarea2" name="Descripcion" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Descripción</label>
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Tamaño</label>
                            <input type="text" class="form-control" id="tamaño" name="tamaño">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Precio</label>
                            <input type="number" class="form-control" id="Precio" name="Precio">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Insertar</label>
                            <select class="form-control" id="recipient-name" id="Etiqueta" name="Etiqueta">
                                <option value="nuevo">Nuevo</option>
                                <option value="promocion">Promoción</option>
                                <option value="Normal">Normal</option>
                            </select>
                        </div>
                        <div class="input-group mb-3" id="imagen">
                            <input type="file" class="form-control border-secondary" id="inputGroupFile04"
                                name="imagen" aria-describedby="inputGroupFileAddon04" aria-label="Upload"
                                accept=".jpg,.jpeg,.png">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="submit">Guardar</button>
                            <script>
                                // function guardara() {
                                //     Swal.fire({
                                //         title: "¿Estás seguro en guardar este nuevo producto?",
                                //         icon: "warning",
                                //         iconColor: "primary",
                                //         showCancelButton: true,
                                //         confirmButtonColor: "#4fad29",
                                //         cancelButtonColor: "#d33",
                                //         confirmButtonText: "Guardar",
                                //         cancelButtonText: "Cancelar",
                                //     }).then((result) => {
                                //         if (result.isConfirmed) {
                                //             window.location.href = "./vistaAdmin.php";
                                //         }
                                //     });
                                // }
                            </script>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    $sql = "SELECT*FROM gestion_productos.producto";
    $result = mysqli_query($Link, $sql);
    while ($row = mysqli_fetch_array($result)) { ?>

        <div class="modal fade" id="Editar<?php echo $row['ProductoID'] ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="agregar">Editar productos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!--FORMULARIO PARA EDITAR PRODUCTOS-->

                    <div class="modal-body">
                        <div id="responseMessages<?php echo $row['ProductoID'] ?>"></div>
                        <form id="editarFormulario<?php echo $row['ProductoID'] ?>" method="post"
                            enctype="multipart/form-data">
                            <input type="hidden" name="nombreImagen" value="<?php echo $row['imagen'] ?>">
                            <input type="hidden" name="id" value="<?php echo $row['ProductoID'] ?>">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nombre del
                                    producto</label>
                                <input type="text" class="form-control" id="NombreProducto"
                                    value="<?php echo $row['NombreProducto'] ?>" name="nombre">
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here"
                                    id="floatingTextarea2" name="Descripcion"
                                    style="height: 100px"><?php echo $row['Descripcion'] ?></textarea>
                                <label for="floatingTextarea2">Descripción</label>
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Tamaño</label>
                                <input type="text" class="form-control" id="tamaño"
                                    value="<?php echo $row['tamaño'] ?>" name="tamaño">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Precio</label>
                                <input type="number" class="form-control" id="Precio"
                                    value="<?php echo $row['Precio'] ?>" name="Precio">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Insertar</label>
                                <select class="form-control" id="recipient-name" id="Etiqueta" name="Etiqueta"
                                    value="<?php echo $row['Etiqueta'] ?>">
                                    <option value="nuevo">Nuevo</option>
                                    <option value="promocion">Promoción</option>
                                    <option value="Normal">Normal</option>
                                </select>
                            </div>
                            <div class="input-group mb-3" id="imagen"> <img width=" 100"
                                    src="<?php echo './imagenes/' . $row['imagen'] ?>"
                                    alt="<?php echo $row['NombreProducto'] ?>">
                                <input type="file" class="form-control border-secondary" id="inputGroupFile04"
                                    name="imagen" aria-describedby="inputGroupFileAddon04" aria-label="Upload"
                                    accept=".jpg,.jpeg,.png">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="submit"
                                    onclick="editar()">Guardar</button>
                                <script>
                                    function editar() {
                                        Swal.fire({
                                            title: "¿Estás seguro en editar este producto?",
                                            icon: "warning",
                                            iconColor: "#4fad29",
                                            showCancelButton: true,
                                            confirmButtonColor: "#4fad29",
                                            cancelButtonColor: "#d33",
                                            confirmButtonText: "Editar",
                                            cancelButtonText: "Cancelar",
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = "./vistaAdmin.php";
                                            }
                                        });
                                    }
                                </script>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $("#editarFormulario<?php echo $row['ProductoID'] ?>").on('submit', function(event) {
                    event.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        type: 'POST',
                        url: './CrudProductos/editarProductos.php',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $("#responseMessages<?php echo $row['ProductoID'] ?>").html(
                                response);
                        }
                    });
                });
            });
        </script>
    <?php
    }
    ?>
</body>

</html>