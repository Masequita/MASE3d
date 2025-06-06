<!DOCTYPE html>
<html lang="es">
  <head>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Bootstrap primero -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Tus estilos después -->
<link href="../css/estilos.css" rel="stylesheet">

  </head>
  <body>
    <div class="c-salir-btn">
              <a type="button" class="btn btn-primary btn-lg c-salir-bnt" href="../index.php">
          <i class="fa fa-refresh"></i>
          Regresar al menu
        </a>
</div>
  <div class="col-md-12">
        <!--
          primary = azul, accion
          secondary = gris, cualquier cosa
          warning = amarillo, editar o modificar
          danger = rojo, eliminar
          success= verde, agregar
        -->
    </div>
    <div class="container">
    <h1 class="text-center">Sistema de Control de Productos</h1>
    <div class="row">
      <div class="col-md-12">
        <!--
          primary = azul, accion
          secondary = gris, cualquier cosa
          warning = amarillo, editar o modificar
          danger = rojo, eliminar
          success= verde, agregar
        -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#productoModal">
          Agregar Producto
        </button>
      </div>
    </div>
    
<!-- Modal agregar empleado  -->
<div class="modal fade" id="productoModal" tabindex="-1" role="dialog" aria-labelledby="productoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productoModalLabel">Agregar Producto</h5>

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
<form id="FormAgregarProducto" enctype="multipart/form-data">
          <div class="form-group">
            <Label for="nombre">Nombre</Label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
          <div class="form-group">
          <Label for="descripcion_corta">Descripcion Corta</Label>
            <input type="text" class="form-control" id="descripcion_corta" name="descripcion_corta" required>
          </div>
          <div class="form-group">
            <label for="descripcion_larga">Descripcion Larga</label>
            <input type="text" class="form-control" id="descripcion_larga" name="descripcion_larga" required>
          </div>
          <div class="form-group">
          <label for="precio">Precio</label>
          <input type="text" class="form-control" id="precio" name="precio" required>
          </div>
          <div class="form-group">
          <label for="cantidad">Cantidad</label>
          <input type="cantidad" class="form-control" id="cantidad" name="cantidad" required>
          </div>
          <div class="form-group">
          <label for="inputImagen">Imagen</label>
          <input type="file" class="form-control" id="inputImagen" name="imagen" required>
          </div>
          <button type="submit" class="btn btn-success">Agregar</button>
        </form>
      </div>
    </div>
  </div>
</div>
      <div class="row">
          <div class="col-md-12">
            <h2 class="text-center">Lista de Productos</h2>
          </div>
          </div>
          <br>
          <hr>
          <?php 
            include ("productos.php");
          ?>
          
          <script>
              document.addEventListener("DOMContentLoaded", function () {
              document.getElementById("FormAgregarProducto").addEventListener('submit',function (event){
                event.preventDefault(); // Prevent the default form submission
                
                //Gather form data
                const formData = new FormData(this);

                // Send data to the server using AJAX
                fetch('acciones/agregar_productos.php',{
                  method: 'POST',
                  body: formData
                })
                .then(response => response.json())
                .then(data =>{
                if(data.success){
                  Swal.fire({
                  icon: 'success',
                  title: "¡Éxito!",
                  text: 'Producto agregado correctamente.'
                }).then(() => {
                  // Cerrar el modal después de confirmar
                  $('#productoModal').modal('hide');
                  // Recargar la página
                  location.reload();
                });
              }else{
                Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrió un error al agregar el producto.'
             });
            }
          })
          .catch(error =>{
          console.error('Error:', error);
          Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Ocurrió un error al agregar el producto:'
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
