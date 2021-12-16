<?php

    require_once '../libreria/fpdf.php';
    $sql = "select max(id_venta) from productos_vendidos2";

    try {
        $con = new mysqli("localhost","root","condor68","ventas");
        // echo "Conexion exitosa";
    } catch (Exception $e) {
        echo "Error".$e;
    }

    $consulta = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($consulta);

    $v = "select v.fecha, v.total, pr.descripcion ,pr.precioVenta, p.cantidad from ventas v inner join productos_vendidos2 p on v.id = p.id_venta
    inner join productos2 pr on pr.id = p.id_producto where v.id=$row[0]";
    $v2 =  mysqli_query($con, $v);
    $data = $v2->fetch_assoc();
    

    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {
            // Arial bold 15
            $this->SetFont('times','',10);
            // Movernos a la derecha
            $this->Cell(30);
            // Título
            $this->Cell(30,10,'Pi interactiva',0,0,'l');
            // Salto de línea
            $this->Ln(9);

            // $this->Cell(40,6, 'producto' , 1, 0, 'C', 0);
            // $this->Cell(35,6, 'cantidad', 1, 1, 'C', 0);

            
        }

        
    }

    

    
    // Creación del objeto de la clase heredada
    $pdf = new PDF('P','mm',array(100,90));
    $pdf->AliasNbPages();
    $pdf->AddPage( array(10, 100));
    $pdf->SetFont('Times','',10);

    $pdf->Cell(45,5,'Fecha', 1, 0, 'c', 0);
    $pdf->Cell(35,5, $data['fecha'      ] , 1, 1, 'c', 0);
    

  
    
    $pdf->Cell(30,5, 'Producto'       , 1, 0, 'c', 0);
    $pdf->Cell(15,5, 'Cantidad'       , 1, 0, 'c', 0);
    $pdf->Cell(35,5, 'Valor unitario' , 1, 1, 'c', 0);
    $pdf->Cell(30,5, $data['descripcion'] , 1, 0, 'c', 0);
    $pdf->Cell(15, 5, $data['cantidad'   ] , 1, 0, 'c', 0);
    $pdf->Cell(35, 5, $data['precioVenta'   ] , 1, 1, 'c', 0);
    while($data2 = $v2->fetch_assoc()){
        $pdf->Cell(30,5, $data2['descripcion'] , 1, 0, 'c', 0);
        $pdf->Cell(15, 5, $data2['cantidad'   ] , 1, 0, 'c', 0);
        $pdf->Cell(35, 5, $data2['precioVenta'   ] , 1, 1, 'c', 0);
    }

    $pdf->Cell(45,5,'Total:', 1, 0, 'c', 0);
	$pdf->Cell(35,5, $data['total'      ] , 1, 1, 'c', 0);

    
        
        // echo $data[0]."<br>";
        // echo $data[1]."<br>";
        // echo $data[2]."<br>";
        // echo $data[3]."<br>";
      
    

 
  $pdf->Output();