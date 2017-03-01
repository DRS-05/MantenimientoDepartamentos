<?php
/*
* Vista insertarDepartamentos.
*
* Autor: David Romero
*/
require_once "model/Departamento.php";
//Recibimos los departamentos listados en la sesión
$departamentos = $_SESSION['departamentosListados'];



if ($_SESSION['insertado']) {//Si tiene valor true, el envio fue correcto
	//Mostramos la vista
?>
	<div id="respuesta">
		<p>Departamento introducido <b>correctamente</b>, en breve se le devolvera al index</p>
	</div>
<?php	
} else {//Si el valor es false, el envio no se produjó
	?>
	<div id="respuesta">
		<p>El departamento <b>no</b> pudo ser introducido,<b>pruebe</b> de nuevo, en breve se le devolvera al index</p>
	</div>
<?php	
}
?>

