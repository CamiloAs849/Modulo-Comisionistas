<?php
include("../../../DataBase/conexion.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['identificador'] == "editar-p") {
        $id = $_POST['ProveedorID'];
        $sql = "SELECT * FROM gestion_productos.proveedor WHERE Nit = '$id' ";
        $result = mysqli_query($Link, $sql);
        $row = mysqli_fetch_array($result);
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        if ($nombre == $row['NombreProveedor'] && $telefono == $row['Telefono'] && $direccion == $row['Direccion']) {
            echo '<div class="alert alert-warning">No se ha modificado ningún dato.</div>';
        } else {
            if (empty($nombre) || empty($telefono) || empty($direccion)) {
                echo '<div class="alert alert-danger">Llene todos los campos.</div>';
            } else if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ.\s]+$/', $nombre)) {
                echo '<div class="alert alert-danger">El Nombre solo puede contener letras.</div>';
            } else if (strlen($id) < 7 || strlen($id) > 10) {
                echo '<div class="alert alert-danger">El NIT es invalido.</div>';
            } else if (!is_numeric($telefono)) {
                echo '<div class="alert alert-danger">El número de teléfono es invalido.</div>';
            } else if (strlen($telefono) != 10) {
                echo '<div class="alert alert-danger">El número de teléfono es invalido.</div>';
            } else {
                $sql = "UPDATE gestion_productos.proveedor SET NombreProveedor = ?, Telefono = ?, Direccion = ?  WHERE ProveedorID = ? ";
                $stmt = $Link->prepare($sql);
                $stmt->bind_param("sssi", $nombre, $telefono, $direccion, $id);
                $result = $stmt->execute();
                if ($result) {
                    echo '<script>
                        Swal.fire({
                        title: "Proveedor actualizado correctamente!",
                        icon: "success",
                        confirmButtonText: "Aceptar"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./proveedores.php";
                        }
                        })
                    </script>';
                }
            }
        }
    }
}
