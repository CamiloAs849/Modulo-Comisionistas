<?php
include '../DataBase/conexion.php';
session_start();
$usuarioID = $_SESSION['UsuarioID'];


$sql = "SELECT * FROM gestion_productos.comisionista WHERE UsuarioID = '$usuarioID'";

$result = mysqli_query($Link, $sql);

$row = mysqli_fetch_array($result);

function validar($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$TelefonoUsuario = validar($_POST['TelefonoUsuario']);
$Correo = validar($_POST['Correo']);
$Dirrecion = validar($_POST['Dirrecion']);
$Ciudad = validar($_POST['Ciudad']);

if (!empty($TelefonoUsuario) && !empty($Correo) && !empty($Dirrecion) && !empty($Ciudad)) {
    if ($TelefonoUsuario == $row['TelefonoUsuario'] && $Correo == $row['Correo'] && $Dirrecion == $row['Direccion'] && $Ciudad == $row['Ciudad']) {
        echo '<script>
                        Swal.fire({
                            title: "No se ha modificado ningún dato!",
                            icon: "warning",
                            timer: 1500,
                            showConfirmButton: false,
                            timerProgressBar: true
                        });
                    </script>';
    } else if (!filter_var($Correo, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-danger text-center">El correo es invalido.</div>';
    } else if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $Ciudad)) {
        echo '<div class="alert alert-danger text-center">La ciudad solo puede contener letras.</div>';
    } else if (!is_numeric($TelefonoUsuario)) {
        echo '<div class="alert alert-danger text-center">El número de teléfono es invalido.</div>';
    } else if (strlen($TelefonoUsuario) != 10) {
        echo '<div class="alert alert-danger text-center">El número de teléfono es invalido.</div>';
    } else {
        $sql = "UPDATE gestion_productos.comisionista SET TelefonoUsuario = ?, Correo = ?, Ciudad = ?, Direccion = ? WHERE UsuarioID = ?";

        $stmt = $Link->prepare($sql);
        $stmt->bind_param("ssssi", $TelefonoUsuario, $Correo, $Ciudad, $Dirrecion, $usuarioID);
        $result = $stmt->execute();


        if ($result) {
            echo '<script>
                        Swal.fire({
                            title: "Datos actualizados exitosamente!",
                            icon: "success",
                            confirmButtonText: "Aceptar"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "./edit.php";
                            }
                        });
                    </script>';
        } else {
            echo  '<script>
                    Swal.fire({
                        title: "Error al actualizar los datos!",
                        text: "Por favor, intenta de nuevo.",
                        icon: "error",
                        confirmButtonText: "Aceptar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "./edit.php";
                        }
                    });
                </script>';
        }
    }
} else {
    echo "<div class='alert alert-danger text-center w-100' role='alert'>Llene todos los campos.</div>";
}
