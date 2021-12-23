<?php

    if( isset($_POST['btnPmp']) ){

        include_once '../conexion.php';

        $valorAnterior    = $_POST['txt_valor_anterior'     ];
        $cantidadAnterior = $_POST['txt_existencia_anterior'];
        $nuevoValor       = $_POST['txt_valor_nuevo'];
        $nuevaCantidad    = $_POST['txt_nueva_existencia'];
        $iva              = $_POST['txt_iva'];
        $id               = $_POST['txt_id'];
    
        $op1 = ( intval($valorAnterior) * intval($cantidadAnterior) );
        $op2 = ( intval($nuevoValor) * intval($nuevaCantidad) );
    
        $op3 = ( $op1 + $op2);
        $op4 = (intval($cantidadAnterior) + intval( $nuevaCantidad) );

        $pmp = ($op3 / $op4);
        
        $nuevoIva = ((intval($iva)*$pmp)/100);

        $NuevoPrecio = $pmp+$nuevoIva;
        $sentencia = $con->prepare("update productos2 set precioVenta = ?, precioCompra = ?,existencia = ? where id = ?");
		$resultado = $sentencia->execute([$NuevoPrecio, $pmp, $op4, $id]);   
        
        if($resultado){
            $pmpExisto = "<script type='text/javascript'>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Datos actualizados correctamente',
                                        showConfirmButton: true,
                                        timer: 2500,
                                        timerProgressBar: true
                                    });
                                </script>";
            include './inventario.php';
        }else{
            echo "Los datos no se registraron";
        }
        
    } 


?>