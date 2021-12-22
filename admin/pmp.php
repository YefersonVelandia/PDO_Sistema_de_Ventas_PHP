<?php
    $id = $_GET["id"];
    include_once '../conexion.php';
    
	$sentencia = $con->prepare("SELECT * FROM productos2 WHERE id = ?;");
	$sentencia->execute([$id]);
	$producto = $sentencia->fetch(PDO::FETCH_OBJ);    
?>

<!DOCTYPE html>
<html lang="en">
    <?php
        include_once './header.php';
        include_once './adminNavbar.php';
    ?>
<body>

<div class="container">
    <form action="./calculo.php" method="post">
        <div class="row">
            <div class="col-6">
            
            <div  class="input-group mb-3"></div>
                    <label class="form-label">Precio de compra: </label>
                    <input name="txt_valor_anterior" type="number"  class="form-control" value="<?php echo $producto->precioCompra?>" >                                
                        
                <div  class="input-group mb-3"></div>            
                    <div class="mb-3">
                        <label class="form-label">Existencia: </label>
                        <input name="txt_existencia_anterior" type="number"  class="form-control" value="<?php echo $producto->existencia?>" >
                    </div>
            </div>

            <div class="col-6">
                <div  class="input-group mb-3"></div>
                    <label class="form-label">Nuevo Precio de compra: </label>
                    <input name="txt_valor_nuevo" type="number" class="form-control">                                
                <div class="input-group mb-3"></div>
                    <label class="form-label">Cantidad: </label>
                    <input name="txt_nueva_existencia" type="number" class="form-control">               
            </div>
        </form>
        

            <div class="col-12">
                <label class="form-label">Nombre del producto: </label>
                <input type="text" disabled class="form-control" value="<?php echo $producto->descripcion?>" >

            </div>
        
        <div  class="input-group mb-3"></div>
        <div class="d-grid gap-2 col-12 mx-auto">      
        <button class="btn btn-success" name="btnExpor">Enviar</button>
    </div> 
    </div>

    
        
</div>

    
    <?php
        include_once './footer.php';
    ?>    
</body>
</html>