<?php 
/**
* Controlador de la página para iniciar sesion
*
* Autor: David Romero
*/
require_once 'model/Usuario.php'; //Incluimos la clase Usuario

//Preguntamos si se inicia sesion
if (isset($_SESSION['usuario'])){
	//Si se ha iniciado redirecionamos al index
	header("Location: index.php?location=inicio");
} else {
	//Si no se ha logueado secomprueba la información del login
	$entradaOk = false;//Flag para controlar el acceso

	//Preguntamos si se ha pulsado el boton iniciar sesion y los campos no estan vacios
	if (isset($_REQUEST['enviar']) && isset($_REQUEST['usuario']) && isset($_REQUEST['password'])){
		//Si se ha pulsado y los campos no esta vacíos validamos el usuario
		$usuario = Usuario::validarUsuario(trim($_REQUEST['usuario']), hash('sha256',$_REQUEST['password']));//Llamamos al metodo validarUsuario para comprobar si el usuario existe.

		//A continuación preguntamos si el usuario es un objeto nulo
		if (is_null($usuario)){
			//Si es nulo informamos de que ha habido un error
			echo "El usuario o contraseña introducido/s no es valido";
		} else {
			//Si por el contrario el objeto no es nulo
			$entradaOk= true; //Cambiamos el valor del flag a true
		}
	}

	// A continuación preguntamos por el estado del flag
	if ($entradaOk) {
		//Si el usuario es correcto lo almacenamos en la sesion
		$_SESSION['usuario'] = $usuario;
		//Redireccionamos al index,indicando la localizacion
		header('Location: index.php?Location=inicio');
	} else {
		//Si no es correcto se muestra el layout (que mostrará el formulario del login)

		include 'view/layout.php';
	}

}
?>