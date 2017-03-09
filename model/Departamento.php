<?php
require_once "DepartamentoPDO.php";
/**
 * Departamentos que hay en la aplicación.
 * 
 * Departamentos que hay en la aplicación.
 * 
 * @author David Romero
 */
class Departamento {
	//Atributos de la clase
	protected $codDepartamento;
	protected $descDepartamento;

	/**
     * Constructor.
     *
     * @param   String      $codDepartamento         Código del departamento.
     * @param   String      $descDepartamento        Descripción del departamento.
     */
	public function __construct($codDepartamento,$descDepartamento) {
		$this->codDepartamento = $codDepartamento;
		$this->descDepartamento = $descDepartamento;
	}

	/**
     * Busca departamentos a partir de su descripción.
     *
     * @param   String      $descripcion            Descripción del departamento.
     * @return  array[]     $arrayDepartamentos     Array que contiene los departamentos encontrados.
     */
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

	/**
     * Inserta un departamento a partir de su código y descripción.
     *
     * @param   String      $codigo         Código del departamento.
     * @param   String      $descripcion    Descripción del departamento.
     * @return  boolean     $resultadoInsertar  Concreta si la operación se ha realizado correctamente o no.
     */
	public static function insertarDepartamento($codigo,$descripcion) {
		$departamentoObjeto = new Departamento($codigo,$descripcion);
		$resultadoInsertar = DepartamentoPDO::insertarDepartamento($codigo,$descripcion);

		return $resultadoInsertar;
	}

	/**
     * Borra un departamento a partir de su código.
     *
     * @param   String      $codigo         Código del departamento.
     * @return  boolean     $borradoOk       Concreta si la operación se ha realizado correctamente o no.
     */
	public static function borrarDepartamento($codigo) {
		$borradoOk = DepartamentoPDO::borrarDepartamento($codigo);
		
		return $borradoOk;
	}


	/**
     * Modifica la descripción de un departamento a partir de su código.
     *
     * @param   String      $codigo         Código del departamento.
     * @param   String      $descripcion    Nueva descripción del departamento.
     * @return  boolean     $modificadoOk       Concreta si la operación se ha realizado correctamente o no.
     */
    public static function modificarDepartamento($codigo, $descripcion) {
       $modificadoOk = DepartamentoPDO::modificarDepartamento($codigo,$descripcion);
       return $modificadoOk;

    }

    /**
     * Mostrar todos los departamentos.
     *
     * @return  array[]     $arrayDepartamentos     Array que contiene los departamentos encontrados.
     * 
     */
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

	/**
     * Devuelve el código de un departamento.
     *
     * @return  String     $this->codDepartamento      Código del departamento.
     */
	public function getCodDepartamento() {
		return $this->codDepartamento;
	}

	/**
     * Devuelve la descripción de un departamento.
     *
     * @return  String     $this->descDepartamento      Descripción del departamento.
     */
	public function getDescDepartamento() {
		return $this->descDepartamento;
	}

	
}
?>