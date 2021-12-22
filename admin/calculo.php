<?php

    $valorAnterior    = $_POST['txt_valor_anterior'     ];
    $cantidadAnterior = $_POST['txt_existencia_anterior'];
    $nuevoValor       = $_POST['txt_valor_nuevo'];
    $nuevaCantidad    = $_POST['txt_nueva_existencia'];


    // echo intval($valorAnterior) ."<br>";
    // echo intval($cantidadAnterior)."<br>";
    // echo intval($nuevoValor)."<br>";
    // echo intval( $nuevaCantidad)."<br>";

    $op1 = ( intval($valorAnterior) * intval($cantidadAnterior) );
    $op1 = ( intval($nuevoValor) * intval($nuevaCantidad) );

    echo gettype( $op1);

?>