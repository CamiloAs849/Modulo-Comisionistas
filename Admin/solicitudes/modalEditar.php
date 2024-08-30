<?php
if (empty($_SESSION['AdminID'])) {
    header("Location: ../solicitudComisionistas.php");
    exit();
}

$sql = "SELECT * FROM gestion_productos.solicitudcomisionista";

$result = mysqli_query($Link, $sql);
while ($row = mysqli_fetch_array($result)) {
?>
    <div class="modal fade" id="EditarPeticion<?php echo $row['UsuarioID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-text.="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5">Editar solicitud</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="FormEditarPeticion<?php echo $row['UsuarioID'] ?>" method="post">
                    <div class="modal-body py-0">
                        <div id="messageEditarPeticion<?php echo $row['UsuarioID'] ?>"></div>
                        <p class="fw-bold fs-5">¿Deseas modificar el estado de la solicitud?</p>
                        <p>El estado de la solicitud cambiará a: <?php if ($row['EstadoSolicitud'] == 'Aceptada') {
                                                                    ?> <b>Rechazada</b>
                            <?php
                                                                    } else if ($row['EstadoSolicitud'] == 'Rechazada') {
                            ?> <b>Aceptada</b>
                            <?php
                                                                    }
                            ?></p>
                        <input type="hidden" name="documento" value="<?php echo $row['UsuarioID'] ?>">
                        <input type="hidden" name="estado" value="<?php echo $row['EstadoSolicitud'] ?>">
                    </div>
                    <div class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0">
                        <?php

                        if ($row['EstadoSolicitud'] == 'Aceptada') { ?>
                            <button type="submit" class="btn btn-lg btn-danger"><i class="fa-solid fa-xmark fa-beat"></i> Rechazar</button>
                        <?php
                        } else if ($row['EstadoSolicitud'] == 'Rechazada') { ?>
                            <button type="submit" class="btn btn-lg btn-success"><i class="fa-solid fa-check fa-beat"></i> Aceptar</button>
                        <?php }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#FormEditarPeticion<?php echo $row['UsuarioID'] ?>").on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: './solicitudes/editarSolicitud.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#messageEditarPeticion<?php echo $row['UsuarioID'] ?>').html(response)
                    }
                })
            })
        });
    </script>

<?php
}
?>