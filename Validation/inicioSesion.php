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
    echo '<div class="alert alert-danger alert-dismissible fade show"> El usuario y contraseña son requeridos.
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
} else if (empty($usuario)) {
    echo '<div class="alert alert-danger alert-dismissible fade show"> El usuario es requerido.
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
} else if (empty($password)) {
    echo '<div class="alert alert-danger alert-dismissible fade show"> La contraseña es requerida. 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
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
            $_SESSION['LoginComisionista'] = 1;
            $_SESSION['UsuarioID'] = $row['UsuarioID'];
            echo "<script>window.location.href = './Users/inicio.php';</script>";
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show">El usuario o contraseña son incorrectos.
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
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
                $_SESSION['LoginAdmin'] = 1;
                echo "<script>window.location.href = './Admin/Inicio-Admin.php';</script>";
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show">El usuario o contraseña son incorrectos.
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show">El usuario o contraseña son incorrectos. 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }
}
