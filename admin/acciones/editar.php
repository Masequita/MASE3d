<?php
include('../config/config.php');
$id=intval($_GET['id']);

//Obtener de la base de datos el empleado
// a traves del id
$stmt=$conexion->prepare("SELECT * FROM empleados WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();

$result = $stmt->get_result();
$empleado = $result->fetch_assoc();

if(!$empleado) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Empleado no encontrado']);
    exit;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Empleado</title> 
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
        <link rel="stylesheet" href="../assets/css/estilos.css" />
    </head>
</html>


<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Empleado</h1>
    <form id="formularioempleado" method="post" action="actualizar_empleado.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $empleado['id']; ?>">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $empleado['nombre']; ?>" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $empleado['apellidos']; ?>" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="rfc">RFC</label>
                    <input type="text" class="form-control" id="rfc" name="rfc" value="<?php echo $empleado['rfc']; ?>" required>
                </div>
            </div>
        </div>  
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="sexo">Sexo</label>
                <select class="form-control" id="sexo" name="sexo" required>
                    <option value="M" <?php echo ($empleado['sexo'] == 'M') ? 'selected': '';?>>Masculino</option>
                    <option value="F" <?php echo ($empleado['sexo'] == 'F') ? 'selected' :'';?>>Femenino</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $empleado['telefono']; ?> "required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="email">Correo</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $empleado['email']; ?>" required>
            </div>
        </div>
    </div>    
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cargo">Cargo</label>
                <input type="text" class="form-control" name="cargo" value="<?php echo $empleado['cargo']; ?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" onchange="previewimage(event)">
                <small class="form-text text-muted">Deja en blanco si no deseas cambiar la imagen.</small>
            </div>
            <div class="form-group">
                <img id="imagen-preview" src="#" alt="Vista previa de la imagen" style="display: none; max-width: 100%; height: auto; margin-top:10px;">
            </div>
        </div>
        <script>
            function previewimage(event) {
                var reader = new FileReader();
                reader.onload = function(){
                    var output = document.getElementById('imagen-preview');
                    output.src = reader.result;
                    output.style.display = 'block';
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>
    </div>
    <hr>
    <div class="text-center">
        <a href="../index.php" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </div>
    </form>
</div>

<script>
    document.getElementById('formularioempleado').addEventListener('submit', function(event){
        event.preventDefault(); // Prevenir el envío del formulario por defecto
        var formData = new FormData(this);
        
        fetch(this.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                Swal.fire({
                    title: '!Actualizado!',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                 }).then(() => {
                    window.location.href = 
                    '../index.php'; //Redirigir a la lista de empleados
                 });
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: data.message,
                        icon:'error',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    title:'Error',
                    text:'Ocurrió un error al actualizar el empleado.',
                    icon:'error',
                    confirmButtonText: 'OK'
                });
            });
    });
    $id = intval($_GET['id']);
</script>
</body>
<script src="../assets/js/sweetalert2.min.js"></script>

</html>