<?php

    require_once '../libreria/fpdf.php';
    

    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {
            // Arial bold 15
            $this->SetFont('times','',10);
            // Movernos a la derecha
            $this->Cell(80);
            // Título
            $this->Cell(30,10,'Recibo',0,0,'l');
            // Salto de línea
            $this->Ln(20);

            
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

    $sql = "select max(id_venta) from productos_vendidos";

    try {
        $con = new mysqli("localhost","root","condor68","ventas");
        // echo "Conexion exitosa";
    } catch (Exception $e) {
        echo "Error".$e;
    }

    $consulta = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($consulta);

    $v = "select v.fecha, v.total ,pr.cantidad, p.descripcion, p.precioventa from  
    productos_vendidos pr inner join productos p 
    on pr.id_producto = p.codigo
    inner join ventas v on pr.id_venta = v.id
     where id_venta=$row[0]";
    $v2 =  mysqli_query($con, $v);

     // Creación del objeto de la clase heredada
  $pdf = new PDF('P','mm',array(100,90));
  $pdf->AliasNbPages();
  $pdf->AddPage( array(10, 100));
  $pdf->SetFont('Times','',12);

    $data = $v2->fetch_assoc();
    $pdf->Cell(40,4, $data['fecha'      ] , 0, 0, 'c', 0);
	$pdf->Cell(40,4, $data['total'      ] , 0, 1, 'c', 0);
    
    $pdf->Cell(40,4, $data['descripcion'] , 0, 0, 'c', 0);
    $pdf->Cell(5, 4, $data['cantidad'   ] , 0, 1, 'c', 0);
    while($data = $v2->fetch_assoc()){
        $pdf->Cell(40,4, $data['descripcion'] , 0, 0, 'c', 0);
        $pdf->Cell(5, 4, $data['cantidad'   ] , 0, 1, 'c', 0);
    }
        
        // echo $data[0]."<br>";
        // echo $data[1]."<br>";
        // echo $data[2]."<br>";
        // echo $data[3]."<br>";
      
    

 
  $pdf->Output();

