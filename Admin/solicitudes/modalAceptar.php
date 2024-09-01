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
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5">Aceptar solicitud</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="FormAceptarPeticion<?php echo $row['UsuarioID'] ?>" method="post">
                    <div class="modal-body py-0">
                        <div id="messageAceptarPeticion<?php echo $row['UsuarioID'] ?>"></div>
                        <p class="fw-bold fs-5">¿Quieres aceptar la solicitud?</p>
                        <p class="">Recuerda que la contraseña será automaticamente el número de documento.</p>
                        <input type="hidden" name="documento" value="<?php echo $row['UsuarioID'] ?>">
                    </div>
                    <div class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0">
                        <button type="submit" class="btn btn-lg btn-success"><i class="fa-solid fa-check fa-beat"></i> Aceptar</button>
                    </div>
                </form>
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