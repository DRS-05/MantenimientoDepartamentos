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
		$EnvioOk=true;//Flag para permitir insertar el departamento o no
		$codigo = strtoupper($_POST['codigo']);//Recibimos el código del formulario
		$descripcion = $_POST['descripcion'];//Recibimos la descripción del formulario


		/*Comprobamos que el codigo y la descripción no se envian vacios*/
		if ( !empty(trim($codigo)) && !empty(trim($descripcion)) ) {//Si las variables de codigo y descripción no estan vacías comprobamos los formatos

			//Primero el codigo el formato del codigo
			if (!preg_match($patronCodigo, $codigo) || strlen($codigo)!=3) {
				//Si el patron no coincide, o tiene más de tres caracteres
				$EnvioOk = false;//Denegamos la entrada
				$codigo = "";//Limpiamos el campo
			}

			//Si la descripción no coincide con el patrón o tiene más de 250 caracteres
			if (!preg_match($patronDescripcion, $descripcion) || strlen($descripcion)>250 ) {
				$EnvioOk = false;//Denegamos la entrada
				$descripcion = "";//Limpiamos el campo
			}

		} else {
			//Si no se rellena cualquiera de los dos campos
			$EnvioOk = false;//Denegamos la entrada
			$descripcion = "";//Limpiamos el campo
			$codigo = "";//Limpiamos el campo
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