<?php
/**
* Clase que ejecuta las consultas de la base de datos
* 
*
*Autor: David Romero
*/
	require_once 'UsuarioPDO.php';
	class Usuario {
		//Atributos de la clase
		private $codUsuario;
		private $descUsuario;
		private $password;
		private $perfil;
		private $ultimaConexion;
		private $contadorAccesos;

		public function __construct($codUsuario,$descUsuario,$password,$perfil,$ultimaConexion,$contadorAccesos){
			$this->codUsuario = $codUsuario;
			$this->descUsuario = $descUsuario;
			$this->password = $password;
			$this->perfil = $perfil;
			$this->ultimaConexion = $ultimaConexion;
			$this->contadorAccesos = $contadorAccesos;

		}

		function __destruct() {

		}

		public static function validarUsuario($codUsuario,$password){
			//Creamos la variable que guardará el objeto que vamos a crear
			$objUsuario = null;
			//Recibimos los datos del usuario por el metodo validar usuario de la clase UsuarioPDO y lo guardamos en un array
			$usuarioArray = UsuarioPDO::validarUsuario($codUsuario,$password);
			//Comprobamos si el array tiene parametros, no está vacío 
			if ($usuarioArray){
				//Si contiene algo se crea el objeto
				$objUsuario= new Usuario($codUsuario,$usuarioArray['descUsuario'],$password,$usuarioArray['perfil'],$usuarioArray['ultimaConexion'],$usuarioArray['contadorAccesos']);
			}

			return $objUsuario;//Devolvemos el objeto con los datos del usuario logeado.			
		}

		public function getCodUsuario(){
			return $this->codUsuario;
		}

		public function getDescUsuario(){
			return $this->descUsuario;
		}

		public function getPassword(){
			return $this->password;
		}

		public function getPerfil(){
			return $this->perfil;
		}

		public function getUltimaConexion(){
			return $this->ultimaConexion;
		}

		public function getContadorAccesos(){
			return $this->contadorAccesos;
		}
	}
?>