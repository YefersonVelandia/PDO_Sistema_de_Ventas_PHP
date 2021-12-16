<?php
if(!isset($_GET["id"])) exit();
		$id = $_GET["id"];

	include_once '../conexion.php';
	$sentencia = $con->prepare("DELETE FROM productos2 WHERE id = ?");
	$resultado = $sentencia->execute([$id]);

	if($resultado === TRUE){
		header("Location: ./inventario.php");
		exit;
	}
	else echo "Algo salió mal";
?>