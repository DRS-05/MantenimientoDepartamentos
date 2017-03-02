<?php 
require_once "model/Departamento.php";
$codigo = $_GET['CodDepartamento'];
$descripcion = $_GET['DescDepartamento'];

echo "<pre>";
print_r($_GET);
print_r($_SESSION);
print_r($_POST);
print_r($_SESSION['modificado']);
echo "</pre>";
?>
<?php 
/*if ($_SESSION['modificado']) {
	echo "La modificacion ha tenido exito";
} else {
*/
?>

<div class="formulario">
	<p>Edita el registro</p>
	<form action="<?php echo "index.php?location=editarDepartamento" ?>" method="POST">
		<label>Codigo:</label>
		<input type="text" name="codigo" value="<?php echo "$codigo" ?>" disabled />
		<label>Descripción del Departamento:</label>
		<input  type="text" name="descripcion" value="<?php echo "$descripcion" ?>"/>
		<input class="button1" type="submit" name="aceptar" value="Aceptar"/>
	</form>
	<button class="button1" onclick="window.location.href='index.php?location=indexDepartamento'">Cancelar</button>
</div>
<?php 
//}
?>
