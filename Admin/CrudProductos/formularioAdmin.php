<?php
session_start();
include('../../DataBase/conexion.php');
include("./metodos.php");

$NombreProducto = $_POST['nombre'];
$Descripcion = $_POST['Descripcion'];
$tamaño = $_POST['tamaño'];
$Precio = $_POST['Precio'];
$Etiqueta = $_POST['Etiqueta'];
$extensionesPermitidas = array("jpg", "jpeg", "png");
$imagen = $_FILES['imagen'];
$nombreImagen = $imagen["name"];
$extensionImagen = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));
$path = '../../../../htdocs/Modulo-Comisionistas/Admin/imagenes/' . $nombreImagen;

if (isset($NombreProducto) && !empty($NombreProducto) && isset($Descripcion) && !empty($Descripcion) && isset($tamaño) && !empty($tamaño) && isset($Precio) && !empty($Precio) && isset($Etiqueta) && !empty($Etiqueta) && isset($imagen) && !empty($imagen)) {

    if (!preg_match('/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑüÜ]+$/', $NombreProducto)) {
        echo "<div class='alert alert-danger'>Digite solo letras</div>";
    } else if (!preg_match('/^[a-zA-Z0-9\sáéíóúÁÉÍÓÚñÑüÜ.,]+$/', $Descripcion)) {
        echo "<div class='alert alert-danger'>La descripción no es valida</div>";
    } else if ($tamaño == 1) {
        echo "<div class='alert alert-danger'>El tamaño no es válido</div>";
    } else if ($Precio <= 1) {
        echo "<div class='alert alert-danger'>El precio no es válido.";
    } else if ($Etiqueta === "") {
        echo "<div class='alert alert-danger'>Por favor escoge una opción</div>";
    } else if (!in_array($extensionImagen, $extensionesPermitidas)) {
        echo "<div class='alert alert-danger'>Formato invalido</div>";
    } else {
        if (move_uploaded_file($imagen['tmp_name'], $path)) {
            $datos = [$NombreProducto, $nombreImagen, $Descripcion, $tamaño, $Precio, $Etiqueta];
            $obj = new Metodos();

            if ($obj->insertarDatos($datos) == 1) {
                echo "<script>
                    Swal.fire({
                        title: 'Registro exitoso!',
                        text: 'El producto ha sido creado correctamente',
                        icon:'success',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = './Inicio-Admin.php';
                        }
                    });
                </script>";
            } else {
                echo "<div class='alert alert-danger'>Error al insertar datos</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Error al subir imagen</div>";
        }
    }
} else {
    echo "<div class='alert alert-danger'>Campos obligatorios</div>";
}
