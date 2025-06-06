<?php
include('config/config.php');
$id=intval($_GET['id']);

//Obtener de la base de datos el producto
// a traves del id
$stmt=$conexion->prepare("SELECT * FROM productos WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();

$result = $stmt->get_result();
$producto = $result->fetch_assoc();

if(!$producto) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Producto no encontrado']);
    exit;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3DMASE</title>
    <meta name="description" content="Página web Cafetería">

    <!-- Prefetch -->
    <link rel="prefetch" href="nosotros.php" as="document">

    <!-- Preload -->
    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">

    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap"  crossorigin="crossorigin" as="font">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">

    <link rel="preload" href="css/estilos.css" as="style">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="img/Servicios/logo.ico">


</head>
<body class="no-margin compra-bg">
    
<header class="header_Admin" >

        <div class="contenedor">
            <div class="barra">
                <a class="logo" href="index.php">
                <h1 class="c-logo logo_nombre no-margin centrar-texto">3D<span class="logo_bold c-logo">MASE</span></h1>                </a>

                <nav class="navegacion">
                    <a href="index.php" class="navegacion__enlace">Inicio</a>
                    <a href="nosotros.php" class="navegacion__enlace">Nosotros</a>
                    <a href="contacto.php" class="navegacion__enlace">Contacto</a>
                </nav>
            </div>
        </div>
</header>
<div class="c-10X">
    
</div>

<div class="container-comprar">
    <!-- Título del producto -->
    <div class="e-producto-titulo">
        <h1 class="c-centrado e-compra-titulo"><?php echo htmlspecialchars($producto['nombre']); ?></h1>
    </div>

    <!-- Línea divisoria -->
    <div class="c-linea"></div>

    <!-- Información del producto -->
    <div class="compra-info">
        <!-- Imagen del producto -->
        <div class="compra-der">
            <img id="imgProducto" loading="lazy" src="productos/assets/img/productos/<?php echo $producto['imagen']; ?>" alt="Imagen del producto" class="producto">
        </div>

        <!-- Detalles del producto -->
        <div class="compra-izq">
            <!-- Precio -->
            <div class="precio-container">
                <span class="e-compra-precio">Precio:</span>
                <span class="e-compra-precio"><?php echo number_format($producto['precio'], 2); ?></span>
                <span class="e-compra-precio">$</span>
            </div>

            <!-- Descripción larga -->
            <div class="e-compra-descripcion">
                <label for="descripcion_larga" class="descripcion-label">Descripción:</label>
                <div class="e-compra-desc">
                    <?php echo nl2br(htmlspecialchars($producto['descripcion_larga'])); ?>
                </div>
            </div>

            <!-- Cantidad disponible -->
            <div class="form-group ola">
                <label for="amount" class="cantidad-label">Cantidad disponible:</label>
                <span class="awiwiw"><?php echo intval($producto['cantidad']); ?></span>
            </div>

            <!-- Botón de compra -->
            <div class="btn-comprar-container">
                <button class="button" disabled>
                    <p class="text">Comprar</p>
                </button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
