<?php
include '../DataBase/conexion.php';
session_start();

if (empty($_SESSION['AdminID'])) {
    header("Location:../index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comision</title>
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
            <div class="sidebar col-xl-2  col-md-4 col-lg-3 p-0 ">
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
                                <a class="nav-link text-white-50 d-flex align-items-center gap-2" href="./comisionistas.php">
                                    <i class="fa-solid fa-user"></i> Gestión de comisionistas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white-50 d-flex align-items-center gap-2" href="./proveedores.php">
                                    <i class="fa-solid fa-building"></i> Gestión de proveedores
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active d-flex align-items-center gap-2" href="./comision.php">
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
            <div class="col-md-8 col-xl-10 col-lg-9">
                <center>
                    <p class="mt-4 mb-4 title">
                        Comisión de comisionistas
                    </p>
                </center>
                <div class="row">
                    <div class="col-xxl-9 col-xl-9 col-lg-8 ">
                        <button type="button" class="btn btn-primary mb-4" onclick="ConfirmReport();"><i class="fa-solid fa-file-arrow-down"></i> Descargar</button>
                    </div>
                </div>
                <div class="table-responsive mb-5">
                    <table class="table table-bordered border-dark table-hover" id="comisionTable">
                        <thead class="table-success">
                            <tr>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Valor de comisión</th>
                                <th>Acumulado de comisión</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT c.UsuarioID, c.NombreUsuario, c.ApellidosUsuario,
                                    cm.ValorComision, cm.AcumuladoComision FROM comisionista c JOIN comision cm ON c.UsuarioID = cm.UsuarioID;";

                            $result = mysqli_query($Link, $sql);
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['UsuarioID'] ?></td>
                                    <td><?php echo $row['NombreUsuario'] ?></td>
                                    <td><?php echo $row['ApellidosUsuario'] ?></td>
                                    <td>$<?php echo number_format($row['ValorComision'], 0, '', '.') ?></td>
                                    <td>$<?php echo number_format($row['AcumuladoComision'], 0, '', '.') ?></td>
                                    <td class="text-center"><button type="button" data-bs-toggle="modal" data-bs-target="#editarComision<?php echo $row['UsuarioID'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Editar</button></td>
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
            include("./editarComision/editarComision.php")
            ?>
        </div>
    </div>
    <script src="../Components/jquery-3.7.1.min.js"></script>
    <script src="../Components/bootstrap.bundle.min.js"></script>
    <script src="../Components/datatables.min.js"></script>
    <script src="../JS/scripts.js"></script>
</body>

</html>