<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login</title>
	<meta  charset="utf-8" />
</head>
<body>

	<h1>Login</h1>
<?php 
		if(isset($_GET['err'])){
				echo "<p style='color:red;padding:5px;background:pink;'>Usuario y/o password incorrecto</p>";					
		}
	 ?>

	<form method="POST" action="control.php" id="form" name="form" > 

	Usuario <input type="text" name="txtUser" id="txtUser" size="30" ><br>
	Password <input type="password" name="txtPwd" id="txtPwd" size="30" ><br>
	<a href="registro.php">Registrarme</a><br>
	<input type="submit" id="enviar" name="enviar" value="Ingresar" >
	<input type="hidden" id="opc" name="opc" value="l" > 
	</form>
</body>
</html>