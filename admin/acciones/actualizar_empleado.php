<?php
include("../config/config.php"); // Incluye la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $rfc = $_POST['rfc'];
    $sexo = $_POST['sexo'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $cargo = $_POST['cargo'];
    $imagen = $_FILES['imagen']['name'];
    $target_dir = "../assets/img/fotos_empleados/";
    $target_file = $target_dir . basename($imagen);
    $uploadOk = 1;

    // Verificar si se subió una nueva imagen
    if (!empty($imagen)) {
        // Verificar si la imagen es válida
        $check = getimagesize($_FILES['imagen']['tmp_name']);
        if ($check === false) {
            echo json_encode(['success' => false, 'message' => 'El archivo no es una imagen.']);
            exit;
        }

        // Intentar subir la imagen
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
            // La imagen se subió correctamente
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al subir la imagen.']);
            exit;
        }
    } else {
        // Si no se subió una nueva imagen, mantener la imagen actual
        $stmt = $conexion->prepare("SELECT imagen FROM empleados WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $empleado = $result->fetch_assoc();
        $imagen = $empleado['imagen'];
    }

    // Actualizar los datos del empleado
    $stmt = $conexion->prepare("UPDATE empleados SET nombre = ?, apellidos = ?, rfc = ?, sexo = ?, telefono = ?, email = ?, cargo = ?, imagen = ? WHERE id = ?");
    $stmt->bind_param("ssssssssi", $nombre, $apellidos, $rfc, $sexo, $telefono, $email, $cargo, $imagen, $id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Empleado actualizado correctamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el empleado: ' . $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}
?>