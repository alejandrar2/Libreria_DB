<?php

	class Cliente{

		private $idCliente;
		private $idPersona;
		

		public function __construct($idCliente, $idPersona){
			$this->idCliente = $idCliente;
			$this->idPersona = $idPersona;
			
		}

		public function getidCliente(){
			return $this->idCliente;
		}

		public function setidCliente($idCliente){
			$this->idCliente = $idCliente;
		}

		public function getidPersona(){
			return $this->idPersona;
		}

		public function setidPersona($idPersona){
			$this->idPersona = $idPersona;
		}

		

		public function toString(){
			return "idCliente: " . $this->idCliente . 
				" idPersona: " . $this->idPersona ;
		}

		public function add(){

			include_once 'conexionP.php';


			$misParametros['persona'] = $this->idPersona;
			$misParametros['mensaje'] = " ";
			

			// Set up the proc params array - be sure to pass the param by reference
			$parametrosProcedimiento = array(
				array(&$misParametros['persona'], SQLSRV_PARAM_IN),
				array(&$misParametros['mensaje'], SQLSRV_PARAM_OUT)
			);

			// EXEC the procedure, {call stp_Create_Item (@Item_ID = ?, @Item_Name = ?)} seems to fail with various errors in my experiments	
			// PREPERARA EL PROCEDIMIENTO

			// specify params - MUST be a variable that can be passed by reference!
			$myparams['IdPersona'] = intval($this->idPersona);
			$myparams['pcMensaje'] = 0;

			// Set up the proc params array - be sure to pass the param by reference
			$procedure_params = array(
				array(&$myparams['IdPersona'], SQLSRV_PARAM_IN),
				array(&$myparams['pcMensaje'], SQLSRV_PARAM_OUT)
			);

			// EXEC the procedure, {call stp_Create_Item (@Item_ID = ?, @Item_Name = ?)} seems to fail with various errors in my experiments		

			$sql = "EXEC SP_CLIENTE @IdPersona = ?, @pcMensaje = ?";

			$stmt = sqlsrv_prepare($conn, $sql, $procedure_params);

			if( !$stmt ) {
				die( print_r( sqlsrv_errors(), true));
			}


			if(sqlsrv_execute($stmt)){	
				while($res = sqlsrv_next_result($stmt)){
				// make sure all result sets are stepped through, since the output 
				//params may not be set until this happens
  				}
 			 	echo json_encode($misParametros);

			if(sqlsrv_execute($stmt)){
  				while($res = sqlsrv_next_result($stmt)){
    			// make sure all result sets are stepped through, since the output params may not be set until this happens
  				}
  				// Output params are now set,
  				//print_r($params);
  				//print_r($myparams);
  				return json_encode($myparams);

			}else{
  				die( print_r( sqlsrv_errors(), true));
			}

		}

	}
			
		public static function obtenerCliente(){
				include_once 'conexion.php';

				$sql = "SELECT * FROM vista_clientes";
				$res = $base_de_datos->query($sql); 

				$datos = [];

    			foreach ($res as $row) {
        			$datos[] = $row;
    			}

    			return json_encode($datos);

		}

		public static function infoCliente(){
				include_once 'conexion.php';

				$sql = "SELECT * FROM v_cliente";
				$res = $base_de_datos->query($sql); 

				$datos = [];

    			foreach ($res as $row) {
        			$datos[] = $row;
    			}

    			return json_encode($datos);

		}	


		}

		
		
?>