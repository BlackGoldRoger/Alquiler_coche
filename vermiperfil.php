<!DOCTYPE html>
<?php
require_once('conexion.php');
require_once('clUsuario.php');
require_once('funciones.php');
session_start();

?>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>My rent car</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="estilos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"><!--Enlace de los iconos-->
        
        <!--Miniatura de la página--><link rel="icon" type="image/png" href="img/Audi.jpg">
    </head>
    <body>
        <header class="main-header">
            <div class="main-header__container">
                <a href="index.php" class="main-header__title-decoration"><h1 class="main-header__title">MY RENT CAR</h1></a>
				<!--
                <div class="main-menu__cars">
                    <a href="" class="car-btn"><
				-->	
            </div>
        </header>
        <main class="user-main">
            <section class="user-section">
			
			
			
				<br></br>
				<table style="border-collapse: collapse;" border="1">
					<tr>
						<td>Nombre</td>
						<td>Apellido</td>
						<td>Email</td>
						<td>Telefono</td>
						<td>Password encriptada</td>
						<td>Pasword</td>
					</tr>
					<?php
						
						$obj = new Usuario();
						$datos = $obj->leerUsuario();
						
						
						foreach($datos as $key){
					?>
						<tr>
							<td><?php echo $key['nom_usu']; ?></td>
							<td><?php echo $key['ape_usu']; ?></td>
							<td><?php echo $key['email_usu']; ?></td>
							<td><?php echo $key['tlf_usu']; ?></td>
							<td><?php echo $key['pwd_usu']; ?></td>
							<td><?php echo $key['pass_usu']; ?></td>
						</tr>	

					<?php
						$datos=array(
							"Lopez",
						);
						$obj2 = new Usuario();
						$obj2->modificarUsuario($datos);
						}
					?>
			
				</table>


				


            </section>
			<?php
			include('piePagina.html');
			?>
        </main>
    </body>
</html>