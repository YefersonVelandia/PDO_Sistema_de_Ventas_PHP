<?php

    try {
        $con = new mysqli("localhost","root","condor68","ventas");
        // echo "Conexion exitosa";
    } catch (Exception $e) {
        echo "Error".$e;
    }


    $mostrar       = $_FILES['dataCliente'];
    //$mostrar =file_get_contents($dataCliente['tmp_name']);

    $v = $_FILES['dataCliente']['tmp_name'];


    //print_r($mostrar);

    //echo "<br>";
    $p = file_get_contents($v);
    //print_r("tmp_name: ".$v);
    //echo "<br>";

    //print_r($p);

    $prueba = file($v);
    //$arreglo = explode(";" , $prueba);

    

    for ($i=1; $i < 5; $i++) { 
        //print_r( $prueba[$i]."<br>");
        //$separado_por_comas = implode(",", $prueba);

        //echo $separado_por_comas;
    }

    foreach($prueba as $pru){
        $datos = explode(";",$pru);

        $codigo      = !empty($datos[0])  ? ($datos[0]) : '';
        $descripcion = !empty($datos[1])  ? ($datos[1]) : '';
        $venta       = !empty($datos[2])  ? ($datos[2]) : '';
        $compra      = !empty($datos[3])  ? ($datos[3]) : '';
        $existencia  = !empty($datos[4])  ? ($datos[4]) : '';

        
            $duplicidad = ("SELECT codigo FROM productos WHERE codigo='$codigo' ");
            $ca_dupli = mysqli_query($con, $duplicidad);
            $cant_duplicidad = mysqli_num_rows($ca_dupli);
            print_r($cant_duplicidad);

          
        
        //No existe Registros Duplicados
        if ( $cant_duplicidad == 0 ){
            $insertar = "INSERT INTO productos VALUES(null, '$codigo', '$descripcion',
            '$venta', '$compra', $existencia) ";
                echo "inset";

              mysqli_query($con, $insertar);
        }else{

                echo "UPDATE";
    
            //actualizo el o los Registros ya existentes
            $updateData =  ("UPDATE productos SET 
            descripcion='" .$descripcion. "',
            precioventa='" .$venta. "',
            preciocompra='" .$compra. "',
            existencia='".$existencia."'
            WHERE codigo='".$codigo."'");
            $result_update = mysqli_query($con, $updateData);
        }
    }


    //$tipo       = $_FILES['dataCliente']['type'];
    //$tamanio    = $_FILES['dataCliente']['size'];
    //$archivotmp = $_FILES['dataCliente']['tmp_name'];
    //$lineas     = file($archivotmp);
    foreach ($prueba as $linea) {
        $cantidad_registros = count($prueba);
        $cantidad_regist_agregados =  ($cantidad_registros - 1);
    }
    echo '<p style="text-aling:center; color:#333;">Total de Registros: '. $cantidad_regist_agregados .'</p>';

    //header("Location: ./inventario.php");
    ?>
    
    <a href="index.php">Atras</a>