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
		/*Preguntamos si el campo codigo se relleno*/
		if(!empty(trim($codigo))){
			/*Si se relleno comprobamos el formato*/
			if(!preg_match($patronCodigo,$codigo)|| strlen($codigo)!=3){
				/*Si no coincide con el patron y el numero de caracteres*/
				//$errores{"erroresInsert"}["errorCodigo"]='Solo se admiten 3 caracteres alfanumericos';//Guardo el error en el array de errores
				$EnvioOk=false;//Entrada a false
				$codigo="";//Limpiamos el campo
			}
			
		}else{
			/*Si no se rellena*/
			//$errores{"erroresInsert"}["errorCodigo"]='Rellena el campo!';//Guardo el error en el array de errores
			$EnvioOk=false;//Entrada a false
			$codigo="";//Limpiamos el campo
		}

		/*Preguntamos si se lleno el campo descripcion*/
		if(!empty(trim($descripcion))){
			/*Si se relleno comprobamos el formato*/
			if(!preg_match($patronDescripcion,$descripcion) || strlen($descripcion)>50){
				//$errores{'erroresInsert'}['errorDescripcion']='No coincide con el patrón,solo caractéres alfabéticos, 50 caractéres como máximo';
				$EnvioOk=false;//Entrada false
				$descripcion="";//Limpiamos el campo
			} 

		} else{
			//$errores{'erroresInsert'}['errorDescripcion']='No se permite enviar valores vacios';//Guardo el error en el array de errores
			$EnvioOk=false;//Entrada false
			$descripcion="";//Limpiamos el campo
		}

		/*Preguntamos si el formulario se envio correctamente*/
		if ($EnvioOk) {
			$correcto = Departamento::insertarDepartamento($codigo,$descripcion);
			$_SESSION['insert'] = $correcto;
			include $layout;
		} else {
			$correcto = false;
			$_SESSION['insert'] = $correcto;
			include $layout;
		}

	}

} else {
	//Si el usuario no existe en la sesión redireccionamos al login
	header("Location: index.php?location=login");
}

?>