<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("/xampp/htdocs/Modulo-Comisionistas/DataBase/conexion.php");


    $documento = $_POST['documento'];
    $estado = $_POST['estado'];
    if ($estado == 'Aceptada') {
        $sql = "DELETE FROM gestion_productos.comision WHERE usuarioID = '$documento'";
        $sql2 = "DELETE FROM gestion_productos.comisionista WHERE usuarioID = '$documento'";
        $result = mysqli_query($Link, $sql);
        $result2 = mysqli_query($Link, $sql2);
        if ($result === true && $result2 === true) {
            echo "<script>
            Swal.fire({
            title: 'La solicitud ha sido modificada correctamente',
            icon: 'success',
            confirmButtonText: 'Aceptar'
            }).then((result) => {
            if (result.isConfirmed) {
            window.location.href = './solicitudComisionistas.php';
            }
            });
            </script>";
            $sql = "UPDATE gestion_productos.solicitudcomisionista SET EstadoSolicitud = 'Rechazada' WHERE UsuarioID = $documento";
            $result = mysqli_query($Link, $sql);
        }
    } else if ($estado == 'Rechazada') {
        $sql = "SELECT * FROM gestion_productos.solicitudcomisionista WHERE UsuarioID = $documento";
        $result = mysqli_query($Link, $sql);
        $row = mysqli_fetch_array($result);
        $nombre = $row['Nombre'];
        $apellido = $row['Apellidos'];
        $telefono = $row['Telefono'];
        $correo = $row['Correo'];
        $edad = $row['Edad'];
        $direccion = $row['Direccion'];
        $ciudad = $row['Ciudad'];
        $sql = "INSERT INTO gestion_productos.comisionista (UsuarioID, NombreUsuario,ApellidosUsuario,Edad,TelefonoUsuario, Correo, Direccion, Ciudad, Password) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $Link->prepare($sql);
        $stmt->bind_param("ississsss", $documento, $nombre, $apellido, $edad, $telefono, $correo, $direccion, $ciudad, $documento);
        $result = $stmt->execute();
        $sql2 = "INSERT INTO gestion_productos.comision (UsuarioID, ValorComision, AcumuladoComision) VALUES (?,0,0)";
        $stmt2 = $Link->prepare($sql2);
        $stmt2->bind_param("i", $documento);
        $result2 = $stmt2->execute();
        if ($result == true && $result2 == true) {
            echo '<script>
                            Swal.fire({
                            title: "La solicitud ha sido modificada correctamente",
                            text: "Ahora esta persona podrá ingresar al portal de comisionistas.",
                            icon: "success",
                            confirmButtonText: "Aceptar"
                            }).then((result) => {
                                window.location.href = "./solicitudComisionistas.php";
                            });
                        </script>';
            $sql = "UPDATE gestion_productos.solicitudcomisionista SET EstadoSolicitud = 'Aceptada' WHERE UsuarioID = $documento";
            $result = mysqli_query($Link, $sql);
        }
    }
}
