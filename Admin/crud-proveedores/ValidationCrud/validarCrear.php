<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['identificador'] == 'crear') {
        include("../../../DataBase/conexion.php");
        function validar($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $nit = validar($_POST['ProveedorID']);
        $nombre = validar($_POST['nombre']);
        $telefono = validar($_POST['telefono']);
        $direccion = validar($_POST['direccion']);
        if (empty($nit) || empty($telefono) || empty($direccion) || empty($nombre)) {
            echo "<div class='alert alert-danger'> Llene todos los campos.</div>";
        } else {
            if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ.\s]+$/', $nombre)) {
                echo "<div class='alert alert-danger'> El nombre es invalido.</div>";
            } else if (strlen($nit) < 7 || strlen($nit) > 11) {
                echo "<div class='alert alert-danger'>El NIT es invalido.</div>";
            } else if (strlen($telefono) != 10) {
                echo "<div class='alert alert-danger'>El número de teléfono es invalido.</div>";
            } else {

                $sql = "INSERT INTO gestion_productos.proveedor (ProveedorID, NombreProveedor, Telefono, Direccion) VALUES (?, ?, ?, ?)";
                $stmt = $Link->prepare($sql);
                $stmt->bind_param("ssss", $nit, $nombre, $telefono, $direccion);
                $result = $stmt->execute();
                if ($result) {
                    echo  '<script>
                                 Swal.fire({
                                     title: "Proveedor añadido exitosamente!",
                                     icon: "success",
                                     confirmButtonText: "Aceptar"
                                 }).then((result) => {
                                     if (result.isConfirmed) {
                                         window.location.href = "./proveedores.php";
                                     }
                                 });
                             </script>';
                } else {
                    echo  '<script>
                                 Swal.fire({
                                     title: "Error al añadir el proveedor!",
                                     icon: "error",
                                     confirmButtonText: "Aceptar"
                                 }).then((result) => {
                                     if (result.isConfirmed) {
                                         window.location.href = "./proveedores.php";
                                     }
                                 });
                             </script>';
                }
            }
        }
    }
}
