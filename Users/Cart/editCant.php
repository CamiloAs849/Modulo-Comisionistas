<?php
session_start();
$cantidad = $_POST['cantidad'];
$carrito = $_SESSION['carrito'];
$id = $_POST['id'];




foreach ($carrito as &$c) {
    if ($c["id"] == $id) {
        $c["cantidad"] = $cantidad;
        break;
    }
}

$_SESSION['carrito'] = $carrito;

header("Location: " . $_SERVER['HTTP_REFERER'] . "");
