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


</head>

<body>
    <?php
    include("../DataBase/conexion.php");
    session_start();
    $usuario = $_SESSION['AdminID'];
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
                                <i class="material-icons">home</i>
                            </div>
                            Inicio
                        </a>
                    </li>
                    <li class="nav-item text-center mx-2 mx-lg-1">
                        <a class="nav-link" aria-current="page" href="catalogo.php">
                            <div>
                                <i class="material-icons">inventory_2</i>
                            </div>
                            Catálogo
                        </a>
                    </li>
                    <li class="nav-item dropdown text-center mx-2 mx-lg-1">
                        <a class="nav-link active" href="comisionistas.php" role="button">
                            <div>
                                <i class="material-icons">person</i>
                            </div>
                            Gestionar comisionistas
                        </a>
                    </li>
                </ul>
                <!-- Left links -->

                <!-- Right links -->
                <ul class="navbar-nav ms-auto d-flex flex-row mt-3 mt-lg-0">
                    <li class="nav-item dropdown text-center mx-2 mx-lg-1">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div>
                                <i class="material-icons">settings</i>
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
                                <i class=" material-icons">logout</i>
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
</body>

<div class="container">
    <center>
        <h2 class="mt-4 mb-4">Información de los comisionistas</h2>
    </center>

    <div class="table-responsive">
        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#crear">Agregar comisionista</button>
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="">
                    <th scope="col">Numero de documento</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM gestion_productos.comisionista ORDER BY NombreUsuario ASC";

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
                        <td>
                            <div class="d-flex justify-content-around">
                                <button class="btn btn-warning me-2" href="" data-bs-toggle="modal" data-bs-id="<?php echo $row['UsuarioID']; ?>" data-bs-target=" #editar<?php echo $row['UsuarioID'] ?>"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                                <button class="btn btn-info me-2"><i class="fa-solid fa-eye"></i> Ver</button>
                                <button class="btn btn-danger"><i class="fa-solid fa-delete-left"></i> Eliminar</button>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <?php
        include("./Crud-comisionistas/crear.php");
        include("./Crud-comisionistas/editar.php");
        ?>
        <script>
            var editar = document.getElementById('editar');

            editar.addEventListener('show.bs.modal', event => {
                let button = event.relatedTarget
                let UsuarioID = button.getAttribute('data-bs-id')

                let InputID = editar = editar.querySelector('.modal-body #documento')
                let InputNombre = editar.querySelector('.modal-body #nombre')
                let InputApellido = editar.querySelector('.modal-body #apellido')
                let InputEdad = editar.querySelector('.modal-body #edad')
                let InputTelefono = editar.querySelector('.modal-body #telefono')
                let InputCorreo = editar.querySelector('.modal-body #correo')
                let InputDireccion = editar.querySelector('.modal-body #direccion')
                let InputCiudad = editar.querySelector('.modal-body #ciudad')
                let inputPassword = editar.querySelector('.modal-body #password')
            })
        </script>


    </div>
</div>

</html>