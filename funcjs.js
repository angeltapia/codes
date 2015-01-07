// JavaScript Document
tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect,separator,pastetext,pasteword,separator,emotions,media,separator,ltr,rtl,separator,forecolor,backcolor",
		theme_advanced_buttons2_add : "separator,search,replace,separator,tablecontrols",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		//entity_encoding : "raw",
		theme_advanced_statusbar_location : "bottom",
		plugin_insertdate_dateFormat : "%Y-%m-%d",
		plugin_insertdate_timeFormat : "%H:%M:%S",
		extended_valid_elements : "hr[class|width|size|noshade]",
		file_browser_callback : "fileBrowserCallBack",
		paste_use_dialog : false,
		theme_advanced_resizing : false,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
		apply_source_formatting : true
	});

 function fileBrowserCallBack(field_name, url, type, win) {
 var connector = "../../filemanager/browser.html?Connector=connectors/php/connector.php";
 var enableAutoTypeSelection = true;

 var cType;
 tinymcpuk_field = field_name;
 tinymcpuk = win;

 switch (type) {
 case "image":
 cType = "Image";
 break;
 case "flash":
 cType = "Flash";
 break;
 case "file":
 cType = "File";
 break;
 }

 if (enableAutoTypeSelection && cType) {
 connector += "&Type=" + cType;
 }

 window.open(connector, "tinymcpuk", "modal,width=600,height=400");
} 

function grabar(frm)
{
	if(verificarCampos(frm))
	{
		document.gestor.action="administrador/bnpscontfunc.php";
		document.gestor.target="guardar"
		document.gestor.submit();
	}
}

function mostrarContenido()
{
	if(document.gestor.chkResdet.checked==true)
	{
		document.getElementById('contenido').style.display='block';
	}
	else 
	{
		
		document.getElementById('contenido').style.display='none';
	}
	
}

function mostrarOpciones()
{
	if(document.gestor.chkPrincipal.checked==true)
	{
		document.getElementById('zona').style.display='block';
	}
	else 
	{
		
		document.getElementById('zona').style.display='none';
	}
	
}


function mostrarRoles()
{
	if(document.gestor.rbPrivado.checked==true)
	{
		document.getElementById('zonarol').style.display='block';
	}
	 if(document.gestor.rbPublico.checked==true || document.gestor.rbEdicion.checked==true)
	{
		
		document.getElementById('zonarol').style.display='none';
		 var els = document.getElementById('vAcceso').options;
    for(i = 0; i < els.length; i++)
        els[i].selected = false;
	}
	
}

function mostrarEnlaces()
{
	if(document.gestor.chkEnlace.checked==true)
	{
		document.getElementById('zonaenl').style.display='block';
	}
	 if(document.gestor.chkEnlace.checked==false)
	{
		
		document.getElementById('zonaenl').style.display='none';
		 var els = document.getElementById('vEnlace').options;
    for(i = 0; i < els.length; i++)
        els[i].selected = false;
	}
	
}

function ocultar_mostrar(div)
{

	if(document.getElementById(div).style.display=='block')
	{
		document.getElementById(div).style.display='none';
		
	}
	else
	{
		document.getElementById(div).style.display='block';

	}
	
}

function verificarCampos(obj)
{
	
	missinginfo = "";
	if (obj.txtTitulo.value=="")
	{
		missinginfo += "\n - Titulo";
	}


	if (obj.rbPrivado.checked==true && obj.vAcceso.value=="")
	{
		missinginfo += "- Roles de Accesos\n";
	}
		if (obj.chkEnlace.checked==true && obj.vEnlace.value=="")
	{
		missinginfo += "- Enlaces relacionados\n";
	}
	if(obj.chkFacebook.checked==true)
	{
		if(obj.txtMetdes.value=="")
		{	
			missinginfo += "\n - Ingrese descripcion del sitio para el facebook ";
			obj.txtMetdes.focus();
			}else if(obj.txtMetpal.value==""){
				missinginfo += "\n - Ingrese palabras clave para el facebook ";
				obj.txtMetpal.focus();
			}
	}
	
	if (missinginfo != "") 
	{
		missinginfo = "Le ha faltado ingresar los siguientes datos:\n" + missinginfo + "\n\n¡Por favor pulse enter, ingrese los datos y pruebe de nuevo!\n";
		alert(missinginfo);
		
		return false;
	}
	else
	{ 
		return true;
	}

}


function mensajes(mensaje)
{
	if(mensaje==1)
		setTimeout("nextMensaje('resultado','Contenido actualizado satisfactoriamente')",2000);
	else if(mensaje==2)
		setTimeout("nextMensaje('resultado','Contenido grabado satisfactoriamente')",2000);
	else
		setTimeout("nextMensaje('resultado','No se puede realizar la acción')",2000);
}

