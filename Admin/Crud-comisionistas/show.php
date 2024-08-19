<?php
if (empty($_SESSION['AdminID'])) {
    header("Location:../index.php");
    exit();
}

$sql = "SELECT * FROM gestion_productos.comisionista";

$result = mysqli_query($Link, $sql);

while ($row = mysqli_fetch_array($result)) { ?>
    <div class="modal fade" id="ver<?php echo $row['UsuarioID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Información de <?php echo $row['NombreUsuario'] . " " . $row['ApellidosUsuario'] ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4 justify-content-center">
                        <div class="col text-center">
                            <b>Número de Documento: </b>
                            <div><?php echo $row['UsuarioID'] ?></div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <b>Nombre: </b><?php echo $row['NombreUsuario'] ?>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <b>Apellido: </b><?php echo $row['ApellidosUsuario'] ?>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <b>Edad: </b><?php echo $row['Edad'] ?>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <b>Teléfono: </b><?php echo $row['TelefonoUsuario'] ?>
                        </div>
                    </div>
                    <div class="row mb-4 justify-content-md-center">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 text-center mb-4">
                            <b>Correo Electrónico: </b><?php echo $row['Correo'] ?>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 text-center">
                            <b>Dirección: </b><?php echo $row['Direccion'] ?>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <b>Ciudad: </b><?php echo $row['Ciudad'] ?>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <b>Contraseña: </b><?php echo $row['Password'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
}
?>