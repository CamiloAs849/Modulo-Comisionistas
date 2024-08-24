<div class="modal fade" id="FormEstado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-text.="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Verificar mi estado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="FormEstadoPeticion" method="post">
                    <div id="messageEstadoPeticion" class="text-center"></div>
                    <div class="row">
                        <div class="col">
                            <p class="fw-bold">Digita el número de documento con el cual hiciste la petición para conocer tu estado.</p>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="documento" placeholder="">
                                <label for="documento">Número de documento</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Verificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>