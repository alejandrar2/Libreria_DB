<?php

	class Empleado{

		private $idEmpleado;
		private $idPersona;
		

		public function __construct($idEmpleado, $idPersona){
			$this->idEmpleado = $idEmpleado;
			$this->idPersona = $idPersona;
			
		}

		public function getidEmpleado(){
			return $this->idEmpleado;
		}

		public function setidEmpleado($idEmpleado){
			$this->idEmpleado = $idEmpleado;
		}

		public function getidPersona(){
			return $this->idPersona;
		}

		public function setidPersona($idPersona){
			$this->idPersona = $idPersona;
		}

		

		public function toString(){
			return "idEmpleado: " . $this->idEmpleado . 
				" idPersona: " . $this->idPersona ;
		}

		public function add(){

			include_once 'conexionP.php';
			// specify params - MUST be a variable that can be passed by reference!
		$misParametros['idPersona'] = $this->idPersona;
		$misParametros['idEmpleado'] = 0;
		$misParametros['PcMensaje'] = 0 ;


		// Set up the proc params array - be sure to pass the param by reference
		$parametrosProcedimiento = array(
  		array(&$misParametros['idPersona'], SQLSRV_PARAM_IN),
  		array(&$misParametros['idEmpleado'], SQLSRV_PARAM_OUT),
  		array(&$misParametros['PcMensaje'], SQLSRV_PARAM_OUT)
		);



		// EXEC the procedure, {call stp_Create_Item (@Item_ID = ?, @Item_Name = ?)} seems to fail with various errors in my experiments
		// PREPERARA EL PROCEDIMIENTO
		$sql = "EXEC SP_ADD_Empleado @idPersona = ?, @idEmpleado= ?, @PcMensaje = ?";

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
  			$this->idEmpleado = $misParametros['idEmpleado'];
			return json_encode($misParametros);
		}else{
  			die( print_r( sqlsrv_errors(), true));
		}

		}

		public function edite(){

		}

		public static function remove($idEmpleado){

		}

		public static function obtenerLibro(){
			include_once 'conexion.php';

			$sql = "SELECT * FROM vw_infoempleado";
			$res = $conexion->query($sql); 

			$datos = [];

    		foreach ($res as $row) {
        		$datos[] = $row;
    		}

    		return $datos;

		}

}


?>