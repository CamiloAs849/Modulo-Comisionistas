<?php
include("../../DataBase/conexion.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comision = $_POST['comision'];
    $id = $_POST['id'];
    $sql = "SELECT * FROM gestion_productos.comision WHERE UsuarioID = $id";
    $result = mysqli_query($Link, $sql);
    $row = mysqli_fetch_array($result);
    if ($comision == $row['PorcentajeComision']) {
        echo '<div class="alert alert-warning">No se ha modificado el porcentaje de comisión.</div>';
        exit();
    } else {
        if (empty($comision)) {
            echo '<div class="alert alert-danger">El porcentaje de comisión está vacío.</div>';
        } else if (!preg_match('/^-?\d+(\.\d{2}+)?$/', $comision)) {
            echo '<div class="alert alert-danger">El porcentaje de comisión es invalido.</div>';
        } else if ($comision > 100) {
            echo '<div class="alert alert-danger">El porcentaje de comisión no puede ser mayor a 100%.</div>';
        } else if ($comision < 1) {
            echo '<div class="alert alert-danger">El porcentaje de comisión no puede ser menor a 0%.</div>';
        } else {
            $query = "UPDATE gestion_productos.comision SET PorcentajeComision = '$comision' WHERE UsuarioID = $id";
            $result = mysqli_query($Link, $query);
            if ($result) {
                echo '<script>
                Swal.fire({
                    title: "Comisión actualizada correctamente!",
                    icon: "success",
                    confirmButtonText: "Aceptar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./comision.php";
                        }
                    });
            </script>';
            } else {
                echo '<script>
                Swal.fire({
                    title: "Error al actualizar la comisión",
                    icon: "error",
                    confirmButtonText: "Aceptar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./comision.php";
                        }
                    });

            </script>';
            }
        }
    }
}
