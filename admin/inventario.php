<?php
    include_once '../conexion.php';
    $sentencia = $con->query("SELECT * FROM productos2;");
    $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<?php
    include_once './header.php';
    include_once './adminNavbar.php';
    include_once '../restringir.php';

    if(!isset($_SESSION['id_fk'])){
		header('location: ../index.php');
	}else {
		
		if($_SESSION['id_fk'] != 1){
			header('location: ../vendedor/index.php');
		}
	}
?>

<body>

    <div class="container"> 
        <div class="row">
            <div class="col-lg-12">
                
            <h1>Productos</h1>
        
                <a class="btn btn-success" href="./ingresarProducto.php">Nuevo</a>
            
            <br>

        
            <div class="col-8">
                <input class="buscador" type="search"
                id="busqueda"  placeholder="  Buscar..." >
            </div>
        
            <?php
                if( isset ($pmpExisto)){
                    echo $pmpExisto;
                }
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>IVA</th>
                        <th>Precio de compra</th>
                        <th>Precio de venta</th>
                        <th>Existencia</th>
                        <th>Ubicación</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>PMP</th>
                    </tr>
                </thead>
                <tbody id="idTabla">
                    <?php foreach($productos as $producto){ ?>
                    <tr>                        
                        <td><?php echo $producto->codigo ?></td>
                        <td><?php echo $producto->descripcion ?></td>
                        <td><?php echo $producto->iva ?>%</td>
                        <td><?php echo number_format($producto->precioCompra) ?></td>
                        <td><?php echo number_format($producto->precioVenta) ?></td>
                        <td><?php echo $producto->existencia ?></td>
                        <td><?php echo $producto->ubicacion ?></td>
                        <td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $producto->id?>"><img src="../images/edit.png" alt=""></a></td>
                        <td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $producto->id?>"><img src="../images/bin.png" alt=""></a></td>
                        <td><a class="btn btn-success" href="<?php echo "pmp.php?id=" . $producto->id?>" alt="" > <img src="../images/add2.png" alt=""> </a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
    
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Precio medio ponderado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>

<?php include_once './footer.php' ?>
</body>
</html>

<script>
    $(document).ready(function(){
        $("#busqueda").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#idTabla tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>