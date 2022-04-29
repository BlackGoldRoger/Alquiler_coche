<!DOCTYPE html>
<?php

include('conexion.php');
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
                <div class="user-section__part">
                    <h1>¿Ya estás registrado?</h1>
                </div>
				<!--Formulario login -->
				<form id="frmlogin" class="user-section__part" method="POST" action="login_registrar.php">
                <div class="user-section__part">
                    <div class="cool">
                        <p ><i class="fas fa-user"></i> <input type="text" class="cool-element" placeholder="Ingresar usuario" name="txtusu" autocomplete="off" required></p>
                    </div>
                </div>
                <div class="user-section__part">
                    <!--<div class="cool user-buttons">
                        <i class="fa-solid fa-lock fa-sm"></i> <input type="password" class="user-section__part cool-element" placeholder="Ingresar contraseña" name="txtpass" required>
                    </div>-->
                    <div class="cool">
					    <p><i class="fa-solid fa-lock"></i> <input type="password" class="cool-element" placeholder="Ingresar contraseña" name="txtpass" autocomplete="off" required></p>
					</div>
                </div>
				<!--
				<input type="checkbox" class="checkboxvai"><span>Recordar contraseña</span>
				-->
				<div class="">
				    <button type="submit" class="main-user__btn" name="btnlogin">Iniciar sesión</button>    
				</div>
								
				</form>
                <div class="user-section__part">
                    <a href="Mantenimiento.html" class="main-user__btn">He olvidado mi contraseña</a>
                </div>

                <div class="user-section__part">
                    <a href="Usuario_NoReg.php" class="main-user__btn">¿No estas registrado? ¡Registrate ya!</a>
                </div>

            </section>
			<?php
			include('piePagina.html');
			?>
        </main>
    </body>
</html>