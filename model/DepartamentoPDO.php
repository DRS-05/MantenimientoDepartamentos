<?php 

require_once"DBPDO.php";

class DepartamentoPDO {

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

	public static function insertarDepartamento($codigo,$descripcion) {
		$departamentoInsertado = false;
		$parametrosConsulta = [$codigo,$descripcion];
		$sentenciaSQL = "insert into Departamento values (?,?)";
		if (DBPDO::ejecutaConsulta($sentenciaSQL,$parametrosConsulta)) {
			$departamentoInsertado = true;
		}

		return $departamentoInsertado;
	}

	public static function modificarDepartamento($codigo,$descripcion) {
		$departamentoModificado = false;
		$parametrosConsulta = [$descripcion,$codigo];
		$sentenciaSQL = "update Departamento set DescDepartamento=? where CodDepartamento=?";
	
		if (DBPDO::ejecutaConsulta($sentenciaSQL,$parametrosConsulta)) {
			$departamentoModificado = true;
		}

		return $departamentoModificado;

	}

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