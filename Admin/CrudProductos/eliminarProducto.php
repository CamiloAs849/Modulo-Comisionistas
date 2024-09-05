<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
    <script src="./js/sweetalert2@11.js"></script>
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
    $sql = "DELETE FROM gestion_productos.producto WHERE ProductoID = $id";
    $result = mysqli_query($Link, $sql);

    if ($result) {
        header("Location: ../inicio-Admin.php");
    }
}
