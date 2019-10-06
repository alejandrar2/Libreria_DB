<?php

	class Registro{

		private $idregistro;
		private $fechainicio;
		private $fechafin;
		private $idCliente;
		private $idAdministrador;
		private $estado;
		private $multa;

		public function __construct($idregistro,$fechainicio, $fechafin, $idCliente, $idAdministrador, $estado, $multa){

			$this->idregistro = $idregistro;
			$this->fechainicio = $fechainicio;
			$this->fechafin = $fechafin;
			$this->idCliente = $idCliente;
			$this->idAdministrador = $idAdministrador;
			$this->estado = $estado;
			$this->multa = $multa;
		}
		public function getidregistro(){
			return $this->idregistro;
		}

		public function setidregistro($idregistro){
			$this->idregistro = $idregistro;
		}

		public function getfechainicio(){
			return $this->fechainicio;
		}

		public function setfechainicio($fechainicio){
			$this->fechainicio = $fechainicio;
		}

		public function getfechafin(){
			return $this->fechafin;
		}

		public function setfechafin($fechafin){
			$this->fechafin = $fechafin;
		}

		public function getidCliente(){
			return $this->idCliente;
		}

		public function setidCliente($idCliente){
			$this->idCliente = $idCliente;
		}

		public function getidAdministrador(){
			return $this->idAdministrador;
		}

		public function setidAdministrador($idAdministrador){
			$this->idAdministrador = $idAdministrador;
		}

		public function getestado(){
			return $this->estado;
		}

		public function setestado($estado){
			$this->estado = $estado;
		}

		public function getmulta(){
			return $this->multa;
		}

		public function setmulta($multa){
			$this->multa = $multa;
		}

		public function toString(){
			return "idregistro: " . $this->idregistro .
				"fechainicio: " . $this->fechainicio . 
				" fechafin: " . $this->fechafin . 
				" idCliente: " . $this->idCliente . 
				" idAdministrador: " . $this->idAdministrador . 
				" estado: " . $this->estado . 
				" multa: " . $this->multa;
		}

		public function addRegistro($idLibro){
		

		include 'conexionP.php';
		// specify parame MUST be a variable that can be passed by reference!
		$misParametros['idLibro'] = $idLibro;
		$misParametros['fechafin'] = $this->fechafin;
		$misParametros['idCliente'] = $this->idCliente;
		$misParametros['idAdministrador'] = $this->idAdministrador;
		$misParametros['estado'] = $this->estado;
		$misParametros['idregistro'] = 0;
		$misParametros['pcmensaje'] = 0 ;




		// Set up the proc params array - be sure to pass the param by reference
		$parametrosProcedimiento = array(
		array(&$misParametros['idLibro'], SQLSRV_PARAM_IN),
  		array(&$misParametros['fechafin'], SQLSRV_PARAM_IN),
  		array(&$misParametros['idCliente'], SQLSRV_PARAM_IN),
  		array(&$misParametros['idAdministrador'], SQLSRV_PARAM_IN),
		array(&$misParametros['estado'], SQLSRV_PARAM_IN),
		array(&$misParametros['idregistro'], SQLSRV_PARAM_OUT),
		array(&$misParametros['pcmensaje'], SQLSRV_PARAM_OUT)
		);




		// EXEC the procedure, {call stp_Create_Item (@Item_ID = ?, @Item_Name = ?)} seems to fail with various errors in my experiments
		// PREPERARA EL PROCEDIMIENTO
		$sql = "EXEC SP_ADD_REGISTRO @idLibro = ?, @fechafin= ?, @idCliente= ?, @idAdministrador= ?, @estado= ?, @idregistro= ?, @pcMensaje = ?  ";

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
  		$this->idregistro = $misParametros["idregistro"]; 
		return json_encode($misParametros);
			}else{
  		die( print_r( sqlsrv_errors(), true));
		}

		}

		public function edite(){

		}

		public static function remove($idregistro){

		}


		public static function obtenerRegistro(){
			include_once 'conexion.php';

			$sql = "SELECT * FROM vista_registro";
			$res = $base_de_datos->query($sql); 

			$datos = [];

    		foreach ($res as $row) {
        		$datos[] = $row;
    		}

    		return json_encode($datos);

		}


			
    }

?>