<?php
require_once "DepartamentoPDO.php";
class Departamento {
	//Atributos de la clase
	protected $codDepartamento;
	protected $descDepartamento;


	public function __construct($codDepartamento,$descDepartamento) {
		$this->codDepartamento = $codDepartamento;
		$this->descDepartamento = $descDepartamento;
	}

	public static function buscarDepartamento($descripcion) {
		$arrayDepartamentos = [];
		$departamentos = DepartamentoPDO::buscarDepartamento($descripcion);

		foreach ($departamentos as $departamento) {
			//Creamos un objeto departamento por cada vuelta
			$departamentoObjeto = new Departamento($departamento['CodDepartamento'],$departamento['DescDepartamento']);
			//Introducir los datos en el arrayDepartamentos
			array_push($arrayDepartamentos, $departamentoObjeto);
		}

		return $arrayDepartamentos;
	}

	public static function insertarDepartamento($codigo,$descripcion) {
		$departamentoObjeto = new Departamento($codigo,$descripcion);
		$resultadoInsertar = DepartamentoPDO::insertarDepartamento($codigo,$descripcion);

		return $resultadoInsertar;
	}

	public static function borrarDepartamento($codigo) {
		$borradoOk = DepartamentoPDO::borrarDepartamento($codigo);
		
		return $borradoOk;
	}


	/**
     * Modifica la descripción de un departamento a partir de su código.
     *
     * @param   String      $codigo         Código del departamento.
     * @param   String      $descripcion    Nueva descripción del departamento.
     * @return  boolean     $resultadoModificar       Concreta si la operación se ha realizado correctamente o no.
     */
    public static function modificarDepartamento($codigo, $descripcion) {
       $resultadoModificar = Departamento::modificarDepartamento($codigo,$descripcion);
       return $resultadoModificar;

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