<?php
session_start();
// if (empty($_SESSION['UsuarioID'])) {
//     header("Location: ../index.php");
//     exit();
// }
$carritoMio = $_SESSION['carrito'];

if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $num = 0;
    $carritoMio = array("nombre" => $nombre, "precio" => $precio, "cantidad" => $cantidad);
} else {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $num = 0;
    $carritoMio = array("nombre" => $nombre, "precio" => $precio, "cantidad" => $cantidad);
}

$_SESSION['carrito'] = $carritoMio;

header("Location:" . $_SERVER['HTTP_REFERER'] . "");
