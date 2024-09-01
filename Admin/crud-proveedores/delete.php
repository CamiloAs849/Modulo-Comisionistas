<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../Components/bootstrap.min.css">
    <link rel="stylesheet" href="../Components/alertify.min.css" />
    <link rel="stylesheet" href="../Components/default.min.css" />
    <link rel="stylesheet" href="../Components/icon.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="../../Components/sweetalert2@11.js"></script>
    <link rel="stylesheet" href="../../Components/datatables.min.css">
    <script src="https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"></script>

</head>

<body>

</body>

</html>


<?php
include("/xampp/htdocs/Modulo-Comisionistas/DataBase/conexion.php");
session_start();
if (empty($_SESSION['AdminID'])) {
    header("Location:../index.php");
    exit();
}
$id = $_GET['id'];
if (isset($_GET['id'])) {
    $sql = "DELETE FROM gestion_productos.proveedor WHERE ProveedorID = '$id'";
    $result = mysqli_query($Link, $sql);
    if ($result) {
        echo "<script>
            Swal.fire({
            title: 'Proveedor Eliminado Correctamente',
            icon: 'success',
            confirmButtonText: 'Aceptar'
            }).then((result) => {
            if (result.isConfirmed) {
            window.location.href = '../proveedores.php';
            }
            });
            </script>";
    }
} else {
    header("Location: ../inicio-Admin.php");
}
