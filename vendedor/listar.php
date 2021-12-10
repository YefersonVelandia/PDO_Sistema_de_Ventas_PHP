
<?php
	include_once "../conexion.php";
	$sentencia = $con->query("SELECT * FROM productos;");
	$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<?php include_once "./header.php" ?>

	<div class="container">
		<div class="row">
		<div class="col-xs-12">
		<h1>Productos</h1>
		<div>
			<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Código</th>
					<th>Descripción</th>
					<th>Precio de compra</th>
					<th>Precio de venta</th>
					<th>Existencia</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioCompra ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td><?php echo $producto->existencia ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $producto->id?>"><img src="../images/edit.png" alt=""> </a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $producto->id?>"><img src="../images/delete.png" alt=""> </a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
		</div>
	</div>
<?php include_once "./footer.php" ?>