<?php
	

	class Vendedor{

		private $idVededor;
		private $idPersona;
		

		public function __construct($idVededor, $idPersona){
			$this->idVededor = $idVededor;
			$this->idPersona = $idPersona;
			
		}

		public function getidVededor(){
			return $this->idVededor;
		}

		public function setidVededor($idVededor){
			$this->idVededor = $idVededor;
		}

		public function getidPersona(){
			return $this->idPersona;
		}

		public function setidPersona($idPersona){
			$this->idPersona = $idPersona;
		}

		

		public function toString(){
			return "idVededor: " . $this->idVededor . 
				" idPersona: " . $this->idPersona ;
		}

		public function add(){
		// specify params - MUST be a variable that can be passed by reference!
		$misParametros['idEmpleado'] = $this->idEmpleado;
		$misParametros['idVendedor'] = 0;
		$misParametros['Pcmensaje'] = 0 ;


		// Set up the proc params array - be sure to pass the param by reference
		$parametrosProcedimiento = array(
		array(&$misParametros['idEmpleado'], SQLSRV_PARAM_IN),
		array(&$misParametros['idVendedor'], SQLSRV_PARAM_OUT),
  		array(&$misParametros['Pcmensaje'], SQLSRV_PARAM_OUT)
		);



		// EXEC the procedure, {call stp_Create_Item (@Item_ID = ?, @Item_Name = ?)} seems to fail with various errors in my experiments
		// PREPERARA EL PROCEDIMIENTO
		$sql = "EXEC SP_ADD_VENDEDOR @idEmpleado = ?, @idVendedor= ?, @Pcmensaje = ?  ";

		$stmt = sqlsrv_prepare($conn, $sql, $parametrosProcedimiento);

			if( !$stmt ) {
			die( print_r( sqlsrv_errors(), true));
			}

			if(sqlsrv_execute($stmt)){
  			while($res = sqlsrv_next_result($stmt)){
    		// make sure all result sets are stepped through, since the output params may not be set until this happens
  		}
 		 	// Output params are now set,
  			//print_r($params);
  			$this->idVendedor = misParametros['idVendedor'];
			return json_encode($misParametros);
		}else{
  			die( print_r( sqlsrv_errors(), true));
}

		}

		public function edite(){

		}

		public static function remove($idVededor){

		}
		public static function obtenerVendedor(){
			include_once 'conexion.php';

			$sql = "SELECT * FROM vw_infoVendedor";
			$res = $conexion->query($sql); 

			$datos = [];

    		foreach ($res as $row) {
        		$datos[] = $row;
    		}

    		return $datos;

		}

	}
?>
