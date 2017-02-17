<?php 
/*
 * Controla cuál será el controlador activo en base a la localización (página actual) del usuario.
 *
 * NOTA: La localización se empieza a enviar a partir del primer intento de inicio de sesión del usuario.
 *
 * Autor: Santiago Huerga Bartolomé.
 * Editado por: Pablo Mora Martín.
 * Fecha de última modificación: 23/01/2017
 */

 require_once 'model/Usuario.php';//Incluimos la clase Usuario
 session_start();//Iniciamos o continuamos la sesion
 require_once 'config/config.php';// Fichero con la configuración de la navegacion de la página
 $controlador = 'controller/cInicio.php';//Por defecto se establece el controlador de la pagina de inicio

 /*
 * Si se ha iniciado una sesión, se comprueba si se ha indicado localización y si ésta existe en el array $controladores
 * de config.php, se establecerá el controlador correspondiente a esa localización
 */
 //Preguntamos si existe el usuario en la sesion
 if (isset($_SESSION['usuario'])){
 	//Si existe, preguntamos si se establecio la localizacion y se ha iniciado sesion
 	if (isset($_GET['location']) && isset($controladores[$_GET['location']])){
 		$controlador = $controladores[$_GET['location']];
 	}
 } else {
 	$_GET['location'] = 'login';
 	$controlador = $controladores[$_GET['location']];
 }

 include $controlador;//Uso del controlador
?>