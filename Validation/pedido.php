<?php
session_start();
include '../DataBase/conexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioID = $_SESSION['UsuarioID'];
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $direccion = $_POST['Direccion'];
    $ciudad = $_POST['Ciudad'];
    $telefono = $_POST['Telefono'];
    $correo = $_POST['Correo'];
    $fechaPedido = $_POST['fechaPedido'];
    $totalPagar = $_POST['TotalPagar'];

    if (empty($nombre) || empty($apellido) || empty($direccion) || empty($ciudad) || empty($telefono) || empty($correo) || empty($fechaPedido) || empty($totalPagar)) {
        echo '<div class="alert alert-danger">Llene todos los campos</div>';
    } else {
        if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $nombre) || !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $apellido)) {
            echo '<div class="alert alert-danger">El nombre y apellido solo pueden contener letras.</div>';
        } else if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $ciudad)) {
            echo '<div class="alert alert-danger">La ciudad solo puede contener letras.</div>';
        } else if (!is_numeric($telefono)) {
            echo '<div class="alert alert-danger">Teléfono solo puede contener números.</div>';
        } else if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            echo '<div class="alert alert-danger">El correo es invalido.</div>';
        } else if (strlen($telefono) != 10) {
            echo '<div class="alert alert-danger">El número de teléfono es invalido.</div>';
        } else {
            echo "<hr>$usuarioID";
            echo "<hr>$direccion";
            echo "<hr>$ciudad";
            echo "<hr>$telefono";
            echo "<hr>$correo";
            echo "<hr>$fechaPedido";
            echo "<hr>$totalPagar";
            foreach ($_SESSION['carrito'] as $producto) {
                $productos = $Link->query("SELECT * FROM gestion_productos.producto WHERE ProductoID=$producto[id]");
                $lol = $productos->fetch_object();
                echo "<hr>" . $producto['cantidad'];
                echo "<hr>" . $lol->NombreProducto;
            }
        }
    }
}
