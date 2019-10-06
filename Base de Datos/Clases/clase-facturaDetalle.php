<?php
	include 'clase-conexionPDO.php';

	class FacturaDetalle{

		private $idFacturaDetalle;
		private $cantidad;
		private $idFacturaEncabezado;
		private $idLibro;

		public function __construct($idFacturaDetalle, $cantidad, $idFacturaEncabezado,$idLibro){

			$this->idFacturaDetalle = $idFacturaDetalle;
			$this->cantidad = $cantidad;
			$this->idFacturaEncabezado = $idFacturaEncabezado;
			$this->idLibro = $idLibro;
		}
		
		public function getidFacturaDetalle(){
			return $this->idFacturaDetalle;
		}

		public function setidFacturaDetalle($idFacturaDetalle){
			$this->idFacturaDetalle = $idFacturaDetalle;
		}

		public function getcantidad(){
			return $this->cantidad;
		}

		public function setcantidad($cantidad){
			$this->cantidad = $cantidad;
		}

		public function getidFacturaEncabezado(){
			return $this->idFacturaEncabezado;
		}

		public function setidFacturaEncabezado($idFacturaEncabezado){
			$this->idFacturaEncabezado = $idFacturaEncabezado;
		}

		public function getidLibro(){
			return $this->idLibro;
		}

		public function setidLibro($idLibro){
			$this->idLibro = $idLibro;
		}


		public function toString(){
			return 
				" idFacturaDetalle: " . $this->idFacturaDetalle . 
				" cantidad: " . $this->cantidad . 
				" idFacturaEncabezado: " . $this->idFacturaEncabezado;
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

		public static function remove($idFacturaDetalle){

		}
?>