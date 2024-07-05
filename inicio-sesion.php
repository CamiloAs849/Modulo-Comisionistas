<?php
session_start();
include('conexion.php');

if (isset($_POST['UsuarioID']) && $_POST['password']) {
    function validar($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $usuario = validar($_POST['UsuarioID']);
    $contraseña = validar($_POST['password']);

    if (empty($usuario)) {
        header("Location: index.php?error=El usuario es requerido");
        exit();
    } elseif (empty($contraseña)) {
        header("Location: index.php?error=La contraseña es requerida");
        exit();
    } else {
        // $contraseña = md5($contraseña);
        $sql = "SELECT * FROM gestion_productos.comisionista  WHERE UsuarioID = '$usuario' AND Password= '$contraseña'";

        $result = mysqli_query($Link, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['UsuarioID'] === $usuario && $row['Password'] === $contraseña) {
                $_SESSION['UsuarioID'] = $row['UsuarioID'];
                $_SESSION['password'] = $row['password'];
                header("Location: Inicio.php");
                exit();
            } else {
                header("Location: index.php?error=El usuario o contraseña son incorrectos");
                exit();
            }
        } else {
            header("Location: index.php?error=El usuario o contraseña son incorrectos");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
