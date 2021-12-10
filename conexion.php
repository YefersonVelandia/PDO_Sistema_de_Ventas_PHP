<?php
	$contraseña = "condor68";
	$usuario = "root";
	$nombre_base_de_datos = "ventas";
	try{
		$con = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
		$con->query("set names utf8;");
		$con->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	}catch(Exception $e){
		echo "Ocurrió algo con la base de datos: " . $e->getMessage();
	}
?>