<?php 
$host = "localhost";
$usuario ="root";
$password = "";
$basededatos = "cafeteria";
$conexion = new mysqli($host, $usuario, $password, $basededatos);
if($conexion->connect_error) {
    die("Error de conexion: " . $conexion->connect_error);
}
?>