<?php

	class Persona{

		private $idPersona;
		private $PNombre;
		private $SNombre;
		private $PApellido;
		private $SApellido;
		private $direccion;
		private $numeroID;

		public function __construct($idPersona,$PNombre, $SNombre, $PApellido, $SApellido, $direccion, $numeroID){

			$this->idPersona = $idPersona;
			$this->PNombre = $PNombre;
			$this->SNombre = $SNombre;
			$this->PApellido = $PApellido;
			$this->SApellido = $SApellido;
			$this->direccion = $direccion;
			$this->numeroID = $numeroID;
		}
		public function getidPersona(){
			return $this->idPersona;
		}

		public function setidPersona($idPersona){
			$this->idPersona = $idPersona;
		}

		public function getPNombre(){
			return $this->PNombre;
		}

		public function setPNombre($PNombre){
			$this->PNombre = $PNombre;
		}

		public function getSNombre(){
			return $this->SNombre;
		}

		public function setSNombre($SNombre){
			$this->SNombre = $SNombre;
		}

		public function getPApellido(){
			return $this->PApellido;
		}

		public function setPApellido($PApellido){
			$this->PApellido = $PApellido;
		}

		public function getSApellido(){
			return $this->SApellido;
		}

		public function setSApellido($SApellido){
			$this->SApellido = $SApellido;
		}

		public function getdireccion(){
			return $this->direccion;
		}

		public function setdireccion($direccion){
			$this->direccion = $direccion;
		}

		public function getnumeroID(){
			return $this->numeroID;
		}

		public function setnumeroID($numeroID){
			$this->numeroID = $numeroID;
		}

		public function toString(){
			return "idPersona: " . $this->idPersona .
				"PNombre: " . $this->PNombre . 
				" SNombre: " . $this->SNombre . 
				" PApellido: " . $this->PApellido . 
				" SApellido: " . $this->SApellido . 
				" direccion: " . $this->direccion . 
				" numeroID: " . $this->numeroID;
		}

		public function add(){
			include_once 'conexionP.php';
			// specify params - MUST be a variable that can be passed by reference!
			$misParametros['PNombre'] = $this->PNombre;
			$misParametros['SNombre'] = $this->SNombre;
			$misParametros['PApellido'] = $this->PApellido;
			$misParametros['SApellido'] = $this->SApellido;
			$misParametros['direccion'] = $this->direccion;
			$misParametros['numerodeID'] = $this->numeroID;
			$misParametros['Pcmensaje'] = 0 ;
			$misParametros['idPersona'] = 0;


			// Set up the proc params array - be sure to pass the param by reference
			$parametrosProcedimiento = array(
  				array(&$misParametros['PNombre'], SQLSRV_PARAM_IN),
  				array(&$misParametros['SNombre'], SQLSRV_PARAM_IN),
  				array(&$misParametros['SApellido'], SQLSRV_PARAM_IN),
  				array(&$misParametros['SApellido'], SQLSRV_PARAM_IN),
  				array(&$misParametros['direccion'], SQLSRV_PARAM_IN),
  				array(&$misParametros['numerodeID'], SQLSRV_PARAM_IN),
  				array(&$misParametros['Pcmensaje'], SQLSRV_PARAM_OUT),
  				array(&$misParametros['idPersona'], SQLSRV_PARAM_OUT)
			);



			// EXEC the procedure, {call stp_Create_Item (@Item_ID = ?, @Item_Name = ?)} seems to fail with various errors in my experiments
			// PREPERARA EL PROCEDIMIENTO
			$sql = "EXEC SP_ADD_PERSONA @PNombre = ?, @SNombre= ?, @PApellido= ?, @SApellido= ?, @direccion= ?, @numerodeID= ?, @Pcmensaje = ?, @idPersona= ?  ";

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

  			
  				$this->idPersona = $misParametros['idPersona'];
  				return $misParametros;
			}else{
  				die( print_r( sqlsrv_errors(), true));
			}
		}

		public function edite(){

		}

		public static function remove($idPersona){

		}

		public static function obtenerUltmoId(){
			include_once 'conexion.php';

			$sql = "SELECT MAX(idPersona) FROM persona";
			$res = $conexion->query($sql); 

    		foreach ($res as $row) {
        		$dato = $row;
    		}

    		return $dato;

		}
	}		

?>