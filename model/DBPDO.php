<?php
/**
 * Conexión a la base de datos.
 * 
 * Conexión a la base de datos.
 * 
 * @author David Romero
 */
class DBPDO {
	const DSN ='mysql:dbname=DAW205_DBDepartamento;host=localhost;charset=utf8';
	const USUARIO='DAW205';
	const PASS='paso';
	
	/**
	 * Ejecuta una sentencia SQL.
	 * 
	 * @param 	String 			$sql 		Sentencia preparada SQL.
     * @param 	array[] 		$parametros 		Parámetros de la consulta.
     * @return 	PDOStatement 	$sentenciaPreparada 	Información del registro.
	*/
	public static function ejecutaConsulta($sql,$parametros) {
		try{
			//Creamos el objeto de la conexion
			$conexion= new PDO(self::DSN,self::USUARIO,self::PASS);
			//Ejecutamos este metodo para que salten las excepciones
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//Creamos la variable donde se guardara la sentencia preparada que ejecutamos
			$sentenciaPreparada = $conexion->prepare($sql);
			//Ejecutamos la consulta y guardamos el resultado
			$sentenciaPreparada->execute($parametros); 
		}catch (PDOException $excepcion){
			$sentenciaPreparada = null;

		} finally {
			unset ($conexion);//Cerramos la conexión
		}

		return $sentenciaPreparada;
	}

}
?>
