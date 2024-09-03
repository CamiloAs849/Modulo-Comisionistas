<?php
session_start();
if (!empty($_POST['id'])) {
    if (isset($_POST["id"]) && isset($_POST["cantidad"])) {
        if (empty($_SESSION["carrito"])) {
            $_SESSION['carrito'] = array(array("id" => $_POST["id"], "cantidad" => $_POST["cantidad"]));
        } else {
            array_push($_SESSION['carrito'], array("id" => $_POST["id"], "cantidad" => $_POST["cantidad"]));
        }
        header("Location: ../nuevo-pedido.php");
    }
}
