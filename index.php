<?php
session_start();
include('./DataBase/conexion.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visión limpieza</title>
    <link rel="icon" href="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Righteous&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap">
    <link rel="stylesheet" href="./CSS/estilo.css">
    <link rel="stylesheet" href="./CSSestilo_Admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="./Components/sweetalert2@11.js"></script>
    <script src="./Components/jquery-3.7.1.min.js"></script>

</head>

<body>
    <a href='https://wa.link/lxfp0g' class="whatsapp-button" target="_blank">
        <img src="./imagenes2/whatsapp2.png" width="50" alt="">
    </a>

    <nav class="navbar navbar-expand-lg bg-gradient fixed-top">
        <div class="container">
            <a class="navbar-brand mb-0 h1 text-white" id="navbar-titulo" style="font-family: 'righteous';" href="#">
                <h1>Visión Limpieza</h1>
            </a>
            <button class="navbar-toggler p-2 border border-0 text-white bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars fa-xl"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ">
                        <a href="#quienessomos" class="nav-link text-white">
                            <h5>Quienes somos</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#portafolio" class="nav-link text-white">
                            <h5>Nuestros productos</h5>
                        </a>
                    </li>
                    <?php
                    if (empty($_SESSION['UsuarioID'])) {
                    ?>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link text-white" button onclick="window.location.href='indexLogin.php'">
                                <h5>Soy comisionista</h5>
                            </a>
                        </li>
                    <?php
                    } else { ?>
                        <li class="nav-item dropdown">
                            <a href="./Users/nuevo-pedido.php" class="nav-link text-white" button onclick="window.location.href='indexLogin.php'">
                                <h5>Hacer pedido</h5>
                            </a>
                        </li>
                    <?php
                    } ?>
                </ul>
            </div>
        </div>
    </nav>





    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.pexels.com/photos/5217889/pexels-photo-5217889.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    alt="" width="100%">
                <div class="container">
                    <div class="carousel-caption" id="text-carousel">
                        <h2 class="display-5 text-black" style="font-family: 'righteous';">Productos de calidad</h2>
                        <h4 class="text-black" style="font-family: 'righteous';">Te garantizamos la calidad de cada
                            uno
                            de nuestros
                            productos</h4>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/4099471/pexels-photo-4099471.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    alt="" width="100%">
                <div class="container">
                    <div class="carousel-caption text-end">
                        <h2 class="text-dark display-5" style="font-family: 'righteous';">Visión limpieza</h2>
                        <h4 class="text-dark" style="font-family: 'righteous';">Expertos
                            en la
                            limpieza de tu hogar
                            y el cuidado de tu familia</h4>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://img.freepik.com/vector-premium/ilustracion-vectorial-botellas-limpieza-hogar_1322206-47566.jpg?semt=ais_hybrid"
                    alt="" width="100%">
                <div class="container">
                    <div class="carousel-caption text-end">
                        <h2 class="text-dark display-5" style="font-family: 'righteous';"> Conoce más de nosotros
                        </h2>
                        <h3 class="text-dark" style="font-family: 'righteous';">Te
                            brindamos
                            la
                            mejor asesoría</h3>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="container text-center" id="parteequipos">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 style="font-family: 'Righteous';">¿Quieres ser parte de nuestro equipo de comisionistas?</h2>
                <p class="text-dark">Para ser parte de nuestro equipo haz tu solicitud o comunicate con nosotros, para brindarte la mejor
                    asesoría.
            </div>
        </div>
        <br>
        <button type="button" class="btn-donate" data-bs-toggle="modal" data-bs-target="#formularioPeticion">
            Haz tu solicitud
        </button>
        <button type="button" class="btn-donate" data-bs-toggle="modal" data-bs-target="#FormEstado">
            Verificar mi estado
        </button>
    </div>
    </nav>


    <section class="container text-center">
        <div class="row" id="portafolio">
            <h2 id="portafolio-title" class="mt-5">Nuestros productos</h2>
            <?php
            include("./DataBase/conexion.php");
            $sql = "SELECT * FROM gestion_productos.producto";
            $result2 = mysqli_query($Link, $sql);
            while ($row = mysqli_fetch_array($result2)) {


            ?>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card" style="height:  650px;">
                        <div class="card__corner"></div>
                        <div class="card__img">
                            <div class="container-fluid" id="imagenes">
                                <img src="<?php echo './Admin/imagenes/' . $row['imagen'] ?>" class="img-fluid" width="60%"
                                    alt="...">
                            </div>
                            <span class="card__span"><?php echo $row['Etiqueta'] ?></span>
                        </div>
                        <div class="card-int">
                            <p class="card-int__title" style="font-family: 'Righteous';">
                                <?php echo $row['NombreProducto'] ?></p>
                            <p class="excerpt"><?php echo $row['Descripcion'] ?>
                            <h5 style="font-family: 'Righteous';">Tamaño: <?php echo $row['tamaño'] ?></h5>
                            <h5 style="font-family: 'Righteous';">Precio: $
                                <?php echo number_format($row['Precio'], 0, "", ".") ?>
                            </h5>
                            </p>
                            <button class="card-int__button" onclick="<?php if (empty($_SESSION['UsuarioID'])) {
                                                                            echo "Api()";
                                                                        } else {
                                                                            echo "Catalago()";
                                                                        } ?>">Deseo comprar</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <script>
            function Catalago() {
                window.location.href = './Users/nuevo-pedido.php';
            }

            function Api() {
                window.open('https://wa.link/lxfp0g', '_blank');
            }
        </script>
    </section>
    <section class="container text-center" id="quienessomos">
        <div class="card-body">
            <h1 class="card-title text-center" style="font-family: 'Righteous';">Nuestra misión y
                visión
            </h1>
        </div>
        <div class="row gx-5">
            <div class="col">
                <br>
                <div class="p-3 border-10  bg-white">
                    <h2 class="card-title text-center" style="font-family: 'Righteous'; ">Misión:</h2>
                    <p style="color:black;" class="text-start">Nuestra misión es liderar la industria de productos de
                        limpieza
                        proporcionando
                        soluciones
                        innovadoras y
                        sostenibles que mejoren la calidad de vida de nuestros clientes. Nos comprometemos a ofrecer
                        productos de
                        alta eficacia, seguros para el medio ambiente y la salud de las personas, manteniendo un
                        compromiso
                        inquebrantable con la excelencia y la atención al cliente..</p>
                </div>
                </br>
            </div>
            <div class="col">
                <br>
                <div class="p-3 border-10 bg-white">
                    <h2 class="card-title text-center" style="font-family: 'Righteous';">Visión:</h2>
                    <p style=" color:black;" class="text-start">Nuestra visión es ser reconocidos como la marca de
                        referencia en el mercado
                        global de
                        productos de
                        limpieza, expandiendo nuestro alcance y contribuyendo a un mundo más limpio y sostenible.
                        Aspiramos a
                        transformar la rutina diaria de limpieza con productos que no solo sean efectivos, sino que
                        también inspiren
                        bienestar y respeto por nuestro planeta.</p>
                </div>
                </br>
            </div>
        </div>
    </section>

    <div class="container-fluid text-center" id="preguntas">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 style="font-family: 'Righteous';">¿Tienes dudas?</h2>
                <p>Comunicate con nosotros para brindarte la mejor asesoría </p>
                <button class="button2" button onclick="window.location.href='https://wa.link/lxfp0g'">
                    WhatsApp
                    <svg viewBox="0 0 48 48" y="0px" x="0px" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z"
                            fill="#fff"></path>
                        <path
                            d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z"
                            fill="#fff"></path>
                        <path
                            d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z"
                            fill="#cfd8dc"></path>
                        <path
                            d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z"
                            fill="#40c351"></path>
                        <path clip-rule="evenodd"
                            d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z"
                            fill-rule="evenodd" fill="#fff"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>



    <footer class="footer bg-gradient ">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <h4 class="text-white mt-4" style="font-family: 'Righteous';">Contacto</h4>
                    <p class="text-white"><i class="icon-home text-white"></i> Calle Falsa 123, Palmas, Poblado</p>
                    <p class="text-white"><i class="icon-envelope"></i> info@visionlimpieza.com</p>
                    <p class="text-white"><i class="icon-phone text-white"></i> +571234536</p>
                </div>
                <div class="span3">
                    <h4 class="text-white" style="font-family: 'Righteous';">Síguenos</h4>
                    <a class="btn btn-small btn-primary"><i class="fa-brands fa-facebook"></i></a>
                    <a class="btn btn-small btn-success" button
                        onclick="window.location.href='https://wa.link/lxfp0g'"><i
                            class="fa-brands fa-whatsapp"></i></a>
                    <a class="btn btn-small btn-danger"><i class="fa-brands fa-instagram"></i></a>
                </div>

            </div>

            <hr>

            <div class="row">
                <div class="span12">
                    <p class="text-center text-white">© 2024 Visión Limpieza. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <?php
    include("./peticionComisionistas/formularioPeticion.php");
    include("./peticionComisionistas/estadoPeticion.php");
    ?>
    <script>
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
    <script src="./Components/jquery-3.7.1.min.js"></script>

</body>

</html>