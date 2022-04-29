<?php
// Este archivo: /bib/base/funciones.php

// las funciones se explican en el cap�tulo en donde
// se utilizan por primera vez

///////////////////////////////////////////////////
//
// archivo de inclusi�n funciones.php
// funciones en orden alfab�tico
//
///////////////////////////////////////////////////

require_once("config.php");


///////////////////////////////////////////////////
// funci�n accederMySQL()
//////////////////////////////////////////////////  
function accederMySQL($sql,$ret="RST") {
	// explicaci�n en cap�tulo 13
	// �nica funci�n para acceder a MySQL
	
	global $con;
 	// El 2do. par�metro de la llamada a la funci�n:
	// Si es ID indica que adem�s se quiere saber 
	// el valor de la clave de autoincremento
	// Si es RST (asume) indica que se devuelve todo
	// el conjunto de resultados
	// Si es ROWS indica que se devuelve la  
	// primera fila del conjunto de resultados
	
	// todas las operaciones que no sean simples lecturas
	// a la base de datos quedar�n registradas en la tabla LOG
	if (substr($sql,0,6) != "SELECT"){
		$sql1 = "INSERT INTO LOG ( Cuando, Quien, Que)  
                 VALUES (\""
         		.date("Y-m-d H:i:s")."\",\""
        		 .$_SERVER['PHP_AUTH_USER']."\",\""
         		.addslashes($sql)."\")";
		$rst = $con->query($sql1);

		if (mysqli_errno($con)) tratarError("Error en grabaci�n log", $sql1);
		 
	}	
	
	// Operaci�n solicitada sobre la base de datos
	$rst = $con->query($sql);
     
	// si hay un error se deriva a tratarError() 
	if (mysqli_errno($con))  tratarError("Error en acceso base de datos ", $sql);
	
	// Ahora la acci�n depende de la opci�n elegida
	// en el 2do. par�metro
  	if ($ret == "ID"){
        	return  $con->insert_id; 
	} elseif  ($ret=="ROWS"){
        	return mysqli_affected_rows($con);
	}
	else {
            return $rst;
	}
        
} //  fin accederMySQL()

///////////////////////////////////////////////////
// funci�n almacenarError()
//////////////////////////////////////////////////  
function almacenarError($sMsg) {
	// explicaci�n en cap�tulo 12	

    global $aERRORES;
    array_push($aERRORES, $sMsg);
    
} // fin funci�n almacenarError()


// a�adir v�nculos a una cadena
function a�adirLinks($sStr) {

    $return = preg_replace("/((http(s?):\/\/)|(www\.))([\w\.]+)([\w|\/]+)/i", "<a href=\"http$3://$4$5$6\" target=\"_blank\">$4$5$6</a>", $sStr);
    $return = preg_replace("/([\w|\.|\-|_]+)(@)([\w\.]+)([\w]+)/i", "<a href=\"mailto:$0\">$0</a>", $return);
    return $return;
    
} // fin a�adirLinks()


///////////////////////////////////////////////////
// limpia una cadena
///////////////////////////////////////////////////
function clean($sStr) {
	// explicaci�n cap�tulo 15
	
    /* se elimina en PHP 6
      if (get_magic_quotes_gpc()) {
		$sStr = stripslashes($sStr);
	}*/	
    $sStr = htmlspecialchars($sStr);
    return $sStr;
}  // fin funci�n clean()


///////////////////////////////////////////////////
// funci�n conectar()
//////////////////////////////////////////////////
function conectar($sUser,$sPasswd)   {
	// explicaci�n en cap�tulo 13
    global $con;

    // crea un objeto conexi�n
    // utiliza las variables del servidor aunque tambi�n podr�amos utilizar las
    // variables $_SESSION['Login'] y $_SESSION['Palabrapaso']
    // se usa la constante DBASE que tiene asignada el nombre Comercio

    $con = new mysqli(SERVIDOR,
                      $sUser,
                      $sPasswd,
                      DBASE);
                           
    // si hay un error de conexi�n se emite un mensaje y finaliza
    // if ($con->connect_errno())     {
     if (!$con)     {
     	printf("Ha fallado la conexi�n, error: %s\n", $con->connect_error());
     	die ("revisar conexi�n");
     }
     // definimos el juego de caracteres de la conexi�n
     mysqli_set_charset($con, "latin1");


} // fin funci�n conectar()


///////////////////////////////////////////////////
// funci�n fijo()
//////////////////////////////////////////////////
function fijo($Num)  { 
	// explicaci�n cap�tulo 27
	
	// transforma un n�mero de longitud variable 
	// en una cadena de longitud fija = 6
	
       $sNum = substr(("000000" . strval($Num)),-6);
   
       return $sNum;

} // fin funci�n fijo()




///////////////////////////////////////////////////
// Tratamiento get_magic_quotes
///////////////////////////////////////////////////
function gmq($sStr){
	// explicaci�n en cap�tulo 13
	// detecta el uso de escape
	
	// funci�n obsoleta en PHP 6
	/*if (get_magic_quotes_gpc()) {
		$sStr = stripslashes($sStr);
	}*/				 
    return $sStr;
}


///////////////////////////////////////////////////
// funci�n mostrarErrores()
/////////////////////////////////////////////////// 
function mostrarErrores() {
  	// explicaci�n en cap�tulo 12
    global $aERRORES;

    if (count($aERRORES)) {
        print "<div class='error'>Mensajes de error:<BR></div>"; 
    	 
        while(list($key, $value) = each($aERRORES)) {
            print($value)."<br />";
        }
    }
}	// fin mostrarErrores()


///////////////////////////////////////////////////
// funci�n paginarRespuesta()
/////////////////////////////////////////////////// 
function paginarRespuesta($iPag,$iTope,$iFilas,$sFiltro) {
  	// explicaci�n en cap�tulo  
	// verifica si es necesaria la paginaci�n de la respuesta
	if ($iTope > $iFilas) {
		$j =  (int)(($iTope / $iFilas) + 2);
		echo LIT15019;
		for ($i=1 ; $i < $j; $i++) {
			$Neg1="";$Neg2="";
			if ($i == $iPag) {$Neg1="<b>";$Neg2="</b>";}
			echo "<a href=" .  SELF. "?pag=".$i."&filtro=".urlencode($sFiltro).">".$Neg1.$i.$Neg2."  </a>";
		} 
	}    
  	
}	// fin paginarRespuesta()


//////////////////////////////////////////////////
//  funci�n redirect()
//////////////////////////////////////////////////
function redirect($sOtraPagina)   { // redireccionamiento
	// explicaci�n en cap�tulo 13
    // Inicia otra p�gina
    
    echo "<script language=\"JavaScript\">\n";
    echo "document.location = \"".$sOtraPagina."\";";
    echo "</script>\n";
    
}  // fin funci�n redirect()

   
///////////////////////////////////////////////////
// funci�n tabBuscar()
//////////////////////////////////////////////////
function tabBuscar($cantrows)  {
    // explicaci�n cap�tulo 19
    // genera la barra de b�squeda en el cat�logo   
  
 
	echo "\n<!--| inicio tabla buscar |-->\n";
	echo "<table border=\"0\" class=\"comercio\" width='640'><tr>\n";
	echo "<th colspan=\"6\"><b>CAT�LOGO : $cantrows " . LIT02014 . " </b></th></tr>\n";
	echo "<td><form method=\"POST\" action=\"".SELF."\" enctype=\"multipart/form-data\">\n";
	echo  LIT02004."</td><td>".LIT02002."</td><td>".LIT02005."</td><td>".LIT02003."</td><td></td></tr>\n";
	echo "<td><select name='BDepartamento'>\n";
	echo "<option value=\"\">Todos</option>\n";
	$oDepto = new Departamentos;
	$aDepto = $oDepto->leerDepartamentos("", "Nombre ASC");
	$i=0;
	while ($i < $oDepto->cantDepartamentos()) {
		echo "<option value=\"".$aDepto[$i]['Nombre']."\">".$aDepto[$i]['Nombre']."</option>\n";
		$i++;
	} 
	echo "</select></td>\n";
	echo "<td><input type=\"text\" name=\"BTitulo\" value=\" \" size=\"20\"></td>\n";
	echo "<td><input type=\"text\" name=\"BAutor\" value=\" \" size=\"20\"></td>\n";
	echo "<td><input type=\"text\" name=\"BTexto\" value=\" \" size=\"20\"></td>\n";
	echo "<td><input type=\"hidden\" name=\"Op\" value=\"Buscar\" size=\"20\"></td>\n";
	echo "<td><input type=\"image\" src=\"".PATHGIF."buscar.jpg\" TITLE=\"".LIT00010."\" name=\"Op\" value=\"Buscar\" size=\"30\" ></td>\n";
	echo "</form>\n";
	echo "</tr></table>\n<!--| fin tabla buscar |-->\n";

} // fin funci�n tabBuscar()

 
///////////////////////////////////////////////////
// funci�n tabBuscarForo()
//////////////////////////////////////////////////    
function tabBuscarForo($cantrows)  {
	// explicaci�n cap�tulo 27
	
	////////////////////////////////////////////////////
	// Obtener la lista de art�culos vigentes
	////////////////////////////////////////////////////
 
	echo "\n<!--| inicio tabla buscar |-->\n";
	echo "<table border=\"0\" class=\"comercio\" width='640'><tr>\n";
	// s�lo el administrador puede filtrar los no revisados
	$cols = 6;
	if ($_SESSION['Autenticado']==1) $cols = 7;
       
	echo "<th colspan=\"".$cols."\"><b>Foro : listados $cantrows " . LIT15014 . " </b></th></tr>\n";
	echo "<td><form method=\"POST\" action=\"".SELF."\" enctype=\"multipart/form-data\">\n";
	echo  LIT15008."</td><td>".LIT15010."</td><td>".LIT15004."</td><td>".LIT15005."</td><td>".LIT15009."</td><td></td>";
      
	// s�lo el administrador puede filtrar los no revisados
	if ($_SESSION['Autenticado']==1)
          echo "<td>".LIT15015."</td>";
          
	echo "</tr>\n";
	echo "<td><select name='BTema'>\n";
	echo "<option value=\"\">Todos</option>\n";
	$oTemas = new Temas;
	$aTema = $oTemas->leerTemas("", "Nombre ASC");
	$i=0;
	while ($i < $oTemas->cantTemas()) {
		echo "<option value=\"".$aTema[$i]['Nombre']."\">".$aTema[$i]['Nombre']."</option>\n";
		$i++;
	} 
	echo "</select></td>\n";
	echo "<td><input type=\"text\" name=\"BTitulo\" value=\" \" size=\"10\"></td>\n";
	echo "<td><input type=\"text\" name=\"BTexto\" value=\" \" size=\"10\"></td>\n";
	echo "<td><input type=\"text\" name=\"BUsuario\" value=\" \" size=\"10\"></td>\n";
	echo "<td><input type=\"text\" name=\"BFecha\" value=\" \" size=\"10\"></td>\n";
      
	// s�lo el administrador puede filtrar los no revisados
	if ($_SESSION['Autenticado']==1) 
		echo "<td><input type=\"checkbox\" name=\"BRevisado\" size=\"1\"></td>\n";
          
	echo "<td><input type=\"hidden\" name=\"Op\" value=\"Buscar\" size=\"20\"></td>\n";
	echo "<td><input type=\"image\" src=\"".PATHGIF."buscar.jpg\" TITLE=\"".LIT00010."\" name=\"Op\" value=\"Buscar\" size=\"30\" ></td>\n";
	echo "</form>\n";
	echo "</tr></table>\n<!--| fin tabla buscar foro en |-->\n";

} // fin funci�n tabBuscarForo()



///////////////////////////////////////////////////
// funci�n tabnavegaA()
//////////////////////////////////////////////////
function tabnavegaA($sMenu,$sTit="",$sSession="") {
	// explicaci�n en cap�tulo 15
	
    // Formularios para la navegaci�n a otros mantenimientos
    // dentro de la aplicaci�n vigente
    // uno por cada l�nea de la tabla
    echo "\n<!--| inicio tabla navega |-->\n";
    echo "<table border='1' class='comercio' width='640'><tr>\n";
    echo "<th colspan=\"6\"><b>".$sTit.$sSession.$_SERVER['PHP_AUTH_USER']."</b></th></tr>\n";
    echo "<td><b>".LIT00012."</b></td><td colspan=\"5\"><b>".LIT00013."</b></td></tr>\n";
    echo "<td width='20%'><form name='tabnavegaA' method=\"POST\" action=\"".SELF."\" enctype=\"multipart/form-data\">\n";
    echo "<input type=\"text\" name=\"BTexto\" value=\"".$_POST['BTexto']."\" size=\"10\">\n";
    echo "<input type=\"image\" src=\"".PATHGIF."buscar.jpg\" TITLE=\"".LIT00010."\"  width=\"20\" height=\"20\">\n";
    echo "<input type='hidden' name='Op' value='BuscarTabla'>\n";
    echo "</form></td>\n";
    reset($sMenu);
    while ($temp = each($sMenu))  {
      if (SELF != $temp[1]) {
        echo "<td><a href=\"".APLIC. $temp[1]."\">".$temp[0] . "</a></td>\n";
      }
    }
    echo "</tr></table><br><br>\n<!--| fin tabla navega |-->\n";
} // fin funci�n tabnavegaA()


///////////////////////////////////////////////////
// funci�n tabnavegaC()
//////////////////////////////////////////////////
function tabnavegaC($sMenu,$sTit="",$sSession="") {
	// explicaci�n en cap�tulo 19 
	
    // Formularios para la navegaci�n a otras p�ginas
    // del proceso vigente
    
    echo "\n<!--| inicio tabla navegaci�n |-->\n";
    echo "<table border='1' class='comercio' width='640'><tr>\n";
    echo "<th colspan=\"7\"><b>".$sTit.$sSession.$_SERVER['PHP_AUTH_USER']."</b></th></tr>\n";
    reset($sMenu);
    
    while ($temp = each($sMenu))  {
      if (SELF != $temp[1]) {
         echo "<td><a href=\"".APLIC.$temp[1]."\">".$temp[0] . "</a></td>\n";
      }
    }
    
    echo "</tr></table><br><br>\n<!--| fin tabla navega |-->\n";
    
} // fin funci�n tabnavegaC()


///////////////////////////////////////////////////
// funci�n tarifaEnvio()
//////////////////////////////////////////////////
function tarifaEnvio($iPeso,$sTipo)   {
	// explicaci�n cap�tulo 22
	
	// Tarifas de env�o de la compra
	// se presupone una tarifa de correo 4 euros por cada kilo
	// con un m�nimo de 2 euros
	// y una tarifa de env�o por mensajer�a de 7 euros por cada 5 kilos
	// con un m�nimo de 7 euros
   
	//Retira personalmente y Download tienen coste cero
	global $aTARIFAS;

	$iGasto=0;
	switch ($sTipo) {
    case $aTARIFAS[0]: // Correo
		$iGasto= $iPeso*4;
		if ($iGasto < 2) $iGasto = 2;
		break;
    case $aTARIFAS[1]: // Mensajero
		$iGasto= $iPeso/5*7;
		if ($iGasto < 7) $iGasto = 7;
		break;
	}
    return $iGasto;

	
} // fin funci�n tarifaEnvio()

////////////////////////////////////////////////// 
// funci�n tratarError()
//////////////////////////////////////////////////
function tratarError($smsg, $strsql="NOSQL") {
  	// explicaci�n en cap�tulo 12
  	
  	// esta funci�n controla los textos que se muestran al usuario
  	// cuando se produce un error
  	// Determina tambi�n cuando es preciso retroceder los cambios
  	// realizados en las tablas mediante la funci�n rollback()
	global $con;
	
	// si no es un error en una sentencia SQL
	// simplemente lo informa y sigue
    if ($strsql == "NOSQL"){
    	almacenarError($smsg);
    	return;
    }
    	
	switch ($con->errno) {
		case 1062:
			// Registro no a�adido: Clave duplicada, ya existe un registro con esa clave
			almacenarError(LIT16006);
			break;
	    case 1217:
	    	//  Registro no eliminado: Tiene filas dependientes. 
			almacenarError(LIT16007);
			break;
		default:
	         echo "***********************************************************<br>";
	         echo "* <b>Error que no permite procesar la p�gina : " . SELF . " </b><br>";
	         echo "* Sentencia SQL :  $strsql <br>";
	         echo "* Mensaje del programa :   $smsg <br>";
	         echo "* Mensaje MySQL : $con->error <br>";
	         echo "* N�mero de error MySQL : $con->errno <br>";
	         echo "***********************************************************<br>";
	         $con->rollback();
	         exit();
	}

} // fin funci�n tratarError()



///////////////////////////////////////////////////
// funci�n validarAdmin()
//////////////////////////////////////////////////
function validarAdmin($sLogin, $sPasswd)   {
	// explicaci�n en cap�tulo 13
	
    // intenta conexi�n con la base de datos
    // si el usuario no est� en la tabla user de MySQL
    // no se podr� establecer la conexi�n
     Global $con;
	
    $con= mysqli_connect(SERVIDOR,$sLogin, $sPasswd);

    if (!$con) {
    	return FALSE;
    }

    // selecci�n de la base de datos  
    mysqli_select_db($con,DBASE);

    // Como doble verificaci�n se comprueba que el usuario
    // tambi�n est� en la tabla Cuentas de la base de datos
    require_once("clCuenta.php");
    $oCuenta = new Cuenta($sLogin);
    if ($oCuenta->validarCuenta($sPasswd)){
    	// autenticaci�n OK
    	// carga la matriz $_SESSION
    	$_SESSION["LOGIN"]=$sLogin;
    	$_SESSION["PalabraPaso"]=$sPasswd;
    	$_SESSION['Autenticado']=1;
    	return TRUE;
    } else {
    	// autenticaci�n KO
    	unset($_SESSION['Autenticado']);
    	return FALSE;
    }
    

} // fin de funci�n validarAdmin()


///////////////////////////////////////////////////
// funci�n varVariables()
//////////////////////////////////////////////////
// utilizada s�lo en depuraci�n
function verVariables()   {
    
   	$var=date("l dS of F Y h:i:s A");
   	
	echo $var;
    echo "<br>Sesi�n Cliente<br>";
    echo $_SESSION['Cliente'];

    echo "<br>Sesi�n Cesta<br>";
	echo $_SESSION['Cesta'];

    echo "<BR>SERVER <BR>";
    print_r ($_SERVER);

    echo "<BR>SESSION <BR>";
    print_r ($_SESSION);

    echo "<BR><BR>POST <BR>";
    print_r ($_POST);

    echo "<BR><BR>GET <BR>";
	print_r ($_GET);

	echo "<BR><BR>ID session <BR>";
	$var=session_id();
	echo $var;
	echo "<br>";


} // funci�n verVariables()
  

?>
