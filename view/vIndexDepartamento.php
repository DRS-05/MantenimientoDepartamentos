<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="HTML5, CSS3, JavaScript"/>
		<meta name="viewport" content= "width=device-width, initial-scale=1.0, user-scalable=no"/>
		<meta name="author" content="David Romero"/>
		<link rel="stylesheet" type="text/css" href="estilos.css" />
		<title>Mantenimiento Departamentos</title>
	</head>
	<body>
	<?php 
		$usuario=$_SESSION['usuario'];
	?>
		<div class="formularios">
			<form name="FormBusqueda" action="index.php?location=indexDepartamento" method="post">
				<label>Descripcion:</label>
				<input type="text" name="busqueda"/>
				<input class="button" type="submit" name="buscar" value="Buscar">
			</form>
			<form name="FormInsertar" action="index.php?location=editarDepartamento" method="post">
				<label>Código del Departamento</label>
				<div id="uno">
					<span>
						(*Deben ser tres caracteres alfabéticos.)
					</span>
				</div>
				<input type="text" name="codigo" />
				<label>Descripción del Departamento:</label>
				<div id="dos">
					<span>(*No se permiten números ni caracteres especiales.)</span>
				</div>
				<input type="text" name="descripcion" />
				<input class="button" type="submit" name="insertar" value="Insertar Nuevo Registro"><br><br>
				</br>
			</form>
		</div>

		<?php 
			
		?>
	</body>
</html>