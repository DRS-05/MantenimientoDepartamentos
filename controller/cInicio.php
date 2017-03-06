<?php 
	/**
	* Controlador de la página de inicio
	*
	* Controla si existe usuario en la sesión y las acciones que se realizan en este.
	*
	* Autor: David Romero
	*/
	require_once 'model/Usuario.php';//Incluimos la clase Usuario
	require_once 'model/Departamento.php';//Incluimos la clase Departamento
	$layout = 'view/layout.php';//Guardamos la direccion del layout

	//Comprobamos si existe usuario en la sesion
	if (isset($_SESSION['usuario'])){
		/*Si el usuario existe en la sesión serializamos el resultado 
		del metodo mostrarDepartamentos y lo enviamos por sesión*/
		$_SESSION['departamentosListados'] = Departamento::mostrarDepartamentos();
		include_once $layout;//A continuación incluimos la vista correspondiente
		
		//Comprobamos si se ha recibido informacion del boton de salir
		if (isset($_REQUEST['salir'])){
			
			unset($_SESSION['usuario']);//Si se ha pulsado cerramos la sesion
			session_destroy();//Destruimos la sesion
			
			header('Location: index.php?location=login');//Y redireccionamos al index
		}

		
		
	} else {
		header('Location:index.php=location=login');//Si no esta iniciada la sesion redireccionamos a login
	}

	

?>