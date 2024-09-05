<?php
session_start();
include('../../DataBase/conexion.php');
include("./metodos.php");


$id = $_POST['id'];
$NombreProducto = $_POST['nombre'];
$Descripcion = $_POST['Descripcion'];
$tamaño = $_POST['tamaño'];
$Precio = $_POST['Precio'];
$Etiqueta = $_POST['Etiqueta'];




if (isset($NombreProducto) && !empty($NombreProducto) && isset($Descripcion) && !empty($Descripcion) && isset($tamaño) && !empty($tamaño) && isset($Precio) && !empty($Precio) && isset($Etiqueta) && !empty($Etiqueta)) {

    if (!preg_match('/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑüÜ]+$/', $NombreProducto)) {
        echo "<div class='alert alert-danger'>Digite solo letras</div>";
    } else if (!preg_match('/^[a-zA-Z0-9\sáéíóúÁÉÍÓÚñÑüÜ.,]+$/', $Descripcion)) {
        echo "<div class='alert alert-danger'>La descripción no es valida</div>";
    } else if ($tamaño == 1) {
        echo "El tamaño no es válido.";
    } else if ($Precio == 1) {
        echo "El precio no es válido.";
    } else if ($Etiqueta === "") {
        echo "<div class='alert alert-danger'>Por favor escoge una opción</div>";
    } else {
        if (isset($_FILES['imagen']['name']) && $_FILES['imagen']['name'] != "") {
            $imagen = $_FILES['imagen'];
            $nombreImagen = $imagen['name'];
            $rutaImagen = '../../htdocs/Portafolio.2.0/imagenes/' . $nombreImagen;
            if (!move_uploaded_file($imagen['tmp_name'], $rutaImagen)) {
                echo "<div class='alert alert-danger'>Error al subir imagen</div>";
            } else {
                $nombreImagen = $_POST['nombreImagen'];
            }
        }
    }
} else {
    echo "<div class='alert alert-danger'>Campos obligatorios</div>";
}
