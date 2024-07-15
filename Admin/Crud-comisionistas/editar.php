<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Components/bootstrap.min.css">
    <script src="../Components/bootstrap.bundle.min.js"></script>
    <scrip src="../Components/alertify.min.js">
        </script>
        <link rel="stylesheet" href="../Components/alertify.min.css" />
        <link rel="stylesheet" href="../Components/default.min.css" />
        <link rel="stylesheet" href="../Components/icon.css">
        <link rel="stylesheet" href="../CSS/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script src="../Components/sweetalert2@11.js"></script>

</head>

<body>
    <?php
    include("/xampp/htdocs/Modulo-Comisionistas/DataBase/conexion.php");
    $sql = "SELECT * FROM gestion_productos.comisionista";
    $result = mysqli_query($Link, $sql);

    $row = mysqli_fetch_array($result);
    ?>

    <div class="modal fade" id="editar<?php echo $row['UsuarioID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir un comisionista</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="mb-3 row justify-content-md-center">
                            <div class="col">
                                <label for="documento" class="col-form-label">Número de documento:</label>
                                <input type="number" class="form-control" id="documento" name="UsuarioID" value="<?php echo $row['UsuarioID'] ?>" required>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-md-center">
                            <div class="col">
                                <label for="nombre" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="Nombre" required>
                            </div>
                            <div class="col">
                                <label for="apellido" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellido" name="Apellido" required>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-md-center">
                            <div class="col">
                                <label for="edad" class="col-form-label">Edad:</label>
                                <input type="number" class="form-control" id="edad" name="Edad" required>
                            </div>
                            <div class="col">
                                <label for="telefono" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefono" name="Telefono" required>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-md-center">
                            <div class="col">
                                <label for="correo" class="col-form-label">Correo:</label>
                                <input type="email" class="form-control" id="correo" name="Correo" required>
                            </div>
                            <div class="col">
                                <label for="direccion" class="col-form-label">Dirección:</label>
                                <input type="text" class="form-control" id="direccion" name="Direccion" required>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-md-center">
                            <div class="col">
                                <label for="ciudad" class="col-form-label">Ciudad:</label>
                                <input type="text" class="form-control" id="ciudad" name="Ciudad" required>
                            </div>
                            <div class="col">
                                <label for="password" class="col-form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="password" name="Password" required>
                            </div>
                        </div>
                        <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                        </div>
                    </form>
</body>

</html>