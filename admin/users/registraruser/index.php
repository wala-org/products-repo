<?php
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
			
				<div  class="container" id="content">
				
				
						<?php
							if(isset($_REQUEST['nombreusuario']) and sizeof($_REQUEST['nombreusuario'])>0)
							{
								$nombreusuario=$_REQUEST['nombreusuario'];
								$password=md5($_REQUEST['password']);
								$email=$_REQUEST['email'];
								
								//var_dump(sizeof($_POST['barrio'])); 
								$perfil=$_REQUEST['perfil'];
								
								
								$sql = "insert into usuario(id_usuario,usuario,password,email,nivel,perfil) 
								values (0,'$nombreusuario','$password','$email',1,$perfil)";
								
								$conexion = new conexion();
								$db=$conexion->getConection();
								
								//echo $sql; die();
								
								$result = $db->query($sql);
			
								if($result==false){
								echo 'No puedo registrarse el usuario'; die();
								}
								else
								{
								echo 'Se registró el usuario exitosamente, ya puede loguearse'; die();
								}
							}
						?>
						<h3>Registrar Usuario</h3> 
						<form method="POST">
						<table>
							<tr>
							<td>Nombre Usuario:</td><td><input type="text" name="nombreusuario" id="nombreusuario" required/></td>
							</tr>
							
							<tr>
							<td>Password:</td><td><input type="password" name="password" id="password" required></td>
							</tr>
							
							<tr>
							<td>Email:</td><td><input type="email" name="email" id="email" required></td>
							</tr>
							
							
							<tr>
								<td>Tipo:</td>
								<td>
									<select name="perfil" id="perfil" required>
										<option value="1">Cliente</option>
										<option value="2">Tienda</option>
									</select>
								</td>
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