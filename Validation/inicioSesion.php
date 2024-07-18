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
    header("Location: ../index.php?error=El usuario y contraseña son requeridos");
    exit();
} else if (empty($usuario)) {
    header("Location: ../index.php?error=El usuario es requerido");
    exit();
} else if (empty($password)) {
    header("Location: ../index.php?error=La contraseña es requerida");
    exit();
} else {
    // $contraseña = md5($contraseña);
    $sql = "SELECT * FROM gestion_productos.comisionista  WHERE UsuarioID = '$usuario' AND Password = '$password'";

    $result = mysqli_query($Link, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['UsuarioID'] === $usuario && $row['Password'] === $password) {
            $_SESSION['UsuarioID'] = $row['UsuarioID'];
            $_SESSION['NombreUsuario'] = $row['NombreUsuario'];
            $_SESSION['ApellidoUsuario'] = $row['ApellidoUsuario'];
            $_SESSION['Edad'] = $row['Edad'];
            $_SESSION['Correo'] = $row['Correo'];
            $_SESSION['TelefonoUsuario'] = $row['TelefonoUsuario'];
            $_SESSION['Direccion'] = $row['Direccion'];
            $_SESSION['Ciudad'] = $row['Ciudad'];
            $_SESSION['password'] = $row['password'];
            sleep(1);
            header("Location: ../Users/Inicio.php");
            exit();
        } else {
            header("Location: ../index.php?error=El usuario o contraseña son incorrectos");
            exit();
        }
    } else {
        $sql = "SELECT * FROM gestion_productos.administrador WHERE AdminID = '$usuario' AND Password = '$password'";

        $result = mysqli_query($Link, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['AdminID'] === $usuario && $row['Password'] === $password) {
                $_SESSION['AdminID'] = $row['AdminID'];
                sleep(1);
                header("Location: ../admin/Inicio-admin.php");
                exit();
            } else {
                header("Location: ../index.php?error=El usuario o contraseña son incorrectos");
                exit();
            }
        } else {
            header("Location: ../index.php?error=El usuario o contraseña son incorrectos");
            exit();
        }
    }
}
