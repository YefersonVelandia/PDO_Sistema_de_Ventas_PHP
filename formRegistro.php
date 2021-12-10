<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>
   
    <title>Document</title>
</head>
<body >

<section class="vh-100" style="background-color: #85FFBD;
    background-image: linear-gradient(45deg, #85FFBD 0%, #FFFB7D 100%);">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-5">Crear una cuenta</h3>

                            <form action="registrar.php" method="POST" >

                            <?php 
                                if( isset ($RegistroExitoso)){
                                    echo "$RegistroExitoso";
                                    
                                }else{
                                    if ( ( isset($correo))  ) {
                                        echo $correo;                                       
                                    }
                                }
                                

                            ?>



                            <div class="d-flex flex-row align-items-center mb-3">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                
                            </div>

                            <div class="d-flex flex-row align-items-center mb-3">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
							<input type="text" name="txt_nombre" required class="form-control" placeholder="Nombre" /> </div>
                            </div> 
                                
                            <div class="d-flex flex-row align-items-center mb-3">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
								<input type="email"  name="txt_correo" required class="form-control" placeholder="correo electronico" /> </div>
                            </div>    
                            
                            <div class="d-flex flex-row align-items-center mb-3">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
								<input type="password" name="txt_clave"required class="form-control" placeholder="Contraseña"  /> </div>
                            </div>

                            

                            <div class="form-check d-flex justify-content-center mb-3">
                            <label>
                            ¿ya tienes una cuenta? <a href="index.php">Ingresa</a>
                            </label>
                            </div>

                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
								<button  type="submit" name="btn_enviar"class="btn btn-primary btn-md">Registrarse</button>
                            </div>
                                
                            </form>
                        

                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </section> 

	
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</body>
</html>