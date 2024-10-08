<?php
include("../../../DataBase/conexion.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['identificador'] == 'editar') {
        $id = $_POST['documento'];
        $nombre = $_POST['Nombre'];
        $apellido = $_POST['Apellido'];
        $edad = $_POST['Edad'];
        $telefono = $_POST['Telefono'];
        $correo = $_POST['Correo'];
        $direccion = $_POST['Direccion'];
        $ciudad = $_POST['Ciudad'];
        $password = $_POST['Password'];
        $sql = "SELECT * FROM gestion_productos.comisionista WHERE UsuarioID = '$id'";
        $result = mysqli_query($Link, $sql);
        $row = mysqli_fetch_array($result);

        if ($nombre == $row['NombreUsuario'] && $apellido == $row['ApellidosUsuario'] && $edad == $row['Edad'] && $telefono == $row['TelefonoUsuario'] && $correo == $row['Correo'] && $direccion == $row['Direccion'] && $ciudad == $row['Ciudad'] && $password == $row['Password']) {
            echo "<div class='alert alert-warning'>No se ha modificado ningún dato.</div>";
        } else {

            if (empty($id) || empty($nombre) || empty($apellido) || empty($edad) || empty($telefono) || empty($correo) || empty($direccion) || empty($ciudad) || empty($password)) {
                echo "<div class='alert alert-danger'>Llene todos los campos.</div>";
            } else {
                if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $nombre) || !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $apellido)) {
                    echo "<div class='alert alert-danger'>Nombre y apellido solo pueden contener letras.</div>";
                } else if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $ciudad)) {
                    echo "<div class='alert alert-danger'>Ciudad solo puede contener letras.</div>";
                } else if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                    echo "<div class='alert alert-danger'>El correo es invalido.</div>";
                } else if (!is_numeric($edad)) {
                    echo "<div class='alert alert-danger'>La edad es invalida.</div>";
                } else if ($edad <= 17) {
                    echo "<div class='alert alert-danger'>El comisionista debe ser mayor 18 años.</div>";
                } else if (strlen($edad) > 2) {
                    echo "<div class='alert alert-danger'>La edad es invalida.</div>";
                } else if (strlen($id) < 7 || strlen($id) > 11 || $id > 2147483647) {
                    echo "<div class='alert alert-danger'>El documento es invalido.</div>";
                } else if (!is_numeric($telefono)) {
                    echo "<div class='alert alert-danger'>El número de télefono es invalido.</div>";
                } else if (strlen($telefono) < 7 || strlen($telefono) > 11) {
                    echo "<div class='alert alert-danger'>El número de télefono es invalido.</div>";
                } else {
                    $sql = "UPDATE gestion_productos.comisionista SET NombreUsuario = ?, ApellidosUsuario = ?, Edad = ?, TelefonoUsuario = ?, Correo = ?, Direccion = ?, Ciudad = ?, Password = ? WHERE UsuarioID = ?";
                    $stmt = $Link->prepare($sql);
                    $stmt->bind_param("ssisssssi", $nombre, $apellido, $edad, $telefono, $correo, $direccion, $ciudad, $password, $id);
                    $result = $stmt->execute();
                    if ($result) {
                        echo '<script>
                    Swal.fire({
                    title: "Comisionista actualizado correctamente!",
                    icon: "success",
                    confirmButtonText: "Aceptar"
                    }).then((result) => {
                    if (result.isConfirmed) {
                    window.location.href = "./comisionistas.php";
                    }
                    })
                </script>';
                    } else {
                        echo '<script> 
                Swal.fire({
                 title: "Hubo un error al actualizar el comisionista!",
                 icon: "error",
                 confirmButtonText: "Aceptar
                )}
                </script>
            ';
                    }
                }
            }
        }
    }
}
