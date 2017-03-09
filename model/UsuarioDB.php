<?php
/**
 * Interfaz usuario.
 * 
 * Interfaz usuario.
 * 
 * @author David Romero
 */
	interface UsuarioDB{
		/**
     	* Valida el usuario.
	     *
	     * @param 	String 		$codUsuario 	Código del usuario.
	     * @param 	String 		$password 		Contraseña del usuario.
	     */
		public static function validarUsuario($codUsuario,$password);
	}
?>
