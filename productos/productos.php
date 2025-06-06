<?php
include("config/config.php");
include("acciones/lista_de_productos.php");
?>
<div class="container">
    <table class="table table-bordered table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Descripcion corta</th>
                <th class="text-center">Descripcion larga</th>
                <th class="text-center">Precio</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Imagen</th>
                <th class="text-center" colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $n=1;
            $productos = obtenerProductos($conexion);
            foreach($productos as $producto) { ?>
            <tr id="producto-<?php echo $producto['id']; ?>">
               <td class="text-center"><?=$n++ ;?></td>
               <td class="text-center"><?php echo $producto['nombre']; ?></td>
               <td class="text-center"><?php echo $producto['descripcion_corta']; ?></td>
               <td class="text-center"><?php echo $producto['descripcion_larga']; ?></td>
               <td class="text-center"><?php echo $producto['precio']; ?>$</td>
               <td class="text-center"><?php echo $producto['cantidad']; ?></td>
               <?php
                $imagen = "assets/img/productos/".$producto['imagen'];
                if($producto['imagen'] == null) {
                    $imagen = "assets/img/productos/no-image.jpeg";
                }
                ?>
               <td class="text-center"><img src="<?php echo $imagen; ?>" class="imagen_empleados_en_tabla" alt="Imagen Empleado"/></td>
                <td class="text-center ">
                    <a href="acciones/editar.php?id=<?php echo $producto['id']; ?>" class="btn btn-warning btn-lg">Editar</a>
                     <button class="btn btn-danger btn-lg" onclick="confirmarEliminacion(<?php echo $producto['id']; ?>)">Eliminar</button>                </td>
            </tr>
           <?php } ?>
        </tbody>
    </table>
    
</div>

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



