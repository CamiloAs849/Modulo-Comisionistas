<?php
session_start();
include("../DataBase/conexion.php");
if (empty($_SESSION['UsuarioID'])) {
    header("Location: ./nuevo-pedido.php");
}

$carrito = $_SESSION['carrito'];

if (empty($carrito)) {
    header("Location:./nuevo-pedido.php");
}

$id = $_SESSION['UsuarioID'];

$sql = "SELECT * FROM gestion_productos.comisionista WHERE UsuarioID = $id";

$result = mysqli_query($Link, $sql);

$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hacer el pedido</title>
    <link rel="stylesheet" href="../Components/bootstrap.min.css">
    <script src="../Components/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../Components/default.min.css" />
    <link rel="stylesheet" href="../Components/icon.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="../Components/datatables.min.css">
    <script src="../Components/jquery-3.7.1.min.js"></script>

</head>

<body>
    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#"><img src="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png" width="20" height="20" alt=""> Vision Limpieza</a>
    </header>
    <div class="container">
        <a href="#" class="btn btn-dark buttonFloat"><i class="fa-solid fa-arrow-up"></i></a>
        <div class="text-center">
            <a href="./nuevo-pedido.php" class="btn btn-primary mt-4 btn-lg"><i class="fa-solid fa-arrow-left"></i> Regresar</a>
        </div>
        <p class="title mt-4 text-center">Información de entrega del pedido</p>
        <form action="" id="FormPedido" method="post">
            <div class="row">
                <h3 class="text-center mb-3 fw-semibold">Informacion personal</h3>
                <div class="col-12">
                    <div class="form-floating mb-4">
                        <input type="number" class="form-control" disabled value="<?php echo $row['UsuarioID'] ?>" id="documento" placeholder="Número de documento">
                        <label for="documento">Numero de documento</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" value="<?php echo $row['NombreUsuario'] ?>" name="Nombre" id="Nombre" placeholder="">
                        <label for="Nombre">Nombre</label>
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" value="<?php echo $row['ApellidosUsuario'] ?>" name="Apellido" id="Apellido" placeholder="">
                        <label for="Apellido">Apellidos</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <h3 class="text-center mb-3 fw-semibold">Información de entrega</h3>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" value="<?php echo $row['Direccion'] ?>" name="Direccion" id="Direccion" placeholder="">
                        <label for="Direccion">Dirección</label>
                    </div>
                </div>
                <div class=" col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" value="<?php echo $row['Ciudad'] ?>" name="Ciudad" id="Ciudad" placeholder="">
                        <label for="Ciudad">Ciudad</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <h3 class="fw-semibold text-center mb-3">Información de contacto</h3>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" value="<?php echo $row['Correo'] ?>" name="Correo" id="Correo" placeholder="">
                        <label for="Correo">Correo electronico</label>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="form-floating mb-4">
                        <input type="number" class="form-control" value="<?php echo $row['TelefonoUsuario'] ?>" name="Telefono" id="Telefono" placeholder="">
                        <label for="Telefono">Teléfono</label>
                    </div>
                </div>
            </div>
            <h3 class="fw-semibold text-center mb-3">Pedido</h3>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped  table-hover">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Comsión</th>
                                <th>Total del producto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($_SESSION['carrito'] as $c) {
                                $productos = $Link->query("SELECT * FROM gestion_productos.producto WHERE ProductoID=$c[id]");
                                $r = $productos->fetch_object();
                                $total += $c['cantidad'] * $r->Precio;
                            ?>

                                <tr>
                                    <td><?php echo $r->NombreProducto ?></td>
                                    <td><?php echo $c['cantidad'] ?></td>
                                    <td>$<?php echo number_format($r->Precio, 0, '', '.') ?></td>
                                    <td>$<?php echo number_format($r->Precio * 0.19, 0, '', '.') ?></td>
                                    <td>$<?php echo number_format($c['cantidad'] * $r->Precio, 0, '', '.') ?></td>
                                </tr>
                            <?php
                            }
                            $comision = $total * 0.19;
                            $totalFactura = $total - $comision;
                            ?>
                            <tr>
                                <th colspan="4" class="text-end">
                                    <h5>Total factura:</h5>
                                </th>

                                <td>
                                    <h5>$<?php echo number_format($total, 0, '', '.') ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="4" class="text-end">
                                    <h5>Valor estimado de comisión:</h5>
                                </th>
                                <td>
                                    <h5>$<?php echo number_format($comision, 0, '', '.') ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="4" class="text-end">
                                    <h5>Total a pagar:</h5>
                                </th>
                                <td>
                                    <h5>$<?php echo number_format($totalFactura, 0, '', '.') ?></h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <input type="hidden" name="TotalPagar" value="<?php echo $totalFactura ?>">
            <input type="hidden" name="fechaPedido" value="<?php echo date('Y-m-d'); ?>">
            <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Confirmar entrega</button>
            </div>
        </form>
        <center>
            <div id="message" class="text-center w-25"></div>
        </center>
    </div>
    <?php
    include("../footer.php");
    ?>
    <script>
        $(document).ready(function() {
            $("#FormPedido").on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: '../Validation/pedido.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#message').html(response)
                    }
                })
            })
        });
    </script>
</body>

</html>