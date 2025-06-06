<?php
include("../config/config.php"); // Incluye la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $nombre = $_POST['nombre'];
    $descripcion_corta = $_POST['descripcion_corta'];
    $descripcion_larga = $_POST['descripcion_larga'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $imagen = $_FILES['nueva_imagen']['name'];
    $target_dir = "../assets/img/productos/";
    $target_file = $target_dir . basename($imagen);
    $uploadOk = 1;

    // Verificar si se subió una nueva imagen
    if (!empty($imagen)) {
        // Verificar si la imagen es válida
        $check = getimagesize($_FILES['nueva_imagen']['tmp_name']);
        if ($check === false) {
            echo json_encode(['success' => false, 'message' => 'El archivo no es una imagen.']);
            exit;
        }

        // Intentar subir la imagen
        if (move_uploaded_file($_FILES['nueva_imagen']['tmp_name'], $target_file)) {
            // La imagen se subió correctamente
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al subir la imagen.']);
            exit;
        }
    } else {
        // Si no se subió una nueva imagen, mantener la imagen actual
        $stmt = $conexion->prepare("SELECT imagen FROM productos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $producto = $result->fetch_assoc();
        $imagen = $producto['imagen'];
    }

    // Actualizar los datos del producto
    $stmt = $conexion->prepare("UPDATE productos SET nombre = ?, descripcion_corta = ?, descripcion_larga = ?, precio = ?, cantidad = ?, imagen = ? WHERE id = ?");
    $stmt->bind_param("sssdisi", $nombre, $descripcion_corta, $descripcion_larga, $precio, $cantidad,$imagen, $id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Producto actualizado correctamente.']);
        header("Location: ../index.php");

    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el producto: ' . $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}
?>