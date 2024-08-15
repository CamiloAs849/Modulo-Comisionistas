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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir un proveedor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="FormCrateProveedor" method="post">
                    <div id="message" class="text-center">

                    </div>
                    <div class="mb-3 row justify-content-md-center">
                        <div class="col">
                            <input type="hidden" name="identificador" value="crear">
                            <label for="nit" class="col-form-label">NIT de la empresa:</label>
                            <input type="number" class="form-control" id="nit" name="ProveedorID">
                        </div>
                    </div>
                    <div class="mb-3 row justify-content-md-center">
                        <div class="col">
                            <label for="nombre" class="col-form-label">Nombre o razón social:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="col">
                            <label for="telefono" class="col-form-label">Teléfono:</label>
                            <input type="number" class="form-control" id="telefono" name="telefono">
                        </div>
                    </div>
                    <div class="mb-3 row justify-content-md-center">
                        <div class="col">
                            <label for="direccion" class="col-form-label">Dirección:</label>
                            <input type="text" class="form-control" id="edad" name="direccion">
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