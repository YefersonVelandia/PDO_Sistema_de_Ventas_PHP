<?php
    include '../conexion.php';
    include './navBar.php';
    $sentencia = $con->query("SELECT * FROM productos;");
	$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<?php 
    include_once './header.php';
    include_once '../restringir.php';

    if(!isset($_SESSION['id_fk'])){
		header('location: ./index.php');
	}else {
		
		if($_SESSION['id_fk'] != 2){
			header('location: ../admin/index.php');
		}
	} 
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Productos</h1>
            
            <br>
            <table class="table table-responsive table-hover border-dark table-bordered ">
                <thead>
                    <tr class="table table-dark">
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Precio de venta</th>
                        <th>Existencia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($productos as $producto){ ?>
                    <tr>
                        <td><?php echo $producto->codigo ?></td>
                        <td><?php echo $producto->descripcion ?></td>
                        <td><?php echo $producto->precioVenta ?></td>
                        <td><?php echo $producto->existencia ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<?php include_once './footer.php' ?>
</body>
</html>