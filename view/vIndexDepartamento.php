<?php 
	require_once "model/Departamento.php";
	$usuario=$_SESSION['usuario'];
	/*echo "<pre>";
	print_r($_POST);
	print_r($_SESSION['usuario']);
	echo "</pre>";*/
	$departamentos = $_SESSION['departamentosListados'];

?>
	<div class="formularios">
		<div>
			<p>Realiza una busqueda de departamento por descripción</p>
			<form name="FormBusqueda" action="index.php?location=indexDepartamento" method="post">
				<label>Descripcion:</label>
				<input id="input" type="text" name="busqueda"/>
				<input  type="submit" name="buscar" value="Buscar">
			</form>
		</div>
		<div>
			<p>Añade un nuevo registro</p>
			<form name="FormInsertar" action="index.php?location=insertarDepartamento" method="post">
				<label id="label1">Código del Departamento</label>
				<div id="uno">
					<span>
						(*Deben ser tres caracteres alfabéticos.)
					</span>
				</div>
				<input id="input1" type="text" name="codigo" />
				<label id="label2">Descripción del Departamento:</label>
				<div id="dos">
					<span>(*No se permiten números ni caracteres especiales.)</span>
				</div>
				<input id="input2" type="text" name="descripcion" /></br>
				<input class="button" type="submit" name="insertar" value="Insertar Nuevo Registro"><br><br>
				</br>
			</form>
		</div>
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
					echo "<div id='editar'><a href='index.php?location=editarDepartamento&CodDepartamento=$codDepartamento'>Editar</a></div>";
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
				<form action="index.php?location=indexDepartamento" method="post">
					<button class="button" type="submit" name="listar">Listar Departamentos</button>
				</form>
				<button class="button" onclick="window.location.href='index.php'">Volver</button>

		<?php
			}

		?>
	</div>
	</table>
