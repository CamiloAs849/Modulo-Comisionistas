<?php
session_start();
include "../DataBase/conexion.php"
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

                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($_SESSION['carrito'] as $c) {
                            $productos = $Link->query("SELECT * FROM gestion_productos.producto WHERE ProductoID=$c[id]");
                            $r = $productos->fetch_object();
                            $total += $c['cantidad'] * $r->Precio;
                        ?>
                            <tbody>
                                <tr>
                                    <th><?php echo $c['cantidad'] ?></th>
                                    <th><?php echo $r->NombreProducto ?></th>
                                    <th>$<?php echo $r->Precio ?></th>
                                    <th>$<?php echo $c['cantidad'] * $r->Precio ?></th>
                                    <th><a href="./Cart/delProduct.php?id=<?php echo $c['id'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></th>
                                </tr>
                            </tbody>
                    <?php
                        }
                    }
                    ?>
                    </table>
                    <?php if (empty($total)) { ?>
                        <h3 class="text-center"><i class="fa-solid fa-hourglass fa-2xl"></i> El carrito está vacío</h3>
                    <?php
                    } else { ?>
                        <h3>Total a pagar: <?php echo $total ?></h3>
                    <?php } ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a href="./Cart/delAll.php" class="btn btn-danger">Vaciar Carrito</a>
                <button type="button" class="btn btn-success">Hacer pedido</button>
            </div>
        </div>
    </div>
</div>