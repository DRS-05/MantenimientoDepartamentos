<?php
/*
* Vista insertarDepartamentos.
*
* Autor: David Romero
*/
require_once "model/Departamento.php";
//$usuario=$_SESSION['usuario'];
$departamentos = $_SESSION['departamentosListados'];
//$correcto = $_SESSION['insert'];
echo "<pre>";
//var_dump($correcto);
//var_dump($_SESSION);
var_dump($_SESSION['insertado']);
echo "</pre>";


if ($_SESSION['insertado']) {
?>
	<div id="respuesta">
		<p>Departamento introducido <b>correctamente</b>, en breve se le devolvera al index</p>
	</div>
<?php	
} else {
	?>
	<div id="respuesta">
		<p>El departamento <b>no</b> pudo ser introducido,pruebe de nuevo, en breve se le devolvera al index</p>
	</div>
<?php	
}
?>

