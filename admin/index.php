<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <!-- SweetAlert CSS -->
  <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
  <link rel="stylesheet" href="assets/css/estilos.css" />
    <title>Sistema de Control de Empleados</title>
  </head>
  <body>
  <div class="col-md-12">
        <!--
          primary = azul, accion
          secondary = gris, cualquier cosa
          warning = amarillo, editar o modificar
          danger = rojo, eliminar
          success= verde, agregar
        -->
        <a type="button" class="btn btn-primary" href="../index.php">
          <i class="fa fa-refresh"></i>
          Regresar al menu
        </a>
    </div>
    <div class="container">
    <h1 class="text-center">Sistema de Control de Empleados</h1>
    <div class="row">
      <div class="col-md-12">
        <!--
          primary = azul, accion
          secondary = gris, cualquier cosa
          warning = amarillo, editar o modificar
          danger = rojo, eliminar
          success= verde, agregar
        -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#empleadoModal">
          Agregar Empleado
        </button>
      </div>
    </div>
    
<!-- Modal agregar empleado  -->
<div class="modal fade" id="empleadoModal" tabindex="-1" role="dialog" aria-labelledby="empleadoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="empleadoModalLabel">Agregar Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label-="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <div class="row">
      <div class="col-md-12">
        <!--
          primary = azul, accion
          secondary = gris, cualquier cosa
          warning = amarillo, editar o modificar
          danger = rojo, eliminar
          success= verde, agregar
        -->
        <a type="button" class="btn btn-primary" href="index.php">
          <i class="fa fa-refresh"></i>
          Regresar al menu
        </a>
      </div>
    </div>

      </div>
      <div class="modal-body">
        <form id="FormAgregarEmpleado" enctype="multipart/form-data">
          <div class="form-group">
            <Label for="nombre">Nombre</Label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
          <div class="form-group">
          <Label for="lastName">Apellidos</Label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
          </div>
          <div class="form-group">
            <label for="rfc">RFC</label>
            <input type="text" class="form-control" id="rfc" name="rfc" required>
          </div>
          <div class="form-group">
          <label for="gender">Sexo</label>
          <select class="form-control" id="gender" name="sexo" required>
            <option value="">Seleccione</option>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
          </select>
          </div>
          <div class="form-group">
          <label for="phone">Telefono</label>
          <input type="tel" class="form-control" id="telefono" name="telefono" required>
          </div>
          <div class="form-group">
          <label for="email">Correo</label>
          <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
          <label for="position">Cargo</label>
          <input type="text" class="form-control" id="cargo" name="cargo" required>
          </div>
          <div class="form-group">
          <label for="image">Imagen</label>
          <input type="file" class="form-control" id="imagen" name="imagen" required>
          </div>
          <button type="submit" class="btn btn-success">Agregar</button>
        </form>
      </div>
    </div>
  </div>
</div>
      <div class="row">
          <div class="col-md-12">
            <h2 class="text-center">Lista de Empleados</h2>
          </div>
          </div>
          <br>
          <hr>
          <?php 
            include ("empleados.php");
          ?>
          
          <script>
              document.addEventListener("DOMContentLoaded", function () {
              document.getElementById("FormAgregarEmpleado").addEventListener('submit',function (event){
                event.preventDefault(); // Prevent the default form submission
                
                //Gather form data
                const formData = new FormData(this);

                // Send data to the server using AJAX
                fetch('acciones/agregar_empleados.php',{
                  method: 'POST',
                  body: formData
                })
                .then(response => response.json())
                .then(data =>{
                if(data.success){
                  Swal.fire({
                  icon: 'success',
                  title: "¡Éxito!",
                  text: 'Empleado agregado correctamente.'
                }).then(() => {
                  // Cerrar el modal después de confirmar
                  $('#empleadoModal').modal('hide');
                  // Recargar la página
                  location.reload();
                });
              }else{
                Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrió un error al agregar el empleado.'
             });
            }
          })
          .catch(error =>{
          console.error('Error:', error);
          Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Ocurrió un error al agregar el empleado:'
        });
      });
    });
  });
          </script>
        </div>
        </body>
        <script src="assets/js/sweetalert2.min.js"></script>
        <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

</html>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
