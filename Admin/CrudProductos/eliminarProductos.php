<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
    <script src="../../Components/sweetalert2@11.js"></script>
</head>

<body>
</body>

</html>

<?php
session_start();
include('../../DataBase/conexion.php');
include("./metodos.php");


$id = $_GET['id'];

if (isset($id)) {
    $sql = "SELECT imagen FROM gestion_productos.producto WHERE ProductoID = $id";
    $result = mysqli_query($Link, $sql);
    $row = mysqli_fetch_array($result);
    $path = "../imagenes/";
    unlink($path . $row['imagen']);
    $sql2 = "DELETE FROM gestion_productos.producto WHERE ProductoID = $id";
    $result = mysqli_query($Link, $sql2);

    if ($result) {
        echo "<script>
            Swal.fire({
            title: 'Producto Eliminado Correctamente',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true
            }).then(function() {
            window.location.href = '../inicio-Admin.php';
            });
            </script>";
    }
}
