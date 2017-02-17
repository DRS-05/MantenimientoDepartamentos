<?php
/*
* Controlador IndexDepartamentos.
*
* Autor: David Romero
*/
require_once 'model/Departamento.php';

$layout = 'view/layout.php';

if (isset($_SESSION['usuario'])) {
	include_once $layout;

	if (isset($_POST['buscar'])) {
		$_SESSION['departamentosListados'] = Departamento::buscarDepartamentos("");
		header("refresh:0; url = index.php?location=IndexDepartamento");
	} else {
		$_SESSION['departamentosListados'] = Departamento::mostrarDepartamentos("");	
	}

} else {
	header('Location: index.php?Location=login');
}

//if (isset())
?>