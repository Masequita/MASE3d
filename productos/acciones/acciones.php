<?php
/*Funcion para obtener todos los empleados de la tabla */

function obtenerProductos($conexion)
{
    $sql ="SELECT * FROM productos ORDER BY id ASC";
    $resultado = $conexion->query($sql);
    if(!$resultado) {
        return false;
    }
    return $resultado;
}
?>