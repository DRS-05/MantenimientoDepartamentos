<?php 
	/**
	* Controlador de la página de inicio
	*
	* Autor: David Romero
	*/
	require_once 'model/Usuario.php';//Incluimos la clase Usuario
	$layout = 'view/layout.php';

	if (isset($_SESSION['usuario'])){
		include_once $layout;
		//Preguntamos si se ha pulsado el boton de salir
		if (isset($_REQUEST['salir'])){
			//Si se ha pulsado cerramos la sesion
			unset($_SESSION['usuario']);
			session_destroy();//Destruimos la sesion
			//Y redireccionamos al index
			header('Location: index.php?location=login');
		}
		
	} else {
		header('Location:index.php=location=login');
	}

	

?>