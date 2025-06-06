<?php
ob_start(); //Inicia el buffer de salida
include("../config/config.php"); // Incluye la conexión a la base de datos

// Es importante enviar la cabecera JSON antes de cualquier salida
header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Obtener y sanitizar datos del formulario
$nombre=isset($_POST['nombre'])? trim($_POST['nombre']):'';
$apellidos=isset($_POST['apellidos'])? trim($_POST['apellidos']):'';
$rfc=isset($_POST['rfc'])? trim($_POST['rfc']):'';
$sexo=isset($_POST['sexo'])? trim($_POST['sexo']):'';
$telefono=isset($_POST['telefono'])? trim($_POST['telefono']):'';
$email=isset($_POST['email'])? trim($_POST['email']):'';
$cargo=isset($_POST['cargo'])? trim($_POST['cargo']):'';

// Procesar imagen
if(!isset($_FILES['imagen'])){
    $imagen="../assets/img/fotos_empleados/logo.jpg";
    exit;
}  else {
        $imagen = $_FILES['imagen']['name'];

        if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagenNombre = basename($_FILES['imagen']['name']);
        $uploadDir = "../assets/img/fotos_empleados/";

        //Crear la carpeta si no existe
        if(!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777,true);
        }
        //Subir la Imagen
        $imagenDestino = $uploadDir . $imagenNombre;
        //Mover archivo subido al directorio destino
        if(!move_uploaded_file($_FILES['imagen']['tmp_name'], $imagenDestino)) {
            echo json_encode([
                'success' => false,
                'message' => 'Error al  mover la imagen salida.'
            ]);
            exit;
        }
        } else {
            echo json_encode([
                'success' => false,
                'message'=> 'No se recibió la imagen o hubo un error en la cargarla'
            ]);
            exit;
        }
        //Preparar la consulta de la insercion a la base de datos, tabla empleados
            $stmt = $conexion->prepare("INSERT INTO empleados (nombre, apellidos, rfc, sexo, telefono, email, cargo, imagen) VALUES (? ,? ,? ,? ,? ,?, ?, ?)");

            if(!$stmt) {
                echo json_encode([
                  'success'=> false,
                  'message' => 'Error en la preparación de la consulta',
                  $conexion->error  
                ]);
                exit;
            }
            // Enlazar parámetros
            $stmt->bind_param('ssssssss', $nombre, $apellidos, $rfc, $sexo, $telefono, $email, $cargo, $imagenNombre);
            // Ejecutar la consulta y preparas la respuesta
            $response = array();
            if ($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = 'Empleado agregado correctamente';
            }
         else {
            $response['success'] = false;
            $response['message'] = 'Error al agregar el empleado:' . $stmt->error;
        
        }
        //Cerrar la sentencia y la conexión
        $stmt->close();
        $conexion->close();

        ob_end_clean(); //  Limpia cualquier salida previa en el buffer

        // Dolver la respuesta como JSON
        echo json_encode($response);
        exit;
    }
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


