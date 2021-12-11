<?php
	
   include_once './header.php';
   include_once './navBar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>vendedor</h1>

    

<div class="container" > 
  <div class="col-7 mx-auto">
 
	<div class="micard card mb-3" style="max-width: 500px;">
		<div class="row g-0">
			<div class="col-md-4">
			<img  src="../images/consultar.jpg" class="img-fluid rounded-start" alt="...">
			</div>
			<div class="col-md-8">
			<div class="card-body">
				<h5 class="card-title">consultar inventario</h5>
				<p class="card-text">Listado de produtos que se encuntran en el inventario</p>
				<a href="./listar.php" class="btn btn-light">Mostrar</a>
			</div>
			</div>
		</div>
	</div>

    <div class="micard card mb-3" style="max-width: 500px;">
		<div class="row g-0">
			<div class="col-md-4">
				<img class="centrado" src="../images/buy.png" class="img-fluid rounded-start" alt="...">
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<h5 class="card-title">Generar una venta</h5>
					<p class="card-text"> Opcion de venta de productos</p>
					<a href="./vender.php" class="btn btn-light">Generar</a>
				</div>
			</div>
			</div>
	</div>
 </div>	
</div>	

<?php include_once './footer.php' ?>
</body>
</html>