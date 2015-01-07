<?php
//incluimos la clase para la conexion
include_once("mysql.php");
//clase para la opción de imágenes
class bnpsupload extends mysql
{
	// propiedades de la clase
	
	// constructor
	public function __construct()
	{
		// llama al constructor de la clase padre
		parent::__construct();
	}
	
	/**
	método para insertar o actualizar una imágen
	parametros:
		$imagen : nombre de la imágen
	**/
	
	public function guardarImagen($imagen)
	{
			
		
$sql="insert into bnps_imagenes(imagen,fchcre,usrcre) values ('$imagen',now(),'".$_SESSION['id_acceso']."')";
		
		$sql=$this->ejec_query_store($sql);
		if($sql)
			return 1;
		else
			return 2;
			
	}
	
	//método para subir una imágen al servidor
	public function procesarImagen()
	{
			 $nombre_archivo = $_FILES['txtArchivo']['name'];
			 $tipo_archivo = $_FILES['txtArchivo']['type'];
			 $tamano_archivo = $_FILES['txtArchivo']['size'];
					//destino del archivo
			 //$target =$_SERVER['DOCUMENT_ROOT']."/laboratorio/bnpsite/uploads/";
			 $target ="../imagen/";
			$ext=".jpg,.gif,.png";
			if (!(ereg(".jpg",$nombre_archivo) || ereg(".gif",$nombre_archivo) || ereg(".png",$nombre_archivo) || ereg(".JPG",$nombre_archivo) || ereg(".GIF",$nombre_archivo) || ereg(".PNG",$nombre_archivo)) || ($tamano_archivo > 163840))
			{
					 echo"<script>parent.alert('La extensión o tamaño del documento no es válida. Solo se admite  " .$ext. " y 160 kb como máximo.');</script>";
					 exit;
			}
			else
			{
					if(move_uploaded_file($_FILES['txtArchivo']['tmp_name'],$target.$nombre_archivo))
					{
						$mensaje=$this->guardarImagen($nombre_archivo);
						return $mensaje;
					}
			}
	}
	
	//método para listar las imágenes que estan en el servidor
	public function listaImagenes()
	{
		$sql="select idimagenes,imagen from bnps_imagenes    order by imagen ASC";
		$sql=$this->ejec_query_store($sql);
		
		$cont=0;
		echo"<table width='700' border='0' align='center' cellpadding='0' cellspacing='1' class='tr'>
            <tr>
				<td><input type='checkbox' name='chk_todos' id='chk_todos' onclick='checks_marcados();' style='cursor:pointer'/></td>
              <td width='250' class='TituloGrilla'>Lista de im&aacute;genes</td>
               <td width='450' class='TituloGrilla'>Vista previa</td>
            </tr>
            <tr>
              <td  valign='top' colspan='2'><div id='milista' style='overflow:auto; height:350px;'><table width='250' height='350' border='0' cellpadding='0' cellspacing='0' class='td'>";
			  if($this->getNumRows($sql)>0)
			  {
			  	while($fila=$this->fetch_array($sql))
				{
					echo"<tr height='15'>
					  <td width='30'><input type='checkbox' name='chk_item' id='chk_item' value='".$fila['idimagenes']."' style='cursor:pointer' /></td>
					  <td><a href='#' onclick='document.getElementById(\"vIdOpc\").value=".$fila['idimagenes']."; cargar_imagen(\"bnpsuploadfunc.php\",\"1\")'>".$fila['imagen']."</a></td>
					</tr>";
					$cont++;
				}
				$this->llenarGrilla($cont,15);
			  }
			  else
			  {
			  		$this->llenarGrilla($cont,15);
			  }
             echo" </table></div></td>
              <td align='center'><div id='recibirimg' style='width:450px; height:350px; background-color:#E6F2FB; overflow:auto; text-align:center'></div></td>
            </tr>
          </table>";

	}
		//método para la vista previa de los documentos que estan en el servidor 
	
	//método para la vista previa de las  imágenes que estan en el servidor 
	public function listaImagenesPrevia($raiz="")
	{
		$sql="select idimagenes,imagen from bnps_imagenes   order by imagen ASC";
		$sql=$this->ejec_query_store($sql);
		
		$cont=0;
		echo"<table width='600' border='0' align='center' cellpadding='0' cellspacing='1' class='tr'>
            <tr>
              <td width='200' class='TituloGrilla'>Lista de im&aacute;genes</td>
               <td width='300' class='TituloGrilla'>Vista previa</td>
            </tr>
            <tr>
              <td  valign='top' ><div id='milista' style='overflow:auto; height:350px;'><table width='200' height='350' border='0' cellpadding='0' cellspacing='0' class='td'>";
			  if($this->getNumRows($sql)>0)
			  {
			  	while($fila=$this->fetch_array($sql))
				{
					$enlace = "bnpsuploadfunc.php";
					echo"<tr height='15'>
					  <td style='padding-left:10px'><a href='#' onclick='document.getElementById(\"opcion\").value=".$fila['idimagenes']."; cargar_imagen(\"$enlace\",\"2\")'>".$fila['imagen']."</a></td>
					</tr>";
					$cont++;
				}
				$this->llenarGrilla($cont,15);
			  }
			  else
			  {
			  		$this->llenarGrilla($cont,15);
			  }
             echo" </table></div></td>
              <td align='center'><div id='recibirimg' style='width:400px; height:350px; background-color:#E6F2FB; overflow:auto; text-align:center'></div></td>
            </tr>
          </table>";

	}
	
	//método para eliminar una o varias imágenes de la BD
	public function eliminarImagen()
	{
		$valor=split(",",$_POST['chk_item']);
		sort($valor);
	
		if($valor!="")
		{
			for($i=0;$i<count($valor);$i++)
			{
				$query = $this->ejec_query_store("select imagen from bnps_imagenes where idimagenes='".$valor[$i]."'  ");
				$fila = $this->fetch_array($query);
				$nombre_img = $fila['imagen'];
				@unlink("../imagen/".$nombre_img);
			
				$sql="delete from bnps_imagenes where idimagenes='".$valor[$i]."' ";
				$sql=$this->ejec_query_store($sql);
	
				
			}
			if($sql)
			{
				echo"Im&aacute;gen eliminada satisfactoriamente";
			}else
			{
				return;
			}
		}
	}
	
	/**
	método para cargar los datos de una imágen mediante el id
	parametros:
		$id : Id de la imágen
	**/
	
	public function cargarImagen($id,$raiz)
	{
			$sql="select imagen from bnps_imagenes where idimagenes=$id  ";
			$sql=$this->ejec_query_store($sql);
			$fila=$this->fetch_array($sql);
			
			if($_POST['opt']==1)
			{
					echo"<table width='450' height='350' border='0' cellpadding='0' cellspacing='0' class='td'>
				<tr>
				  <td><img src='../imagen/".$fila['imagen']."' /></td>
				</tr>
				<tr>
				  <td>".$fila['imagen']."</td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				</tr>
				</table>";
			}
			if($_POST['opt']==2)
			{
				if($raiz!=""){
				$enlace = $raiz."imagen/";
					echo"<table width='400' height='350' border='0' cellpadding='0' cellspacing='0' class='td'>
				<tr>
				  <td><img src='$enlace".$fila['imagen']."' onclick='document.getElementById(\"txtImag\").value=\"".$fila['imagen']."\"; cerrarDiv(\"mostrarimag\")' style='cursor:pointer' /></td>
				</tr>
				<tr>
				  <td>".$fila['imagen']."</td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				</tr>
				</table>";
				}else{
					$enlace = $raiz."imagen/";
					echo"<table width='400' height='350' border='0' cellpadding='0' cellspacing='0' class='td'>
				<tr>
				   <td><img src='$enlace".$fila['imagen']."'   /></td>
				</tr>
				<tr>
				  <td>".$fila['imagen']."</td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				</tr>
				</table>";
				
				}
				
			}
	}
	
	
	
	private function llenarGrilla($cont,$totalf)
	{
		while($cont<$totalf)
		{
			echo"<tr class='td'>";
			
				echo "<td height='20px' align='center'>&nbsp;</td>";
				echo "<td height='20px' align='center'>&nbsp;</td>";
			echo"</tr>";
			$cont++;
		}
	}
	
	// funciones para documentos
	
	public function guardardocumento($imagen)
	{
		$archivo=strtolower($imagen);
			$idcarpeta=explode("/",$_POST['cbodestino']);
			$sql="insert into bnps_archivos(idcarpetas,archivo,opcpub,nivacc,fchpub,titarch,fchcre,usrcre) 
			values ('".$idcarpeta[0]."','".$archivo."','SI','PRIVADO',now(),'.',now(),'".$_SESSION['id_acceso']."')";
		
		
		
		if($this->verificarDocumento($archivo)==0){
				$sql=$this->ejec_query_store($sql);
			}else return 3;
			
			if($sql)
			return 1;
		else
			return 2;
	}
	
	public function verificarDocumento($archivo)
	{
		$sql="select archivo from bnps_archivos where archivo='".$archivo."'";
		$sql=$this->ejec_query_store($sql);
		if($this->getNumRows($sql)>0){			
			return 1;
		}else return 0;
	}
	
	
	public function listardocumentos(){
	$c="";
	$cond="";
	$destino="";
	if(isset($_POST['cbodestino']) && !empty($_POST['cbodestino']))
	{$carpeta=explode("/",$_POST['cbodestino']); $destino="../".$_POST['cbodestino'];$c="1";} 
	else {$ruta="documentos/";$c="0";}
	
$cond="";
if($c=="1")$cond=" where idcarpetas='".$carpeta[0]."'";else $cond=" where idcarpetas='0'";

$sqls="select idarchivo,archivo,fchcre,usrcre,nivacc,titarch,fchpub from bnps_archivos  $cond order by archivo ASC";
		$sql=$this->ejec_query_store($sqls);
		$cont=0;
		echo "<table width='600' border='0' align='center' cellpadding='0' cellspacing='1' class='tr' >
            <tr>
				<td >&nbsp;</td>
              <td  class='TituloGrilla'>Lista de documentos
			 
			  </td>
               
            </tr>
            <tr>
              <td  valign='top' colspan='2'><div id='milista' style='overflow:auto; height:350px;'><table width='100%' height='350' border='1' cellpadding='0' cellspacing='0' class='td' style='border-collapse:collapse'>";
			  if($this->getNumRows($sql)>0)
			  {
			  	while($fila=$this->fetch_array($sql))
				{
					echo"<tr height='15'>
					  <td width='2' class='grisp'></td>
					  <td class='grisp'><label>".$fila['archivo']."</label></td><td width='180' class='grisp' align='center'>".$fila['fchcre']."</td>
					</tr>";
					$cont++;
				}
				while($cont<15)
		{
			echo"<tr class='td'>";
			
				echo "<td class='grisp' height='20px' align='center'>&nbsp;</td>";
				echo "<td  class='grisp' height='20px' align='center'>&nbsp;</td>";
				echo "<td class='grisp' height='20px' align='center'>&nbsp;</td>";
				
				
			echo"</tr>";
			$cont++;
		}
			  }
			  else
			  {
			  		while($cont<15)
		{
			echo"<tr class='td'>";
			
				echo "<td height='20px' align='center'>&nbsp;</td>";
				echo "<td height='20px' align='center'>&nbsp;</td>";
				echo "<td height='20px' align='center'>&nbsp;</td>";
				
				
			echo"</tr>";
			$cont++;
		}
			  }
             echo" </table></div></td>
              
            </tr>
          </table>";
	
	}
	
	public function procesardocumento()
	
	{
  $nombre_archivo = $_FILES['txtArchivos']['name'];
			 $tipo_archivo = $_FILES['txtArchivos']['type'];
			 $tamano_archivo = $_FILES['txtArchivos']['size'];
			
			 $nom=explode("/",$_POST['cbodestino']);
			 if($nom[0]=="0")$name=""; else $name=$nom[1]."/";
			 
		 $target ="../documentos/".$name;
			$ext=".xls,.pdf,.docx,.pps,.ppt";
			if(!empty($_POST['cbodestino'])){
			if(is_dir($target)){
			if (!(ereg(".xls",$nombre_archivo) || ereg(".pdf",$nombre_archivo) || ereg("docx",$nombre_archivo) || ereg(".doc",$nombre_archivo) || ereg(".ppt",$nombre_archivo) ||  ereg(".pps",$nombre_archivo) || ereg(".xlsx",$nombre_archivo)) || ($tamano_archivo > 10485760))
			{
	 echo"<script>parent.alert('La extensión o tamaño del documento no es válida. Solo se admite  " .$ext. " y 10 MB como máximo');</script>";
					 exit;
			}
			else
			{
					if(move_uploaded_file($_FILES['txtArchivos']['tmp_name'],$target.$nombre_archivo))
					{
						$mensaje=$this->guardardocumento($nombre_archivo);
						return $mensaje;
					}
			}
			
			}else { echo "<script>parent.alert('No existe el directorio".$target."');</script>";
					 exit;}
					 }else{echo "<script>parent.alert('No se especificado el destino ');</script>";
					 exit;}
	}
	
	
	public function eliminardocumento()
	{
		$valor=split(",",$_POST['chk_item']);
		sort($valor);
	
		if($valor!="")
		{
			for($i=0;$i<count($valor);$i++)
			{
				$query = $this->ejec_query_store("select imagen from bnps_imagenes where idimagenes='".$valor[$i]."' ");
				$fila = $this->fetch_array($query);
				$nombre_img = $fila['imagen'];
				@unlink("../documentos/".$nombre_img);
			
				$sql="delete from bnps_imagenes where idimagenes='".$valor[$i]."' ";
				$sql=$this->ejec_query_store($sql);
	
				
			}
			if($sql)
			{
				echo"Im&aacute;gen eliminada satisfactoriamente";
			}else
			{
				return;
			}
		}
	}
	public function cargardocumento($id,$raiz)
	{
			$sql="select archivo from bnps_archivos where idarchivo=$id  ";
			$sql=$this->ejec_query_store($sql);
			$fila=$this->fetch_array($sql);
			
			if($_POST['opt']==1)
			{
					echo"<table width='450' height='350' border='0' cellpadding='0' cellspacing='0' class='td'>
				<tr>
				  <td>".include_once("'../documentos/".$fila['archivo']."'")."</td>
				</tr>
				<tr>
				  <td>".$fila['archivo']."</td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				</tr>
				</table>";
			}
			if($_POST['opt']==2)
			{
				$enlace = $raiz."imagen/";
					echo"<table width='400' height='350' border='0' cellpadding='0' cellspacing='0' class='td'>
				<tr>
				  <td><img src='$enlace".$fila['imagen']."' onclick='document.getElementById(\"txtImag\").value=\"".$fila['imagen']."\"; cerrarDiv(\"mostrarimag\")' style='cursor:pointer' /></td>
				</tr>
				<tr>
				  <td>".$fila['imagen']."</td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				</tr>
				</table>";
			}
	}
	
	public function listar_directorios(){
	 
	
    $sql="select idcarpetas,carpeta,orden,acceso,fchcre from bnps_carpetas  order by carpeta ASC";
	$sql=$this->ejec_query_store($sql);
    echo "<div>
			  <select id='cbodestino' name='cbodestino' size='1' style='width:150px'>
			  <option value='0/DOCUMENTOS'>DOCUMENTOS</option>
			  ";
			  while($fila=$this->fetch_array($sql)){
			  if($_POST['cbodestino']==$fila['carpeta']) $sel="selected='selected'";else $sel="";
			  echo "<option value='".$fila['idcarpetas']."/".$fila['carpeta']."' ".$sel." >".$fila['carpeta']."</option>";
			  }
			  echo " </select>
			  </div>";
	
	}
	//funcion para directorio
function listar_directorios_ruta($ruta){
// abrir un directorio y listarlo recursivo
$dir=array();
$arch=array();
if (is_dir($ruta)) {
if ($dh = opendir($ruta)) {
$dir[]="documentos";
while (($file = readdir($dh)) !== false) {
//esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio
//mostraría tanto archivos como directorios
//echo "<br>Nombre de archivo: $file : Es un: ". filetype($ruta.$file);
if (is_dir($ruta.$file) && $file!="." && $file!="..")
//solo si el archivo es un directorio, distinto que "." y ".."
$dir[]="documentos/".$file;

else $arch[]=$file;


}
closedir($dh);
}
}else{
$dir[]="$ruta No es ruta valida ";

}
 return array($dir,$arch);
}
	
}
?>
