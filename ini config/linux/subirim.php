 <iframe name="guardar" id="guardar" style="display:none"></iframe>
 
 <div id="resultado" class="resultado"></div>
 <div id="mostrarimag" ><div id="titulo" style="top:0px; width:600px; height:10px; cursor:move" onMouseDown="clickCapa(event, this)" onmouseout="liberaCapa()"></div><?php include_once('administrador/bnpssubimag.php');?></div>
 
 ----
 <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="350" colspan="3"><div id="previo"><?php $imagen->listaImagenesPrevia($idioma);?></div></td>
  </tr>
  
  <tr>
    <td colspan="3" align="right">
     <input name="txtArchivo" type="file" id="txtArchivo" size="60" maxlength="100" />    <img src="<?php echo $raiz;?>imagenes/upload.png" width="32" height="32" title="Subir imagen" style="cursor:pointer" onclick="document.getElementById('opcion').value='ui1'; frmSubmitTarget(gestor,'<?php echo $raiz;?>bnpsuploadfunc.php','guardar')" />&nbsp;&nbsp;<img src="<?php echo $raiz;?>imagenes/cancel.png" width="32" height="32" title="Cerrar" style="cursor:pointer" onclick="cerrarDiv('mostrarimag')" /></td>
  </tr>
  <tr>
    <td colspan="3" align="right">&nbsp;</td>
  </tr>
</table>
