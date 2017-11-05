<?php 
	
	require_once "Conexion.php";

	
	class Usuario
	{
		
		public function registrar($nombres,$login,$mail,$pass){
			
			$cnx=new Conexion();

			$password=md5($pass);
			$sql="INSERT into usuario(nombres,login,password,email) 
			values('".$nombres."','".$login."','".$password."','".$mail."') ";

			$result=$cnx->query($sql);

			if($result){
				return "1";
			}else{
				return null;
			}


		}

		public function logueo($usuario,$pwd){

			$cnx=new Conexion();

			$user=strtolower($usuario);
			$pass=md5($pwd);

			$sql="SELECT iduser,nombres from usuario where login='".$user."' and password='".$pass."' limit 1 ";

			$result=$cnx->query($sql);


			if($cnx->numrow($result)>0){

				$fila=$cnx->fetch($result);				

				$_SESSION['user']=$fila['nombres'];
				$_SESSION['iduser']=$fila['iduser'];

				return "1";

			}else{
				return "2";
			}


		}


	public function listado(){

		$cnx=new Conexion();

		$sql="SELECT * from usuario order by nombres ";

		$result=$cnx->query($sql);

			if($cnx->numrow($result)>0){

				while ($fila=$cnx->fetch($result)) {
					$resultado[]=array($fila['iduser'],$fila['nombres'],$fila['login'],$fila['email']);
				}

				return $resultado;

			}

	}


	public function eliminar($id){

		$cnx=new Conexion();

		$sql="DELETE from usuario where iduser='".$id."' ";

		$result=$cnx->query($sql);

		if($result){
			return "1";
		}

	}


	}


 ?>