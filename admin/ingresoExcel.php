<?php

    include_once './header.php';
    include_once './adminNavbar.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form action="./recibir.php" method="POST" enctype="multipart/form-data"/><hr>
                <div class="excel card">
                    <div class="col-10 mx-auto file-input text-center">
                        <input class="form-control" type="file" name="dataCliente" id="file-input" class="file-input__input" required/>
                            
                        <div class="text-center mt-5">
                            <input type="submit" name="subir" class="btn btn-success" value="Subir Excel"/>
                        </div>  
                    </div>
                </div>                        
            </form>
        </div>

    </div>
</div>

<?php
    include_once './footer.php';
?>