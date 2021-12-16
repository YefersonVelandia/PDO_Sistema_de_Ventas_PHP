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

    $v = "select v.fecha, v.total ,pr.cantidad, p.descripcion, p.precioventa from  
    productos_vendidos2 pr inner join productos2 p 
    on pr.id_producto = p.codigo
    inner join ventas v on pr.id_venta = v.id
     where id_venta=$row[0]";
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

    

    
    // Creación del objeto de la clase heredada
    $pdf = new PDF('P','mm',array(100,90));
    $pdf->AliasNbPages();
    $pdf->AddPage( array(10, 100));
    $pdf->SetFont('Times','',10);

    $pdf->Cell(40,5,'Fecha', 1, 0, 'c', 0);
    $pdf->Cell(35,5, $data['fecha'      ] , 1, 1, 'c', 0);
    $pdf->Cell(40,5,'Total:', 1, 0, 'c', 0);
	$pdf->Cell(35,5, $data['total'      ] , 1, 1, 'c', 0);

  
    
    $pdf->Cell(40,5, 'Producto'      , 1, 0, 'c', 0);
    $pdf->Cell(35,5, 'Cantidad'       , 1, 1, 'c', 0);
    $pdf->Cell(40,5, $data['descripcion'] , 1, 0, 'c', 0);
    $pdf->Cell(35, 5, $data['cantidad'   ] , 1, 1, 'c', 0);
    while($data = $v2->fetch_assoc()){
        $pdf->Cell(40,5, $data['descripcion'] , 1, 0, 'c', 0);
        $pdf->Cell(35, 5, $data['cantidad'   ] , 1, 1, 'c', 0);
    }

    
        
        // echo $data[0]."<br>";
        // echo $data[1]."<br>";
        // echo $data[2]."<br>";
        // echo $data[3]."<br>";
      
    

 
  $pdf->Output();