<?php
include("config/config.php");
include("productos/acciones/lista_de_productos.php");
?>

            <?php 
            $n=1;
            $productos = obtenerProductos($conexion);
            foreach($productos as $producto) { ?>
            <article class="entrada">
                <div class="entrada__imagen">
                    <a href="producto.php?id=<?php echo $producto['id']; ?>">
                        <img loading="lazy" src="productos/assets/img/productos/<?php echo $producto['imagen']; ?>" alt="imagen blog "class="producto"> 
                </a>
                </div>

                <div class="entrada__contenido">
                    <div class="c-cardT">
                        <div>
                        <h4 class="centrar-texto"><?php echo $producto['nombre']; ?></h4>
                        </div>
                        <div>
                        <h4 class="centrar-texto"><?php echo $producto['precio']; ?>$</h4>
                        </div>
                        </div>
                                                <p>
                        <?php echo $producto['descripcion_corta']; ?>
                        </p>
                        <a href="producto.php?id=<?php echo $producto['id']; ?>" class="boton boton--primario">Mas Información</a>
            </article>
                   <?php } ?>

  
<script src="assets/css/sweetalert2.min.css"></script>
<script>
function confirmarEliminacion(id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminarlo!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('acciones/eliminar.php?id=' + id)
            .then(response => response.text())
            .then(data => {
                // Assuming the response contains a success message
                Swal.fire({
                    title: '¡Eliminado!',
                    text: 'El registro ha sido eliminado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Remove the row from the table
                    document.getElementById('producto-' + id).remove();
                });
            })
            .catch(error => {
                Swal.fire({
                    title: 'Error',
                    text: 'Ocurrió un error al eliminar el registro.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        }
    });
}
</script>



