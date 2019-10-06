<?php

class Factura{

	private $idFacturaEncabezado;
	private $idCliente;
	private $idVendedor;
	private $fecha;

	public function __construct($idFacturaEncabezado,$idCliente, $idVendedor, $fecha){

		$this->idFacturaEncabezado = $idFacturaEncabezado;
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

	public function getidVendedor(){
		return $this->idVendedor;
	}

	public function getfecha(){
		return $this->fecha;
	}

	public function setfecha($fecha){
		$this->fecha = $fecha;
	}

	function add(){

		include 'conexionP.php';
			// specify parame MUST be a variable that can be passed by reference!
		$misParametros['cliente'] = $this->idCliente;
		$misParametros['vendedor'] = $this->idVendedor;
		$misParametros['idFacturaE'] = 0;
		$misParametros['pcMensaje'] = 0 ;

			// Set up the proc params array - be sure to pass the param by reference
		$parametrosProcedimiento = array(
			array(&$misParametros['cliente'], SQLSRV_PARAM_IN),
			array(&$misParametros['vendedor'], SQLSRV_PARAM_IN),
			array(&$misParametros['idFacturaE'], SQLSRV_PARAM_OUT),
			array(&$misParametros['pcMensaje'], SQLSRV_PARAM_OUT)
		);

		$sql = "EXEC SP_ADD_FACTURA_E @cliente = ?, @vendedor= ?, @idFacturaE= ?, @pcMensaje = ?  ";

		$stmt = sqlsrv_prepare($conn, $sql, $parametrosProcedimiento);


		if( !$stmt ) {
			die( print_r( sqlsrv_errors(), true));
		}

		if(sqlsrv_execute($stmt)){
			while($res = sqlsrv_next_result($stmt)){
    
			}
  			
  			$this->idFacturaEncabezado = $misParametros['idFacturaE'];
			return json_encode($misParametros);
		}else{
			die( print_r( sqlsrv_errors(), true));
		}
		
	}

	

}




?>