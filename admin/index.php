<?php
	include './adminNavbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once './header.php' ?>
<body >

<div class="container" > 
  <div class="col-7 mx-auto">
	<div class="cardAdmin card mb-3" style="max-width: 500px;">
		<div class="row g-0">
			<div class="col-md-4">
			<!-- <img src="" class="img-fluid rounded-start" alt="..."> -->
			</div>
			<div class="col-md-8">
			<div class="card-body">
				<h5 class="card-title">consultar inventario</h5>
				<p class="card-text">Listado de produtos que se encuntran registrados</p>
				<a href="/admin/inventario.php" class="btn btn-success">Mostrar</a>
			</div>
			</div>
		</div>
	</div>
 </div>	
</div>	

<div class="container "> 
  <div class="col-7 mx-auto">
	<div class="cardAdmin card mb-3" style="max-width: 500px;">
		<div class="row g-0">
			<div class="col-md-4">
				<!-- <img src="" class="img-fluid rounded-start" alt="..."> -->
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<h5 class="card-title">Ingresar Producto</h5>
					<p class="card-text">Registrar un producto</p>
					<a href="/acciones/ingresarProducto.php" class="btn btn-success">Registrar</a>
				</div>
			</div>
			</div>
	</div>
  </div>
</div>	

<div class="container "> 
	<div class=" col-7 mx-auto">

		<div class="cardAdmin card mb-3" style="max-width: 500px;">
			<div class="row g-0">
				<div class="col-md-4">
				<!-- <img src="" class="img-fluid rounded float-start" alt="..."> -->
				</div>
				<div class="col-md-8">
				<div class="card-body">
					<h5 class="card-title">Ingresar Productos con archivo Excel</h5>
					<p class="card-text">Registrar varios productos</p>
					<a href="/acciones/ingresoExcel.php" class="btn btn-success">Ingresar</a>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>		

	<?php  include_once './footer.php' ?>
	    
</body>
</html>