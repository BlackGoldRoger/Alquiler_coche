<!DOCTYPE html>
<?php
include('conexion.php');
session_start();

if(isset($_SESSION['nombredelusuario']))
{
	$usuarioingresado = $_SESSION['nombredelusuario'];

	header('location: pagina2.php');
}
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
				<?php
				if(isset($_SESSION['nombredelusuario']))
					{
						$usuarioingresado = $_SESSION['nombredelusuario'];
						echo "<h1>Bienvenido: $usuarioingresado </h1>";
					}

				?>
				<div class="main-menu__user">
					<a href="Usuario.php" class="user-btn"><i class="fas fa-user"></i> Login Usuario</a>
				</div> 
				<!--
                <div class="main-menu__cars">
                    <a href="" class="car-btn"><i class="fa-solid fa-car-side"></i> coches alquilados</a>
                </div>
				-->
            </div>
            <div class="main-menu">
            <span id="btn-menu"><i class="icon-menu fas fa-bars"></i></span>
                <nav class="main-nav" id="main-nav">
                    <ul class="menu">
                        <li class="menu__item"><a href="" class="menu__link">SUV</a></li>
                        <li class="menu__item"><a href="" class="menu__link">Utilitario</a></li>
                        <li class="menu__item"><a href="" class="menu__link">Deportivos</a></li>
                        <li class="menu__item"><a href="" class="menu__link">Talleres</a></li>
                    </ul>
                </nav>
            </div>
            <div class="Icons">
                    <input type="search" class="main-header__input" placeholder="Buscar productos.."><i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </header>
            <div class="container-slider">
                <div class="slider" id="slider">
                    <div class="slider__section">
                        <img src="img/Audi.jpg" alt="" class="slider__img">
                    </div>
                    <div class="slider__section">
                        <img src="img/Mercedes.jpg" alt="" class="slider__img">
                    </div>
                    <div class="slider__section">
                        <img src="img/BMW.jpeg" alt="" class="slider__img">
                    </div>
                </div>
                <div class="slider__btn slider__btn--right" id="btn-right">&#62;</div>
                <div class="slider__btn slider__btn--left" id="btn-left">&#60;</div>
            </div>
        
        <main class="main">
            <h2 class="main-title">Últimos vehículos añadidos</h2>
            <section class="container-products">
                    <div class="product">
                        <img src="img/SUV1.jpg" alt="" class="product__img">
                        <div class="product__description">
                            <h3 class="product__title">Hyundai</h3>
                            <span class="product__price">50€ al día</span>
                        </div>
                        <a href=""><i class="product__icon fa-solid fa-cart-arrow-down"> ALQUILALO YA!</i></a>
                    </div>
                    <div class="product">
                        <img src="img/Utilitario1.jpg" alt="" class="product__img">
                        <div class="product__description">
                            <h3 class="product__title">Honda</h3>
                            <span class="product__price">30€ al día</span>
                        </div>
                        <a href=""><i class="product__icon fa-solid fa-cart-arrow-down"> ALQUILALO YA!</i></a>
                    </div>
                    <div class="product">
                        <img src="img/SUV2.jpg" alt="" class="product__img">
                        <div class="product__description">
                            <h3 class="product__title">Peugeot</h3>
                            <span class="product__price">50€ al día</span>
                        </div>
                        <a href=""><i class="product__icon fa-solid fa-cart-arrow-down"> ALQUILALO YA!</i></a>
                    </div>
                    <div class="product">
                        <img src="img/Utilitario2.jpg" alt="" class="product__img">
                        <div class="product__description">
                            <h3 class="product__title">Seat</h3>
                            <span class="product__price">25€ al día</span>
                        </div>
                        <a href=""><i class="product__icon fa-solid fa-cart-arrow-down"> ALQUILALO YA!</i></a>
                    </div>
            </section>
			<section>
			<div class="footer-section__container">
			    <div class="footer-section__element">
			        <h2>Siguenos en nuestras redes</h2>
			        <a href="" class="footer-icon"><i class="fa-brands fa-twitter"></i></a>
			        <a href="" class="footer-icon"><i class="fa-brands fa-instagram"></i></a>
			        <a href="" class="footer-icon"><i class="fa-brands fa-facebook"></i></a>
			        <a href="" class="footer-icon"><i class="fa-brands fa-linkedin"></i></a>
				</div>
			</div>
			<div>
			    <h1></h1>
			</div>
			</section>
        </main>
            <script src="Slider.js"></script>
            <script src="menu.js"></script>
    </body>
</html>
