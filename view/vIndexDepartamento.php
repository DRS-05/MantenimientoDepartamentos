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
				$departamentos = Departamento::mostrarDepartamentos(null);
				echo "<p>Registros de la tabla Departamento</p>";
				print "<table>";
				print "<tr>";
				print "<th>Código</th>";
				print "<th>Descripción</th>";
				print "<th>Eliminar Registro</th>";
				print "<th>Modificar Registro</th>";
				print "</tr>";
				print "<tr>";
				
				foreach ($departamentos as $departamento) {
					$codDepartamento = $departamento->getCodDepartamento();
					$descDepartamento = $departamento->getDescDepartamento();

					print "<td>".$codDepartamento."</td>"."<td>".$descDepartamento."</td>";
					print "<td>";
					print "<div id='borrar'><a href='index.php?location=borrarDepartamento&CodDepartamento=$codDepartamento'>Borrar</a></div>";
					print "</td>";
					print "<td>";
					print "<div id='editar'><a href='index.php?location=borrarDepartamento&CodDepartamento=$codDepartamento'>Editar</a></div>";
					print "</td>";
					print "</tr>";
				}	

				print "</table>";

			?>
		</div>
		</table>
	</body>
</html>