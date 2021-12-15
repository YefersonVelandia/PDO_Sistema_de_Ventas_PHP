<?php 

	include("conexion.php");
	
	if(isset($_POST['btn_enviar'])){

		$nombre = $_POST['txt_nombre'];
		$correo = $_POST['txt_correo'];
		$clave  = $_POST['txt_clave'];
		$p2 = password_hash($clave,PASSWORD_DEFAULT);

		$sentencia = $con->prepare("insert into usuario values(?,?,?,?,?)");
		$resultado = $sentencia->execute([null, $nombre, $correo, $p2, 2]);

			if($resultado){
				$RegistroExitoso = "<script type='text/javascript'>
										Swal.fire({
											icon: 'success',
											title: 'Usuario registrado correctamente',
											showConfirmButton: true,
											timer: 2500,
											timerProgressBar: true
										});
									</script>";
				include 'formRegistro.php';
			}else{
				echo "Los datos no se registraron";
			}
	}
?>