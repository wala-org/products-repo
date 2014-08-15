<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<link rel="shortcut icon" href="">
		<title>WALA - Tu Buscador de Regalos</title>
		<link rel="stylesheet" type="text/css" href="assets/css/normalize.css" />
		<link rel="stylesheet" href="assets/css/fonts.css" />
		<link rel="stylesheet" href="assets/css/styles.css" />
		<link rel="stylesheet" href="assets/css/skdslider.css" />
		<link rel="stylesheet" href="assets/css/animations.css" />
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="assets/js/modernizr.custom.js"></script>
		<script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="assets/js/skdslider.js"></script>
		<script type="text/javascript" src="assets/js/script.js"></script>
		
	</head>
	<body>
		<div class="container headercontainer">
			<header>
				<nav>
				
				<? //aqui incluimos el header 
				include_once('./templates/header.php');
				?>
						<!-- Esto va en wwwwala/admintienda, donde tendra el listado de sus tiendas, la administracion de sus productos, etc
						<!--<li><a href="http://www.wala.com.ar/registrartienda" class="selected">Registrar Tienda</a></li>-->
						
						<!-- aqui se registraran los usuarios de los diversos perfiles, por ahora: cliente, perfilador, tienda -->
					
				</nav>
				
			</header>
			
			<?php
			if(isset($_SESSION['perfil']))
			{
			?>
				<div class="container" id="content">
				
				
						<div style="font-size:20px;">Utilize nuestro buscador de regalos </div>
								<br><button id="btn_buscar" class="btn btn-danger">W!
								</button>
				
				</div>
			<?php
			}
			?>
				
				
				
		
		
		
		
		
		
		<footer>
			
			<p id="sig">Copyright &copy; 2014 Wala. Todos los derechos reservados.</p>
		
		</footer>
		
		</div>
		
		
	</body>
</html>