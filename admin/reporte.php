

<?php
    require('../libreria/fpdf.php');

    $sql = "SELECT ventas.total, ventas.fecha, ventas.id, GROUP_CONCAT(	productos2.codigo, '..',  productos2.descripcion, '..', productos_vendidos2.cantidad SEPARATOR '__') AS productos2 FROM ventas INNER JOIN productos_vendidos2 ON productos_vendidos2.id_venta = ventas.id INNER JOIN productos2 ON productos2.id = productos_vendidos2.id_producto GROUP BY ventas.id ORDER BY ventas.fecha DESC";

    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {
            // Arial bold 15
            $this->SetFont('Arial','B',12);
            // Movernos a la derecha
            $this->Cell(80);
            // Título
            $this->Cell(30,10,'Reporte de ventas',0,0,'C');
            // Salto de línea
            $this->Ln(20);

            $this->Cell(10,10, 'ID', 1, 0, 'C', 0);
            $this->Cell(40,10, 'Fecha' , 1, 0, 'C', 0);
            $this->Cell(30,10, 'Total', 1, 0, 'C', 0);
            $this->Cell(110,10, 'Productos', 1, 1, 'C', 0);
        }

        // Pie de página
        function Footer()
        {
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Número de página
            $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    try {
		$con = new mysqli("localhost","root","condor68","ventas");
		// echo "Conexion exitosa";
	} catch (Exception $e) {
		echo "Error".$e;
	}

    $resultado = mysqli_query($con, $sql);

    // Creación del objeto de la clase heredada
    $pdf = new PDF('P','mm','A4');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);
        while($row = $resultado->fetch_assoc()){

            $pdf->Cell(10,10, $row['id'], 1, 0, 'c', 0);
            $pdf->Cell(40,10, $row['fecha'], 1, 0, 'C', 0);
            $pdf->Cell(30,10, $row['total'], 1, 0, 'C', 0);
            $pdf->Cell(110,10, $row['productos2'], 1, 1, 'l', 0);
        }
    $pdf->Output();

?>