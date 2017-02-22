<?php
/*
* Vista insertarDepartamentos.
*
* Autor: David Romero
*/
require_once "model/Departamento.php";
$usuario=$_SESSION['usuario'];
//$departamentos = $_SESSION['departamentosListados'];
$correcto = $_SESSION['insert'];
echo "<pre>";
var_dump($correcto);
echo "</pre>";

if ($correcto) {
?>
	<div id="respuesta">
		<p>Departamento introducido correctamento, en breve se le devolvera al index</p>
	</div>
<?php	
} else {
	?>
	<div id="respuesta">
		<p>El departamento no pudo ser introducido,pruebe de nuevo, en breve se le devolvera al index</p>
	</div>
<?php	
}
?>