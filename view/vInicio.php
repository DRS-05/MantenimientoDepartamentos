<?php 
/**
* Vista que aparece una vez que estemos logueados
*
*Autor: David Romero
*/
//Recibimos el usuario a traves de la variable superglobal session
$usuario = $_SESSION['usuario'];
//$departamentos = $_SESSION['departamentosListados'];
?>
<h1>Bienvenido a la aplicación <?php echo $usuario->getDescUsuario();?></h1>
<p>A continuación podrá acceder al código fuente de cada uno de los archivos, cerrar su sesión de usuario o acceder al mantenimiento de los departamentos</p>
<!--Caja con los enlaces a los códigos fuente -->
<div class="codigos_fuente">
	<a href="">DBPDO.php</a>
	<a href="">UsuarioDB.php</a>
	<a href="">UsuarioPDO.php</a>
	<a href="">Usuario.php</a>
	<a href="">DepartamentoPDO.php</a>
	<a href="">Departamento.php</a>
	<a href="">layout.php</a>
	<a href="">vIncio.php</a>
	<a href="">vLogin.php</a>
	<a href="">vIndexDepartamento.php</a>
	<a href="">vBorrarDepartamento.php</a>
	<a href="">vEditarDepartamento.php</a>
	<a href="">cInicio.php</a>
	<a href="">cLogin.php</a>
	<a href="">cIndexDepartamento.php</a>
	<a href="">cBorrarDepartamento.php</a>
	<a href="">cEditarDepartamento.php</a>
</div>
<!--Boton para acceder a la aplicación -->
<form action="index.php?location=indexDepartamento" method="post">
	<button type="submit" name="acceso">Ir al Mantenimiento</button>
</form>

<!--Boton para volver al login-->
<form action="index.php?location=inicio" method="post">
	<button type="submit" name="salir" value="salir">Cerrar Sesión</button>
</form>