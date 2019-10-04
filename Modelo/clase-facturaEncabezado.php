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

		public function add(){

		}

		public function edite(){

		}

		public static function remove($idFacturaEncabezado){

		}
?>