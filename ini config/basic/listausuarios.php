<?php 
	session_start();

	if(!isset($_SESSION['user'])){
		header("Location:index.php");
	}

	include_once "Usuario.php";

	$usuario=new Usuario();

	$listado=$usuario->listado();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login</title>
	<meta  charset="utf-8" />
</head>
<body>
	<header><h3>Bienvenido: <?php  echo $_SESSION['user']; ?> <a href="salir.php">[Salir]</a></h3>  </header>

	<h1>Lista de Usuarios</h1>

	<br>

			<table border="1" cellspacing="0" cellpadding="0" width="800" >

				<tr>
					<th>Codigo</th>
					<th>Nombres</th>
					<th>Login</th>
					<th>Email</th>
					<th>Accion</th>
				</tr>

	<?php 

		foreach ($listado as $item) {			

		?>

		<tr>
			<td><?php echo $item[0]; ?></td>
			<td><?php echo $item[1]; ?></td>
			<td><?php echo $item[2]; ?></td>
			<td><?php echo $item[3]; ?></td>
			<td><a href="editarusuario.php?id=<?php echo $item[0]; ?>">Editar</a>&nbsp;<a onclick="return confirm('Eliminar este usuario?');" href="control.php?opc=d&id=<?php echo $item[0]; ?>">Eliminar</a></td>
		</tr>
			
		<?php
		}

	 ?>
	 </table>


</body>
</html>