<?php
if (empty($_SESSION['AdminID'])) {
    header("Location:../index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Components/bootstrap.min.css">
    <script src="../Components/bootstrap.bundle.min.js"></script>
    <scrip src="../Components/alertify.min.js">
        </script>
        <link rel="stylesheet" href="../Components/alertify.min.css" />
        <link rel="stylesheet" href="../Components/default.min.css" />
        <link rel="stylesheet" href="../Components/icon.css">
        <link rel="stylesheet" href="../CSS/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="modal fade" id="crear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir un proveedor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="mb-3 row justify-content-md-center">
                            <div class="col">
                                <input type="hidden" name="identificador" value="crear">
                                <label for="nit" class="col-form-label">NIT de la empresa:</label>
                                <input type="number" class="form-control" id="nit" name="ProveedorID" required>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-md-center">
                            <div class="col">
                                <label for="nombre" class="col-form-label">Nombre o razón social:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="col">
                                <label for="telefono" class="col-form-label">Teléfono:</label>
                                <input type="number" class="form-control" id="telefono" name="telefono" required>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-md-center">
                            <div class="col">
                                <label for="direccion" class="col-form-label">Dirección:</label>
                                <input type="text" class="form-control" id="edad" name="direccion" required>
                            </div>
                        </div>
                        <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cerrar</button>
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                        </div>
                    </form>
                    <?php

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if ($_POST['identificador'] == 'crear') {
                            include("../DataBase/conexion.php");
                            function validar($data)
                            {
                                $data = trim($data);
                                $data = stripslashes($data);
                                $data = htmlspecialchars($data);
                                return $data;
                            }
                            $nit = validar($_POST['ProveedorID']);
                            $nombre = validar($_POST['nombre']);
                            $telefono = validar($_POST['telefono']);
                            $direccion = validar($_POST['direccion']);

                            $sql = "INSERT INTO gestion_productos.proveedor (ProveedorID, NombreProveedor, Telefono, Direccion) VALUES ('$nit', '$nombre', '$telefono', '$direccion')";
                            $result = mysqli_query($Link, $sql);
                            if ($result) {
                                echo  '<script>
                                 Swal.fire({
                                     title: "Proveedor añadido exitosamente!",
                                     icon: "success",
                                     confirmButtonText: "Aceptar"
                                 }).then((result) => {
                                     if (result.isConfirmed) {
                                         window.location.href = "./proveedores.php";
                                     }
                                 });
                             </script>';
                            } else {
                                echo  '<script>
                                 Swal.fire({
                                     title: "Error al añadir el proveedor!",
                                     icon: "error",
                                     confirmButtonText: "Aceptar"
                                 }).then((result) => {
                                     if (result.isConfirmed) {
                                         window.location.href = "./proveedores.php";
                                     }
                                 });
                             </script>';
                            }
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>