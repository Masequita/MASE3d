<?php
$id=intval($_GET['id']);//se asegura que el id sea un numero entero
include("../config/config.php");
//prepare a DELETE statement o  PREPARAR UNA DECLARACION DE ELIMINACION
$stmt=$conexion->prepare("DELETE FROM empleados WHERE id=?");
$stmt-> bind_param("i",$id);
$resultado=$stmt->execute();
$stmt->close();
if ($resultado){
     echo "<script>
        Swal.Fire({
        title:'¡Eliminado!',
        text:'el registro se ha eliminado correctamente.',
        icon:'success',
        confirmButtonText.'OK'
      {).then((result)=>{
         if(resultado.isConfirmed){
         window.location.href='../index.php';
         }  
});
   </script>";
}else{ 
    echo"<script>
         Swal.Fire({
         title:'Error',
         text:'Error al eliminar el registro:".$conexion->error."',
         icon:'error',
         confirmButtonText.'OK'
});
    </script>";
}
?>

