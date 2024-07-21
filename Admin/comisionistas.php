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
                        <a class="nav-link" aria-current="page" href="Inicio-Admin.php">
                            <div>
                                <i class="fa-solid fa-house"></i>
                            </div>
                            Inicio
                        </a>
                    </li>
                    <li class="nav-item dropdown text-center mx-2 mx-lg-1">
                        <a class="nav-link active" href="comisionistas.php" role="button">
                            <div>
                                <i class="fa-solid fa-user"></i>
                            </div>
                            Gestionar comisionistas
                        </a>
                    </li>
                    <li class="nav-item dropdown text-center mx-2 mx-lg-1">
                        <a class="nav-link" href="proveedores.php" role="button">
                            <div>
                                <i class="fa-solid fa-building"></i>
                            </div>
                            Gestionar Proveedores
                        </a>
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
                            Cerrar sesion
                        </button>

                    </li>
                </ul>
                <!-- Right links -->
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
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
                    <button type="button" class="btn btn-primary" onclick="Confirm()">Cerrar Sesion</button>
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
        <center>
            <p class="mt-4 mb-4 title">Información de los comisionistas</p>
        </center>
        <div class="row">
            <div class="col-xxl-9 col-xl-9 col-lg-8">
                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#crear"><i class="fa-solid fa-plus"></i> Agregar comisionista</button>
            </div>
        </div>
        <div class="table-responsive ">
            <table class="table table-bordered border-dark table-hover" id="comisionistas">
                <thead class="table-success">
                    <tr>
                        <th scope="col">Documento</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM gestion_productos.comisionista";

                    $result = mysqli_query($Link, $sql);

                    while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $row['UsuarioID'] ?></td>
                            <td><?php echo $row['NombreUsuario'] ?></td>
                            <td><?php echo $row['ApellidosUsuario'] ?></td>
                            <td><?php echo $row['Edad'] ?></td>
                            <td><?php echo $row['TelefonoUsuario'] ?></td>
                            <td><?php echo $row['Correo'] ?></td>
                            <td><?php echo $row['Direccion'] ?></td>
                            <td><?php echo $row['Ciudad'] ?></td>
                            <td><?php echo $row['Password'] ?></td>

                            <td>
                                <div class="d-flex justify-content-around mb-3">
                                    <button class="btn btn-warning me-2" href="" data-bs-toggle="modal" data-bs-target=" #editar<?php echo $row['UsuarioID'] ?>"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                                    <button class="btn btn-info me-2" data-bs-toggle="modal" data-bs-target="#ver<?php echo $row['UsuarioID'] ?>"><i class="fa-solid fa-eye"></i> Ver</button>
                                    <button class="btn btn-danger" onclick="ConfirmDeleteCom(<?php echo $row['UsuarioID']; ?>)"><i class="fa-solid fa-delete-left"></i> Eliminar</button>
                                </div>
                            </td>
                        <?php
                    }
                        ?>
                </tbody>
            </table>
            <script src="../Components/jquery-3.7.1.min.js"></script>
            <script src="../Components/bootstrap.bundle.min.js"></script>
            <script src="../Components/datatables.min.js"></script>
            <script src="../JS/scripts.js"></script>
            <?php
            include("./Crud-comisionistas/create.php");
            include("./Crud-comisionistas/edit.php");
            include("./Crud-comisionistas/show.php");
            ?>
        </div>

        <br>
        <br>
        <br>
    </div>
</body>

</html>