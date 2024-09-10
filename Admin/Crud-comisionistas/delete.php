<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
    <link rel="stylesheet" href="../Components/bootstrap.min.css">
    <script src="../Components/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../Components/alertify.min.css" />
    <link rel="stylesheet" href="../Components/default.min.css" />
    <link rel="stylesheet" href="../Components/icon.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="../../Components/sweetalert2@11.js"></script>
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

$id = $_GET["id"];
if (isset($_GET["id"])) {
    $sql = "DELETE FROM gestion_productos.comisionista WHERE UsuarioID = '$id'";
    $sql2 = "DELETE FROM gestion_productos.comision WHERE UsuarioID = '$id'";
    $result2 = mysqli_query($Link, $sql2);
    $result = mysqli_query($Link, $sql);
    if ($result === true && $result2 === true) {
        echo '<script>
            Swal.fire({
            title: "Comisionista Eliminado Correctamente",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true
            }).then((result) => {
            window.location.href = "../comisionistas.php";
            });
            </script>';
    }
} else {
    header("Location: ../inicio-Admin.php");
}
?>