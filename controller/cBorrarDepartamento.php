<?php 
/*
* Controlador borrarDepartamentos.
*
* Autor: David Romero
*/
require_once 'model/Departamento.php';

$layout = 'view/layout.php';//En esta variable guardamos la localización de la vista
/*Comprobamos que el usuario exite en la sesión*/
if (isset($_SESSION['usuario'])) {
	$codigo = $_GET['CodDepartamento'];
	//$_SESSION['codigo'] = $codigo;

	$_SESSION['borrado'] = Departamento::borrarDepartamento($codigo);
	include $layout;

} else {
	header("Location: index.php?location=login");//Redireccionamos a la vista para inciar sesión
}

?>

