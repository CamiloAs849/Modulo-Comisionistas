<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['identificador'] == "crear") {
        include("../../../DataBase/conexion.php");

        function validar($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $Documento = validar($_POST['UsuarioID']);
        $Nombre = validar($_POST['Nombre']);
        $Apellido = validar($_POST['Apellido']);
        $Edad = validar($_POST['Edad']);
        $Telefono = validar($_POST['Telefono']);
        $Correo = validar($_POST['Correo']);
        $Direccion = validar($_POST['Direccion']);
        $Ciudad = validar($_POST['Ciudad']);
        $Password = validar($_POST['Password']);
        $porcentaje = validar($_POST['PorcentajeComision']);

        if (empty($Documento) || empty($Nombre) || empty($Apellido) || empty($Edad) || empty($Telefono) || empty($Correo) || empty($Direccion) || empty($Ciudad) || empty($Password)) {
            echo "<div class='alert alert-danger'>Llene todos los campos.</div>";
        } else {
            if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $Nombre) || !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $Apellido)) {
                echo "<div class='alert alert-danger'>El nombre y apellidos solo pueden contener letras<./div>";
            } else if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $Ciudad)) {
                echo "<div class='alert alert-danger'>Ciudad solo puede contener letras.</div>";
            } else if (!filter_var($Correo, FILTER_VALIDATE_EMAIL)) {
                echo "<div class='alert alert-danger'>El correo es invalido.</div>";
            } else if (strlen($Edad) > 2) {
                echo "<div class='alert alert-danger'>La edad es invalida.</div>";
            } else if (strlen($Documento) < 7 || strlen($Documento) > 11) {
                echo "<div class='alert alert-danger'>El documento es invalido.</div>";
            } else if (!preg_match('/^-?\d+(\.\d{2}+)?$/', $porcentaje)) {
                echo "<div class='alert alert-danger'>El porcentaje de comision es invalido.</div>";
            } else if ($porcentaje > 100) {
                echo "<div class='alert alert-danger'>El porcentaje de comision no puede ser mayor a 100%.</div>";
            } else if ($porcentaje < 1) {
                echo "<div class='alert alert-danger'>El porcentaje de comision no puede ser menor a 0%.</div>";
            } else if (strlen($Telefono) != 10) {
                echo "<div class='alert alert-danger'>El número de teléfono es invalido.</div>";
            } else {
                $sql = "INSERT INTO gestion_productos.comisionista (UsuarioID, NombreUsuario, ApellidosUsuario, Edad, TelefonoUsuario, Correo, Direccion, Ciudad, Password) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $Link->prepare($sql);
                $stmt->bind_param("ississsss", $Documento, $Nombre, $Apellido, $Edad, $Telefono, $Correo, $Direccion, $Ciudad, $Password);
                $result = $stmt->execute();
                if ($result) {
                    echo  '<script>
                                 Swal.fire({
                                     title: "Comisionista añadido exitosamente!",
                                     icon: "success",
                                     confirmButtonText: "Aceptar"
                                 }).then((result) => {
                                     if (result.isConfirmed) {
                                         window.location.href = "./comisionistas.php";
                                     }
                                 });
                             </script>';
                    $sql = "INSERT INTO gestion_productos.comision (ComisionID, UsuarioID, ValorComision, AcumuladoComision) VALUES (NULL, ?, ?, ?)";
                    $stmt = $Link->prepare($sql);
                    $stmt->bind_param("iii", $Documento, 0, 0);
                    $result = $stmt->execute();
                    if ($result) {
                    }
                } else {
                    '<script>
                                 Swal.fire({
                                     title: "Error al añadir el comisionista!",
                                     text: "Por favor, intenta de nuevo.",
                                     icon: "error",
                                     confirmButtonText: "Aceptar"
                                 }).then((result) => {
                                     if (result.isConfirmed) {
                                         window.location.href = "./comisionistas.php";
                                     }
                                 });
                             </script>';
                }
            }
        }
    }
}
