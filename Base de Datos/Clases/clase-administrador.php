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

		public static function infoAdmi(){
				include_once 'conexion.php';

				$sql = "SELECT * FROM v_admi";
				$res = $base_de_datos->query($sql); 

				$datos = [];

    			foreach ($res as $row) {
        			$datos[] = $row;
    			}

    			return json_encode($datos);

		}

		public function add(){
			

		}

		public function edite(){

		}

		public static function remove($idAdministrador){

		}
	}

		
?>