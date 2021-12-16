<?php

    include_once './header.php';
    include_once './adminNavbar.php';
    try {
        $con = new mysqli("localhost","root","condor68","ventas");
        // echo "Conexion exitosa";
    } catch (Exception $e) {
        echo "Error".$e;
    }

    $mostrar       = $_FILES['dataCliente'];
    $v = $_FILES['dataCliente']['tmp_name'];
    $p = file_get_contents($v);
    $prueba = file($v);
   
    foreach($prueba as $pru){
        $datos = explode(";",$pru);

        $codigo      = !empty($datos[0])  ? ($datos[0]) : '';
        $descripcion = !empty($datos[1])  ? ($datos[1]) : '';
        $iva         = !empty($datos[2])  ? ($datos[2]) : '';
        // $venta       = !empty($datos[3])  ? ($datos[3]) : '';
        $venta       = 0 ;
        $compra      = !empty($datos[4])  ? ($datos[4]) : '';
        $existencia  = !empty($datos[5])  ? ($datos[5]) : '';
        $ubicacion   = !empty($datos[6])  ? ($datos[6]) : '';
        
        $miiva  = intval($iva);
        $compra = intval($compra);

        $cal = (($compra*$miiva)/100);
        $precioVenta = $compra + $cal;
        
        $duplicidad = ("SELECT codigo FROM productos WHERE codigo='$codigo' ");
        $ca_dupli = mysqli_query($con, $duplicidad);
        $cant_duplicidad = mysqli_num_rows($ca_dupli);
       
        //No existe Registros Duplicados
        if ( $cant_duplicidad == 0 ){
            $insertar = "INSERT INTO productos2 VALUES(null, '$codigo', '$descripcion',
            '$iva','$precioVenta', '$compra', '$existencia', '$ubicacion') ";

            mysqli_query($con, $insertar);
        }else{
            //actualizo el o los Registros ya existentes
            $updateData =  ("UPDATE productos2 SET 
            descripcion='" .$descripcion. "',
            iva='" .$iva. "',
            precioventa='" .$precioVenta. "',
            preciocompra='" .$compra. "',
            existencia='".$existencia."',
            ubicacion='".$ubicacion."'
            WHERE codigo='".$codigo."'");
            $result_update = mysqli_query($con, $updateData);
        }
    }


    foreach ($prueba as $linea) {
        $cantidad_registros = count($prueba);
        $cantidad_regist_agregados =  ($cantidad_registros - 1);        
    }


    $msj = "Total de registros insertados: $cantidad_regist_agregados";
        include_once './footer.php';     
?>

<div class="mialert col-5 mx-auto  alert alert-success" role="alert">
   <?php if( isset($msj) )echo $msj; ?>
</div>  
    
