<?php
if (empty($_SESSION['AdminID'])) {
    header("Location:../index.php");
    exit();
}
$sql = "SELECT c.UsuarioID, c.NombreUsuario, c.ApellidosUsuario,
cm.PorcentajeComision FROM comisionista c JOIN comision cm ON c.UsuarioID = cm.UsuarioID;";

$result = mysqli_query($Link, $sql);

while ($row = mysqli_fetch_array($result)) { ?>
    <div class="modal fade" id="editarComision<?php echo $row['UsuarioID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar comisión de <?php echo $row['NombreUsuario'], " ", $row['ApellidosUsuario'] ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="FormEditComision<?php echo $row['UsuarioID'] ?>" method="post">
                        <div class="text-center" id="messageEditarComision<?php echo $row['UsuarioID'] ?>">

                        </div>
                        <label for="comision" class="form-label ">Porcentaje de comisión</label>
                        <input type="hidden" value="<?php echo $row['UsuarioID'] ?>" name="id">
                        <input type="text" class="form-control mb-5" id="comision" name="comision" value="<?php echo $row['PorcentajeComision'] ?>">
                        <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cerrar</button>
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#FormEditComision<?php echo $row['UsuarioID'] ?>").on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: './editarComision/validarComision.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#messageEditarComision<?php echo $row['UsuarioID'] ?>').html(response)
                    }
                })
            })
        });
    </script>
<?php
}
?>