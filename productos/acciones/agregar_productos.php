<?php
ob_start(); //Inicia el buffer de salida
include("../config/config.php"); // Incluye la conexión a la base de datos

// Es importante enviar la cabecera JSON antes de cualquier salida
header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Obtener y sanitizar datos del formulario
$nombre=isset($_POST['nombre'])? trim($_POST['nombre']):'';
$descripcion_corta=isset($_POST['descripcion_corta'])? trim($_POST['descripcion_corta']):'';
$descripcion_larga=isset($_POST['descripcion_larga'])? trim($_POST['descripcion_larga']):'';
$precio=isset($_POST['precio'])? trim($_POST['precio']):'';
$cantidad=isset($_POST['cantidad'])? trim($_POST['cantidad']):'';

// Procesar imagen
if (!isset($_FILES['imagen'])) {
    $imagen = "../assets/img/productos/no-image.jpeg";
} else {
    $imagen = $_FILES['imagen']['name'];

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagenNombre = basename($_FILES['imagen']['name']);
        $uploadDir = "../assets/img/productos/";

        // Crear la carpeta si no existe
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Subir la imagen
        $imagenDestino = $uploadDir . $imagenNombre;
        if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $imagenDestino)) {
            echo json_encode([
                'success' => false,
                'message' => 'Error al mover la imagen.'
            ]);
            exit;
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'No se recibió la imagen o hubo un error al cargarla.'
        ]);
        exit;
    }
}
//Preparar la consulta de la insercion a la base de datos, tabla empleados
    $stmt = $conexion->prepare("INSERT INTO productos (nombre, descripcion_corta, descripcion_larga, precio, cantidad,imagen) VALUES (? ,? ,? ,? ,? ,?)");

    if(!$stmt) {
        echo json_encode([
          'success'=> false,
          'message' => 'Error en la preparación de la consulta',
          $conexion->error  
        ]);
        exit;
    }
    // Enlazar parámetros
    $stmt->bind_param('sssdis', $nombre, $descripcion_corta, $descripcion_larga, $precio, $cantidad, $imagenNombre);
    // Ejecutar la consulta y preparas la respuesta
    $response = array();
    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'Producto agregado correctamente';
    }
 else {
        $response['success'] = false;
        $response['message'] = 'Error al agregar el producto:' . $stmt->error;
    
    }
    //Cerrar la sentencia y la conexión
    $stmt->close();
    $conexion->close();

    ob_end_clean(); //  Limpia cualquier salida previa en el buffer

    // Dolver la respuesta como JSON
    echo json_encode($response);
    exit;
} else {
    // Si el método no es POST, se devuelve un error
    echo json_encode ([
        'success' =>false,
        'message'=>'Método de solicitud no permitido'
    ]);
}


try {
    // Aquí va tu lógica principal
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error inesperado: ' . $e->getMessage()
    ]);
}

?>


