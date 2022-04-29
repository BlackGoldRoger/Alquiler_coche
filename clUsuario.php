<?php
class Usuario { // clase Usuario
	// clUsuario.php

  	/*
   	* Propiedades de la clase Usuario
   	*/
	private $_aLista;
	private $_bDirty;

   	/*
    * Métodos
    * Usuario() // Constructor
    * leerUsuarioo()
    * modificarUsuario()
    */
function __construct(){ // constructor

	global $con;
	$this->_bDirty = False;
	$this->_aLista = array();

	// obtención de datos del cliente
	/*
	if (isset($_SESSION['Cliente'])) { // ya existe el cliente
		$this->leerCliente();
	}
	*/
} // fin constructor

function leerUsuario(){


	// Lectura de un usuario

	$sql = "SELECT * FROM usuarios WHERE nom_usu ='$_SESSION[nombredelusuario]'" ;

	$rst=accederMySQL($sql);
	if ($rst !== false)
	{
		//echo $sql;
		//echo ". $_SESSION[nombredelusuario]";
		
		echo "---- no es false";
	}	
	else
	{

		echo "---- es false";
	}
	$this->_aLista = $rst->fetch_assoc();
	//return $this->_aLista;
	return $rst;
} // fin leerUsuario



function modificarUsuario($dato){ // Modifica los datos de un usuario

	$sql = "UPDATE usuarios SET ape_usu=$dato[0] WHERE usuario_id = 2";
	$rst=accederMySQL($sql);
	if ($rst !== false)
	{
		//echo $sql;
		//echo ". $_SESSION[nombredelusuario]";
		
		echo "---- no es false";
	}	
	else
	{

		echo "---- es false";
	}

} 
} // fin clase Usuario
?>
