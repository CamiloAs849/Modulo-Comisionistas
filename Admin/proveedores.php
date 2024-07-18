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


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="Inicio-Admin.php"><?php echo $nombreUsuario ?></a>

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
                    <li class="nav-item dropdown text-center mx-2 mx-lg-1">
                        <a class="nav-link" href="comisionistas.php" role="button">
                            <div>
                                <i class="fa-solid fa-user"></i>
                            </div>
                            Gestionar comisionistas
                        </a>
                    </li>
                    <li class="nav-item dropdown text-center mx-2 mx-lg-1">
                        <a class="nav-link active" href="./proveedores.php" role="button">
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
            <h2 class="mt-4 mb-4">
                Información de los proveedores
            </h2>
        </center>
        <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#crear"><i class="fa-solid fa-plus"></i> Agregar Proveedor</button>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">NIT</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM gestion_productos.proveedor";
                    $result = mysqli_query($Link, $sql);
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $row['ProveedorID'] ?></td>
                            <td><?php echo $row['NombreProveedor'] ?></td>
                            <td><?php echo $row['Telefono'] ?></td>
                            <td><?php echo $row['Direccion'] ?></td>
                            <td>
                                <div class="d-flex justify-content-around mb-3">
                                    <button class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#editar<?php echo $row['ProveedorID'] ?>"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                                    <button class="btn btn-info me-2" data-bs-toggle="modal" data-bs-target="#ver<?php echo $row['ProveedorID'] ?>"><i class="fa-solid fa-eye"></i> Ver</button>
                                    <button class="btn btn-danger" onclick="ConfirmDelete(<?php echo $row['ProveedorID']; ?>)"><i class="fa-solid fa-trash-alt"></i> Eliminar</button>
                                </div>
                            </td>
                </tbody>
                <!-- Modal de editar -->
                <div class="modal fade" id="editar<?php echo $row['ProveedorID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir un proveedor</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <div class="mb-3 row justify-content-md-center">
                                        <div class="col">
                                            <input type="hidden" name="identificador" value="editar-p">
                                            <input type="hidden" name="ProveedorID" value="<?php echo $row['ProveedorID']; ?>">
                                            <label for="nit" class="col-form-label">NIT de la empresa:</label>
                                            <input type="number" class="form-control" disabled id="nit" name="nit" value="<?php echo $row['ProveedorID'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row justify-content-md-center">
                                        <div class="col">
                                            <label for="nombre" class="col-form-label">Nombre o razón social:</label>
                                            <input type="text" class="form-control" id="nombre" value="<?php echo $row['NombreProveedor'] ?>" name="nombre" required>
                                        </div>
                                        <div class="col">
                                            <label for="telefono" class="col-form-label">Teléfono:</label>
                                            <input type="number" class="form-control" value="<?php echo $row['Telefono'] ?>" id="telefono" name="telefono" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row justify-content-md-center">
                                        <div class="col">
                                            <label for="direccion" class="col-form-label">Dirección:</label>
                                            <input type="text" class="form-control" value="<?php echo $row['Direccion'] ?>" id="edad" name="direccion" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cerrar</button>
                                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal de ver -->
                <div class="modal fade" id="ver<?php echo $row['ProveedorID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Información de <?php echo $row['NombreProveedor'] ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <div>
                                        <b>NIT: </b>
                                        <?php echo $row['ProveedorID'] ?>
                                    </div>
                                    <div>
                                        <b>Nombre: </b><?php echo $row['NombreProveedor'] ?>
                                    </div>
                                    <div>
                                        <b>Teléfono: </b><?php echo $row['Telefono'] ?>
                                    </div>
                                    <div>
                                        <b>Dirección: </b>
                                        <?php echo $row['Direccion'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <script>
            function ConfirmDelete(id) {
                Swal.fire({
                    title: '¿Estás seguro de eliminar este proveedor?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `./crud-proveedores/eliminar.php?id=${id}`;
                    }
                });
            }
        </script>

    <?php
                    }
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if ($_POST['identificador'] == "editar-p") {
                            $id = $_POST['ProveedorID'];
                            $nombre = $_POST['nombre'];
                            $telefono = $_POST['telefono'];
                            $direccion = $_POST['direccion'];

                            $sql = "UPDATE gestion_productos.proveedor SET NombreProveedor = '$nombre', Telefono = '$telefono', Direccion = '$direccion'  WHERE ProveedorID = '$id' ";

                            $result = mysqli_query($Link, $sql);
                            if ($result) {
                                echo '<script>
                                        Swal.fire({
                                        title: "Proveedor actualizado correctamente!",
                                        icon: "success",
                                        confirmButtonText: "Aceptar"
                                        }).then((result) => {
                                        if (result.isConfirmed) {
                                        window.location.href = "./proveedores.php";
                                        }
                                        })
                                    </script>';
                            }
                        }
                    }
    ?>
    </table>
    <?php
    include("./crud-proveedores/crear.php");
    ?>
    </div>
    </div>
</body>

</html>