<?php
/*
* Controlador IndexDepartamentos.
*
* Autor: David Romero
*/
$layout = 'view/layout.php';

if (isset($_SESSION['usuario'])) {
	include_once $layout;
} else {
	header('Location: index.php?Location=login');
}

?>