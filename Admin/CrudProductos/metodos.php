<?php
class Metodos
{
    public function insertarDatos($datos)
    {
        include('../../DataBase/conexion.php');
        $conexion = $Link;
        $stmt = $conexion->prepare("INSERT INTO producto (NombreProducto,imagen,Descripcion,tamaño,precio, Etiqueta) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $datos['0'], $datos['1'], $datos['2'], $datos['3'], $datos['4'], $datos['5']);
        return $stmt->execute();
    }
    public function eliminarProducto($datos)
    {
        include('../../DataBase/conexion.php');
        $conexion = $Link;
        $sql = ("DELETE FROM producto WHERE ProductoID = 'ProductoID'");
        return $result = mysqli_query($conexion, $sql);
    }
    public function editarProducto($datos)
    {
        include('../../DataBase/conexion.php');
        $conexion = $Link;
        $stmt = $conexion->prepare("UPDATE producto SET NombreProducto=?,imagen=?,Descripcion=?,tamaño=?,Precio=?,Etiqueta=? where ProductoID=?");
        $stmt->bind_param("sssssss", $datos['0'], $datos['1'], $datos['2'], $datos['3'], $datos['4'], $datos['5'], $datos['6']);
        return $stmt->execute();
    }
}
