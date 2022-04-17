<?php

	class conectar{
		private $servidor="localhost";
		private $usuario="root";
		private $bd="myrentcar";
		private $password="";
		
		public function conexion(){
			$conexion = mysqli_connect($this->servidor,
										$this->usuario,
										$this->password,
										$this->bd);
			return $conexion;
		}
	}	
	$conn = new conectar();
	
	if(!$conn->conexion())
		{
		echo "No hay conexión.";
		}

?>