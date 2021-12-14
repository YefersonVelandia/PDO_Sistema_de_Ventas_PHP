<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["codigo"]) || !isset($_POST["descripcion"]) || !isset($_POST["precioVenta"]) || !isset($_POST["precioCompra"]) || !isset($_POST["existencia"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "../conexion.php";
$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$precioVenta = $_POST["precioVenta"];
$precioCompra = $_POST["precioCompra"];
$existencia = $_POST["existencia"];

$sentencia = $con->prepare("INSERT INTO productos(codigo, descripcion, precioVenta, precioCompra, existencia) VALUES (?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$codigo, $descripcion, $precioVenta, $precioCompra, $existencia]);

if($resultado === TRUE){
	header("Location: ./inventario.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>