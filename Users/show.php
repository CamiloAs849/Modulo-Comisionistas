    <?php
    include("../DataBase/conexion.php");
    $usuario = $_SESSION['UsuarioID'];
    if (empty($_SESSION['UsuarioID'])) {
        header("Location:../index.php");
        exit();
    }
    ?>
    <div class="modal fade" id="info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-dark">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Información personal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-5 text-center">
                            <div class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100" width="150" viewBox="0 0 448 512">
                                    <path fill="#bababa" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                </svg>
                                <br>
                                <br>
                                <span class="modal-name"><?php echo $nombreUsuario ?></span>
                                <br>
                                <span class="apellido"><?php echo $apellidoUsuario ?></span>
                                <p><?php echo $usuarioID ?></p>
                            </div>
                        </div>
                        <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-7 text-center">
                            <p><i class="fa-solid fa-star"></i> <?php echo $Edad ?></p>
                            <p><i class="fa-solid fa-phone-flip fa-flip-horizontal"></i> <?php echo $telefonoUsuario ?></p>
                            <p><i class="fa-solid fa-envelope"></i> <?php echo $correoUsuario ?></p>
                            <p><i class="fa-solid fa-location-dot"></i> <?php echo $direccionUsuario ?></p>
                            <p><i class="fa-solid fa-city"></i> <?php echo $Ciudad ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>