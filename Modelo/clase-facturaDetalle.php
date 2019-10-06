<?php

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

	public function add(){
		
		include 'conexionP.php';
				// specify parame MUST be a variable that can be passed by reference!
		$misParametros['cantidad'] = $this->cantidad;
		$misParametros['idFacturaEncabezado'] = $this->idFacturaEncabezado;
		$misParametros['idLibro'] = $this->idLibro;
		$misParametros['idFacturaDetalle'] = 0;
		$misParametros['pcMensaje'] = 0 ;
		
				// Set up the proc params array - be sure to pass the param by reference
		$parametrosProcedimiento = array(
			array(&$misParametros['cantidad'], SQLSRV_PARAM_IN),
			array(&$misParametros['idFacturaEncabezado'], SQLSRV_PARAM_IN),
			array(&$misParametros['idLibro'], SQLSRV_PARAM_IN),
			array(&$misParametros['idFacturaDetalle'], SQLSRV_PARAM_OUT),
			array(&$misParametros['pcMensaje'], SQLSRV_PARAM_OUT),
		);


				// EXEC the procedure, {call stp_Create_Item (@Item_ID = ?, @Item_Name = ?)} seems to fail with various errors in my experiments
		// PREPERARA EL PROCEDIMIENTO
		$sql = "EXEC SP_ADD_FacturaDe @cantidad = ?, @idFacturaEncabezado= ?, @idLibro= ?, @idFacturaDetalle= ?, @pcMensaje= ?";

		$stmt = sqlsrv_prepare($conn, $sql, $parametrosProcedimiento);

		$stmt = sqlsrv_prepare($conn, $sql, $parametrosProcedimiento);


		if( !$stmt ) {
			die( print_r( sqlsrv_errors(), true));
		}

		if(sqlsrv_execute($stmt)){
			while($res = sqlsrv_next_result($stmt)){

			}

			$this->idFacturaDetalle = $misParametros['idFacturaDetalle'];

			return json_encode($misParametros);
		}else{
			die( print_r( sqlsrv_errors(), true));
		}
		
	}

	/*=============================================================*/




	public static function addPago($libro){

		include 'conexionP.php';
				// specify parame MUST be a variable that can be passed by reference!
		$misParametros['idLibro'] = $libro;
		$misParametros['idPago'] = 0;
		$misParametros['pcMensaje'] = 0 ;
		
				// Set up the proc params array - be sure to pass the param by reference
		$parametrosProcedimiento = array(
			array(&$misParametros['idLibro'], SQLSRV_PARAM_IN),
			array(&$misParametros['idPago'], SQLSRV_PARAM_OUT),
			array(&$misParametros['pcMensaje'], SQLSRV_PARAM_OUT),
		);


				// EXEC the procedure, {call stp_Create_Item (@Item_ID = ?, @Item_Name = ?)} seems to fail with various errors in my experiments
		// PREPERARA EL PROCEDIMIENTO
		$sql = "EXEC SP_ADD_PAGO @idLibro = ?, @idPago= ?,  @pcMensaje= ?";

		$stmt = sqlsrv_prepare($conn, $sql, $parametrosProcedimiento);

		$stmt = sqlsrv_prepare($conn, $sql, $parametrosProcedimiento);


		if( !$stmt ) {
			die( print_r( sqlsrv_errors(), true));
		}

		if(sqlsrv_execute($stmt)){
			while($res = sqlsrv_next_result($stmt)){

			}

			return $misParametros['idPago'];

		
		}else{
			die( print_r( sqlsrv_errors(), true));
		}

	}

	/*=============================================================*/

	public static function pagoFactura($pago, $idFacturaEncabezado){

		include 'conexionP.php';
				// specify parame MUST be a variable that can be passed by reference!
		$misParametros['idPago'] = $pago;
		$misParametros['idFacturaEncabezado'] = $idFacturaEncabezado;
		$misParametros['pcMensaje'] = 0 ;
		
				// Set up the proc params array - be sure to pass the param by reference
		$parametrosProcedimiento = array(
			array(&$misParametros['idPago'], SQLSRV_PARAM_IN),
			array(&$misParametros['idFacturaEncabezado'], SQLSRV_PARAM_IN),
			array(&$misParametros['pcMensaje'], SQLSRV_PARAM_OUT),
		);


				// EXEC the procedure, {call stp_Create_Item (@Item_ID = ?, @Item_Name = ?)} seems to fail with various errors in my experiments
		// PREPERARA EL PROCEDIMIENTO
		$sql = "EXEC SP_ADD_PAGOPORFAC @idPago = ?, @idFacturaEncabezado= ?,  @pcMensaje= ?";

		$stmt = sqlsrv_prepare($conn, $sql, $parametrosProcedimiento);

		$stmt = sqlsrv_prepare($conn, $sql, $parametrosProcedimiento);


		if( !$stmt ) {
			die( print_r( sqlsrv_errors(), true));
		}

		if(sqlsrv_execute($stmt)){
			while($res = sqlsrv_next_result($stmt)){

			}

			return json_encode($misParametros);

		
		}else{
			die( print_r( sqlsrv_errors(), true));
		}

	}


}


?>