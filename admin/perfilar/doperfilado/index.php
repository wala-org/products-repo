<?php
//error_reporting(0);
session_start();
require_once('../../../api/config/paths.php');
require_once(CONFIG_PATH.'/conexion.php');

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
							if(isset($_POST['extroversion']) and sizeof($_POST['extroversion'])>0)
							{
								$id_producto = $_POST['id_producto'];
								$extroversion=$_POST['extroversion'];
								
								$sensory=$_POST['sensory'];
								$feeling=$_POST['feeling'];
								$judge=$_POST['judge'];
								
								//imagen
								
								$sql = "insert into tipos_producto(id_producto,id_tipo) 
									values ($id_producto,$extroversion),($id_producto,$sensory),($id_producto,$feeling),
											($id_producto,$judge)";

								
								
								$conexion = new conexion();
								$db=$conexion->getConection();
								$db->autocommit(FALSE);
								
								//echo $sql; die();
								
								$result = $db->query($sql);
			
								if($result==false){
								echo $sql;
								echo 'No puedo registrarse el producto'; die();
								}
								else
								{
									//procedemos a poner en 1 al producto ya que se ha perfilado
									$sql = 'update producto set perfilado=1 where id_producto='.$id_producto;
									
									//echo $sql; die();
									
									$result = $db->query($sql);
				
									if($result==false){
									echo $sql;
									echo 'No puedo registrarse el producto'; die();
									}
									else
									{
									echo 'Se registró el producto exitosamente'; 
									$db->commit();
									die();
									}
								}
							}
						?>
						<h3>Perfilar Producto</h3> 
						<form method="POST">

							<input type="hidden" name="id_producto" id="id_producto" value="<?php 
															if(isset($_GET['id_producto']))
															echo (int)$_GET['id_producto'];
															else if(isset($_POST['id_producto']))
															echo (int)$_POST['id_producto'];

														  ?>"/>
						<table>
							<tr>
								<td>Extrovertido/Intovertido:</td>
								<td>
									<select name="extroversion" id="extroversion">
										<option value="5">I</option>
										<option value="6">E</option>
									</select>
								</td>
							</tr>
							
							<tr>
								<td>Intuitivo/Sensorial</td>
								<td>
									<select name="sensory" id="sensory">
										<option value="7">N</option>
										<option value="8">S</option>
									</select>
								</td>
							</tr>
							
							<tr>
								<td>Emocional/Racional</td>
								<td>
								<select name="feeling" id="feeling">
									<option value="9">F</option>
									<option value="10">T</option>
								</select>
								</td>
							</tr>
							
							<tr>
								<td>Perceptivo/Calificador</td>
								<td>
								<select name="judge" id="judge">
									<option value="11">P</option>
									<option value="12">J</option>
								</select>
								</td>
							</tr>
							<tr>
							<td><input type="submit" value="Grabar" class="btn btn-danger"/></td>
						</table>
						</form>
						
						
				
				</div>
				
		
		<footer>
			
			<p id="sig">Copyright &copy; 2014 Wala. Todos los derechos reservados.</p>
		
		</footer>
		
		</div>
		
		
	</body>
</html>