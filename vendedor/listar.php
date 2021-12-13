
<?php
	include_once "../conexion.php";
	$sentencia = $con->query("SELECT * FROM productos;");
	$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<?php
	include_once './header.php' ;
	include_once './navBar.php';
?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>Productos</h1>
				
				<br>
				<table class="table table-bordered">
					<thead>
						<tr>
							
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
<?php include_once "./footer.php" ?>