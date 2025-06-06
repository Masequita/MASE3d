<?php
include("config/config.php");
include("acciones/lista_de_empleados.php");
?>
<div class="container">
    <table class="table table-bordered table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellidos</th>
                <th class="text-center">RFC</th>
                <th class="text-center">Sexo</th>
                <th class="text-center">Teléfono</th>
                <th class="text-center">Correo</th>
                <th class="text-center">Cargo</th>
                <th class="text-center">Imagen</th>
                <th class="text-center" colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $n=1;
            $empleados = obtenerEmpleados($conexion);
            foreach($empleados as $empleado) { ?>
            <tr id="empleado-<?php echo $empleado['id']; ?>">
               <td class="text-center"><?=$n++ ;?></td>
               <td class="text-center"><?php echo $empleado['nombre']; ?></td>
               <td class="text-center"><?php echo $empleado['apellidos']; ?></td>
               <td class="text-center"><?php echo $empleado['rfc']; ?></td>
               <td class="text-center"><?php echo $empleado['sexo']; ?></td>
               <td class="text-center"><?php echo $empleado['telefono']; ?></td>
               <td class="text-center"><?php echo $empleado['email']; ?></td>
               <td class="text-center"><?php echo $empleado['cargo']; ?></td>
                <?php
                $imagen = "assets/img/fotos_empleados/".$empleado['imagen'];
                if($empleado['imagen'] == null) {
                    $imagen = "assets/img/empleados/logo.jpg";
                }
                ?>
               <td class="text-center"><img src="<?php echo $imagen; ?>" class="imagen_empleados_en_tabla" alt="Imagen Empleado"/></td>
                <td>
                     <a href="acciones/editar.php?id=<?php echo $empleado['id']; ?>" class="btn btn-warning">Editar</a>
                </td>
                <td class="text-center">
                     <button class="btn btn-danger" onclick="confirmarEliminacion(<?php echo $empleado['id']; ?>)">Eliminar</button>
                </td>
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
                    document.getElementById('empleado-' + id).remove();
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



