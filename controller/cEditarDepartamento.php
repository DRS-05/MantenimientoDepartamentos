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
	$descripcion = $_GET['DescDepartamento'];
	include $layout;

	if (isset($_POST['aceptar'])) {
		$patronDescripcion="/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/";//Patron para la
		$codigo = $_POST['codigo'];
		$nuevaDescripcion = $_POST ['descripcion'];//Recibimos la descripción del formulario
		$EnvioOk=true;//Flag para permitir modificar la descripcion del departamento o no

		if (!empty(trim($nuevaDescripcion))) {
			//Si la descripción no coincide con el patrón o tiene más de 250 caracteres
			if (!preg_match($patronDescripcion, $nuevaDescripcion) || strlen($descripcion)>250 )
			{
				$EnvioOk = false;//Denegamos la entrada
				$nuevaDescripcion = "";//Limpiamos el campo
			}

		} else {
			$EnvioOk = false;
			$nuevaDescripcion = "";
		}

		if ($EnvioOk) {
			$_SESSION['modificado'] = Departamento::modificarDepartamento($codigo,$nuevaDescripcion);
			$_SESSION['departamentosListados'] = Departamento::mostrarDepartamentos();
			header("Location: index.php?location=indexDepartamento");
		} else {
			$_SESSION['modificado'] = false;
			header("Location: index.php?location=indexDepartamento");
		}
		

	} 

} else {
	header("Location: index.php?location=login");
}
?>