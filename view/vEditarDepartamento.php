<?php 
require_once "model/Departamento.php";
$codigo = $_GET['CodDepartamento'];
$descripcion = $_GET['DescDepartamento'];

/*echo "<pre>";
print_r($_GET);
print_r($_SESSION);
print_r($_POST);
print_r($_SESSION['modificado']);
echo "</pre>";*/
?>

<div class="formulario">
	<p>Edita el registro</p>
	<form action="<?php echo "index.php?location=editarDepartamento&CodDepartamento=$codigo "?>" method="POST">
		<label>Codigo:</label>
		<input type="text" name="CodDepartamento" value="<?php echo "$codigo" ?>" disabled />
		<label>Descripción del Departamento:</label>
		<input  type="text" name="DescDepartamento" value="<?php echo "$descripcion" ?>"/>
		<input class="button1" type="submit" name="aceptar" value="Aceptar"/>
	</form>
	<button class="button1" onclick="window.location.href='index.php?location=indexDepartamento'">Cancelar</button>
</div>

