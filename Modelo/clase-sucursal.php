<?php
	
	class Sucursal{

		private $idSucursal;
		private $nombre;
		private $direccion;
		private $telefono;
		private $correo;
		

		public function __construct($idSucursal, $nombre, $direccion, $telefono, $correo ){
			$this->idSucursal = $idSucursal;
			$this->nombre = $nombre;
			$this->direccion = $direccion;
			$this->telefono = $telefono;
			$this->correo = $correo;
	
		}

		public function getidSucursal(){
			return $this->idSucursal;
		}

		public function setidSucursal($idSucursal){
			$this->idSucursal = $idSucursal;
		}

		public function getnombre(){
			return $this->nombre;
		}

		public function setnombre($nombre){
			$this->nombre = $nombre;
		}

		public function getdireccion(){
			return $this->direccion;
		}

		public function setdireccion($direccion){
			$this->direccion = $direccion;
		}

		public function gettelefono(){
			return $this->telefono;
		}

		public function settelefono($telefono){
			$this->telefono = $telefono;
		}

	

		public function toString(){
			return "idSucursal: " . $this->idSucursal . 
				" nombre: " . $this->nombre . 
				" direccion: " . $this->direccion . 
				" telefono: " . $this->telefono . 
				" correo: " . $this->correo ;
		}

		public function add(){

		// specify params - MUST be a variable that can be passed by reference!
		$misParametros['nombre'] = $this->nombre;
		$misParametros['direccion'] = $this->direccion;
		$misParametros['telefono'] = $this->correo;
		$misParametros['correo'] = $this->correo;
		$misParametros['idSucursal'] = 0;
		$misParametros['Pcmensaje'] = 0 ;


		// Set up the proc params array - be sure to pass the param by reference
		$parametrosProcedimiento = array(
		array(&$misParametros['nombre'], SQLSRV_PARAM_IN),
  		array(&$misParametros['nombre'], SQLSRV_PARAM_IN),
  		array(&$misParametros['correo'], SQLSRV_PARAM_IN),
  		array(&$misParametros['telefono'], SQLSRV_PARAM_IN),
		array(&$misParametros['idSucursal'], SQLSRV_PARAM_OUT),
  		array(&$misParametros['Pcmensaje'], SQLSRV_PARAM_OUT)
		);



		// EXEC the procedure, {call stp_Create_Item (@Item_ID = ?, @Item_Name = ?)} seems to fail with various errors in my experiments
		// PREPERARA EL PROCEDIMIENTO
		$sql = "EXEC SP_ADD_SUCURSAL @nombre = ?, @direccion= ?, @correo= ?, @telefono= ?, @idSucursal= ?, @Pcmensaje = ?  ";

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
			return json_encode($misParametros);
		}else{
  			die( print_r( sqlsrv_errors(), true));
		}
	}
		public function edite(){

		}

		public static function remove($idSucursal){

		}


		public static function obtenerSucursal(){
			include_once 'conexion.php';

			$sql = "SELECT * FROM vw_sucursal";

			$resultado = $base_de_datos->prepare($sql);
			$resultado->execute();

			$tours = array();

			foreach ($resultado as $tour) {
				$tours[] = $tour; 
			}

			return json_encode($tours);
		}		

		

	}
?>

