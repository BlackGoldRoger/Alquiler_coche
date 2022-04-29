<?php
require_once('conexion.php');

// función accederMySQL()

function accederMySQL($sql) {

	// única función para acceder a MySQL
	$con = new mysqli("localhost","root","","myrentcar");
	
	if($con->connect_errno)
	{
		echo "No hay conexión: (" . $conn->connect_errno . ") " . $conn->connect_error;
	}
	else
	{
		echo "ok conexion";
		$rst = $con->query($sql);
		return $rst;
	}
       
} //  fin accederMySQL()

?>