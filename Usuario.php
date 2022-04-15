<!DOCTYPE html>

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
				<form id="frmlogin" class="grupo-entradas" method="POST" action="login_registrar.php">
				<input type="text" class="cajaentradatexto" placeholder="&#128273; Ingresar usuario" name="txtusuario" required>
				<input type="password" class="cajaentradatexto" placeholder="&#128272; Ingresar contraseña" name="txtpassword" required>
				<!--
				<input type="checkbox" class="checkboxvai"><span>Recordar contraseña</span>
				-->				
				<button type="submit" class="main-user__btn" name="btnloginx">Iniciar sesión</button>


				</form>
				<!--
                <div class="user-section__part">
                    <input type="text" class="" placeholder="Nombre de usuario..">
                </div>
                <div class="user-section__part">
                    <input type="password" class="" placeholder="Contraseña..">
                </div>
				
                <div class="user-section__part">
                    <a href="" class="main-user__btn">Login</a>
                </div>
				-->
                <div class="user-section__part">
                    <a href="" class="main-user__btn">He olvidado mi contraseña</a>
                </div>
                <div class="user-section__part">
                    <a href="Usuario_NoReg.php" class="main-user__btn">¿No estas registrado? ¡Registrate ya!</a>
                </div>
            </section>
        </main>
    </body>
</html>