<?php
if (empty($_SESSION['AdminID'])) {
    header("Location:../index.php");
    exit();
}

include("/xampp/htdocs/Modulo-Comisionistas/DataBase/conexion.php");
$usuario = $_SESSION['AdminID'];
$sql = "SELECT * FROM gestion_productos.proveedor ";

$result = mysqli_query($Link, $sql);

while ($row = mysqli_fetch_array($result)) { ?>

    <div class="modal fade" id="editar<?php echo $row['ProveedorID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar a <?php echo $row['NombreProveedor'] ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="mb-3 row justify-content-md-center">
                            <div class="col">
                                <input type="hidden" name="identificador" value="editar-p">
                                <input type="hidden" name="ProveedorID" value="<?php echo $row['ProveedorID']; ?>">
                                <label for="nit" class="col-form-label">NIT de la empresa:</label>
                                <input type="number" class="form-control" disabled id="nit" name="nit" value="<?php echo $row['ProveedorID'] ?>" required>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-md-center">
                            <div class="col">
                                <label for="nombre" class="col-form-label">Nombre o razón social:</label>
                                <input type="text" class="form-control" id="nombre" value="<?php echo $row['NombreProveedor'] ?>" name="nombre" required>
                            </div>
                            <div class="col">
                                <label for="telefono" class="col-form-label">Teléfono:</label>
                                <input type="number" class="form-control" value="<?php echo $row['Telefono'] ?>" id="telefono" name="telefono" required>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-md-center">
                            <div class="col">
                                <label for="direccion" class="col-form-label">Dirección:</label>
                                <input type="text" class="form-control" value="<?php echo $row['Direccion'] ?>" id="edad" name="direccion" required>
                            </div>
                        </div>
                        <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cerrar</button>
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['identificador'] == "editar-p") {
        $id = $_POST['ProveedorID'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];

        $sql = "UPDATE gestion_productos.proveedor SET NombreProveedor = '$nombre', Telefono = '$telefono', Direccion = '$direccion'  WHERE ProveedorID = '$id' ";

        $result = mysqli_query($Link, $sql);
        if ($result) {
            echo '<script>
                        Swal.fire({
                        title: "Proveedor actualizado correctamente!",
                        icon: "success",
                        confirmButtonText: "Aceptar"
                        }).then((result) => {
                        if (result.isConfirmed) {
                        window.location.href = "./proveedores.php";
                        }
                        })
                    </script>';
        }
    }
}
?>