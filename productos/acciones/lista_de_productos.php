<?php
/* Función para obtener todos los empleados de la tabla */
function obtenerProductos($conexion)
{
    $sql = "SELECT * FROM productos ORDER BY id DESC"; // Cambia ASC por DESC
    $result = $conexion->query($sql);
    $productos = [];
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
    return $productos;
}
?>