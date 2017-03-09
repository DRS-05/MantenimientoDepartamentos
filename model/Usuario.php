<?php
require_once 'UsuarioPDO.php';
/**
 * Usuario que se va a loguear
 * 
 * Usuario que se va a loguear
 * 
 * @author David Romero
 */
	
	class Usuario {
		//Atributos de la clase
		private $codUsuario;
		private $descUsuario;
		private $password;
		private $perfil;
		private $ultimaConexion;
		private $contadorAccesos;

		/**
     	* Constructor.
     	*
     	* @param   String      $codUsuario         Código del usuario.
     	* @param   String      $descUsuario        Descripción del usuario.
     	* @param   String      $password           Contraseña del usuario.
     	* @param   String      $perfil             Perfil del usuario.
     	* @param   String      $ultimaConexion     Última conexión del usuario.
     	* @param   String      $contadorAccesos    Contador de accesos del usuario.
     	*/
		public function __construct($codUsuario,$descUsuario,$password,$perfil,$ultimaConexion,$contadorAccesos){
			$this->codUsuario = $codUsuario;
			$this->descUsuario = $descUsuario;
			$this->password = $password;
			$this->perfil = $perfil;
			$this->ultimaConexion = $ultimaConexion;
			$this->contadorAccesos = $contadorAccesos;

		}


		/**
     	* Comprueba que el usuario que se va a loguear existe.
     	*
	 	* @param   String      $codUsuario         Código del usuario.
    	* @param   String      $password           Contraseña del usuario.
     	* @return  Usuario     $objUsuario      Usuario que se ha logueado.
     	*/
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

		/**
	     * Devuelve el código de un departamento.
	     *
	     * @return  String     $this->codUsuario      Código del departamento.
	     */
		public function getCodUsuario(){
			return $this->codUsuario;
		}

		/**
	     * Devuelve el código de un departamento.
	     *
	     * @return  String     $this->descUsuario      Descripción del departamento.
	     */
		public function getDescUsuario(){
			return $this->descUsuario;
		}

		/**
	     * Devuelve el código de un departamento.
	     *
	     * @return  String     $this->password      Descripción del departamento.
	     */
		public function getPassword(){
			return $this->password;
		}

		/**
	     * Devuelve el código de un departamento.
	     *
	     * @return  String     $this->perfil      Descripción del departamento.
	     */
		public function getPerfil(){
			return $this->perfil;
		}

		/**
	     * Devuelve el código de un departamento.
	     *
	     * @return  String     $this->ultimaConexion      Descripción del departamento.
	     */
		public function getUltimaConexion(){
			return $this->ultimaConexion;
		}

		/**
	     * Devuelve el código de un departamento.
	     *
	     * @return  String     $this->contadorAccesos      Descripción del departamento.
	     */
		public function getContadorAccesos(){
			return $this->contadorAccesos;
		}
	}
?>