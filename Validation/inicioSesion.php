<?php
session_start();
include('../DataBase/conexion.php');

function validar($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$usuario = validar($_POST['UsuarioID']);
$password = validar($_POST['password']);


if (empty($usuario) && empty($password)) {
    echo '<div class="alert alert-danger"> El usuario y contraseña son requeridos.</div>';
} else if (empty($usuario)) {
    echo '<div class="alert alert-danger"> El usuario es requerido.</div>';
} else if (empty($password)) {
    echo '<div class="alert alert-danger"> La contraseña es requerida.</div>';
} else {
    // $contraseña = md5($contraseña);
    $sql = "SELECT * FROM gestion_productos.comisionista  WHERE UsuarioID = ? AND Password = ?";

    $stmt = $Link->prepare($sql);
    $stmt->bind_param("ss", $usuario, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if ($row['UsuarioID'] == $usuario && $row['Password'] == $password) {
            $sql = "SELECT * FROM gestion_productos.comision WHERE UsuarioID = ?";
            $stmt = $Link->prepare($sql);
            $stmt->bind_param("s", $usuario);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = mysqli_fetch_assoc($result);
            $_SESSION['comision'] = $row['PorcentajeComision'];
            $_SESSION['UsuarioID'] = $row['UsuarioID'];
            echo "<script>window.location.href = '../../Modulo-Comisionistas/Users/inicio.php';</script>";
        } else {
            echo '<div class="alert alert-danger">El usuario o contraseña son incorrectos.</div>';
        }
    } else {
        $sql = "SELECT * FROM gestion_productos.administrador WHERE AdminID = ? AND Password = ?";

        $stmt = $Link->prepare($sql);
        $stmt->bind_param("ss", $usuario, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['AdminID'] == $usuario && $row['Password'] == $password) {
                $_SESSION['AdminID'] = $row['AdminID'];
                echo "<script>window.location.href = '../../Modulo-Comisionistas/Admin/Inicio-Admin.php';</script>";
            } else {
                echo '<div class="alert alert-danger">El usuario o contraseña son incorrectos.</div>';
            }
        } else {
            echo '<div class="alert alert-danger">El usuario o contraseña son incorrectos.</div>';
        }
    }
}
