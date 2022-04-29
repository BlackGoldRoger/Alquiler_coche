<?php
	global $conn;
	$conn = new mysqli("localhost","root","","myrentcar");
	
	if($conn->connect_errno)
	{
		echo "No hay conexión: (" . $conn->connect_errno . ") " . $conn->connect_error;
	}
?>