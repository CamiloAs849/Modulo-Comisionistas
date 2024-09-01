<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("/xampp/htdocs/Modulo-Comisionistas/DataBase/conexion.php");
    $id = $_POST['documento'];
    $sql = "SELECT * FROM gestion_productos.solicitudcomisionista WHERE UsuarioID = $id";
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
    $stmt->bind_param("ississsss", $id, $nombre, $apellido, $edad, $telefono, $correo, $direccion, $ciudad, $id);
    $result = $stmt->execute();
    $sql2 = "INSERT INTO gestion_productos.comision (UsuarioID, ValorComision, AcumuladoComision) VALUES (?,0,0)";
    $stmt2 = $Link->prepare($sql2);
    $stmt2->bind_param("i", $id);
    $result2 = $stmt2->execute();
    if ($result == true && $result2 == true) {
        echo '<script>
                        Swal.fire({
                        title: "La solicitud ha sido aceptada correctamente",
                        text: "Ahora esta persona podrá ingresar al portal de comisionistas.",
                        icon: "success",
                        confirmButtonText: "Aceptar"
                        }).then((result) => {
                            window.location.href = "./solicitudComisionistas.php";
                        });
                    </script>';
        $sql = "UPDATE gestion_productos.solicitudcomisionista SET EstadoSolicitud = 'Aceptada' WHERE UsuarioID = $id";
        $result = mysqli_query($Link, $sql);
    }
}
