<?php
session_start();
include '../DataBase/conexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioID = $_SESSION['UsuarioID'];
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $direccion = $_POST['Direccion'];
    $ciudad = $_POST['Ciudad'];
    $telefono = $_POST['Telefono'];
    $correo = $_POST['Correo'];
    $fechaPedido = $_POST['fechaPedido'];
    $totalPagar = $_POST['TotalPagar'];

    if (empty($nombre) || empty($apellido) || empty($direccion) || empty($ciudad) || empty($telefono) || empty($correo) || empty($fechaPedido) || empty($totalPagar)) {
        echo '<div class="alert alert-danger">Llene todos los campos.</div>';
    } else {
        if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $nombre) || !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $apellido)) {
            echo '<div class="alert alert-danger">El nombre y apellido solo pueden contener letras.</div>';
        } else if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $ciudad)) {
            echo '<div class="alert alert-danger">La ciudad solo puede contener letras.</div>';
        } else if (!is_numeric($telefono)) {
            echo '<div class="alert alert-danger">Teléfono solo puede contener números.</div>';
        } else if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            echo '<div class="alert alert-danger">El correo es invalido.</div>';
        } else if (strlen($telefono) != 10) {
            echo '<div class="alert alert-danger">El número de teléfono es invalido.</div>';
        } else {
            $comision = $totalPagar * 0.19;
            $sql2 = "SELECT * FROM gestion_productos.comision WHERE UsuarioID = $usuarioID";
            $result2 = mysqli_query($Link, $sql2);
            $row2 = mysqli_fetch_array($result2);
            $valorViejo = $row2['AcumuladoComision'];
            $nuevoValor = $valorViejo + $comision;
            $sql = "UPDATE  gestion_productos.comision SET AcumuladoComision = ? WHERE UsuarioID = $usuarioID";
            $stmt = $Link->prepare($sql);
            $stmt->bind_param("d", $nuevoValor);
            $stmt->execute();
            unset($_SESSION['carrito']);
            echo '<script>
                Swal.fire({
                title: "¡Pedido realizado!",
                text: "Tu pedido está en proceso.",
                icon: "success",
                confirmButtonText: "Ok",
                }).then((result) => {
                if (result.isConfirmed) {
                 window.location.href = "../Users/nuevo-pedido.php";
                }
            });
            </script>';
        }
    }
}
