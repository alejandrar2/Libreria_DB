<?php

	class Factura{

		private $idFacturaEncabezado;
		private $idCliente;
		private $idVendedor;
		private $fecha;

		public function __construct($idFacturaEncabezado,$idCliente, $idVendedor, $fecha){

			$this->pidFacturaEncabezado = $pidFacturaEncabezado;
			$this->idCliente = $idCliente;
			$this->idVendedor = $idVendedor;
			$this->fecha = $fecha;
		}
		public function getidFacturaEncabezado(){
			return $this->idFacturaEncabezado;
		}

		public function setidCliente($idFacturaEncabezado){
			$this->idFacturaEncabezado = $idFacturaEncabezado;
		}

		public function getidCliente(){
			return $this->idCliente;
		}

		public function setidCliente($idCliente){
			$this->idCliente = $idCliente;
		}

		public function getidVendedor(){
			return $this->idVendedor;
		}

		public function setidVendedor($idVendedor){
			$this->idVendedor = $idVendedor;
		}

		public function getfecha(){
			return $this->fecha;
		}

		public function setfecha($fecha){
			$this->fecha = $fecha;
		}


		public function toString(){
			return "idFacturaEncabezado: " . $this->idFacturaEncabezado .
				"idCliente: " . $this->idCliente . 
				" idVendedor: " . $this->idVendedor . 
				" fecha: " . $this->fecha ;
		}

		public function addFacturaDetalle(){
		
			include 'conexionP.php';
			// specify parame MUST be a variable that can be passed by reference!
			$misParametros['cantidad'] = $cantidad;
			$misParametros['fechafinidCliente'] = $this->fechafinidCliente;
			$misParametros['descripcion'] = $this->descripcion;
			$misParametros['idAdministrador'] = $this->idAdministrador;
			$misParametros['idLibro'] = $this->idLibro;
			$misParametros['idVendedor'] = 0;
			$misParametros['pcmensaje'] = 0 ;
	
	
	
	
			// Set up the proc params array - be sure to pass the param by reference
			$parametrosProcedimiento = array(
			array(&$misParametros['cantidad'], SQLSRV_PARAM_IN),
			  array(&$misParametros['fechafinidCliente'], SQLSRV_PARAM_IN),
			  array(&$misParametros['descripcion'], SQLSRV_PARAM_IN),
			  array(&$misParametros['idAdministrador'], SQLSRV_PARAM_IN),
			array(&$misParametros['idLibro'], SQLSRV_PARAM_IN),
			array(&$misParametros['idVendedor'], SQLSRV_PARAM_OUT),
			array(&$misParametros['pcmensaje'], SQLSRV_PARAM_OUT)
			);


			// EXEC the procedure, {call stp_Create_Item (@Item_ID = ?, @Item_Name = ?)} seems to fail with various errors in my experiments
	// PREPERARA EL PROCEDIMIENTO
	$sql = "EXEC SP_ADD_REGISTRO @cantidad = ?, @fechafinidCliente= ?, @descripcion= ?, @idAdministrador= ?, @idLibro= ?, @idVendedor= ?, @pcMensaje = ?  ";

	$stmt = sqlsrv_prepare($conn, $sql, $parametrosProcedimiento);
	
		}

		public function edite(){

		}

		public static function remove($idFacturaEncabezado){

		}
?>