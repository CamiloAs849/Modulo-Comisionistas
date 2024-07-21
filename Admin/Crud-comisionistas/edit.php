<?php
if (empty($_SESSION['AdminID'])) {
    header("Location:../index.php");
    exit();
}

$sql = "SELECT * FROM gestion_productos.comisionista";

$result = mysqli_query($Link, $sql);

while ($row = mysqli_fetch_array($result)) { ?>

    <div class="modal fade" id="editar<?php echo $row['UsuarioID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar a <?php echo $row['NombreUsuario'] . " " . $row['ApellidosUsuario'] ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                        <div class="mb-3 row justify-content-md-center">
                            <div class="col">
                                <input type="hidden" name="documento" value="<?php echo $row['UsuarioID'] ?>">
                                <input type="hidden" name="identificador" value="editar">
                                <label for="document" class="col-form-label">Número de documento:</label>
                                <input type="number" class="form-control" id="document" disabled name="document" value="<?php echo $row['UsuarioID'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-md-center">
                            <div class="col">
                                <label for="nombre" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" value="<?php echo $row['NombreUsuario'] ?>" id="nombre" name="Nombre" required>
                            </div>
                            <div class="col">
                                <label for="apellido" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" value="<?php echo $row['ApellidosUsuario'] ?>" id="apellido" name="Apellido" required>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-md-center">
                            <div class="col">
                                <label for="edad" class="col-form-label">Edad:</label>
                                <input type="number" class="form-control" value="<?php echo $row['Edad'] ?>" id="edad" name="Edad" required>
                            </div>
                            <div class="col">
                                <label for="telefono" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" value="<?php echo $row['TelefonoUsuario'] ?>" id="telefono" name="Telefono" required>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-md-center">
                            <div class="col">
                                <label for="correo" class="col-form-label">Correo:</label>
                                <input type="email" class="form-control" value="<?php echo $row['Correo'] ?>" id="correo" name="Correo" required>
                            </div>
                            <div class="col">
                                <label for="direccion" class="col-form-label">Dirección:</label>
                                <input type="text" class="form-control" value="<?php echo $row['Direccion'] ?>" id="direccion" name="Direccion" required>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-md-center">
                            <div class="col">
                                <label for="ciudad" class="col-form-label">Ciudad:</label>
                                <input type="text" class="form-control" value="<?php echo $row['Ciudad'] ?>" id="ciudad" name="Ciudad" required>
                            </div>
                            <div class="col">
                                <label for="password" class="col-form-label">Contraseña:</label>
                                <input type="password" class="form-control" value="<?php echo $row['Password'] ?>" id="password" name="Password" required>
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
        $sql = "UPDATE gestion_productos.comisionista SET NombreUsuario = '$nombre', ApellidosUsuario = '$apellido', Edad = '$edad', TelefonoUsuario = '$telefono', Correo = '$correo', Direccion = '$direccion', Ciudad = '$ciudad', Password = '$password' WHERE UsuarioID = '$id'";

        $result = mysqli_query($Link, $sql);
        if ($result === true) {
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

?>