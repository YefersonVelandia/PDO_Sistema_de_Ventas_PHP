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
    <form action="./calculo.php" method="post">
        
        <div class="row">
            <div class="col-6">
            
            <div  class="input-group mb-3"></div>
                    <label class="form-label">Precio de compra actual: </label>
                    <input  name="" type="number"  class="form-control" value="<?php echo $producto->precioCompra?>" required disabled >                                
                    <input  name="txt_valor_anterior" type="hidden"  class="form-control" value="<?php echo $producto->precioCompra?>" required >                                
                        
                <div  class="input-group mb-3"></div>            
                    <div class="mb-3">
                        <label class="form-label">Existencia actual: </label>
                        <input name="" type="number"  class="form-control" value="<?php echo $producto->existencia?>" required  disabled>

                        <input name="txt_existencia_anterior" type="hidden"  class="form-control" value="<?php echo $producto->existencia?>" required >
                    </div>
            </div>

            <div class="col-6">
                <div  class="input-group mb-3"></div>
                    <label class="form-label">Nuevo Precio de compra: </label>
                    <input name="txt_valor_nuevo" type="number" min="1" pattern="^[0-9]+" class="form-control" required >                                
                <div class="input-group mb-3"></div>
                    <label class="form-label">Cantidad: </label>
                    <input name="txt_nueva_existencia" type="number" min="1" pattern="^[0-9]+" class="form-control" required >               
            </div>
        </form>
        

            <div class="col-12">
                <label class="form-label">Nombre del producto: </label>
                <input type="text" disabled class="form-control" value="<?php echo $producto->descripcion?>" >
                <input type="hidden" name="txt_iva" id="" value="<?php echo $producto->iva?>">

                <input type="hidden" name="txt_id" id="" value="<?php echo $id?>">

            </div>
        
        <div  class="input-group mb-3"></div>
        <div class="d-grid gap-2 col-12 mx-auto">      
        <button class="btn btn-success" name="btnPmp">Enviar</button>
    </div> 
    </div>

    
        
</div>

    
    <?php
        include_once './footer.php';
    ?>    
</body>
</html>