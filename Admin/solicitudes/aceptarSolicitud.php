<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("/xampp/htdocs/Modulo-Comisionistas/DataBase/conexion.php");
    if (empty($_POST['password'])) {
        echo "<div class='alert alert-danger'>Digite una contraseña.</div>";
    } else {
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
        $password = $_POST['password'];

        $sql = "INSERT INTO gestion_productos.comisionista (UsuarioID, NombreUsuario,ApellidosUsuario,Edad,TelefonoUsuario, Correo, Direccion, Ciudad, Password) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $Link->prepare($sql);
        $stmt->bind_param("ississsss", $id, $nombre, $apellido, $edad, $telefono, $correo, $direccion, $ciudad, $password);
        $result = $stmt->execute();
        if ($result) {
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
}
