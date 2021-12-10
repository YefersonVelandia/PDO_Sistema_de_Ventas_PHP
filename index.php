<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon"> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>
    <title>Sistema</title>
</head>
<body>

<section class="vh-100" style="background-color: #85FFBD;
background-image: linear-gradient(45deg, #85FFBD 0%, #FFFB7D 100%);">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block ">
              <img
                src="./images/inicio.jpg"
                alt="login form"
                class="img-fluid rounded float-end" style="border-radius: 1rem 0 0 1rem;"
                
              />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="ingreso.php" method="POST">
                <?php 
                  if(isset($errorLogin)){
                    echo "<h5 style='background-color: red; color: white; text-align: center;''>$errorLogin</h5>";
                  }
                ?>
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold ">Sistema de inventario</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 0px;">Iniciar sesion</h5>

                  <div class="form-outline mb-4">
                    <input type="email" id="iduser" name="user" class="form-control form-control-lg" required="required" />
                    <label class="form-label" for="form2Example17">Email</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password"  id="idpass" name="pass" class="form-control form-control-lg" required="required"/>
                    <label class="form-label" for="form2Example27">Constraseña</label>
                  </div>
                  
                  <div class="d-grid gap-2 col-12 mx-auto">
                    <button name="btn_ingresar" id="btn_ingresar" class="btn btn-dark btn-lg btn-block" type="submit">Ingresar</button>
                  </div>
                  <hr class="my-4">
                                  
                  <p class="small fw-bold mt-2 pt-1 mb-0">¿No tienes una cuenta? 
                  <a href="formRegistro.php" class="link-primary">Registrarse</a></p>              
            
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</body>
</html>