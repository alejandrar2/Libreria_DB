<?php


	class Jefe{

		private $idJefe;
		private $idEmpleado;
		private $usuario;
		private $contrasenia;
		

		public function __construct($idJefe,$idEmpleado, $usuario, $contrasenia){

			$this->pidJefe = $pidJefe;
			$this->idEmpleado = $idEmpleado;
			$this->usuario = $usuario;
			$this->contrasenia = $contrasenia;
			
		}
		public function getidJefe(){
			return $this->idJefe;
		}

		public function setidJefe($idJefe){
			$this->idJefe = $idJefe;
		}

		public function getidEmpleado(){
			return $this->idEmpleado;
		}

		public function setidEmpleado($idEmpleado){
			$this->idEmpleado = $idEmpleado;
		}

		public function getusuario(){
			return $this->usuario;
		}

		public function setusuario($usuario){
			$this->usuario = $usuario;
		}

		public function getcontrasenia(){
			return $this->contrasenia;
		}

		public function setcontrasenia($contrasenia){
			$this->contrasenia = $contrasenia;
		}


		public function toString(){
			return "idJefe: " . $this->idJefe .
				"idEmpleado: " . $this->idEmpleado . 
				" usuario: " . $this->usuario . 
				" contrasenia: " . $this->contrasenia ;
		}

		public function agregar(){
			
		}

		public function add(){

		}

		public function edite(){

		}

		public static function remove($idJefe){

		}

		public static function login($correo, $pass){
			include_once 'conexionP.php';
			// specify params - MUST be a variable that can be passed by reference!
		$misParametros['correo'] = $correo;
		$misParametros['contrasenia'] = $pass;
		$misParametros['idJefe'] = 0;
		$misParametros['pcMensaje'] = 0 ;


		// Set up the proc params array - be sure to pass the param by reference
		$parametrosProcedimiento = array(
  		array(&$misParametros['correo'], SQLSRV_PARAM_IN),
  		array(&$misParametros['contrasenia'], SQLSRV_PARAM_IN),
  		array(&$misParametros['idJefe'], SQLSRV_PARAM_OUT),
  		array(&$misParametros['pcMensaje'], SQLSRV_PARAM_OUT)
		);



		// EXEC the procedure, {call stp_Create_Item (@Item_ID = ?, @Item_Name = ?)} seems to fail with various errors in my experiments
		// PREPERARA EL PROCEDIMIENTO
		$sql = "EXEC SP_LOGIN @correo = ?, @contrasenia= ?, @idJefe= ?, @pcMensaje = ?";

		$stmt = sqlsrv_prepare($conn, $sql, $parametrosProcedimiento);

		if( !$stmt ) {
  			die( print_r( sqlsrv_errors(), true));
		}

		if(sqlsrv_execute($stmt)){
  			while($res = sqlsrv_next_result($stmt)){
    	// make sure all result sets are stepped through, since the output params may not be set until this happen
  			}
  		// Output params are now set,
  		//print_r($params);

			return json_encode($misParametros);
		}else{
  			die( print_r( sqlsrv_errors(), true));
		}

		}

		}
?>