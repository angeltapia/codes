<?php 

		$resultado=array();
		try {

			$cnx=Conexion::getInstancia();

			$resultados   = 12;
			$total_cuentas=$cnx->query("SELECT count(idcuenta) as total from cuenta where idusuario='".$_SESSION['mg_idusuario']."' ");

			$filatotal=$cnx->fetch($total_cuentas);

			$paginacion = new Zebra_Pagination();
			$paginacion->records($filatotal['total']);
			$paginacion->records_per_page($resultados);
			// Quitar ceros en numeros con 1 digito en paginacion
			$paginacion->padding(false);

			$iniciolimit=($paginacion->get_page() - 1) * $resultados;

			$sql="SELECT a.idcuenta,a.nombrecta,a.montoini,a.iddivisa,b.iddivisa,
			b.simbolo from cuenta as a inner join divisa as b on a.iddivisa=b.iddivisa 
			where  a.idusuario = b.idusuario and a.idusuario='".$_SESSION['mg_idusuario']."' order by a.idcuenta DESC LIMIT $iniciolimit, $resultados ";

			$resultSet=$cnx->query($sql);
			
			while($fila=$cnx->fetch($resultSet)){
				$sql2="SELECT sum(monto) as importes from gasto where idcuenta='".$fila['idcuenta']."' and idusuario='".$_SESSION['mg_idusuario']."' ";

				$resultSet2=$cnx->query($sql2);

				$fila2=$cnx->fetch($resultSet2);

				$saldo=$fila['montoini']-$fila2['importes'];

				$resultado[]=array($fila['idcuenta'],$fila['nombrecta'],$fila['montoini'],$fila['simbolo'],$saldo);
				
			}

			$render=$paginacion->render(true);

			$destino_final=array($resultado,$render);

			return $destino_final;


			
		} catch (Exception $e) {
			throw new DAOExcepcion($e->getMessage());
			
		}

 ?>