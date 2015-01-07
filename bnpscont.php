<?php 
include_once('administrador/clases/bnpssesion.php');
include_once('administrador/clases/bnpscontenido.php');
include_once('administrador/clases/bnpsfunciones.php');
$sesion = new bnpssesion;
$sesion->verificar_sesion();
$IdOpc=$_POST['vIdOpc'];

$funcion = new bnpsfunciones;
$contenido = new bnpscontenido;
//$idioma = $funcion->idiomaSeleccionado();

if($IdOpc!="") $fila=$contenido->cargarContenido($IdOpc,$idioma);

$empresa=$funcion->muestraNombreSitio();

$raiz = "administrador/";

	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
Editor de contenidos - <?php echo $empresa;?>
</title>
<link rel="stylesheet" href="administrador/estilos/bnpsiteadmin.css" type="text/css">

<!--<link rel="stylesheet" href="estilos/bnpsmenu.css" type="text/css">-->
<style type="text/css">
<!--
.Estilo1 {
	font-size: 14px;
	font-weight: bold;
	padding-left:10px;
}

ul{
	padding-left:20px;
	width:180px;
	list-style:none
}
ul li{
	
	width:180px;
	display:block
}

ul li a:link,a:hover,a:active,a:visited{
	color:#000000;
	text-decoration:none
}
.dococu{
display:none;

}
.docver{
display:block;
position:absolute;
top:100px;
left:380px;
border:1px solid #000000;
width:630px;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	z-index:600;
	
}

-->
</style>
 
</head>

<script language="javascript" type="text/javascript" src="administrador/lib/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript" src="administrador/lib/bnpsgeneral.js"></script>
<script language="javascript" type="text/javascript" src="administrador/lib/bnpsajax.js"></script>
<script language="javascript" type="text/javascript" src="administrador/lib/bnpscontenido.js"></script>
<script language="javascript" type="text/javascript" src="administrador/lib/jquery/jquery.js"></script>

<script language="javascript" type="text/javascript">
	function recargar()
	{
		//setTimeout("recargarCapa('bnpsuploadfunc.php','rc')",3000);
		setTimeout("recargax()",3000);
	}
	function recargar2()
	{
		setTimeout("recarga()",3000);
	}
	 function inicioEnvio(){
var x=$("#contfotosalbum");
  x.html('<table  width="100%" height="100%"><tr><td align="center" valign="middle"><i>...Cargando</i></td></tr></table>');
 }
 function recargax(){
 $("#carrito").ajaxStart(inicioEnvio);
$.post("administrador/bnpsuploadfunc.php",{"cbodestino":$("#cbodestino").attr("value"),"vIdOpc":$("#vIdOpc").attr("value"),
"raiz":$("#raiz").attr("value"),"opcion":'rc',"contearch":"contearch"},function(datos){
$("#previo").html("");
$("#previo").html(datos);
});
 }
 
 function recarga(){
 $("#carrito").ajaxStart(inicioEnvio);
$.post("administrador/bnpssubdoc.php",{"cbodestino":$("#cbodestino").attr("value"),"vIdOpc":$("#vIdOpc").attr("value"),
"raiz":$("#raiz").attr("value"),"opcion":$("#opcion").attr("value"),"contearch":"contearch"},function(datos){
$("#previodoc").html("");
$("#previodoc").html(datos);
});
 }
	$(document).ready(function(){
	
	$("#cbodestino").change(function(e){
e.preventDefault();
$("#carrito").ajaxStart(inicioEnvio);
$.post("administrador/bnpssubdoc.php",{"cbodestino":$("#cbodestino").attr("value"),"vIdOpc":$("#vIdOpc").attr("value"),
"raiz":$("#raiz").attr("value"),"opcion":$("#opcion").attr("value"),"contearch":"contearch"},function(datos){
$("#previodoc").html("");
$("#previodoc").html(datos);
/*alert($("#cbodestino").attr("value"));*/

});

});


$("a.cargdoc").click(function(e){
  e.preventDefault();
  $("#capadoc").removeClass("dococu");
 $("#capadoc").addClass("docver");
});
$("#capadoc img#cerrardoc").click(function(e){
 $("#capadoc").removeClass("docver");
 $("#capadoc").addClass("dococu");
});
});

	function verifica_radio(){
			
			<?php
						if($IdOpc=="")
						echo "document.getElementById('rbPublico').checked=true;";
			 ?>
	}
	
		function mostrarAyuda(){
			
			divResultado = document.getElementById('nota');
			divResultado.style.top=((screen.height - (400+260))/2)+'px';
			divResultado.style.left=((screen.width - 400)/2)+'px';
			divResultado.style.display='block';
	}
	function cerrarAyuda(div)
{
	document.getElementById(div).style.display='none';
}

</script>
<body onload="verifica_radio();<?php if($IdOpc!="") {if($fila['principal']=="SI"){ ?>mostrarOpciones();<?php } } if($fila['zoncont'] =="P") echo"document.getElementById('rbZonGeneral').checked=false;";  if($fila['zoncont'] =="G") echo"document.getElementById('rbZonPrincipal').checked=false;"; 
if($fila['enlaces']=="SI"){ ?> mostrarEnlaces();<?php }
if($fila['rescont']=="SI") {?> mostrarContenido(); document.getElementById('chkDetalle').checked=false; <?php } ?>" onmousemove="mueveCapa(event)">
<form id="gestor" name="gestor" action="" method="post" enctype="multipart/form-data"  >
 <table width="800" border="0" align="center" cellpadding="0" cellspacing="1" class="tr">
   <tr>
     <td width="900"><table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="td">
       <tr>
         <td height="50" colspan="5" class="TituloVentana"><?php  echo"BNP SITE - ".$empresa; ?>
           <div style="font-size:10px; padding-right:5px">
             <table border='0' cellpadding="0" cellspacing="0" width="100%">
               <tr>
                 <td width="40%" align="left" style="padding-left:10px;">&nbsp;</td>
                 <td width="60%" align="right"><strong>Usuario:</strong>&nbsp;<?php echo $_SESSION['usr']; ?>&nbsp;&nbsp;<a href="#" onclick="location.href='administrador/bnpssalir.php'" >(<strong>Cerrar sesión</strong>)</a></td>
               </tr>
             </table>
           </div></td>
       </tr>
       <tr>
         <td height="20" colspan="5"><span style="padding-left:5px;"><a href="administrador/bnpspanel.php">Panel de control</a> - <a href="administrador/bnpsliscont.php">Lista de contenidos</a></span> - Editor de contenidos</td>
         </tr>
       <tr>
         <td height="10" colspan="5"></td>
       </tr>
       <tr>
         <td height="10" colspan="5"></td>
         </tr>
       <tr>
         <td height="10" colspan="2" align="left"><span class="Estilo1">EDITOR DE CONTENIDOS</span></td>
         <td width="108" height="10" style="padding-left:10px"><strong>Parámetros</strong></td>
         <td width="40">&nbsp;</td>
         <td width="102">&nbsp;</td>
       </tr>
       
       <tr>
         <td colspan="2" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
             <tr>
               <td colspan="5" ></td>
             </tr>
             <tr>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td align="right">&nbsp;</td>
               <td>&nbsp;</td>
             </tr>
             <tr>
             	<td>&nbsp;</td>
             	<td>&nbsp;</td>
             	<td>&nbsp;</td>
             	<td align="right">&nbsp;</td>
             	<td>&nbsp;</td>
         	</tr>
             <tr>
               <td width="6">&nbsp;</td>
               <td width="37"><strong>Título</strong></td>
               <td width="303"><input name="txtTitulo" type="text" id="txtTitulo" size="60" maxlength="60" value="<?php if($fila['titulo'] !="")  echo $fila['titulo'];?>" /></td>
               <td width="188" align="right"><table border="0" cellpadding="0" cellspacing="0">
                   <tr>
                     <td width="124">
                     <label style="cursor:pointer;">  <input type="checkbox" name="chkTitulo" id="chkTitulo" <?php if($fila['mostit']=="NO") echo "checked='checked'"; ?> style="cursor:pointer;height:auto !important;"/>
                       Ocultar título           </label>           </td>
                     <td width="10">&nbsp;&nbsp;</td>
                     <td width="45"><img src="administrador/imagenes/save.png" title="Grabar contenido"  style=" cursor:pointer" onclick="document.getElementById('opcion').value='gc'; grabar(gestor);"/></td>
                   </tr>
               </table></td>
               <td width="34"><img src="administrador/imagenes/cancel.png" title="Cancelar"  style=" cursor:pointer" onclick="location.href='administrador/bnpsliscont.php';"/></td>
             </tr>
             <tr>
               <td>&nbsp;</td>
               <td colspan="3"><strong>Tipo de contenido: </strong><label style="cursor:pointer;">Resumen y detalle 
                
                 <input type="checkbox" name="chkResdet" id="chkResdet" onclick="if(document.getElementById('chkResdet').checked==false){ document.getElementById('chkDetalle').checked=true; } else { document.getElementById('chkDetalle').checked=false; } mostrarContenido()" style="cursor:pointer;height:auto !important;" <?php if($fila['rescont']=="SI"){ echo "checked='checked'";  }?> /></label><label style="cursor:pointer;">
                 Sólo detalle 
                 <input name="chkDetalle" type="checkbox" id="chkDetalle" <?php if($fila['rescont']=="NO"){ echo "chechked='checked'";  }?> checked="checked" onclick="if(document.getElementById('chkDetalle').checked==false){ document.getElementById('chkResdet').checked=true;} else { document.getElementById('chkResdet').checked=false; }  document.getElementById('contenido').style.display='none'; " style="cursor:pointer;height:auto !important;" />     </label>            </td>
               <td>&nbsp;</td>
             </tr>
             <tr>
               <td>&nbsp;</td>
               <td colspan="3">&nbsp;</td>
               <td>&nbsp;</td>
             </tr>
             <tr>
               <td colspan="5">
                 <div id="contenido" style="display:none">
                   <textarea name="txtContenido" cols="70" id="txtContenido"  style="width:98%;
 height:300px;" ><?php  if($fila['introduc'] !="")  echo $fila['introduc'];?>
	 </textarea>
               </div></td>
             </tr>
             
             <tr>
               <td colspan="5" align="center"><textarea name="txtArea" cols="70" id="txtArea"  style="width:98%;
 height:533px;" ><?php if($fila['contenido'] !="")  echo $fila['contenido'];?>
	           </textarea></td>
             </tr>
        </table></td>
         <td colspan="3" valign="top"><div id="opciones">
           <table width="210" border="0" cellpadding="0" cellspacing="0">
             <tr>
               <td width="4%">&nbsp;</td>
               <td colspan="2">
                 <table width="205" border="0" cellpadding="0" cellspacing="0">
                   <tr>
                     <td width="80%">&nbsp;</td>
                     <td width="20%">&nbsp;</td>
                   </tr>
                   <tr>
                     <td><label for="chkPublicar" style="cursor:pointer" > Publicar</label></td>
                     <td><input name="chkPublicar" type="checkbox" id="chkPublicar"  style="cursor:pointer;height:auto !important;" <?php if($fila['publicar'] =="SI")  echo"checked='checked'";?>/></td>
                   </tr>
                   <tr>
                     <td colspan="2"><div style="border-top:1px solid #CCCCCC;"></div></td>
                     </tr>
                   <tr>
                     <td><label for="chkPrincipal" style="cursor:pointer">Publicar en página principal</label></td>
                     <td><input name="chkPrincipal" type="checkbox" id="chkPrincipal"  <?php if($fila['principal'] =="SI")  echo"checked='checked'";?> style="cursor:pointer" onclick="mostrarOpciones();"/></td>
                   </tr>
                   <tr>
                     <td colspan="2"><div id="zona" style="display:none; padding-left:75px">
																					<label for="rbZonPrincipal" style="cursor:pointer">
																					Zona principal&nbsp;&nbsp;
                       <input name="rbZonPrincipal" type="radio" id="rbZonPrincipal" checked="checked" style="cursor:pointer;height:auto !important;" <?php if($fila['zoncont'] =="P")  echo"checked='checked'";?> onclick="if(document.getElementById('rbZonPrincipal').checked==false) document.getElementById('rbZonGeneral').checked=true; else document.getElementById('rbZonGeneral').checked=false; "/>
                       <br /></label><label for="rbZonGeneral" style="cursor:pointer">
                       Zona general&nbsp;&nbsp;&nbsp;
                       <input type="radio" name="rbZonGeneral" id="rbZonGeneral" style="cursor:pointer;height:auto !important;"  onclick="if(document.getElementById('rbZonGeneral').checked==false) document.getElementById('rbZonPrincipal').checked=true; else document.getElementById('rbZonPrincipal').checked=false; " <?php if($fila['zoncont'] =="G")  echo"checked='checked'";?>/></label>
                     </div></td>
                     </tr>
                   
                 </table>               </td>
             </tr>
             <tr>
               <td>&nbsp;</td>
               <td colspan="2"><div style="border-top:1px solid #CCCCCC;"></div></td>
               </tr>
             <?php
			 if($funcion->mostrarIconoImpresion())
			 { ?>
            <!-- <tr>
               <td>&nbsp;</td>
               <td colspan="2"><label style="cursor:pointer;" >Mostrar Módulo de Información 
                 
                 <input type="checkbox" name="chkInfo" id="chkInfo" <?php //if($fila['modinf']=="SI") echo"checked='checked'";?>  style="cursor:pointer;height:auto !important;" />
                 </label></td>
             </tr> -->
             <tr>
               <td>&nbsp;</td>
               <td colspan="2"><label style="cursor:pointer;" >Mostrar Icono Impresión 
                 
                 <input type="checkbox" name="chkImpresion" id="chkImpresion" <?php if($fila['icoimp']=="SI") echo"checked='checked'";?>  style="cursor:pointer;height:auto !important;"/>  </label>               </td>
             </tr>
             <?php } ?>
             <tr>
               <td>&nbsp;</td>
               <td colspan="2"><label style="cursor:pointer;" >Mostrar Icono Enviar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="chkEnviar" id="chkEnviar" <?php if($fila['icoenv']=="SI") echo"checked='checked'";?>  style="cursor:pointer;height:auto !important;"/>        </label>         </td>
             </tr>
             <tr>
               <td>&nbsp;</td>
               <td colspan="2"><label style="cursor:pointer;" >Mostrar Me gusta facebook
                 <input type="checkbox" name="chkFacebook" id="chkFacebook" <?php if($fila['icoface']=="SI") echo"checked='checked'";?>  style="cursor:pointer;height:auto !important;"/></label></td>
             </tr>
             <tr>
               <td>&nbsp;</td>
               <td colspan="2">
               <label style="cursor:pointer;" >Mostrar boton de Twitter 
                
                 <input type="checkbox" name="chktwitt" id="chktwitt" <?php if($fila['icotwit']=="SI") echo"checked='checked'";?>  style="cursor:pointer;height:auto !important;"/>
                 </label>               </td>
             </tr>
             <tr>
               <td>&nbsp;</td>
               <td colspan="2">&nbsp;</td>
             </tr>
             <tr>
               <td>&nbsp;</td>
               <td colspan="2">
                 <table width="205" border="0" cellpadding="0" cellspacing="0">
                   <tr>
                     <td colspan="4"><div style="border-top:1px solid #CCCCCC;"></div></td>
                     </tr>
                   <tr>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                   </tr>
                   <tr>
                     <td colspan="4"><strong>Acceso del contenido</strong></td>
                     </tr>
                   <tr>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                   </tr>
                   <tr>
                     <td><label style="cursor:pointer;" for="rbEdicion" >Edición</label></td>
                     <td><label>
                       <input type="radio" name="rbEdicion" id="rbEdicion" style="cursor:pointer;height:auto !important;" onclick="document.getElementById('rbPublico').checked=false; document.getElementById('rbPrivado').checked=false;" <?php if($fila['acceso'] =="EDICION")  echo"checked='checked'";?> />
                     </label></td>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                   </tr>
                   <tr>
                     <td width="26%"><label style="cursor:pointer;" for="rbPublico" >Público</label></td>
                     <td width="13%"><label>
                       <input name="rbPublico" type="radio" id="rbPublico" style="cursor:pointer;height:auto !important;" onclick="document.getElementById('rbPrivado').checked=false;document.getElementById('rbEdicion').checked=false;" <?php if($fila['acceso'] =="PUBLICO")  echo"checked='checked'";?>/>
                     </label></td>
                     <td width="24%"><label style="cursor:pointer;" for="rbPrivado" >Privado</label></td>
                     <td width="37%"><input name="rbPrivado" type="radio" id="rbPrivado"    onclick="document.getElementById('rbPublico').checked=false;document.getElementById('rbEdicion').checked=false;" <?php if($fila['acceso'] =="PRIVADO")  echo"checked='checked'";?> style="cursor:pointer;height:auto !important;"/></td>
                   </tr>
                   <tr>
                     <td colspan="4"><div style="border-top:1px solid #CCCCCC;"></div></td>
                     </tr>
                 </table>               </td>
             </tr>
             <tr>
               <td colspan="3">&nbsp;</td>
             </tr>
             <tr>
               <td>&nbsp;</td>
               <td colspan="2"><strong>Seleccionar imágen para contenido</strong></td>
             </tr>
             <tr>
               <td>&nbsp;</td>
               <td colspan="2">&nbsp;</td>
             </tr>
             <tr>
               <td>&nbsp;</td>
               <td colspan="2">
              
                 <a href="#" onclick="mostrarCapaImagen('mostrarimag',100,700)">Buscar Imágen</a> <img src="administrador/imagenes/editar.gif" title="Agregar imágen" width="22" height="22" onclick="mostrarCapaImagen('mostrarimag',100,700)" style="cursor:pointer"/>                 </td>
             </tr>
             <tr>
               <td>&nbsp;</td>
               <td  height="30"><a href="#"  class="cargdoc" > Buscar documentos</a>&nbsp;<a href="#"  class="cargdoc" > <img border="0"  src="imagen/iconfolder.jpg" alt="Buscar documentos"/></a></td>
               <td >&nbsp; </td>
             </tr>
         </table>
         </div>
       <br />
         <span style="padding-left:10px;cursor:pointer;" onclick="mostrarAyuda();" ><strong>C&oacute;mo hacer un enlace (?)</strong></span> 
       
        	<div id="nota" >
													<div id="titAyuda"> Mensaje de Ayuda</div>
                 <p>Si desea crear un enlace a otro contenido siga estos pasos:<br />
                   <br />
                 1. Seleccione el texto a enlazar.<br />
                 2. Click en el botón insertar link. <img src="administrador/imagenes/link.JPG" width="21" height="20" /><br />
                   <br />
                 3. En la ventana que aparece en la opción Link URL escriba bnpscontenido.php?id_cont=id.<br />
                   <br />
                   id=Nro de contenido que se quiere enlazar.<br />
																			<br />
																			Ejemplo: bnpscontenido.php?id_cont=12                 </p>
																<div align="center">	<input style="width:100px !important;height:25px !important;cursor:pointer;" type="button" onclick="cerrarAyuda('nota');" id="cancelarayuda" name="cancelarayuda" value="Aceptar" /></div>
          </div>
												<br /><br />
         <span ><strong>&nbsp;&nbsp;&nbsp;Enlaces relacionados</strong></span> 
								
										<div id="enlacesr">
								<label style="cursor:pointer;" >Mostrar enlaces relacionados &nbsp;<input type="checkbox" name="chkEnlace" id="chkEnlace" <?php if($fila['enlaces']=="SI") echo"checked='checked'";?> onclick="mostrarEnlaces();"  style="cursor:pointer;height:auto !important;"/>
												</label>
															<div id="zonaenl" style="display:none;">
																
																	
																					<select name="vEnlace[]" size="12" style="width: 200px; height:160px;margin-bottom:5px;" multiple="multiple" id="vEnlace">
                              <?php 
																														
																														if($IdOpc!=''){
																														
																														$contenido->verEnlaces($IdOpc);
																													
																														}else{																														
																														$funcion->cargaContenidoEnl();
																														}																														
																														?>
                            </select>    
																															</div>
								</div>
        <div id="imagenes"></div></td>
       </tr>
       <tr>
         <td valign="top" style="padding-left:6px"><strong>Metadatos</strong></td>
         <td width="465" height="17">&nbsp;</td>
         <td colspan="3">&nbsp;</td>
       </tr>
       <tr>
         <td width="100" valign="top" style="padding-left:6px">Descripción del Sitio<br />
(No usar tildes)</td>
         <td height="30" colspan="4"><div align="left">
           <input name="txtMetdes" type="text" id="txtMetdes" value="<?php if($fila['metdes'] !="")  echo $fila['metdes'];?>" size="140" maxlength="600" />
         </div></td>
         </tr>
       <tr>
         <td valign="top" style="padding-left:6px">Palabras Clave del Sitio<br />
(Separadas por coma)</td>
         <td height="30" colspan="4"><div align="left">
           <input name="txtMetpal" type="text" id="txtMetpal" value="<?php if($fila['metpal'] !="")  echo $fila['metpal'];?>" size="140" maxlength="600" />
         </div></td>
         </tr>
       <tr>
         <td colspan="2"><input type="hidden" name="vIdOpc" id="vIdOpc" value="<?php echo $IdOpc;?>"/>
             <input name="opcmnu" type="hidden" id="opcmnu" value="<?php if($fila['idopcmnu']!="") echo $fila['idopcmnu']; ?>" />
             <input type="hidden" name="opcion" id="opcion" />
             <input type="hidden" name="raiz" id="raiz" /></td>
         <td colspan="3" >&nbsp;</td>
       </tr>
       <?php include_once("administrador/bnpspieadmin.php");?>
    </table></td>
   </tr>
 </table>
  <div id="capadoc" class="dococu" style="background-color:#CCCCCC;" >
  
<div id="titulo" style="top:0px; width:600px; height:15px; cursor:move" onMouseDown="clickCapa(event, this)" onmouseout="liberaCapa()"></div>
  
  <div id="contdoc" >
 <?php include_once('administrador/bnpssubdoc.php');?>
 </div>

 </div>
 
 <iframe name="guardar" id="guardar"  style="display:none"></iframe>
 
 <div id="resultado" class="resultado"></div>
 <div id="mostrarimag" ><div id="titulo" style="top:0px; width:600px; height:10px; cursor:move" onMouseDown="clickCapa(event, this)" onmouseout="liberaCapa()"></div><?php include_once('administrador/bnpssubimag.php');?></div>
 

</form>


</body>
</html>
