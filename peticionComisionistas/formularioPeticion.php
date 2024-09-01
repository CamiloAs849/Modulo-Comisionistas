<div class="modal fade" id="formularioPeticion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-text.="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Solicitud de comisionista</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="FormPeticion" method="post">
                    <div id="messagePeticion" class="text-center"></div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="tipoDocumento" id="tipoDocumento">
                                    <option value="" selected>Tipo de documento</option>
                                    <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                                    <option value="Cédula de extranjería">Cédula de extranjería</option>
                                    <option value="Registro civil">Registro civil</option>
                                </select>
                                <label for="tipoDocumento">Tipo de documento</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="documento" placeholder="">
                                <label for="documento">Número de documento</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nombre" placeholder="">
                                <label for="nombre">Nombre</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="apellido" placeholder="">
                                <label for="apellido">Apellidos</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="correo" placeholder="">
                                <label for="email">Correo electrónico</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="edad" placeholder="">
                                <label for="edad">Edad</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="telefono" placeholder="">
                                <label for="telefono">Teléfono</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="direccion" placeholder="">
                        <label for="direccion">Dirección</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="ciudad" placeholder="">
                        <label for="ciudad">Ciudad</label>
                    </div>
                    <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="fecha">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Enviar solicitud</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>