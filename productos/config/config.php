<?php 
$host = "localhost";
$usuario ="root";
$password = "";
$basededatos = "mase3d";
$conexion = new mysqli($host, $usuario, $password, $basededatos);
if($conexion->connect_error) {
    die("Error de conexion: " . $conexion->connect_error);
}
?>