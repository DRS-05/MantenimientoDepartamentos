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
		require_once "model/Departamento.php";
		$usuario=$_SESSION['usuario'];
		/*echo "<pre>";
		echo_r($_POST);
		echo_r($_SESSION['departamentosListados']);
		echo "</pre>";*/
		$departamentos = $_SESSION['departamentosListados'];

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
		<div class="tabla">
			<?php 				
				echo "<p>Registros de la tabla Departamento: </p>";
				
					
				if (!empty($departamentos)) {
					echo "<table border=2>";
					echo "<tr>";
					echo "<th>Código</th>";
					echo "<th>Descripción</th>";
					echo "<th>Eliminar Registro</th>";
					echo "<th>Modificar Registro</th>";
					echo "</tr>";
					echo "<tr>";
					foreach ($departamentos as $departamento) {
						$codDepartamento = $departamento->getCodDepartamento();
						$descDepartamento = $departamento->getDescDepartamento();

						echo "<td>".$codDepartamento."</td>"."<td>".$descDepartamento."</td>";
						echo "<td>";
						echo "<div id='borrar'><a href='index.php?location=borrarDepartamento&CodDepartamento=$codDepartamento'>Borrar</a></div>";
						echo "</td>";
						echo "<td>";
						echo "<div id='editar'><a href='index.php?location=borrarDepartamento&CodDepartamento=$codDepartamento'>Editar</a></div>";
						echo "</td>";
						echo "</tr>";
					}	

					echo "</table>";
			?>		
					<button class="button" onclick="window.location.href='index.php'">Volver</button>

			<?php

				} else {
			?>
					<p>Lo sentimos no se han encontrado resultados que coincidan con la busqueda, vuelva a intentarlo.</p>
					<form name="formVolver" action="index.php?location=indexDepartamento" method="post">
						<button type="submit" name="listar">Listar todos los departamentos</button>
					</form>
					<a href="javascript:window.location.href='index.php'">Volver Atrás</a>

			<?php
				}

			?>
		</div>
		</table>
	</body>
</html>