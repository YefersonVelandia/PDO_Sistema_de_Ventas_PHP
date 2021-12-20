<?php
	session_start();

	include 'conexion.php';
 
    $usuario = $_SESSION['nombre_usuario'];

    if(!isset($usuario)){
    	header("location: ../index.php");
    }
?>