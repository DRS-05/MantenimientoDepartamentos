<?php 
/*
* Controlador insertarDepartamentos.
*
* Autor: David Romero
*/
require_once 'model/Departamento.php';
//$criterioBusqueda = "";
$layout = 'view/layout.php';//En esta variable guardamos la localización de la vista
/*Comprobamos que el usuario exite en la sesión*/
if (isset($_SESSION['usuario'])) {

	if (isset($_POST['insertar'])) {
		$patronCodigo="/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/";//Patron para el codigo
		$patronDescripcion="/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/";//Patron para la
		$EnvioOk=true;
		$codigo = strtoupper($_POST['codigo']);
		$descripcion = $_POST['descripcion'];

		if ( !empty(trim($codigo)) && !empty(trim($descripcion)) ) {//Si las variables de codigo y descripción no estan vacías comprobamos los formatos
			//Primero el codigo
			if (!preg_match($patronCodigo, $codigo) || strlen($codigo)!=3) {
				$EnvioOk = false;
				$codigo = "";//Limpiamos el campo
			}

			if (!preg_match($patronDescripcion, $descripcion) || strlen($descripcion)>250 ) {
				$EnvioOk = false;
				$descripcion = "";//Limpiamos el campo
			}

		} else {
			$EnvioOk = false;
			$descripcion = "";//Limpiamos el campo
			$codigo = "";
		}

		if ($EnvioOk) {
			$_SESSION['insertado'] = Departamento::insertarDepartamento($codigo,$descripcion);
			$_SESSION['departamentosListados'] = Departamento::mostrarDepartamentos();
			include $layout;
			header("Refresh: 5; url=index.php?location=indexDepartamento");

		} else {
			$_SESSION['insertado'] = false;
			include $layout;
			header("Refresh: 5; url=index.php?location=indexDepartamento");
		}

		
		

	} 

} else {
	//Si el usuario no existe en la sesión redireccionamos al login
	header("Location: index.php?location=login");
}

?>