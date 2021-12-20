<?php
	include './adminNavbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php 
    include_once './header.php'; 
    include_once '../restringir.php';

    if(!isset($_SESSION['id_fk'])){
		header('location: ./index.php');
	}else {
		
		if($_SESSION['id_fk'] != 1){
			header('location: ../vendedor/index.php');
		}
	}
?>

<body >

<div class="container">
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
							<h5 class="card-title" style="color: #292929">Ingresar Productos con archivo Excel(CVS)</h5>
							<p class="card-text">Registrar varios productos</p>

						</div>
                        <a href="./ingresoExcel.php" class="miboton btn btn-dark ">Mostrar</a>
                    </div>
                </div>
            </div>    
        </div>

        <div class="col-lg-4 col-md-12 mb-4">            
            <div class="cardAdmin card" style="width: 19rem;">
                <div class="card-header-second">
                    <div class="card-body">
						<div>
							<h5 class="card-title" style="color: #292929">Ingresar Productos </h5>
							<p class="card-text">Registrar un producto</p>

						</div>
                        <a href="./ingresarProducto.php" class="miboton btn btn-dark ">Mostrar</a>
                    </div>
                </div>
            </div>    
        </div>

        <div class="col-lg-4 col-md-12 mb-4">            
            <div class="cardAdmin card" style="width: 19rem;">
                <div class="card-header-second">
                    <div class="card-body">
						<div>
							<h5 class="card-title" style="color: #292929">Consultar ventas </h5>
							<p class="card-text">Ventas registradas</p>

						</div>
                        <a href="./ventas.php" class="miboton btn btn-dark ">Mostrar</a>
                    </div>
                </div>
            </div>    
        </div>


    </div>
</div>




	<?php  include_once './footer.php' ?>
	    
</body>
</html>