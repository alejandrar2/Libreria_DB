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

		public function add(){

		}

		public function edite(){

		}

		public static function remove($idFacturaDetalle){

		}
?>