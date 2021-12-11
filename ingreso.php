<?php 

	require './conexion.php';

	session_start();
	$usuario = $_POST['user'];
	$clave   = $_POST['pass'];	

	if(isset($_POST['btn_ingresar'])){


		$sentencia = $con->prepare("select * from usuario where correo = ? ");
		$sentencia->execute([$usuario]);		
		$usu = $sentencia->fetch(PDO::FETCH_ASSOC);
		
		if( ($usu['correo']) && (password_verify($clave, $usu['clave'] )) ){
			
			$rol = $usu['id_fk'];

			if($rol == 1){
				$_SESSION['nombre_usuario'] = $usuario;
				$_SESSION['id_fk'] = $rol;
				header("location: ./admin/index.php");
			}else if($rol == 2){

				$_SESSION['nombre_usuario'] = $usuario;
				$_SESSION['id_fk'] = $rol;
				header("location: ./vendedor/index.php");
			}

		}else{
			echo "Ingreso FALLIDO";
		}
		
		
	}

	

?>

<?php

