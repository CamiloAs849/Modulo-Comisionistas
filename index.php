<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="./Components/bootstrap.min.css">
    <script src="./Components/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./Components/icon.css">
    <link rel="icon" href="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <script src="./Components/jquery-3.7.1.min.js"></script>
    <script src="./Components/sweetalert2@11.js"></script>
</head>

<body class="scroll">
    <div class="row">
        <div class="col-xxl-4 col-xl-4 col-lg-12 col-md-12 col-sm-12 m-0">
            <form class="form_container" id="FormLogin" method="post">
                <h1 class="text-center titulo">Visión Limpieza</h1>
                <img src="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png" class="" width="90px" alt="">
                <div class="title_container">
                    <p class="title text-center">Ingresar al portal</p>
                    <button type="button" class="bg-transparent border border-0" data-bs-toggle="modal" data-bs-target="#formularioPeticion">¿No eres comisionista? Haz tu petición</button>
                    <span class="subtitle text-center">Ingresa mediante la clave que te han dado.</span>
                </div>
                <div id="message">
                </div>
                <div class="input_container">
                    <i class="fa-solid fa-user icon text-center"></i>
                    <input placeholder="Numero de documento" name="UsuarioID" type="text" class="input_field" id="email_field">
                </div>
                <div class="input_container">
                    <i class="fa-solid fa-lock icon text-center"></i>
                    <input placeholder="Contraseña" name="password" type="password" class="input_field" id="password_field">
                </div>
                <button type="submit" class="sign-in_btn">
                    <span>Ingresar</span>
                </button>
                <p class="note text-center">No des tu clave de acceso a terceros.</p>
                <button type="button" class="bg-transparent border border-0 note text-decoration-underline" data-bs-toggle="modal" data-bs-target="#FormEstado">Verificar mi estado de petición</button>
                <a href="https://wa.me/3053396000/?text=" class="note text-center">He olvidado mi contraseña</a>
            </form>
        </div>
        <div class="col-xxl-8 col-xl-8 col-lg-612col-md-12 col-sm-12 m-0 p-0">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://i.ibb.co/8mw9F2t/1256x990.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://i.ibb.co/PDhN4Fb/png-1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://i.ibb.co/pnj0Vbr/png.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#FormLogin").on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: './Validation/inicioSesion.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#message').html(response)
                    }
                })
            })
        });

        $(document).ready(function() {
            $("#FormPeticion").on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: './peticionComisionistas/validarPeticion.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#messagePeticion').html(response)
                    }
                })
            })
        });
        $(document).ready(function() {
            $("#FormEstadoPeticion").on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: './peticionComisionistas/validarEstadoPeticion.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#messageEstadoPeticion').html(response)
                    }
                })
            })
        });
    </script>
    <script src="../Components/jquery-3.7.1.min.js"></script>

    <?php
    include("./peticionComisionistas/formularioPeticion.php");
    include("./peticionComisionistas/estadoPeticion.php")
    ?>
</body>

</html>