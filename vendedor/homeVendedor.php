<?php
	include_once './header.php';
    include './navBar.php';
   // include '../restringir.php';


    if(!isset($_SESSION['id_fk'])){
		header('location: index.php');
	}else {
		
		if($_SESSION['id_fk'] != 2){
			header('location: ../home.php');
		}
	}
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
 
	<div class="card mb-3" style="max-width: 500px;">
		<div class="row g-0">
			<div class="col-md-4">
			<img src="../images/consultar.jpg" class="img-fluid rounded-start" alt="...">
			</div>
			<div class="col-md-8">
			<div class="card-body">
				<h5 class="card-title">consultar inventario</h5>
				<p class="card-text">Listado de produtos que se encuntran en el inventario</p>
				<a href="./mostrar.php" class="btn btn-success">Mostrar</a>
			</div>
			</div>
		</div>
	</div>

    <div class="card mb-3" style="max-width: 500px;">
		<div class="row g-0">
			<div class="col-md-4">
				<img src="../images/buy.png" class="img-fluid rounded-start" alt="...">
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<h5 class="card-title">Generar una venta</h5>
					<p class="card-text"> Se listan los productos disponibles					</p>
					<p> Se genera un recibo de venta</p>
					<a href="./venta.php" class="btn btn-success">Generar</a>
				</div>
			</div>
			</div>
	</div>
 </div>	
</div>	

<?php include_once './footer.php' ?>
</body>
</html>