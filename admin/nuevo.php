<?php
#Salir si alguno de los datos no está presente
// if(!isset($_POST["codigo"]) || !isset($_POST["descripcion"]) || !isset($_POST["precioVenta"])  || !isset($_POST["existencia"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "../conexion.php";
$codigo 		= $_POST["codigo"];
$descripcion    = $_POST["descripcion"];
// $precioVenta    = $_POST["precioVenta"];
$precioVenta    = 0 ;
$precioCompra   = $_POST["precioCompra"];
$existencia     = $_POST["existencia"];
$iva            = $_POST['txt_con_iva'];
$ubicacion      = $_POST['ubicacion'];


$miiva  = intval($iva);
$compra = intval($precioCompra);

$cal = (($compra*$miiva)/100);

$precioVenta = $compra + $cal;

$sentencia = $con->prepare("INSERT INTO productos2(codigo, descripcion, iva, precioVenta, precioCompra, existencia, ubicacion) VALUES (?, ?, ?, ?, ?, ?, ?)");
$resultado = $sentencia->execute([$codigo, $descripcion, $iva,$precioVenta, $precioCompra, $existencia, $ubicacion]);

if($resultado === TRUE){
	header("Location: ./inventario.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>