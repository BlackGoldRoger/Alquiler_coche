<?php
// Este archivo: /bib/base/funciones.php

// las funciones se explican en el capítulo en donde
// se utilizan por primera vez

///////////////////////////////////////////////////
//
// archivo de inclusión funciones.php
// funciones en orden alfabético
//
///////////////////////////////////////////////////

require_once("config.php");


///////////////////////////////////////////////////
// función accederMySQL()
//////////////////////////////////////////////////  
function accederMySQL($sql,$ret="RST") {
	// explicación en capítulo 13
	// única función para acceder a MySQL
	
	global $con;
 	// El 2do. parámetro de la llamada a la función:
	// Si es ID indica que además se quiere saber 
	// el valor de la clave de autoincremento
	// Si es RST (asume) indica que se devuelve todo
	// el conjunto de resultados
	// Si es ROWS indica que se devuelve la  
	// primera fila del conjunto de resultados
	
	// todas las operaciones que no sean simples lecturas
	// a la base de datos quedarán registradas en la tabla LOG
	if (substr($sql,0,6) != "SELECT"){
		$sql1 = "INSERT INTO LOG ( Cuando, Quien, Que)  
                 VALUES (\""
         		.date("Y-m-d H:i:s")."\",\""
        		 .$_SERVER['PHP_AUTH_USER']."\",\""
         		.addslashes($sql)."\")";
		$rst = $con->query($sql1);

		if (mysqli_errno($con)) tratarError("Error en grabación log", $sql1);
		 
	}	
	
	// Operación solicitada sobre la base de datos
	$rst = $con->query($sql);
     
	// si hay un error se deriva a tratarError() 
	if (mysqli_errno($con))  tratarError("Error en acceso base de datos ", $sql);
	
	// Ahora la acción depende de la opción elegida
	// en el 2do. parámetro
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
// función almacenarError()
//////////////////////////////////////////////////  
function almacenarError($sMsg) {
	// explicación en capítulo 12	

    global $aERRORES;
    array_push($aERRORES, $sMsg);
    
} // fin función almacenarError()


// añadir vínculos a una cadena
function añadirLinks($sStr) {

    $return = preg_replace("/((http(s?):\/\/)|(www\.))([\w\.]+)([\w|\/]+)/i", "<a href=\"http$3://$4$5$6\" target=\"_blank\">$4$5$6</a>", $sStr);
    $return = preg_replace("/([\w|\.|\-|_]+)(@)([\w\.]+)([\w]+)/i", "<a href=\"mailto:$0\">$0</a>", $return);
    return $return;
    
} // fin añadirLinks()


///////////////////////////////////////////////////
// limpia una cadena
///////////////////////////////////////////////////
function clean($sStr) {
	// explicación capítulo 15
	
    /* se elimina en PHP 6
      if (get_magic_quotes_gpc()) {
		$sStr = stripslashes($sStr);
	}*/	
    $sStr = htmlspecialchars($sStr);
    return $sStr;
}  // fin función clean()


///////////////////////////////////////////////////
// función conectar()
//////////////////////////////////////////////////
function conectar($sUser,$sPasswd)   {
	// explicación en capítulo 13
    global $con;

    // crea un objeto conexión
    // utiliza las variables del servidor aunque también podríamos utilizar las
    // variables $_SESSION['Login'] y $_SESSION['Palabrapaso']
    // se usa la constante DBASE que tiene asignada el nombre Comercio

    $con = new mysqli(SERVIDOR,
                      $sUser,
                      $sPasswd,
                      DBASE);
                           
    // si hay un error de conexión se emite un mensaje y finaliza
    // if ($con->connect_errno())     {
     if (!$con)     {
     	printf("Ha fallado la conexión, error: %s\n", $con->connect_error());
     	die ("revisar conexión");
     }
     // definimos el juego de caracteres de la conexión
     mysqli_set_charset($con, "latin1");


} // fin función conectar()


///////////////////////////////////////////////////
// función fijo()
//////////////////////////////////////////////////
function fijo($Num)  { 
	// explicación capítulo 27
	
	// transforma un número de longitud variable 
	// en una cadena de longitud fija = 6
	
       $sNum = substr(("000000" . strval($Num)),-6);
   
       return $sNum;

} // fin función fijo()




///////////////////////////////////////////////////
// Tratamiento get_magic_quotes
///////////////////////////////////////////////////
function gmq($sStr){
	// explicación en capítulo 13
	// detecta el uso de escape
	
	// función obsoleta en PHP 6
	/*if (get_magic_quotes_gpc()) {
		$sStr = stripslashes($sStr);
	}*/				 
    return $sStr;
}


///////////////////////////////////////////////////
// función mostrarErrores()
/////////////////////////////////////////////////// 
function mostrarErrores() {
  	// explicación en capítulo 12
    global $aERRORES;

    if (count($aERRORES)) {
        print "<div class='error'>Mensajes de error:<BR></div>"; 
    	 
        while(list($key, $value) = each($aERRORES)) {
            print($value)."<br />";
        }
    }
}	// fin mostrarErrores()


///////////////////////////////////////////////////
// función paginarRespuesta()
/////////////////////////////////////////////////// 
function paginarRespuesta($iPag,$iTope,$iFilas,$sFiltro) {
  	// explicación en capítulo  
	// verifica si es necesaria la paginación de la respuesta
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
//  función redirect()
//////////////////////////////////////////////////
function redirect($sOtraPagina)   { // redireccionamiento
	// explicación en capítulo 13
    // Inicia otra página
    
    echo "<script language=\"JavaScript\">\n";
    echo "document.location = \"".$sOtraPagina."\";";
    echo "</script>\n";
    
}  // fin función redirect()

   
///////////////////////////////////////////////////
// función tabBuscar()
//////////////////////////////////////////////////
function tabBuscar($cantrows)  {
    // explicación capítulo 19
    // genera la barra de búsqueda en el catálogo   
  
 
	echo "\n<!--| inicio tabla buscar |-->\n";
	echo "<table border=\"0\" class=\"comercio\" width='640'><tr>\n";
	echo "<th colspan=\"6\"><b>CATÁLOGO : $cantrows " . LIT02014 . " </b></th></tr>\n";
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

} // fin función tabBuscar()

 
///////////////////////////////////////////////////
// función tabBuscarForo()
//////////////////////////////////////////////////    
function tabBuscarForo($cantrows)  {
	// explicación capítulo 27
	
	////////////////////////////////////////////////////
	// Obtener la lista de artículos vigentes
	////////////////////////////////////////////////////
 
	echo "\n<!--| inicio tabla buscar |-->\n";
	echo "<table border=\"0\" class=\"comercio\" width='640'><tr>\n";
	// sólo el administrador puede filtrar los no revisados
	$cols = 6;
	if ($_SESSION['Autenticado']==1) $cols = 7;
       
	echo "<th colspan=\"".$cols."\"><b>Foro : listados $cantrows " . LIT15014 . " </b></th></tr>\n";
	echo "<td><form method=\"POST\" action=\"".SELF."\" enctype=\"multipart/form-data\">\n";
	echo  LIT15008."</td><td>".LIT15010."</td><td>".LIT15004."</td><td>".LIT15005."</td><td>".LIT15009."</td><td></td>";
      
	// sólo el administrador puede filtrar los no revisados
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
      
	// sólo el administrador puede filtrar los no revisados
	if ($_SESSION['Autenticado']==1) 
		echo "<td><input type=\"checkbox\" name=\"BRevisado\" size=\"1\"></td>\n";
          
	echo "<td><input type=\"hidden\" name=\"Op\" value=\"Buscar\" size=\"20\"></td>\n";
	echo "<td><input type=\"image\" src=\"".PATHGIF."buscar.jpg\" TITLE=\"".LIT00010."\" name=\"Op\" value=\"Buscar\" size=\"30\" ></td>\n";
	echo "</form>\n";
	echo "</tr></table>\n<!--| fin tabla buscar foro en |-->\n";

} // fin función tabBuscarForo()



///////////////////////////////////////////////////
// función tabnavegaA()
//////////////////////////////////////////////////
function tabnavegaA($sMenu,$sTit="",$sSession="") {
	// explicación en capítulo 15
	
    // Formularios para la navegación a otros mantenimientos
    // dentro de la aplicación vigente
    // uno por cada línea de la tabla
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
} // fin función tabnavegaA()


///////////////////////////////////////////////////
// función tabnavegaC()
//////////////////////////////////////////////////
function tabnavegaC($sMenu,$sTit="",$sSession="") {
	// explicación en capítulo 19 
	
    // Formularios para la navegación a otras páginas
    // del proceso vigente
    
    echo "\n<!--| inicio tabla navegación |-->\n";
    echo "<table border='1' class='comercio' width='640'><tr>\n";
    echo "<th colspan=\"7\"><b>".$sTit.$sSession.$_SERVER['PHP_AUTH_USER']."</b></th></tr>\n";
    reset($sMenu);
    
    while ($temp = each($sMenu))  {
      if (SELF != $temp[1]) {
         echo "<td><a href=\"".APLIC.$temp[1]."\">".$temp[0] . "</a></td>\n";
      }
    }
    
    echo "</tr></table><br><br>\n<!--| fin tabla navega |-->\n";
    
} // fin función tabnavegaC()


///////////////////////////////////////////////////
// función tarifaEnvio()
//////////////////////////////////////////////////
function tarifaEnvio($iPeso,$sTipo)   {
	// explicación capítulo 22
	
	// Tarifas de envío de la compra
	// se presupone una tarifa de correo 4 euros por cada kilo
	// con un mínimo de 2 euros
	// y una tarifa de envío por mensajería de 7 euros por cada 5 kilos
	// con un mínimo de 7 euros
   
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

	
} // fin función tarifaEnvio()

////////////////////////////////////////////////// 
// función tratarError()
//////////////////////////////////////////////////
function tratarError($smsg, $strsql="NOSQL") {
  	// explicación en capítulo 12
  	
  	// esta función controla los textos que se muestran al usuario
  	// cuando se produce un error
  	// Determina también cuando es preciso retroceder los cambios
  	// realizados en las tablas mediante la función rollback()
	global $con;
	
	// si no es un error en una sentencia SQL
	// simplemente lo informa y sigue
    if ($strsql == "NOSQL"){
    	almacenarError($smsg);
    	return;
    }
    	
	switch ($con->errno) {
		case 1062:
			// Registro no añadido: Clave duplicada, ya existe un registro con esa clave
			almacenarError(LIT16006);
			break;
	    case 1217:
	    	//  Registro no eliminado: Tiene filas dependientes. 
			almacenarError(LIT16007);
			break;
		default:
	         echo "***********************************************************<br>";
	         echo "* <b>Error que no permite procesar la página : " . SELF . " </b><br>";
	         echo "* Sentencia SQL :  $strsql <br>";
	         echo "* Mensaje del programa :   $smsg <br>";
	         echo "* Mensaje MySQL : $con->error <br>";
	         echo "* Número de error MySQL : $con->errno <br>";
	         echo "***********************************************************<br>";
	         $con->rollback();
	         exit();
	}

} // fin función tratarError()



///////////////////////////////////////////////////
// función validarAdmin()
//////////////////////////////////////////////////
function validarAdmin($sLogin, $sPasswd)   {
	// explicación en capítulo 13
	
    // intenta conexión con la base de datos
    // si el usuario no está en la tabla user de MySQL
    // no se podrá establecer la conexión
     Global $con;
	
    $con= mysqli_connect(SERVIDOR,$sLogin, $sPasswd);

    if (!$con) {
    	return FALSE;
    }

    // selección de la base de datos  
    mysqli_select_db($con,DBASE);

    // Como doble verificación se comprueba que el usuario
    // también esté en la tabla Cuentas de la base de datos
    require_once("clCuenta.php");
    $oCuenta = new Cuenta($sLogin);
    if ($oCuenta->validarCuenta($sPasswd)){
    	// autenticación OK
    	// carga la matriz $_SESSION
    	$_SESSION["LOGIN"]=$sLogin;
    	$_SESSION["PalabraPaso"]=$sPasswd;
    	$_SESSION['Autenticado']=1;
    	return TRUE;
    } else {
    	// autenticación KO
    	unset($_SESSION['Autenticado']);
    	return FALSE;
    }
    

} // fin de función validarAdmin()


///////////////////////////////////////////////////
// función varVariables()
//////////////////////////////////////////////////
// utilizada sólo en depuración
function verVariables()   {
    
   	$var=date("l dS of F Y h:i:s A");
   	
	echo $var;
    echo "<br>Sesión Cliente<br>";
    echo $_SESSION['Cliente'];

    echo "<br>Sesión Cesta<br>";
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


} // función verVariables()
  

?>
