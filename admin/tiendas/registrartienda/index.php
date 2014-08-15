<?php
session_start();
	require_once('../../../api/config/paths.php');
	require_once(CONFIG_PATH.'/conexion.php');
	require_once(CONTROLLER_PATH.'/loadTipos.php');
	require_once(CONTROLLER_PATH.'/loadProductos.php');
	require_once(CONTROLLER_PATH.'/loadTiendas.php');
	require_once (MERCADOPAGO_PATH.'/mercadopago.php');
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
		<script type="text/javascript" src="./js/script.js"></script>
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
			
				<div class="container" id="content">
				
				
						<?php
							if(isset($_POST['nombre']) and sizeof($_POST['nombre'])>0)
							{
								$nombre=$_POST['nombre'];
								$provincia=$_POST['provincia'];
								$departamento=$_POST['departamento'];
								
								//var_dump(sizeof($_POST['barrio'])); 
								if(isset($_POST['barrio']) and strlen($_POST['barrio'])>0)
								$barrio=$_POST['barrio'];
								else
								$barrio=0;
								
								$direccion=$_POST['direccion'];
								$clientid=$_POST['client_id'];
								$clientsecret=$_POST['client_secret'];
								
								$user_id = $_SESSION['id_usuario'];
								
								$sql = "insert into tienda(id_tienda,client_id,client_secret,nombre,provincia,departamento,
										barrio,direccion,id_usuario) values (0,'$clientid','$clientsecret','$nombre',$provincia,$departamento,
										$barrio,'$direccion',$user_id)";
								
								$conexion = new conexion();
								$db=$conexion->getConection();
								
								//echo $sql; die();
								
								$result = $db->query($sql);
			
								if($result==false){
								echo 'No puedo registrarse la tienda'; die();
								}
								else
								{
								echo 'Se registró la tienda exitosamente'; die();
								}
							}
						?>
						<h3>Registrar Tienda</h3> 
						<form method="POST">
						<table>
							<tr>
							<td>Nombre:</td><td><input name="nombre" id="nombre" required/></td>
							</tr>
							
							<tr>
							<td>Provincia:</td><td><select name="provincia" id="provincia" required><option value="">Seleccione</option></select></td>
							</tr>
							
							<tr>
							<td>Departamento:</td><td><select name="departamento" id="departamento" required><option value="">Seleccione</option></select></td>
							</tr>
							
							<tr style="display:none">
							<td>Barrio:</td><td><select name="barrio" id="barrio"><option value="">Seleccione</option></select></td>
							</tr>
							
							<tr>
							<td>Direcci&oacute;n:</td><td><input name="direccion" id="direccion" required/></td>
							</tr>
							
							<tr>
								<td>Client_ID</td><td><input type="text" name="client_id" id="client_id" required/></td>
							</tr>
							
							<tr>
								<td>Client_Secret</td><td><input type="text" name="client_secret" id="client_secret" required/></td>
							</tr>
							

							
							<tr>
								<td><input type="submit" value="Registrar"/></td>
							</tr>
						</table>
						</form>
						<br>
						<div style="color:red"id="explicacion" name="explicacion">
									<a  target="_blanck" href="https://www.mercadopago.com/mla/herramientas/aplicaciones">
									---> Obtener Client_ID y Client_Secret de mercadopago <--
									</a>
									<br>
									Nota: debera ingresar su usuario y contraseña de mercadolibre,
									la pagina en la que se encontrará es propiedad de mercadolibre,
									por su seguridad la client_secret es un hash md5 de su contraseña,
									esto quiere decir que proveernos el client_secret no supone 
									ningun riesgo para su cuenta y es practicamente imposible que alguien
									sabiendo su client_secret pueda averiguar su contraseña.
						</div>	
						
				
				</div>
				

		
		
		
		
		
		
		
		<footer>
			
			<p id="sig">Copyright &copy; 2014 Wala. Todos los derechos reservados.</p>
		
		</footer>
		
		</div>
		
		
	</body>
</html>