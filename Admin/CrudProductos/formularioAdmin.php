<?php
session_start();
include('../../DataBase/conexion.php');
include("./metodos.php");

function validar($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$NombreProducto = validar($_POST['nombre']);
$Descripcion = validar($_POST['Descripcion']);
$tamaño = validar($_POST['tamaño']);
$Precio = validar($_POST['Precio']);
$Etiqueta = validar($_POST['Etiqueta']);
$extensionesPermitidas = array("jpg", "jpeg", "png");
$imagen = $_FILES['imagen'];
$nombreImagen = $imagen["name"];
$extensionImagen = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));
$path = '../../../../htdocs/Modulo-Comisionistas/Admin/imagenes/' . $nombreImagen;

$sql = "SELECT * FROM gestion_productos.producto WHERE NombreProducto = ?";
$stmt = $Link->prepare($sql);
$stmt->bind_param('s', $NombreProducto);
$stmt->execute();
$result = $stmt->get_result();

if (!empty($NombreProducto) &&  !empty($Descripcion) && !empty($tamaño) && !empty($Precio) && !empty($Etiqueta) && !empty($imagen)) {

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='alert alert-warning'>Este producto ya existe.</div>";
    } else if (!preg_match('/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑüÜ]+$/', $NombreProducto)) {
        echo "<div class='alert alert-danger'>Digite solo letras.</div>";
    } else if (!preg_match('/^[a-zA-Z0-9\sáéíóúÁÉÍÓÚñÑüÜ.,]+$/', $Descripcion)) {
        echo "<div class='alert alert-danger'>La descripción no es valida.</div>";
    } else if ($tamaño == 1) {
        echo "<div class='alert alert-danger'>El tamaño no es válido.</div>";
    } else if ($Precio <= 1) {
        echo "<div class='alert alert-danger'>El precio no es válido.</div>";
    } else if ($Etiqueta === "") {
        echo "<div class='alert alert-danger'>Por favor escoge una opción.</div>";
    } else if (!in_array($extensionImagen, $extensionesPermitidas)) {
        echo "<div class='alert alert-danger'>Formato de imagen invalido.</div>";
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
    echo "<div class='alert alert-danger'>Campos obligatorios.</div>";
}
