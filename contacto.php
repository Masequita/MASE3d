<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3DMASE</title>
    <meta name="description" content="Página web Cafetería">

    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap"  crossorigin="crossorigin" as="font">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="preload" href="css/estilos.css" as="style">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <header class="header">

        <div class="contenedor">
            <div class="barra">
                <a class="logo" href="index.php">
                <h1 class="logo_nombre no-margin centrar-texto">3D<span class="logo_bold">MASE</span></h1>                </a>

                <nav class="navegacion">
                    <a href="index.php" class="navegacion__enlace">Inicio</a>
                    <a href="cursos.php" class="navegacion__enlace">Cursos</a>
                    <a href="nosotros.php" class="navegacion__enlace">Nosotros</a>
                </nav>
            </div>
        </div>

        <div class="header__texto">
            <h2 class="no-margin">De lo Digital a lo Real</h2>
            <p class="no-margin">Transformamos tus archivos 3D en objetos físicos listos para usar o exhibir.</p>
        </div>
    </header>

        <main class="contenedor">
            <h3 class="centrar-texto">Contacto</h3>
          <div class="contacto-bg">
            <form class="formulario">
                <div class="campo">
                    <label class="campo__label" for="nombre">Nombre</label>
                    <input class="campo__field" type="text" id="nombre" placeholder="Tu nombre" required> 
                </div>

                <div class="campo">
                    <label class="campo__label" for="nombre">Email</label>
                    <input class="campo__field" type="email" id="email" placeholder="Tu imail" required> 
                </div>

                <div class="campo">
                    <label class="campo__label" for="mensaje">Mensaje</label>
                    <textarea class="campo__field" id="mensaje" row="5"
                     placeholder="Tu mensaje" required></textarea> 
                </div>
                <div class="campo">
                    <input type="submit" class="boton boton--primario" value="Enviar">
                </div>
            </form>
          </div>
        </main>
    <footer class="footer">
        <div class="contenedor">
            <div class="barra">
                <a class="logo" href="index.php">
                <h1 class="logo_nombre no-margin centrar-texto">3D<span class="logo_bold">MASE</span></h1>                </a>
                </a>

                <nav class="navegacion">
                    <a href="nosotros.php" class="navegacion__enlace">Nosotros</a>
                    <a href="cursos.php" class="navegacion__enlace">Cursos</a>
                    <a href="contacto.php" class="navegacion__enlace">Contacto</a>
                </nav>
            </div>
        </div>
    </footer>
    
    <script src="js/modernizr.js"></script>
</body>
</html>