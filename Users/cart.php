<?php
include "../DataBase/conexion.php";

if (empty($_SESSION['UsuarioID'])) {
    header("Location: ./nuevo-pedido.php");
}
?>

<div class="modal fade" id="carrito" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Productos en el carrito</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                $productos = $Link->query("select * from gestion_productos.producto");
                if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                    $total = 0;
                    $comision = 0;
                    $totalFactura = 0;

                ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Comisión</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php
                            $porcentajeComision = 19 / 100;
                            foreach ($_SESSION['carrito'] as $c) {
                                $productos = $Link->query("SELECT * FROM gestion_productos.producto WHERE ProductoID=$c[id]");
                                $r = $productos->fetch_object();
                                $total += $c['cantidad'] * $r->Precio;
                            ?>
                                <tbody>
                                    <tr>
                                        <th><?php echo $r->NombreProducto ?></th>
                                        <td class="w-25 cantidad">
                                            <form action="./Cart/editCant.php" method="post" class="d-flex ">
                                                <input type="hidden" name="id" value="<?php echo $c['id'] ?>">
                                                <input type="number" name="cantidad" max="5" class="form-control w-25" value="<?php echo $c['cantidad'] ?>">
                                                <button type="submit" class="btn btn-primary ms-4"> <i class="fa-solid fa-rotate-right"></i></i></button>
                                            </form>
                                        </td>
                                        <td>$<?php echo number_format($r->Precio, 0, '', '.') ?></td>
                                        <td>$<?php echo number_format($r->Precio * $porcentajeComision, 0, '', '.') ?></td>
                                        <td>$<?php echo number_format($c['cantidad'] * $r->Precio, 0, '', '.') ?></td>
                                        <td><a href="./Cart/delProduct.php?id=<?php echo $c['id'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
                                    </tr>
                                </tbody>
                    </div>
            <?php
                            }
                        }
            ?>

            </table>
            <?php if (empty($total)) { ?>
                <h3 class="text-center mt-4 mb-4"><i class="fa-solid fa-hourglass fa-2xl"></i> El carrito está vacío</h3>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            <?php
            } else {
                $comision = $total * $porcentajeComision;
                $totalFactura = $total - $comision;
            ?>
                <h4>Total de factura: $<?php echo number_format($total, 0, '', '.') ?></h4>
                <h4>Comisión: $<?php echo number_format($comision, 0, '', '.') ?></h4>
                <h4>Total a pagar: $<?php echo number_format($totalFactura, 0, '', '.')  ?></h4>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a href="./Cart/delAll.php" class="btn btn-danger">Vaciar Carrito</a>
                <a href="./hacerPedido.php" class="btn btn-success">Hacer pedido <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        <?php } ?>
        </div>
    </div>
</div>