<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("/xampp/htdocs/Modulo-Comisionistas/DataBase/conexion.php");

    $id = $_POST['documento'];
    $sql = "UPDATE gestion_productos.solicitudcomisionista SET EstadoSolicitud = 'Rechazada' WHERE UsuarioID = ?";
    $stmt = $Link->prepare($sql);
    $stmt->bind_param('i', $id);
    $result = $stmt->execute();
    if ($result) {
        echo '<script>
        Swal.fire({
        title: "La solicitud ha sido rechazada correctamente",
        icon: "success",
        confirmButtonText: "Aceptar"
        }).then((result) => {
            window.location.href = "./solicitudComisionistas.php";
        });
    </script>';
    }
}
