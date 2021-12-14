<?php
	if(!isset($_POST["total"])) exit;

	session_start();

	$total = $_POST["total"];
	include_once "../conexion.php";

	date_default_timezone_set('America/Bogota');
	$ahora = date("Y-m-d H:i:s");
	$sentencia = $con->prepare("INSERT INTO ventas(fecha, total) VALUES (?, ?);");
	$sentencia->execute([$ahora, $total]);

	$sentencia = $con->prepare("SELECT id FROM ventas ORDER BY id DESC LIMIT 1;");
	$sentencia->execute();
	$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

	$idVenta = $resultado === false ? 1 : $resultado->id;

	$con->beginTransaction();
	$sentencia = $con->prepare("INSERT INTO productos_vendidos(id_producto, id_venta, cantidad) VALUES (?, ?, ?);");
	$sentenciaExistencia = $con->prepare("UPDATE productos SET existencia = existencia - ? WHERE id = ?;");
	foreach ($_SESSION["carrito"] as $producto) {
		$total += $producto->total;
		$sentencia->execute([$producto->id, $idVenta, $producto->cantidad]);
		$sentenciaExistencia->execute([$producto->cantidad, $producto->id]);
	}
	$con->commit();
	unset($_SESSION["carrito"]);
	$_SESSION["carrito"] = [];
	header("Location: ./vender.php?status=1");
?>