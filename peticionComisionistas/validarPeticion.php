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
    $tipoDocumento = $_POST['tipoDocumento'];
    $estado = "Pendiente";

    $sql = "SELECT * FROM gestion_productos.comisionista WHERE UsuarioID = ?";
    $stmt = $Link->prepare($sql);
    $stmt->bind_param("i", $documento);
    $stmt->execute();
    $result = $stmt->get_result();
    if (mysqli_num_rows($result) > 0) {
        echo "<div class='alert alert-warning alert-dismissible fade show'>Este número de documento ya es comisionista.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    } else {
        $sql = "SELECT * FROM gestion_productos.solicitudcomisionista WHERE UsuarioID = ?";
        $stmt = $Link->prepare($sql);
        $stmt->bind_param("i", $documento);
        $stmt->execute();
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) > 0) {
            echo "<div class='alert alert-warning alert-dismissible fade show'>Este número de documento ya ha hecho una petición.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        } else {
            if (empty($documento) || empty($nombre) || empty($apellido) || empty($correo) || empty($edad) || empty($telefono) || empty($direccion) || empty($ciudad) || empty($tipoDocumento)) {
                echo "<div class='alert alert-danger alert-dismissible fade show'>Llene todos los campos.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            } else if (!is_numeric($documento)) {
                echo "<div class='alert alert-danger alert-dismissible fade show'>El documento es invalido.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            } else if (strlen($documento) < 7 || strlen($documento) > 11 || $documento > 2147483647) {
                echo "<div class='alert alert-danger alert-dismissible fade show'>El documento es invalido.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            } else if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $nombre) || !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $apellido)) {
                echo "<div class='alert alert-danger alert-dismissible fade show'>El nombre y apellido solo pueden contener letras.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            } else if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                echo "<div class='alert alert-danger alert-dismissible fade show'>El correo es invalido.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            } else if (strlen($edad) > 2 || strlen($edad) < 0) {
                echo "<div class='alert alert-danger alert-dismissible fade show'>La edad es invalida.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            } else if (strlen($telefono) > 10) {
                echo "<div class='alert alert-danger alert-dismissible fade show'>El número de teléfono es invalido.</div>";
            } else if (strlen($direccion) < 8) {
                echo "<div class='alert alert-danger alert-dismissible fade show'>La dirección es invalida.</div>";
            } else if ($edad <= 17) {
                echo "<div class='alert alert-danger alert-dismissible fade show'>Los menores de edad no pueden hacer solicitudes.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div";
            } else if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $ciudad)) {
                echo "<div class='alert alert-danger alert-dismissible fade show'>La ciudad solo puede contener letras.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            } else {
                $sql = "INSERT INTO gestion_productos.solicitudcomisionista (UsuarioID,EstadoSolicitud,FechaSolicitud,Nombre,Apellidos,Correo,Edad,Telefono,TipoDocumento,Direccion,Ciudad) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $Link->prepare($sql);
                $stmt->bind_param("isssssissss", $documento, $estado, $fecha, $nombre, $apellido, $correo, $edad, $telefono, $tipoDocumento, $direccion, $ciudad);
                $result = $stmt->execute();
                if ($result) {
                    echo '<script>
                        Swal.fire({
                        title: "Tu solicitud se ha registrado correctamente",
                        icon: "success",
                        confirmButtonText: "Aceptar"
                        }).then((result) => {
                        if (result.isConfirmed) {
                        window.location.href = "./index.php";
                        }
                        });
                    </script>';
                } else {
                    echo "<div class='alert alert-danger alert-dismissible fade show'>Ocurrió un error al enviar la solicitud.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                }
            }
        }
    }
}
