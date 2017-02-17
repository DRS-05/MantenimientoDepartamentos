<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="HTML5, CSS3, JavaScript"/>
		<meta name="viewport" content= "width=device-width, initial-scale=1.0, user-scalable=no"/>
		<meta name="author" content="David Romero"/>
		<link rel="stylesheet" href="webroot/css/reset.css">
		<link rel="stylesheet" href="webroot/css/stylos.css">
		<title>Mantenimiento departamento MVC</title>
	</head>
	<body>
		<header>
			<h1>MANTENIMIENTO DEPARTAMENTOS</h1>
		</header>
		<main>
			<?php 
				/*
			     * Controla qué vista se va a mostrar en base a la localización (página actual) del usuario.
			     *
			     * NOTA: La localización se empieza a enviar a partir del primer intento de inicio de sesión del usuario.
			     *
			     * Autor: Santiago Huerga Bartolomé.
			     * Editado por: Pablo Mora Martín.
			     * Fecha de última modificación: 23/01/2017
			     */
			    $layout = "view/vInicio.php"; //Por defecto, se marca como layout la vista de inicio.

			    /*
			     * Si se ha indicado localización y si ésta existe en el array $vistas de config.php, se establecerá la vista
			     * correspondiente a esa localización
			     */
			    if (isset($_GET['location']) && isset($vistas[$_GET['location']])) {
			        $layout = $vistas[$_GET['location']];
			    }

			    //FInalmente, se muestra la vista elegida
			    include $layout;
			?>
		</main>
	</body>
</html>