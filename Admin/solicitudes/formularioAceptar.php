<?php
if (empty($_SESSION['AdminID'])) {
    header("Location:../index.php");
    exit();
}

include("/xampp/htdocs/Modulo-Comisionistas/DataBase/conexion.php");
$sql = "SELECT * FROM gestion_productos.solicitudcomisionista";

$result = mysqli_query($Link, $sql);



while ($row = mysqli_fetch_array($result)) {
?>

    <div class="modal fade" id="aceptarPeticion<?php echo $row['UsuarioID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-text.="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Aceptar solicitud</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="FormAceptarPeticion<?php echo $row['UsuarioID'] ?>" method="post">
                        <div id="messageAceptarPeticion<?php echo $row['UsuarioID'] ?>" class="text-center"></div>
                        <div class="row">
                            <div class="col">
                                <p class="fw-bold">Digita la contraseña para darle al comisionista.</p>
                                <p>(Recuerda que el inicio de sesión será automaticamente con el número de documento).</p>
                                <div class="form-floating mb-3">
                                    <input type="hidden" name="documento" value="<?php echo $row['UsuarioID']; ?>">
                                    <input type="number" class="form-control" name="password" value="<?php echo $row['UsuarioID'] ?>" placeholder="">
                                    <label for="password">Contraseña</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"><i class="fa-solid fa-check fa-beat"></i> Aceptar comisionista</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#FormAceptarPeticion<?php echo $row['UsuarioID'] ?>").on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: './solicitudes/aceptarSolicitud.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#messageAceptarPeticion<?php echo $row['UsuarioID'] ?>').html(response)
                    }
                })
            })
        });
    </script>

<?php
}
?>