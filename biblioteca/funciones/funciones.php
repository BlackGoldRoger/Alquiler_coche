<?php
require_once('conexion.php');

// funci�n accederMySQL()

function accederMySQL($sql) {

	// �nica funci�n para acceder a MySQL
	$con = new mysqli("localhost","root","","myrentcar");
	
	if($con->connect_errno)
	{
		echo "No hay conexi�n: (" . $conn->connect_errno . ") " . $conn->connect_error;
	}
	else
	{
		echo "ok conexion";
		$rst = $con->query($sql);
		return $rst;
	}
       
} //  fin accederMySQL()

?>