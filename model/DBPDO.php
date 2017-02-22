<?php
/**
* Clase que ejecuta las consultas de la base de datos
* 
*
*Autor: David Romero
*/
	class DBPDO {
		const DSN='mysql:dbname=DAW205_DBDepartamento;host=localhost;charset=utf8';
		const USUARIO='DAW205';
		const PASS='paso';

		public static function ejecutaConsulta($sql,$parametros) {
			try{
				//Creamos el objeto de la conexion
				$conexion= new PDO(self::DSN,self::USUARIO,self::PASS);
				//Ejecutamos este metodo para que salten las excepciones
				$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//Creamos la variable donde se guardara la sentencia preparada que ejecutamos
				$sentenciaPreparada=$conexion->prepare($sql);
				//Ejecutamos la consulta y guardamos el resultado
				$sentenciaPreparada->execute($parametros); 
			}catch (PDOException $excepcion){
				$sentenciaPreparada ="Error: (".$excepcion->getCode().')'.$excepcion->getMessage();
			}

			unset ($conexion);

			return $sentenciaPreparada;

		}

	}
?>
