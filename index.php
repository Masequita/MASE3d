<!DOCTYPE html>
<html lang="en">
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
                    <a href="nosotros.php" class="navegacion__enlace">Nosotros</a>
                    <a href="contacto.php" class="navegacion__enlace">Contacto</a>
                </nav>
            </div>
        </div>
        <div class="header__texto">
            <h2 class="no-margin">De lo Digital a lo Real</h2>
            <p class="no-margin">Transformamos tus archivos 3D en objetos físicos listos para usar o exhibir.</p>
        </div>
    </header>

    <div class="contenedor contenido-principal">
        <main class="blog">
            <h3>Nuestra tienda</h3>
                        <?php 
            include ("productos.php");
          ?>
            <article class="entrada">
                <div class="entrada__imagen">
                    <picture >
                        <source loading="lazy"  srcset="img/blog1.webp" type="image/webp">
                        <img loading="lazy" src="img/blog1.jpg" alt="imagen blog" class="producto"> 
                    </picture>
                </div>

                <div class="entrada__contenido">
                    <h4 class="no-margin ">Charmander</h4>
                    <p>
                        Con su cuerpo anaranjado, ojos expresivos y la icónica llama que arde constantemente en la punta de su cola, Charmander es uno de los Pokémon más queridos y reconocibles desde los inicios de la franquicia. Este Pokémon de tipo fuego no solo es adorable a la vista, sino que también representa determinación, coraje y el comienzo de una gran aventura para muchos entrenadores.
                    </p>
                    <a href="Charmander.php" class="boton boton--primario">Mas Información</a>
                </div>
            </article>

            <article class="entrada">
                <div class="entrada__imagen">
                    <picture>
                        <source loading="lazy"  srcset="img/blog2.webp" type="image/webp">
                        <img loading="lazy" src="img/blog2.jpg" alt="imagen blog "class="producto"> 
                    </picture>
                </div>

                <div class="entrada__contenido">
                    <h4 class="no-margin">Flexible Deer Chef</h4>
                    <p>
¡Un ciervo chef único! Con cuerpo flexible, puedes ponerlo en cualquier postura mientras prepara deliciosos platos. </p>
                    <a href="Deer.php" class="boton boton--primario">Mas Informacion</a>
                </div>
            </article>

            <article class="entrada">
                <div class="entrada__imagen">
                    <picture>
                        <source loading="lazy"  srcset="img/blog3.webp" type="image/webp">
                        <img loading="lazy" src="img/blog3.jpg" alt="imagen blog" class="producto"> 
                    </picture>
                </div>

                <div class="entrada__contenido">
                    <h4 class="no-margin">Raccoon Flexi</h4>
                    <p>
        Un mapache juguetón y totalmente articulable, ¡perfecto para crear poses y divertidas aventuras!
                    </p>
                    <a href="Racoon.php" class="boton boton--primario">Mas Informacion</a>
                </div>
            </article>
        </main>
        <aside class="sidebar">
            <h3>Nuestros Cursos y Talleres</h3>

            <ul class="cursos no-padding">
                <li class="widget-curso">
                    <h4 class="no-margin">Impresion 3D</h4>
                    <p class="widget-curso__label">Precio: 
                        <span class="widget-curso__info">Gratis</span>
                    </p>
                    <p class="widget-curso__label">Cupo: 
                        <span class="widget-curso__info">20</span>
                    </p>
                    <a href="curso1.php" class="boton boton--secundario">Más Información sobre nuestros cursos</a>
                </li>

                <li class="widget-curso">
                    <h4 class="no-margin">Pintado de figuras impresas</h4>
                    <p class="widget-curso__label">Precio: 
                        <span class="widget-curso__info">Gratis</span>
                    </p>
                    <p class="widget-curso__label">Cupo: 
                        <span class="widget-curso__info">20</span>
                    </p>
                    <a href="curso2.php" class="boton boton--secundario">Más Información sobre nuestros cursos</a>
                </li>
            </ul>
        </aside>
    </div>


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