<?php
	include_once "../conexion.php";
	$sentencia = $con->query("SELECT ventas.total, ventas.fecha, ventas.id, GROUP_CONCAT(	productos2.codigo, '..',  productos2.descripcion, '..', productos_vendidos2.cantidad SEPARATOR '__') AS productos FROM ventas INNER JOIN productos_vendidos2 ON productos_vendidos2.id_venta = ventas.id INNER JOIN productos2 ON productos2.id = productos_vendidos2.id_producto GROUP BY ventas.id ORDER BY ventas.fecha DESC;");

	$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<?php 
	include_once "./header.php";
	include_once './navBar.php';
?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>Ventas</h1>
			<div>
				<a class="btn btn-success" href="./vender.php">Nueva <i class="fa fa-plus"></i></a>
			</div>
			<br>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Número</th>
						<th>Fecha</th>
						<th>Productos vendidos</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($ventas as $venta){ ?>
					<tr>
						<td><?php echo $venta->id ?></td>
						<td><?php echo $venta->fecha ?></td>
						<td>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Código</th>
										<th>Descripción</th>
										<th>Cantidad</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach(explode("__", $venta->productos) as $productosConcatenados){ 
									$producto = explode("..", $productosConcatenados)
									?>
									<tr>
										<td><?php echo $producto[0] ?></td>
										<td><?php echo $producto[1] ?></td>
										<td><?php echo $producto[2] ?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</td>
						<td><?php echo $venta->total ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include_once "./footer.php" ?>