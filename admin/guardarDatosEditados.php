<?php



#Si todo va bien, se ejecuta esta parte del código...

include_once "../conexion.php";
$id = $_POST["id"];
$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$precioCompra = $_POST["precioCompra"];
$precioVenta = 0 ;
$existencia = $_POST["existencia"];
$iva = $_POST["txt_con_iva"];
$ubicacion = $_POST["ubicacion"];


$miiva  = intval($iva);
$compra = intval($precioCompra);

$cal = (($compra*$miiva)/100);
$precioVenta = $precioCompra + $cal;

$sentencia = $con->prepare("UPDATE productos2 SET codigo = ?, descripcion = ?, iva = ?,precioCompra = ?, precioVenta = ?, existencia = ?, ubicacion = ? WHERE id = ?;");
$resultado = $sentencia->execute([$codigo, $descripcion, $iva, $precioCompra, $precioVenta, $existencia, $ubicacion,  $id]);

if($resultado === TRUE){
	header("Location: ./inventario.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>