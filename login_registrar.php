<?php

include('conexion.php');

$nombre = $_POST["txtusuario"];
$pass 	= $_POST["txtpassword"];

//Para iniciar sesión
if(isset($_POST["btnloginx"]))
{

$queryusuario = mysqli_query($conn,"SELECT * FROM clientes WHERE Usuario = '$nombre'");
$nr 		= mysqli_num_rows($queryusuario); 
$mostrar	= mysqli_fetch_array($queryusuario); 

if (($nr == 1) && (password_verify($pass,$mostrar['Pwd'])) )
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
if(isset($_POST["btnregistrarx"]))
{

$queryusuario 	= mysqli_query($conn,"SELECT * FROM clientes WHERE Usuario = '$nombre'");
$nr 			= mysqli_num_rows($queryusuario); 

if ($nr == 0)
{

	$pass_fuerte = password_hash($pass, PASSWORD_BCRYPT);
	$queryregistrar = "INSERT INTO clientes(Usuario, Pwd) values ('$nombre','$pass_fuerte')";
	

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

