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

    <div class="modal fade" id="ver<?php echo $row['ProveedorID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Información de <?php echo $row['NombreProveedor'] ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <div>
                            <b>NIT: </b>
                            <?php echo $row['ProveedorID'] ?>
                        </div>
                        <div>
                            <b>Nombre: </b><?php echo $row['NombreProveedor'] ?>
                        </div>
                        <div>
                            <b>Teléfono: </b><?php echo $row['Telefono'] ?>
                        </div>
                        <div>
                            <b>Dirección: </b>
                            <?php echo $row['Direccion'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
}
?>