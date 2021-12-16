<?php
	if(!isset($_POST["total"])) exit;

	session_start();

	$total = $_POST["total"];
	include_once "../conexion.php"; 
	// require('../libreria/fpdf.php');

	// class PDF extends FPDF
    // {
    //     // Cabecera de página
    //     function Header()
    //     {
    //         // Arial bold 15
    //         $this->SetFont('Arial','B',12);
    //         // Movernos a la derecha
    //         $this->Cell(80);
    //         // Título
    //         $this->Cell(30,10,'Reporte de ventas',0,0,'C');
    //         // Salto de línea
    //         $this->Ln(20);

    //         $this->Cell(10,10, 'Total', 1, 0, 'C', 0);
    //         $this->Cell(40,10, 'producto' , 1, 0, 'C', 0);
    //         $this->Cell(30,10, 'cantidad', 1, 0, 'C', 0);
    //         $this->Cell(110,10,'fecha', 1, 1, 'C', 0);
    //     }

    //     // Pie de página
    //     function Footer()
    //     {
    //         // Posición: a 1,5 cm del final
    //         $this->SetY(-15);
    //         // Arial italic 8
    //         $this->SetFont('Arial','I',8);
    //         // Número de página
    //         $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
    //     }
    // }

	date_default_timezone_set('America/Bogota');
	$ahora = date("Y-m-d H:i:s");
	$sentencia = $con->prepare("INSERT INTO ventas(fecha, total) VALUES (?, ?);");
	$sentencia->execute([$ahora, $total]);

	$sentencia = $con->prepare("SELECT id FROM ventas ORDER BY id DESC LIMIT 1;");
	$sentencia->execute();
	$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

	$idVenta = $resultado === false ? 1 : $resultado->id;

	$con->beginTransaction();
	$sentencia = $con->prepare("INSERT INTO productos_vendidos2(id_producto, id_venta, cantidad) VALUES (?, ?, ?);");
	$sentenciaExistencia = $con->prepare("UPDATE productos2 SET existencia = existencia - ? WHERE id = ?;");
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