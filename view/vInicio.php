<?php 
/**
* Vista que aparece una vez que estemos logueados
*
*Autor: David Romero
*/
//Recibimos el usuario a traves de la variable superglobal session
$usuario = $_SESSION['usuario'];

?>
<h1>Bienvenido a la aplicación <?php echo $usuario->getDescUsuario();?></h1>
<p>A continuación podrá acceder al código fuente de cada uno de los archivos, cerrar su sesión de usuario o acceder al mantenimiento de los departamentos</p>
<!--Boton para acceder a la aplicación -->
<form action="index.php?location=indexDepartamento" method="post">
	<button type="submit" name="acceso">Ir al Mantenimiento</button>
</form>

<!--Boton para volver al login-->
<form action="index.php?location=inicio" method="post">
	<button type="submit" name="salir" value="salir">Cerrar Sesión</button>
</form>
<!--Caja con los enlaces a los códigos fuente -->
<div class="codigos_fuente">
	<ul>
		<li><a href="doc/mostrar_DBPDO.php">DBPDO.php</a></li>
		<li><a href="doc/mostrar_UsuarioDB.php">UsuarioDB.php</a></li>
		<li><a href="doc/mostrar_UsuarioPDO.php">UsuarioPDO.php</a></li>
		<li><a href="doc/mostrar_Usuario.php">Usuario.php</a></li>
		<li><a href="doc/mostrar_DepartamentoPDO.php">DepartamentoPDO.php</a></li>
		<li><a href="doc/mostrar_Departamento.php">Departamento.php</a></li>
		<li><a href="doc/mostrar_layout.php">layout.php</a></li>
		<li><a href="doc/mostrar_vInicio.php">vIncio.php</a></li>
		<li><a href="doc/mostrar_vLogin.php">vLogin.php</a></li>
		<li><a href="doc/mostrar_vIndexDepartamento.php">vIndexDepartamento.php</a></li>
		<li><a href="doc/mostrar_vBorrarDepartamento.php">vBorrarDepartamento.php</a></li>
		<li><a href="doc/mostrar_vEditarDepartamento.php">vEditarDepartamento.php</a></li>
		<li><a href="doc/mostrar_vInsertarDepartamento.php">vInsertarDepartamento.php</a></li>
		<li><a href="doc/mostrar_cInicio.php">cInicio.php</a></li>
		<li><a href="doc/mostrar_cLogin.php">cLogin.php</a></li>
		<li><a href="doc/mostrar_cIndexDepartamento.php">cIndexDepartamento.php</a></li>
		<li><a href="doc/mostrar_cBorrarDepartamento.php">cBorrarDepartamento.php</a></li>
		<li><a href="doc/mostrar_cEditarDepartamento.php">cEditarDepartamento.php</a></li>
		<li><a href="doc/mostrar_cInsertarDepartamento.php">cInsertarDepartamento.php</a></li>
		<li><a href="doc/mostrar_index.php">index.php</a></li>
	</ul>
</div>
