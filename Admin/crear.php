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
        <link rel="stylesheet" href="../Components/all.min.css">
        <script src="../Components/sweetalert2@11.js"></script>

</head>

<body>
    <div class="modal fade" id="crear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="number" class="form-control" id="documento" name="UsuarioID" required>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-md-center">
                            <div class="col">
                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="recipient-name" name="Nombre" required>
                            </div>
                            <div class="col">
                                <label for="message-text" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" id="message-text" name="Apellido" required>
                            </div>
                            <script>
                            </script>
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
                            <button type="submit" class="btn btn-primary"><i class=" material-icons">save</i>Guardar</button>
                        </div>
                    </form>
                    <?php

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        include("../DataBase/conexion.php");

                        function validar($data)
                        {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }
                        $Documento = validar($_POST['UsuarioID']);
                        $Nombre = validar($_POST['Nombre']);
                        $Apellido = validar($_POST['Apellido']);
                        $Edad = validar($_POST['Edad']);
                        $Telefono = validar($_POST['Telefono']);
                        $Correo = validar($_POST['Correo']);
                        $Direccion = validar($_POST['Direccion']);
                        $Ciudad = validar($_POST['Ciudad']);
                        $Password = validar($_POST['Password']);

                        $sql = "INSERT INTO gestion_productos.comisionista (UsuarioID, NombreUsuario, ApellidosUsuario, Edad, TelefonoUsuario, Correo, Direccion, Ciudad, Password) 
                            VALUES ('$Documento', '$Nombre', '$Apellido', '$Edad', '$Telefono', '$Correo', '$Direccion', '$Ciudad', '$Password')";
                        $result = mysqli_query($Link, $sql);
                        if ($result === true) {
                            echo  '<script>
                                Swal.fire({
                                    title: "Comisionista añadido exitosamente!",
                                    icon: "success",
                                    confirmButtonText: "Aceptar"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "./comisionistas.php";
                                    }
                                });
                            </script>';
                        } else {
                            '<script>
                                Swal.fire({
                                    title: "Error al añadir el comisionista!",
                                    text: "Por favor, intenta de nuevo.",
                                    icon: "error",
                                    confirmButtonText: "Aceptar"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "./comisionistas.php";
                                    }
                                });
                            </script>';
                        }
                    }
                    ?>



                </div>
            </div>
        </div>
    </div>
</body>

</html>