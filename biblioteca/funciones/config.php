<?php
// versi�n 1.0.0 2022 
// Este archivo: /biblioteca/funciones/config.php

///////////////////////////////// 
//
// variables de configuraci�n
//
/////////////////////////////////

///////////////////////////////// 
// T�tulos principales             
/////////////////////////////////
DEFINE("EMPRESA", "Myrentcar");   						// nombre de empresa
DEFINE("TITULO", "MY RENT CAR");                    // t�tulo de la p�gina
DEFINE("TIPOEMPRESA","Club de libros");                 // Tipo de empresa
DEFINE("VERSION", "1.0.0");                             // versi�n de la aplicaci�n
DEFINE("COPYRIGHT"," � Javier Grc�a Copyright ");
 
///////////////////////////////// 
// rutas de acceso             
/////////////////////////////////
//DEFINE("SITE_URL", "http://www.myrentcar.es");   	// url del sitio
//DEFINE("APLIC","/BookClub"); 				// Aplicaci�n
//DEFINE("SITE_URL", "http://localhost/myrentcar");   	    // url del sitio
//DEFINE("SITE_DIR", "/");                                // directorio base
//DEFINE("BASE_DIR", $_SERVER["DOCUMENT_ROOT"]);          // ra�z
//DEFINE("SELF", $_SERVER["PHP_SELF"]);                   // directiva SELF
//DEFINE("PATHIMG",APLIC."/images");
//DEFINE("PATHGIF",APLIC."/gifs/");



///////////////////////////////////////// 
// Base de datos 
///////////////////////////////////////// 
DEFINE("SERVIDOR","localhost");                      // servidor
DEFINE("DBASE","myrentcar");                          // Nombre de la base de datos

// otras constantes para acceso a la base de datos  
DEFINE("TIMEOUT", 3600);                             // tiempo de espera (segundos)
DEFINE("ROWCOUNT", 50);                              // filas que se muestran
DEFINE("ROWCOUNT2", 30);                             // filas que se muestran
DEFINE("ROWARTS", 3);                             // filas que se muestran de art�culos


///////////////////////////////////////// 
// Usuario privilegiado
///////////////////////////////////////// 
DEFINE("USERADMIN","adminalq");                       // Usuario privilegiado
DEFINE("PSWUSERADMIN","123456");                      // Contrase�a USERADM

///////////////////////////////////////// 
// Usuario normal
///////////////////////////////////////// 
DEFINE("USERNORMAL","Javier");                       // Usuario invitado
DEFINE("PSWUSERNORMAL","0021");                     // Contrase�a invitado

///////////////////////////////////////// 
// define constantes de correo  
///////////////////////////////////////// 
DEFINE("HOST_SMTP", "localhost");                     // hostname SMTP
DEFINE("PUERTO_SMTP","25");                           // puerto SMTP predeterminado=25
DEFINE("DE_NOMBRE","Myrentcar");                       // nombre de FROM de email
DEFINE("DE_EMAIL","soporte@myrentcar.es");       // FROM de email
DEFINE("EMAIL", "webmaster@myrentcar.es");         // email webmaster

////////////////////////////////////////
// matrices
////////////////////////////////////////
$aERRORES = array();                                   // matriz de errores
$aARCHIVOS = array("jpg", "gif", "png");               // matriz de tipos de im�genes

////////////////////////////////////////
// enlaces del administrador (barra izquierda)
////////////////////////////////////////
$aMENUADM=array("Compra "=>"/compra/index.php",
                "Temas del foro "=>"/admin/manttemas.php",
                "Administrar tienda "=>"/admin/mantdepto.php",
                "Gesti�n newsletters "=>"/admin/mantnews.php",
			    "Salir"=>"/compra/salir.php");
			
////////////////////////////////////////
// enlaces generales (barra izquierda)
////////////////////////////////////////
$aMENUGEN=array("Compra "=>"/compra/index.php",
                "Foros "=>"/foros/articulos.php",
			    "Salir"=>"/compra/salir.php");
			
////////////////////////////////////////
// enlaces de la aplicaci�n compra
////////////////////////////////////////
$aMENU01=array("Cat�logo "=>"/compra/index.php",
               "Autenticarse "=>"/compra/autenticarse.php",
               "Registro"=>"/compra/registro.php",
               "Ver cesta "=>"/compra/verCesta.php",
               "Revisar datos "=>"/compra/revisardatos.php",
               "Compra"=>"/compra/confirmarcompra.php",
		       "Salir"=>"/compra/salir.php");
		
////////////////////////////////////////
// enlaces de la aplicaci�n administrador (compra)
////////////////////////////////////////
$aMENU02=array("Departamentos "=>"/admin/mantdepto.php",
               "Cuentas "=>"/admin/mantcuentas.php",
               "Cat�logo "=>"/admin/mantlibros.php",
               "Proveedores "=>"/admin/mantprov.php",
		       "Salir"=>"/admin/salir.php");
		  
////////////////////////////////////////
// enlaces de la aplicaci�n administrador (foro)
////////////////////////////////////////
$aMENU03=array("Temas "=>"/admin/manttemas.php",
               "Art�culos "=>"/admin/mantarticulos.php",
                "Salir"=>"/admin/salir.php");

////////////////////////////////////////
// enlaces de la aplicaci�n administrador (gesti�n newsletter)
////////////////////////////////////////
$aMENU04=array("Mensajes "=>"/admin/mantnews.php",
               "Mensajes "=>"/admin/mantnews.php",
               "Salir"=>"/admin/salir.php");

////////////////////////////////////////
// matrices para validaci�n de datos
//////////////////////////////////////// 
$aTIPOS01 = array("1"=>"R�stica",
					"2"=> "Carton�", 
					"3"=>"CD");

// Tipos de medios de pago  
$aTIPOS02 = array("1"=>"VISA",
					"2"=> "MASTER", 
					"3"=>"AMERICAN",
					"4"=>"PAYPAL");

// Tipos de tarifas  
$aTARIFAS = array("Correo",
					"Mensajero",
					"Retira personalmente",
					"Download");

//****************************************************** 	
// Definici�n de interfaz literales de t�tulos de p�gina 
//****************************************************** 
// t�tulo de la p�gina autenticarse.php	
DEFINE("LIT00001","Autenticaci�n del cliente");
// t�tulo de la p�gina index.php
DEFINE("LIT00002","Proceso de compra");
// t�tulo de la p�gina revisardatos.php
DEFINE("LIT00003","Datos de cliente");
// t�tulo de la p�gina registro.php
DEFINE("LIT00004","Registro de cliente");
// t�tulo de la p�gina verCesta.php
DEFINE("LIT00005","Contenido de la cesta");
// t�tulo de la p�gina confirmarcompra.php
DEFINE("LIT00006","Proceso de confirmaci�n de la compra");
// literales para las acciones m�s comunes
DEFINE("LIT00007","ELIMINAR");
DEFINE("LIT00008","MODIFICAR");
DEFINE("LIT00009","A�ADIR");
DEFINE("LIT00010","BUSCAR");
DEFINE("LIT00011",": Sesi�n: ");
DEFINE("LIT00012","Buscar en esta tabla");
DEFINE("LIT00013","Mantenimiento de tablas");
DEFINE("LIT00014","Ver �rbol");
DEFINE("LIT00015","Responder");
DEFINE("LIT00016","Ver referencia");
DEFINE("LIT00017","Enviar emails");

//****************************************************** 	
// Definici�n de interfaz literales de compra/autenticarse.php 
//****************************************************** 	
DEFINE("LIT01001","Email Cliente");
DEFINE("LIT01002","Contrase�a");
DEFINE("LIT01003","Cliente nuevo");
DEFINE("LIT01004","Acci�n");
DEFINE("LIT01005","Cliente no registrado o mal la contrase�a.");
DEFINE("LIT01006","Error. C�digo de cliente ya registrado.");

//****************************************************** 	
// Definici�n de interfaz literales de compra/index.php 
//****************************************************** 	
DEFINE("LIT02002","T�tulo");
DEFINE("LIT02003","Tema");
DEFINE("LIT02004","Departamento");
DEFINE("LIT02005","Autor");
DEFINE("LIT02006","Editorial");
DEFINE("LIT02007","ISBN");
DEFINE("LIT02008","P�ginas");
DEFINE("LIT02009","Cubierta");
DEFINE("LIT02010","Peso");
DEFINE("LIT02011","PVP");
DEFINE("LIT02012","Resumen");
DEFINE("LIT02013","Detalle");
DEFINE("LIT02014","libros");
DEFINE("LIT02015","Cantidad");

//****************************************************** 	
// Definici�n de interfaz literales de compra/revisardatos.php 
//****************************************************** 	
DEFINE("LIT03001","Apellidos");
DEFINE("LIT03002","Email");
DEFINE("LIT03003","Palabra de paso");
DEFINE("LIT03004","Direcci�n");
DEFINE("LIT03005","Ciudad");
DEFINE("LIT03006","Provincia");
DEFINE("LIT03007","C�digo postal");
DEFINE("LIT03008","Tel�fono");
DEFINE("LIT03009","Fax");
DEFINE("LIT03010","Tipo de tarjeta");
DEFINE("LIT03011","N�mero de tarjeta");
DEFINE("LIT03012","Nombre en tarjeta");
DEFINE("LIT03013","Fecha de caducidad"); 
DEFINE("LIT03014","Acepta cookies");
DEFINE("LIT03015","Suscriptor");
DEFINE("LIT03016","Precio unidad");
DEFINE("LIT03017","Cantidad unidades");
DEFINE("LIT03018","Total en euros");
DEFINE("LIT03019","Cantidad unidades");
DEFINE("LIT03020","Peso total en kg.");
DEFINE("LIT03021","Precio compra");
DEFINE("LIT03022","Tipo env�o");
DEFINE("LIT03023","Gastos env�o");
DEFINE("LIT03024","Cambiar tipo");
DEFINE("LIT03025","Datos del cliente ");
DEFINE("LIT03026","Nombres");
DEFINE("LIT03027","Elecci�n del tipo de env�o");

//****************************************************** 	
// Definici�n de interfaz literales de compra/registro.php 
//****************************************************** 	
DEFINE("LIT04001","Apellidos");
DEFINE("LIT04002","Email");
DEFINE("LIT04003","Palabra de paso");
DEFINE("LIT04004","Direcci�n");

//****************************************************** 	
// Definici�n de interfaz literales de compra/salir.php 
//****************************************************** 	
DEFINE("LIT05001","Fin de la sesi�n");

//****************************************************** 	
// Definici�n de interfaz literales de compra/vercesta.php 
//****************************************************** 	
DEFINE("LIT06001","Cantidad");
DEFINE("LIT06002","Total");
DEFINE("LIT06003","Acci�n");

//****************************************************** 	
// Definici�n de interfaz literales de compra/confirmarcompra.php 
//****************************************************** 	
DEFINE("LIT07001","Confirmaci�n de compra");
DEFINE("LIT07002","Confirmaci�n de compra en librer�a BookClub");
DEFINE("LIT07003","Su pedido tiene el n�mero ");
DEFINE("LIT07004","Cualquier problema env�e un email a ");
DEFINE("LIT07006","Pedido de reposici�n de libros en librer�a Comercio");
DEFINE("LIT07007"," unidades del libro ");
DEFINE("LIT07008","Solicitamos ");
DEFINE("LIT07009","Su pedido tiene el n�mero ");
DEFINE("LIT07010","Hay existencias para suministrar su pedido. Para realizar la compra pulse el bot�n Paypal. ");
DEFINE("LIT07011","Muchas gracias por su compra. Pedido en tr�mite de env�o. ");
DEFINE("LIT07013","Espera confirmaci�n Paypal");
DEFINE("LIT07014","<br>No se confirma el pedido.<br>");
DEFINE("LIT07015","<br>No hay suficientes existencias del libro ");


//DEFINE("LIT07016","compras@bookclub.com.es");
// Aqu� se deber� codificar la cuenta Paypal de prueba
// obtenida al registrarse en developer.paypal.com (sandox)
DEFINE("LIT07016","vende_1259764271_biz@live.com");

DEFINE("LIT07017","BookClub");
DEFINE("LIT07018","Paypal: la alternativa simple y segura");
DEFINE("LIT07019","En proceso");

// estas dos p�ginas son las que reciben el aviso de pago correcto
// o de pago incorrecto
// en el entorno de prueba con sandbox (paypal) mientras
// se utilice localhost se puede utilizar, respectivamente
// www.editorialcolumbus.com/pagocorrecto.htm
// y www. editorialcolumbus.com/pagoincorrecto.htm
DEFINE("LIT07020",SITE_URL."/compra/finalizarpedido.php");
DEFINE("LIT07021",SITE_URL."/compra/anularpedido.php");
DEFINE("LIT07022","Se ha recibido el pago de su pedido y est� en tr�mite de env�o. Referencia ");
DEFINE("LIT07023","Pagado"); 		// en PayPal  espera de email de comprobaci�n
 
//****************************************************** 	
// Definici�n de interfaz literales de admin/admin.php 
//****************************************************** 	
DEFINE("LIT08001","Debe autenticarse");
DEFINE("LIT08002","Autenticaci�n confirmada");
DEFINE("LIT08003","Fall� la autenticaci�n");

//****************************************************** 	
// Definici�n de interfaz literales de admin/mandepto.php 
//****************************************************** 	
DEFINE("LIT09001","Mantenimiento de Departamentos");
DEFINE("LIT09002","Departamento");
DEFINE("LIT09003","Depende de");
DEFINE("LIT09004","Nombre");
DEFINE("LIT09005","Imagen");
DEFINE("LIT09006","Acci�n");
 
//****************************************************** 	
// Definici�n de interfaz literales de admin/manLibros.php 
//****************************************************** 	
DEFINE("LIT10001","Mantenimiento de Libros");
DEFINE("LIT10002","Departamento");
DEFINE("LIT10003","Depende de");
DEFINE("LIT10004","Nombre");
DEFINE("LIT10005","Imagen");
DEFINE("LIT10006","(productos listados en esta pantalla "); 
DEFINE("LIT10007","A�adir nuevo libro");
DEFINE("LIT10008","T�tulo:");
DEFINE("LIT10009","Imagen:");
DEFINE("LIT10010","Autor: ");
DEFINE("LIT10011","Editorial: ");
DEFINE("LIT10012","ISBN: ");
DEFINE("LIT10013","P�ginas: ");
DEFINE("LIT10014","Cubierta:");
DEFINE("LIT10015","Peso en kg.: ");
DEFINE("LIT10016","Precio en euros: ");
DEFINE("LIT10017","IVA: ");
DEFINE("LIT10018","Proveedor: ");
DEFINE("LIT10019","Existencias en unidades: ");
DEFINE("LIT10020","Departamento:");
DEFINE("LIT10021","Tema: ");
DEFINE("LIT10022","Resumen: ");
DEFINE("LIT10023","Detalle: ");
DEFINE("LIT10024","Departamento:");
DEFINE("LIT10025","Tema: ");
DEFINE("LIT10026","Resumen: ");

//****************************************************** 	
// Definici�n de interfaz literales de admin/mantprov.php 
//****************************************************** 	
DEFINE("LIT11001","Mantenimiento de Proveedores");
DEFINE("LIT11002","Proveedor");
DEFINE("LIT11003","Nombre");
DEFINE("LIT11004","Apellidos");
DEFINE("LIT11005","Empresa");
DEFINE("LIT11006","Email"); 
DEFINE("LIT11007","");
DEFINE("LIT11008","");
DEFINE("LIT11009","Acci�n");
DEFINE("LIT11010","2"); 			// longitud m�nima de nombre de proveedor

//****************************************************** 	
// Definici�n de interfaz literales de admin/mantcuentas.php 
//****************************************************** 	
DEFINE("LIT12001","Mantenimiento de Cuentas de usuarios ");
DEFINE("LIT12002","Inicio sesi�n");
DEFINE("LIT12003","Contrase�a");
DEFINE("LIT12004","");
DEFINE("LIT12005","Acci�n");
DEFINE("LIT12006","6"); 			// longitud m�nima de nombre de cuenta
DEFINE("LIT12007","6"); 			// longitud m�nima de contrase�a

//****************************************************** 	
// Definici�n de interfaz literales de admin/mantemas.php 
//****************************************************** 	
DEFINE("LIT13001","Mantenimiento de temas de los foros");
DEFINE("LIT13002","Tema");
DEFINE("LIT13003","Depende de");
DEFINE("LIT13004","Nombre");
DEFINE("LIT13005","Imagen");
DEFINE("LIT13006","Acci�n");

//****************************************************** 	
// Definici�n de interfaz literales de admin/mantArticulos.php 
//****************************************************** 	
DEFINE("LIT14001","Mantenimiento de art�culos");
DEFINE("LIT14002","(art�culos listados en esta pantalla "); 
DEFINE("LIT14003","A�adir nuevo art�culo");
DEFINE("LIT14004","Texto:");
DEFINE("LIT14005","Autor: ");
DEFINE("LIT14006","ID.Art.: ");
DEFINE("LIT14007","Ref.art�culo: ");
DEFINE("LIT14008","Tema:");
DEFINE("LIT14009","Fecha y hora:");
DEFINE("LIT14010","Rev.:");

//****************************************************** 	
// Definici�n de interfaz literales de foros/articulos.php 
//****************************************************** 	
DEFINE("LIT15002","(art�culos encontrados "); 
DEFINE("LIT15003","A�adir nuevo art�culo");
DEFINE("LIT15004","Texto:");
DEFINE("LIT15005","Autor:");
DEFINE("LIT15006","ID.Art.: ");
DEFINE("LIT15007","Ref.art�culo: ");
DEFINE("LIT15008","Tema:");
DEFINE("LIT15009","Desde fecha:");
DEFINE("LIT15010","T�tulo:");
DEFINE("LIT15011","Fecha:");
DEFINE("LIT15014","art�culos");
DEFINE("LIT15015","Pdte.rev.");
DEFINE("LIT15016","art�culos seleccionados");
DEFINE("LIT15017"," art�culo referencia ");
DEFINE("LIT15018","<B>Se a�adi� su art�culo. Ser� visible despu�s de su aprobaci�n. </B><BR>");
DEFINE("LIT15019","P�g. >> ");

//****************************************************** 	
// Definici�n de mensajes de error en las clases y en las funciones  
//****************************************************** 	
DEFINE("LIT16001","No se elimina el departamento: otros departamentos dependen de �l.");
DEFINE("LIT16002","No se elimina el departamento: hay libros que dependen de �l.");
DEFINE("LIT16003","No se modific� ning�n registro de la tabla.");
DEFINE("LIT16004","No se elimin� ning�n registro de la tabla.");
DEFINE("LIT16005","Un departamento no puede depender de s� mismo.");
DEFINE("LIT16006","Registro no a�adido: Clave duplicada, ya existe un registro con esa clave.");
DEFINE("LIT16007","Registro no eliminado: Tiene filas dependientes.");
DEFINE("LIT16008","No se elimina el proveedor: es proveedor vigente.");
DEFINE("LIT16009","Registro no existente: no existe un registro con esa clave");

//****************************************************** 	
// Definici�n de interfaz literales de compra/anularpedido.php 
//****************************************************** 	
DEFINE("LIT17001","Cancelado");
DEFINE("LIT17002","<BR>Lo lamentamos, pero su pedido <b>no ha podido ser cobrado por  PayPal</b>.<br> Puede modificar la cesta e intentarlo nuevamente.");
DEFINE("LIT17003","El pedido referido no est� en el estado esperado. Consultar con el administrador del sitio web.");

//****************************************************** 	
// Definici�n de literales de la clase Tema 
//****************************************************** 	
DEFINE("LIT18001","<BR><b>No se elimina el Tema: otros Temas dependen de �l.</B><br>");
DEFINE("LIT18002","<br><B>No se elimina el Tema: hay art�culos que dependen de �l.</B><br>");

//****************************************************** 	
// Definici�n de literales de la clase Art�culo 
//****************************************************** 	
DEFINE("LIT19001","<BR><b>No se elimina el art�culo: otros art�culos dependen de �l.</B><br>");

//****************************************************** 	
// Definici�n de literales de la p�gina arbol.php 
//****************************************************** 	
DEFINE("LIT20001","<B>Id.</B>");
DEFINE("LIT20002","<B>Secuencia</B>");
DEFINE("LIT20003","<B>Usuario</B>");
DEFINE("LIT20004","<B>Fecha</B>");
DEFINE("LIT20005","<B>T�tulo</B>");
DEFINE("LIT20006","<B>Texto</B>");
DEFINE("LIT20007","<B>Lista de art�culos relacionados en secuencia del tema:</B>");

//****************************************************** 	
// Definici�n de literales de final de p�gina 
//****************************************************** 	
DEFINE("LIT21001","Aviso de privacidad");
DEFINE("LIT21002","Informaci�n:");
DEFINE("LIT21003","Acerca de esta Web:");
DEFINE("LIT21004","Acerca de: ");

//****************************************************** 	
// Definici�n de interfaz literales de admin/mantnews.php 
//****************************************************** 	
DEFINE("LIT22001","Creaci�n y env�o de mensajes de noticias");
DEFINE("LIT22002","Id. Mens.");
DEFINE("LIT22003","Estado");
DEFINE("LIT22004","Texto");
DEFINE("LIT22005","Acciones");
DEFINE("LIT22006","Newsletter");

//****************************************************** 	
// asigna valor de variable de configuraci�n  
//****************************************************** 	
ini_set("track_errors", "1");                          // permite usar php_errormsg 

date_default_timezone_set('Europe/London'); 

?>
