<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="HTML5, CSS3, JavaScript"/>
		<meta name="viewport" content= "width=device-width, initial-scale=1.0, user-scalable=no"/>
		<meta name="author" content="David Romero"/>
		<!--<link rel="stylesheet" href="webroot/css/reset.css">-->
		<link rel="stylesheet" href="webroot/css/estilos.css">
		<title>Mantenimiento departamento MVC</title>
	</head>
	<body>
		<?php 
			require_once "model/Departamento.php";
		?>
		<header>
			<h1>MANTENIMIENTO DEPARTAMENTOS</h1>
		</header>
		<div>
			<p>Añade un nuevo registro</p>
			<form name="FormInsertar" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
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
		<?php 
		if (isset($_POST['enviar'])) {
		echo "patron";
		$patronCodigo="/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/";//Patron para el codigo
		$patronDescripcion="/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/";//Patron para la
		$EnvioOk=true;
		$codigo = strtoupper($_POST['codigo']);
		$descripcion = $_POST['descripcion'];
		/*Preguntamos si el campo codigo se relleno*/
		if(!empty(trim($codigo))){
			/*Si se relleno comprobamos el formato*/
			if(!preg_match($patronCodigo,$codigo) || strlen($codigo)!=3){
				/*Si no coincide con el patron y el numero de caracteres*/
				//$errores{"erroresInsert"}["errorCodigo"]='Solo se admiten 3 caracteres alfanumericos';//Guardo el error en el array de errores
				$EnvioOk=false;//Entrada a false
				$codigo="";//Limpiamos el campo
			}
			
		}else{
			/*Si no se rellena*/
			//$errores{"erroresInsert"}["errorCodigo"]='Rellena el campo!';//Guardo el error en el array de errores
			$EnvioOk=false;//Entrada a false
			$codigo="";//Limpiamos el campo
		}

		/*Preguntamos si se lleno el campo descripcion*/
		if(!empty(trim($descripcion))){
			/*Si se relleno comprobamos el formato*/
			if(preg_match($patronDescripcion,$descripcion) || strlen($descripcion)>50){
				//$errores{'erroresInsert'}['errorDescripcion']='No coincide con el patrón,solo caractéres alfabéticos, 50 caractéres como máximo';
				$EnvioOk=false;//Entrada false
				$descripcion="";//Limpiamos el campo
			} 

		} else{
			//$errores{'erroresInsert'}['errorDescripcion']='No se permite enviar valores vacios';//Guardo el error en el array de errores
			$EnvioOk=false;//Entrada false
			$descripcion="";//Limpiamos el campo
		}

		echo "$EnvioOk";

		/*Preguntamos si el formulario se envio correctamente*/
		if ($EnvioOk==true) {
			//Departamento::insertarDepartamento($codigo,$descripcion);
			$a = Departamento::insertarDepartamento($codigo,$descripcion);
			var_dump($a);
			echo "Envio Correcto";
			//$_SESSION['departamentosListados'] = Departamento::mostrarDepartamentos();
			//include $layout;
			//header("Refresh: 5; url=index.php?location=indexDepartamento");
		} else {
			echo "jajajajaja";
			$correcto = false;
			echo "Nooooooooo";
			//$_SESSION['insert'] = $correcto;
		
			//header("Refresh: 5; url=index.php?location=indexDepartamento");
		}

	}
		?>
	</body>
</html>