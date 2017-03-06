<?php 
/*
* Controlador editarDepartamentos.
* 
* Controla los envios desde el formulario que modifica la descripcion del departamento
*
* Autor: David Romero
*/
require_once 'model/Departamento.php';

$layout = 'view/layout.php';//En esta variable guardamos la localización de la vista

/*Comprobamos que el usuario exite en la sesión*/
if (isset($_SESSION['usuario'])) {

	$codigo = $_REQUEST['CodDepartamento'];//Recibimos de la URL el codigo del Departamento que queremos modificar
	$descripcion = $_REQUEST['DescDepartamento'];//Recibimos de la URL la descripcion del Departamento que queremos modificar
	
	//Comprobamos si la variable POST ha recibido informacion de aceptar
	if (isset($_POST['aceptar'])) {

		$patronDescripcion="/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/";//Patron para validar la descripcion
		$nuevaDescripcion = $_POST['DescDepartamento'];//Recibimos la  nueva descripción del formulario
		$EnvioOk=true;//Flag para permitir modificar la descripcion del departamento o no

		//Comprobamos si la nueva descripcion no se envia vacía 
		if (!empty(trim($nuevaDescripcion))) {
			//Si la descripción no coincide con el patrón o tiene más de 250 caracteres
			if (!preg_match($patronDescripcion, $nuevaDescripcion) || strlen($descripcion)>250 )
			{
				$EnvioOk = false;//Denegamos la entrada
				$nuevaDescripcion = "";//Limpiamos el campo
			}

		} else {
			$EnvioOk = false;//Denegamos la entrada
			$nuevaDescripcion = "";
		}

		//Comprobamos el valor del flag $EnvioOk
		if ($EnvioOk) {
			//Si el envio es correcto
			Departamento::modificarDepartamento($codigo,$nuevaDescripcion);//usamos el metodo modificarDepartamento para modificar su descripcion 
			$_SESSION['departamentosListados'] = Departamento::mostrarDepartamentos();//Serializamos para enviar por sesion los departamentos que se mostraran
			header("Location: index.php?location=indexDepartamento");//Redireccionamos al index de los departamentos
		} else {
			
			header("Location: index.php?location=editarDepartamento");
		}
		

	}
	else {
		include $layout;
	} 

} else {
	header("Location: index.php?location=login");
}
?>