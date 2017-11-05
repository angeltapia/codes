<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registro</title>
	<meta  charset="utf-8" />
</head>
<body>

	<h1>Registro</h1>

	<?php 
		if(isset($_GET['err'])){

			if($_GET['err']=="1"){
				echo "<p style='color:red;padding:5px;background:pink;'>Passwords diferentes</p>";
			}else if($_GET['err']=="2"){
				echo "<p style='color:red;padding:5px;background:pink;'>Debe ingresar todos los campos</p>";
			}else{
				echo "<p style='color:red;padding:5px;background:pink;'>Ocurrió un error</p>";
			}			

		}
	 ?>

	<form method="POST" action="control.php" id="form" name="form" > 


	Nombres <input type="text" name="txtNombres" id="txtNombres" size="60" ><br>	
	Usuario <input type="text" name="txtUser" id="txtUser" size="30" ><br>
	E-mail <input type="text" name="txtMail" id="txtMail" size="60" ><br>
	Password <input type="password" name="txtPwd" id="txtPwd" size="30" ><br>
	Repetir Password <input type="password" name="txtPwd2" id="txtPwd2" size="30" ><br>
	
	<input type="submit" id="enviar" name="enviar" value="Registrarme" >
	<input type="hidden" id="opc" name="opc" value="r" > 
	&nbsp; <a href="index.php">Cancelar</a>
	</form>
</body>
</html>