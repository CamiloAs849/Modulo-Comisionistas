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

    <div class="modal fade" id="rechazarPeticion<?php echo $row['UsuarioID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-text.="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5">Rechazar solicitud</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="FormRechazarPeticion<?php echo $row['UsuarioID'] ?>" method="post">
                    <div class="modal-body py-0">
                        <div id="messageRechazarPeticion<?php echo $row['UsuarioID'] ?>"></div>
                        <p class="fw-bold fs-5">¿Quieres rechazar la solicitud?</p>
                        <p>Esta acción no se puede revertir.</p>
                        <input type="hidden" name="documento" value="<?php echo $row['UsuarioID'] ?>">
                    </div>
                    <div class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0">
                        <button type="submit" class="btn btn-lg btn-danger"><i class="fa-solid fa-xmark fa-beat"></i> Rechazar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#FormRechazarPeticion<?php echo $row['UsuarioID'] ?>").on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: './solicitudes/rechazarSolicitud.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#messageRechazarPeticion<?php echo $row['UsuarioID'] ?>').html(response)
                    }
                })
            })
        });
    </script>

<?php
}
?>