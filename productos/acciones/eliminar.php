<?php
$id = intval($_GET['id']);
include("../config/config.php");

// Eliminar producto de la base de datos
$stmt = $conexion->prepare("DELETE FROM productos WHERE id=?");
$stmt->bind_param("i", $id);
$resultado = $stmt->execute();
$stmt->close();

// Eliminar carpeta de imágenes del producto
$directorio = "../../img/productos/$id";
function eliminarCarpeta($carpeta) {
    if (!file_exists($carpeta)) return true;
    if (!is_dir($carpeta)) return unlink($carpeta);
    foreach (scandir($carpeta) as $item) {
        if ($item == '.' || $item == '..') continue;
        if (!eliminarCarpeta($carpeta . DIRECTORY_SEPARATOR . $item)) return false;
    }
    return rmdir($carpeta);
}
eliminarCarpeta($directorio);

if ($resultado) {
    echo "<script>
        Swal.fire({
            title: '¡Eliminado!',
            text: 'El registro y su carpeta se han eliminado correctamente.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../index.php';
            }
        });
    </script>";
} else {
    echo "<script>
        Swal.fire({
            title: 'Error',
            text: 'Error al eliminar el registro: " . $conexion->error . "',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>";
}
?>
