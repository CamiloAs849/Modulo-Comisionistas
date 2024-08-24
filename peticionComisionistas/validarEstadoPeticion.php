<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("../DataBase/conexion.php");
    $documento = $_POST['documento'];
    if (empty($documento)) {
        echo "<div class='alert alert-danger'>Debes ingresar un número de documento.</div>";
    } else if (strlen($documento) < 7 || strlen($documento) > 11) {
        echo "<div class='alert alert-danger'>El documento no es valido.</div>";
    } else {
        $sql = "SELECT * FROM gestion_productos.solicitudcomisionista WHERE UsuarioID = ?";
        $stmt = $Link->prepare($sql);
        $stmt->bind_param("i", $documento);
        $stmt->execute();
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            if ($row['EstadoSolicitud'] == 'Pendiente') {
                $numeroSolicitud = $row['SolicitudID'];
                echo "<div class='alert alert-warning'>Tu solicitud está pendiente a verificar con el número $numeroSolicitud.</div>";
            } else if ($row['EstadoSolicitud'] == 'Aceptada') {
                echo "<div class='alert alert-success'>Tu solicitud ha sido aceptada.</div>";
            } else {
                echo "<div class='alert alert-danger'>Tu solicitud ha sido rechazada.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Este número de documento no hecho ninguna petición.</div>";
        }
    }
}
