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
	
	
	<div class="container">
		<h1>vendedor</h1>
		<div class="row">
			
			<div class="col-lg-4 col-md-12 mb-4">            
				<div class="cardAdmin card" style="width: 19rem;">
					<div class="card-header-second">
						<div class="card-body">
							<div>
								<h5 class="card-title" style="color: #292929">Consultar inventario</h5>
								<p class="card-text">Listado de producto</p>

							</div>
							<a href="./inventario.php" class="miboton btn btn-dark ">Mostrar</a>
						</div>
					</div>
				</div>    
			</div>

			<!-- Tarjeta #3 -->
			<div class="col-lg-4 col-md-12 mb-4">            
				<div class="cardAdmin card" style="width: 19rem;">
					<div class="card-header-second">
						<div class="card-body">
							<div>
								<h5 class="card-title" style="color: #292929">Generar ventas</h5>
								<p class="card-text">Opcion de venta de productos</p>

							</div>
							<a href="./vender.php" class="miboton btn btn-dark ">Mostrar</a>
						</div>
					</div>
				</div>    
			</div>
		</div>
</div>


<?php include_once './footer.php' ?>
</body>
</html>