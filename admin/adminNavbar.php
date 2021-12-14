

<nav style="background-color: #0B5345;" class="navbar navbar-expand-lg navbar-dark ">
  <div class="container">
    <a class="navbar-brand" href="./index.php">Pi Interactiva</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	  	  <li class="nav-item">
          <a class="nav-link" href="./inventario.php">Consultar inventario</a>
        </li>
	  	  <li class="nav-item">
          <a class="nav-link" href="./ingresarProducto.php">Ingresar Producto</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./ingresoExcel.php">Ingresar Excel</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./ventas.php">Consultar ventas</a>
        </li>
        
        

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php
                session_start();
                $usuario = $_SESSION['nombre_usuario'];
                echo $usuario;
            ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Ver perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../logout.php">Cerrar Sesión</a></li>
          </ul>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>
