<?php
/*
* Controlador IndexDepartamentos.
*
* Autor: David Romero
*/
require_once 'model/Departamento.php';
//$criterioBusqueda = "";
$layout = 'view/layout.php';

/*Comprobamos que existe el usuario en la sesion*/
if (isset($_SESSION['usuario'])) {
	/*Si existe, comprobamos si se ha pulsado el boton buscar*/
	if (isset($_POST['buscar'])) {
		$BuscarOK=true;//Valor para comprobar si se ha realizado el envio de los datos corectamente
		$criterioBusqueda = $_POST['busqueda'];//Guardamos el valor de la busqueda de departamento


		if (empty(trim($criterioBusqueda))) {
			//Si el campo busqueda no fue rellenado el envio no se realiza
			$BuscarOK=false;

		}

		if ($BuscarOK) {
			//Si se acepta el envio, ejecutamos la consulta de busqueda
			$departamentos = Departamento::buscarDepartamento($criterioBusqueda);
			$_SESSION['departamentosListados'] = $departamentos;//Guardamos en la sesión
			include_once $layout;//Y por ultimo mostramos la vista
		} else {
			
			include_once $layout;//Y por ultimo mostramos la vista

			if (isset($_POST['listar'])){
				//$_SESSION['departamentosListados'] = Departamento::mostrarDepartamentos();//Guardamos en la sesión
				include_once $layout;//Y por ultimo mostramos la vista
			}
		}


	} else {
		//Si el envio no se produce mostramos el layout y guardamos los departamentos de la sesión en una variable
		//$_SESSION['departamentosListados'] = Departamento::mostrarDepartamentos();
		include_once $layout;
	} 

} else {
	header('Location: index.php?location=login');
}


?>