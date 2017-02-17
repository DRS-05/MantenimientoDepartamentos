<?php
/**
 * Comprobar si el usuario introducido 
 * 
 * Autor: David Romero
 */
	
	require_once'DBPDO.php';
	require_once'UsuarioDB.php';
	class UsuarioPDO implements UsuarioDB {
		public static function validarUsuario($codUsuario,$password){
			//Creamos el array que devolveremos, lo inicializamos vacio
			$usuarioArray= [];
			$parametros=[$codUsuario,$password];//Creamos un array con los parametros a pasar a la consulta
			$consultaPreparada="select * from Usuario where codUsuario=? and password=?";//Creamos la consulta preparada
			//Ejecutamos la consulta
			$resultado=DBPDO::ejecutaConsulta($consultaPreparada,$parametros);
			//Comprobamos si la consulta nos devuelve algun resultado
			if ($resultado->rowCount()) {
				//Si devuelve resultados, solo puede devolver uno
				$usuario=$resultado->fetchObject();
				//Extraemos los datos y los guardamos en el array
				$usuarioArray['descUsuario']=$usuario->DescUsuario;
				$usuarioArray['perfil']=$usuario->Perfil;
				$usuarioArray['ultimaConexion']=$usuario->UltimaConexion;
				$usuarioArray['contadorAccesos']=$usuario->ContadorAccesos;
			}

			return $usuarioArray;//Devolvemos la salida de la funcion con el array de parametros
		}
	}
?>
