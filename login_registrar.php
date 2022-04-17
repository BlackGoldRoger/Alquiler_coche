<?php

require_once('conexion.php');

$nombre = $_POST["txtusu"];
$pass 	= $_POST["txtpass"];


//Para iniciar sesión
if(isset($_POST["btnlogin"]))
{

$queryusuario 	= mysqli_query($conn,"SELECT * FROM usuarios WHERE nom_usu = '$nombre'");
$nfilas			= mysqli_num_rows($queryusuario); 
$mostrar		= mysqli_fetch_array($queryusuario); 

if (($nfilas == 1) && (password_verify($pass,$mostrar['pwd_usu'])) )
	{ 
		session_start();
		$_SESSION['nombredelusuario']=$nombre;
		header("Location: pagina2.php");
	}
else
	{
	echo "<script> alert('Usuario o contraseña incorrecto.');window.location= 'usuario.php' </script>";
	}
}

//Para registrar
if(isset($_POST["btnregistrar"]))
{
$email	= $_POST["txtemail"];
$queryusuario 	= mysqli_query($conn,"SELECT * FROM usuarios WHERE nom_usu = '$nombre'");
$nfilas			= mysqli_num_rows($queryusuario); 

if ($nfilas == 0)
{

	$pass_encrip	= password_hash($pass, PASSWORD_BCRYPT);
	$queryregistrar = "INSERT INTO usuarios(nom_usu, pwd_usu, pass_usu, email_usu) values ('$nombre','$pass_encrip','$pass','$email')";
	

	if(mysqli_query($conn,$queryregistrar))
		{
			echo "<script> alert('Usuario registrado: $nombre');window.location= 'Usuario.php' </script>";
		}
		else 
		{
			echo "Error: " .$queryregistrar."<br>".mysql_error($conn);
		}
}else
{
		echo "<script> alert('No puedes registrar a este usuario: $nombre');window.location= 'Usuario_NoReg.php' </script>";
}

} 
?>

