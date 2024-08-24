<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include("../DataBase/conexion.php");
    $documento = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $fecha = $_POST['fecha'];
    $estado = "Pendiente";

    $sql = "SELECT * FROM gestion_productos.solicitudcomisionista WHERE UsuarioID = ?";
    $stmt = $Link->prepare($sql);
    $stmt->bind_param("i", $documento);
    $stmt->execute();
    $result = $stmt->get_result();
    if (mysqli_num_rows($result) > 0) {
        echo "<div class='alert alert-warning'>Este número de documento ya ha hecho una petición.</div>";
    } else {
        $sql = "SELECT * FROM gestion_productos.comisionista WHERE UsuarioID = ?";
        $stmt = $Link->prepare($sql);
        $stmt->bind_param("i", $documento);
        $stmt->execute();
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) > 0) {
            echo "<div class='alert alert-warning'>Este número de documento ya está registrado.</div>";
        } else {
            if (empty($documento) || empty($nombre) || empty($apellido) || empty($correo) || empty($edad) || empty($telefono) || empty($direccion) || empty($ciudad)) {
                echo "<div class='alert alert-danger'>Llene todos los campos.</div>";
            } else if (!is_numeric($documento)) {
                echo "<div class='alert alert-danger'>El documento es invalido.</div>";
            } else if (strlen($documento) < 7 || strlen($documento) > 11) {
                echo "<div class='alert alert-danger'>El documento es invalido.</div>";
            } else if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $nombre) || !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $apellido)) {
                echo "<div class='alert alert-danger'>El nombre y apellido solo pueden contener letras.</div>";
            } else if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                echo "<div class='alert alert-danger'>El correo es invalido.</div>";
            } else if (strlen($edad) > 2 || strlen($edad) < 0) {
                echo "<div class='alert alert-danger'>La edad es invalida.</div>";
            } else if (strlen($telefono) > 10) {
                echo "<div class='alert alert-danger'>El número de teléfono es invalido.</div>";
            } else if (strlen($direccion) < 10) {
                echo "<div class='alert alert-danger'>La dirección es invalida.</div>";
            } else if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $ciudad)) {
                echo "<div class='alert alert-danger'>La ciudad solo puede contener letras.</div>";
            } else {
                $sql = "INSERT INTO gestion_productos.solicitudcomisionista (UsuarioID,EstadoSolicitud,FechaSolicitud,Nombre,Apellidos,Correo,Edad,Telefono,Direccion,Ciudad) VALUES(?,?,?,?,?,?,?,?,?,?)";
                $stmt = $Link->prepare($sql);
                $stmt->bind_param("isssssisss", $documento, $estado, $fecha, $nombre, $apellido, $correo, $edad, $telefono, $direccion, $ciudad);
                $result = $stmt->execute();
                if ($result) {
                    echo '<script>
                        Swal.fire({
                        title: "Tu solicitud se ha registrado correctamente",
                        icon: "success",
                        confirmButtonText: "Aceptar"
                        }).then((result) => {
                        if (result.isConfirmed) {
                        window.location.href = " ./index.php";
                        }
                        });
                    </script>';
                } else {
                    echo "<div class='alert alert-danger'>Ocurrió un error al enviar la solicitud.</div>";
                }
            }
        }
    }
}
