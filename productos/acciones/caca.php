<?php
include("../config/config.php"); // Incluye la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $nombre = $_POST['nombre'];
    $descripcion_corta = $_POST['descripcion_corta'];
    $descripcion_larga = $_POST['descripcion_larga'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    // Actualizar los datos del empleado
    $stmt = $conexion->prepare("UPDATE productos SET nombre = ?, descripcion_corta = ?, descripcion_larga = ?, precio = ?, cantidad = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $nombre, $descripcion_corta, $descripcion_larga, $precio, $cantidad, $id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Producto actualizado correctamente.']);
        header("Location: ../index.php");
        
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el Producto: ' . $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}
?>