<?php
session_start();

if (!empty($_SESSION['carrito'])) {
    $carrito = $_SESSION['carrito'];
    if (count($carrito) == 1) {
        unset($_SESSION['carrito']);
    } else {
        $nuevo = array();
        foreach ($carrito as $c) {
            if ($c['id'] != $_GET['id']) {
                $nuevo[] = $c;
            }
        }
        $_SESSION['carrito'] = $nuevo;
    }
}

header('Location: ../nuevo-pedido.php');
