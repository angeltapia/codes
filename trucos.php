<?php 

require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$model = new AlumnoModel();

$tipo = isset($_REQUEST['t']) ? $_REQUEST['t'] : 'excel';
$extension = $tipo == 'excel' ? '.xls' : '.doc';

header("Content-type: application/vnd.ms-$tipo"); /* Indica que tipo de archivo es que va a descargar */
header("Content-Disposition: attachment;filename=mi_archivo$extension"); /* El nombre del archivo y la extensiòn */
header("Pragma: no-cache");
header("Expires: 0");

 ?>