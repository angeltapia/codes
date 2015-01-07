<?php session_start();
	include_once("clases/bnpsupload.php");

	$imagen= new bnpsupload;
	$opcion=$_POST['opcion'];
	if($opcion=="ci")
	{
		$id=$_POST['vIdOpc'];
		$raiz=$_POST['raiz'];

		$imagen->cargarImagen($id,$raiz);
	}
	if($opcion=="ui")
	{

		$mensaje=$imagen->procesarImagen();
		if($mensaje==1)
		echo"<script>parent.document.getElementById('resultado').innerHTML ='Im&aacute;gen subida satisfactoriamente'</script>";
		if($mensaje==2)
		echo"<script>parent.document.getElementById('resultado').innerHTML ='No se realiz&oacute; ninguna acci&oacute;n'</script>";
		
		echo"<script>parent.escondeSelects();</script>";
		echo"<script>parent.mostrarCapa('resultado',300,30);</script>";
		echo"<script>parent.setTimeout('cerrarMensaje(\"resultado\",\"bnpsupload.php\",\"\")',3000);</script>";
		
	}
	
	if($opcion=="ui1")
	{
		
		$mensaje=$imagen->procesarImagen();
		if($mensaje==1)
		echo"<script>parent.document.getElementById('resultado').innerHTML ='Im&aacute;gen subida satisfactoriamente'</script>";
		if($mensaje==2)
		echo"<script>parent.document.getElementById('resultado').innerHTML ='No se realiz&oacute; ninguna acci&oacute;n'</script>";
		
		echo"<script>parent.escondeSelects();</script>";
		echo"<script>parent.mostrarCapa('resultado',300,30);</script>";
		/*echo"<script>parent.setTimeout('cerrarDivyAbrir(\"resultado\")',3000);</script>";*/
		echo"<script>parent.recargar();</script>";
		echo"<script>parent.setTimeout('cerrarDiv(\"resultado\",\"bnpsupload.php\",\"\")',3000);</script>";
		
	}
	
	if($opcion=="rc")
	{

		$imagen->listaImagenesPrevia();
	}
	
	if($opcion=="ei")
	{

		$imagen->eliminarImagen();
	}
?>