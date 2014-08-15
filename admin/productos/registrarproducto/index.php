<?php
//error_reporting(0);
session_start();
require_once('../../../api/config/paths.php');
require_once(CONFIG_PATH.'/conexion.php');
include '../../../data/SubirImagen.php';

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
		<link rel="stylesheet" type="text/css" href="../../../assets/css/normalize.css" />
		<link rel="stylesheet" href="../../../assets/css/fonts.css" />
		<link rel="stylesheet" href="../../../assets/css/styles.css" />
		<link rel="stylesheet" href="../../../assets/css/skdslider.css" />
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="../../../assets/js/modernizr.custom.js"></script>
		<script type="text/javascript" src="../../../assets/js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="../../../assets/js/skdslider.js"></script>
	</head>
	<body>
		<div class="container headercontainer">
			<header>
				<nav>
					<? //aqui incluimos el header 
						include_once('../../../templates/header.php');
					?>
				</nav>
			</header>
			
				<div id="content" class="container">
				
				
						<?php
							if(isset($_POST['nombre']) and sizeof($_POST['nombre'])>0)
							{
								$idtienda = $_POST['idtienda'];
								$nombre=$_POST['nombre'];
								
								$descripcion=$_POST['descripcion'];
								$precio=$_POST['precio'];
								
								//imagen
								$SubirImagen = new SubirImagen($_SERVER['DOCUMENT_ROOT']."/assets/img/products/",
																	array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG),"");
														
								//var_dump($_FILES);
								$SubirImagen->uploadFile($_FILES,0);//el segundo aun no se usa, luego se usara cuando se suben varias imagenes

								$imagen = $SubirImagen->getPaths()['imagen'];								
								$sql = "insert into producto(id_producto,id_tienda,nombre,descripcion,precio,imagen,perfilado) 
									values (0,$idtienda,'$nombre','$descripcion',$precio,'$imagen',2)";

									
								
								$conexion = new conexion();
								$db=$conexion->getConection();
								
								//var_dump($SubirImagen->getPaths()['imagen']); die();
								
								$result = $db->query($sql);
			
								if($result==false){
								echo 'No puedo registrarse el producto'; die();
								}
								else
								{
								echo 'Se registró el producto exitosamente'; die();
								}
							}
						?>
						<h3>Registrar Producto</h3> 
						<form method="POST" enctype= "multipart/form-data">

							<input type="hidden" name="idtienda" id="idtienda" value="<?php 
															if(isset($_GET['id_tienda']))
															echo (int)$_GET['id_tienda'];
															else if(isset($_POST['idtienda']))
															echo (int)$_POST['idtienda'];

														  ?>"/>
						<table>
							<tr>
							<td>Nombre:</td><td><input name="nombre" id="nombre" required/></td>
							</tr>
							
							<tr>
							<td>Descripci&oacute;n:</td><td><textarea name="descripcion" id="descripcion" rows="5" cols="30" required></textarea></td>
							</tr>
							
							<tr>
								<td>Precio($AR)</td><td><input type="number" name="precio" id="precio" required/></td>
							</tr>
							
							<tr>
								<td>Imagen</td><td><input type="file" name="files[imagen]" id="imagen"/></td>
							</tr>
							

							
							<tr>
								<td><input type="submit" value="Registrar"/></td>
							</tr>
						</table>
						</form>
						
						
				
				</div>
				
		
		<footer>
			
			<p id="sig">Copyright &copy; 2014 Wala. Todos los derechos reservados.</p>
		
		</footer>
		
		</div>
		
		
	</body>
</html>