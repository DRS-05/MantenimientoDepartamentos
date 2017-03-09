<?php 

require_once"DBPDO.php";
/**
 * Operacaciones de los departamentos.
 * 
 * Operacaciones de los departamentos.
 * 
 * @author Pablo Domínguez Navarro
 */
class DepartamentoPDO {
	/**
     * Busca departamentos a partir de su descripción.
     *
     * @param   String      $descripcion            Descripción del departamento.
     * @return  array[]     $arrayDepartamentos     Array que contiene los departamentos encontrados.
     */
	public static function buscarDepartamento($descripcion) {
		$arrayDepartamentos = [];
		$parametrosConsulta = ["%$descripcion%"];
		$sentenciaPreparada = "select * from Departamento where DescDepartamento like ?";

		$resultadoConsulta=DBPDO::ejecutaConsulta($sentenciaPreparada,$parametrosConsulta);
		if ($resultadoConsulta->rowCount()) {
			$arrayDepartamentos = $resultadoConsulta->fetchAll();
		}

		return $arrayDepartamentos;
	}

	/**
     * Inserta un departamento a partir de su código y descripción.
     *
     * @param   String      $codigo         Código del departamento.
     * @param   String      $descripcion    Descripción del departamento.
     * @return  boolean     $departamentoInsertado       Concreta si la operación se ha realizado correctamente o no.
     */
	public static function insertarDepartamento($codigo,$descripcion) {
		$departamentoInsertado = false;
		$parametrosConsulta = [$codigo,$descripcion];
		$sentenciaSQL = "insert into Departamento values (?,?)";
		if (DBPDO::ejecutaConsulta($sentenciaSQL,$parametrosConsulta)) {
			$departamentoInsertado = true;
		}

		return $departamentoInsertado;
	}

	/**
     * Modifica la descripción de un departamento a partir de su código.
     *
     * @param   String      $codigo         Código del departamento.
     * @param   String      $descripcion    Nueva descripción del departamento.
     * @return  boolean     $departamentoModificado       Concreta si la operación se ha realizado correctamente o no.
     */
	public static function modificarDepartamento($codigo,$descripcion) {
		$departamentoModificado = false;
		$parametrosConsulta = [$descripcion,$codigo];
		$sentenciaSQL = "update Departamento set DescDepartamento=? where CodDepartamento=?";
	
		if (DBPDO::ejecutaConsulta($sentenciaSQL,$parametrosConsulta)) {
			$departamentoModificado = true;
		}

		return $departamentoModificado;

	}

	/**
     * Borra un departamento a partir de su código.
     *
     * @param   String      $codigo         Código del departamento.
     * @return  boolean     $departamentoBorrado       Concreta si la operación se ha realizado correctamente o no.
     */
	public static function borrarDepartamento($codigo) {
		$departamentoBorrado = false;
		$parametrosConsulta =[$codigo];
		$sentenciaBorrado= "delete from Departamento where CodDepartamento=?";
		$resultadoBorrado = DBPDO::ejecutaConsulta($sentenciaBorrado,$parametrosConsulta);

		if ($resultadoBorrado) {
			$departamentoBorrado = true;
		}

		return $departamentoBorrado;
	}

	/**
     * Mostrar todos los departamentos.
     *
     * @return  array[]     $arrayDepartamentos     Array que contiene los departamentos encontrados.
     * 
     */
	public static function mostrarDepartamentos(){
		$arrayDepartamentos = [];
		$sql = "select * from Departamento";
		$resultadoSQL = DBPDO::ejecutaConsulta($sql,null);
		if ($resultadoSQL->rowCount()) {
			$arrayDepartamentos = $resultadoSQL->fetchAll();
		}
		

		return $arrayDepartamentos;
	}



	
}
?>