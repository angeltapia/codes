<?php 
	require_once "Usuario.php";	
	session_start();
	$usuario=new Usuario();

	if(isset($_GET['opc']))
	{
		$opc=$_GET['opc'];

	}else if(isset($_POST['opc'])){
		$opc=$_POST['opc'];		
	}



	if($opc=="l"){
		
		$user=$_POST['txtUser'];
		$pwd=$_POST['txtPwd'];

		$rpta=$usuario->logueo($user,$pwd);

		if($rpta=="1"){			
			header("Location:listausuarios.php");
		}else if($rpta=="2"){
			header("Location:index.php?err=");
		}

	}

	if($opc=="r"){

		$nombres=$_POST['txtNombres'];
		$login=$_POST['txtUser'];
		$mail=$_POST['txtMail'];
		$pass1=$_POST['txtPwd'];
		$pass2=$_POST['txtPwd2'];

		if($nombres!="" && $login!="" && $mail!="" && $pass1!="" && $pass2!="" ){

			if($pass1==$pass2){

				$rpta=$usuario->registrar($nombres,$login,$mail,$pass1);
				
				if($rpta=="1"){
				echo  "<script>alert('Registro completado');location.href='index.php';</script>";
				}else if($rpta=="2"){

				}else if($rpta=="3"){
					
				}


			}else{				
				header("Location:registro.php?err=1");	
			}


		}else{			
			header("Location:registro.php?err=2");	
		}

	}

	if ($opc=="d") {
			
		$user=$_GET['id'];
		$rpta=$usuario->eliminar($user);

		if ($rpta=="1") {
			echo  "<script>alert('Registro eliminado');location.href='listausuarios.php';</script>";
		}		

	}


 ?>