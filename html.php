<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./Components/bootstrap.min.css">
    <link rel="stylesheet" href="./Components/datatables.min.css">
</head>

<body>
    <div class="container">
        <table class="table " id="example">
            <thead class="">
                <tr>
                    <th>Num</th>
                    <th>NIT</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("./DataBase/conexion.php");

                $sql = "SELECT * FROM gestion_productos.proveedor";
                $result = mysqli_query($Link, $sql);
                $num = 1;

                while ($row = mysqli_fetch_array($result)) { ?>

                    <tr>
                        <td> <?php echo $num++ ?></td>
                        <td><?php echo $row['ProveedorID'] ?></td>
                        <td><?php echo $row['NombreProveedor'] ?></td>
                        <td><?php echo $row['Telefono'] ?></td>
                        <td><?php echo $row['Direccion'] ?></td>
                    </tr>


                <?php
                }
                ?>
            </tbody>
            <script src="./Components/jquery-3.7.1.min.js"></script>
            <script src="./Components/bootstrap.bundle.min.js"></script>
            <script src="./Components/datatables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#example').DataTable({
                        language: {
                            processing: "Tratamiento en curso...",
                            search: "Buscar&nbsp;:",
                            lengthMenu: "Agrupar de _MENU_ items",
                            info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                            infoEmpty: "No existen datos.",
                            infoFiltered: "(filtrado de _MAX_ elementos en total)",
                            infoPostFix: "",
                            loadingRecords: "Cargando...",
                            zeroRecords: "No se encontraron datos con tu busqueda",
                            emptyTable: "No hay datos disponibles en la tabla.",
                            paginate: {
                                first: "Primero",
                                previous: "Anterior",
                                next: "Siguiente",
                                last: "Ultimo"
                            },
                            aria: {
                                sortAscending: ": active para ordenar la columna en orden ascendente",
                                sortDescending: ": active para ordenar la columna en orden descendente"
                            }
                        },
                        scrollY: 600,
                        lengthMenu: [
                            [10, 25, -1],
                            [10, 25, "All"]
                        ],
                    });
                });
            </script>
        </table>

</body>

</html>