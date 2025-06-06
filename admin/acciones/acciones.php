<?php
/*Funcion para obtener todos los empleados de la tabla */

function obtenerEmpleados($conexion)
{
    $sql ="SELECT * FROM empleados ORDER BY id ASC";
    $resultado = $conexion->query($sql);
    if(!$resultado) {
        return false;
    }
    return $resultado;
}
?>