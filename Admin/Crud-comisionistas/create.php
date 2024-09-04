<?php
if (empty($_SESSION['AdminID'])) {
    header("Location:../index.php");
    exit();
}

?>


<div class="modal fade" id="crear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir un comisionista</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="FormCrateComisionista" method="post">
                    <div id="message" class="text-center">

                    </div>
                    <div class="mb-3 row justify-content-md-center">
                        <div class="col">
                            <input type="hidden" name="identificador" value="crear">
                            <label for="documento" class="col-form-label">Número de documento:</label>
                            <input type="number" class="form-control" id="documento" name="UsuarioID" value="">
                        </div>
                    </div>
                    <div class="mb-3 row justify-content-md-center">
                        <div class="col">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="recipient-name" name="Nombre">
                        </div>
                        <div class="col">
                            <label for="message-text" class="col-form-label">Apellido:</label>
                            <input type="text" class="form-control" id="message-text" name="Apellido">
                        </div>
                    </div>
                    <div class="mb-3 row justify-content-md-center">
                        <div class="col">
                            <label for="edad" class="col-form-label">Edad:</label>
                            <input type="number" class="form-control" id="edad" name="Edad">
                        </div>
                        <div class="col">
                            <label for="telefono" class="col-form-label">Teléfono:</label>
                            <input type="number" class="form-control" id="telefono" name="Telefono">
                        </div>
                    </div>
                    <div class="mb-3 row justify-content-md-center">
                        <div class="col">
                            <label for="correo" class="col-form-label">Correo:</label>
                            <input type="text" class="form-control" id="correo" name="Correo">
                        </div>
                        <div class="col">
                            <label for="direccion" class="col-form-label">Dirección:</label>
                            <input type="text" class="form-control" id="direccion" name="Direccion">
                        </div>
                    </div>
                    <div class="mb-3 row justify-content-md-center">
                        <div class="col">
                            <label for="ciudad" class="col-form-label">Ciudad:</label>
                            <input type="text" class="form-control" id="ciudad" name="Ciudad">
                        </div>
                        <div class="col">
                            <label for="password" class="col-form-label">Contraseña:</label>
                            <input type="password" class="form-control" id="password" name="Password">
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