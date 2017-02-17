<?php
require_once "DepartamentoPDO.php";
class Departamento {
	//Atributos de la clase
	protected $codDepartamento;
	protected $descDepartamento;
	protected $volumenNegocio;


	public function __construct($codDepartamento,$descDepartamento) {
		$this->codDepartamento = $codDepartamento;
		$this->descDepartamento = $descDepartamento;
	}

	public static function buscarDepartamentos($descripcion) {
		$arrayDepartamentos = [];
		$departamentos = DepartamentoPDO::buscarDepartamentos($descripcion);

		foreach ($departamentos as $departamento) {
			//Creamos un objeto departamento por cada vuelta
			$departamentoObjeto = new Departamento($departamento['CodDepartamento'],$departamento['DescDepartamento']);
			//Introducir los datos en el arrayDepartamentos
			array_push($arrayDepartamentos, $departamentoObjeto);
		}

		return $arrayDepartamentos;
	}

	public static function insertarDepartamento($codigo,$descripcion) {
		$insertadoOk = false;
		$resultadoInsertar = DepartamentoPDO::insertarDepartamento($codigo,$descripcion);

		if ($resultadoInsertar) {
			$insertadoOk = true;
		}

		return $insertadoOk;
	}

	public static function borrarDepartamento($codigo) {
		$borradoOk = false;
		$resultadoBorrar = DepartamentoPDO::borrarDepartamento($codigo);

		if ($resultadoBorrar) {
			$borradoOk = true;
		}
		
		return $borradoOk;
	}

	public static function mostrarDepartamentos() {
		$arrayDepartamentos = [];
		$departamentos = DepartamentoPDO::mostrarDepartamentos();

		foreach ($departamentos as $departamento) {
			//Creamos un objeto departamento por cada vuelta
			$departamentoObjeto = new Departamento($departamento['CodDepartamento'],$departamento['DescDepartamento']);
			//Introducir los datos en el arrayDepartamentos
			array_push($arrayDepartamentos, $departamentoObjeto);
		}

		return $arrayDepartamentos;
	}

	public function getCodDepartamento() {
		return $this->codDepartamento;
	}

	public function getDescDepartamento() {
		return $this->descDepartamento;
	}

	
}
?>