<?php


	class Administrador{

		private $idAdministrador;
		private $idEmpleado;
		

		public function __construct($idAdministrador, $idEmpleado){
			$this->idAdministrador = $idAdministrador;
			$this->idEmpleado = $idEmpleado;
			
		}

		public function getidAdministrador(){
			return $this->idAdministrador;
		}

		public function setidAdministrador($idAdministrador){
			$this->idAdministrador = $idAdministrador;
		}

		public function getidEmpleado(){
			return $this->idEmpleado;
		}

		public function setidEmpleado($idEmpleado){
			$this->idEmpleado = $idEmpleado;
		}

		

		public function toString(){
			return "idAdministrador: " . $this->idAdministrador . 
				" idEmpleado: " . $this->idEmpleado ;
		}

		public function add(){

		}

		public function edite(){

		}

		public static function remove($idAdministrador){

		}

		
?>