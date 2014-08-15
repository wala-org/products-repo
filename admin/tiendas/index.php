<?php 
session_start(); 
require_once('../../api/config/paths.php');
require_once(CONFIG_PATH.'/conexion.php');

function generar_cuerpo()
{

$sql= "select * from tienda where id_usuario=".$_SESSION['id_usuario'];
//echo $sql; die();
$conexion = new conexion();
$db=$conexion->getConection();
$result = $db->query($sql);



				while ($rec = mysqli_fetch_array($result))
				{
					$tmp['id_tienda']=$rec['id_tienda'];
					$tmp['nombre']=$rec['nombre'];
					$tmp['provincia']=$rec['provincia'];
					$tmp['departamento']=$rec['departamento'];
					$tmp['direccion']=$rec['direccion'];
					$tmp['verificada']=$rec['verificada'];
					$arr[]=$tmp;
				}
				
				$cuerpo='';
				
				foreach($arr as $key => $value){

							$class='';
							
							$cuerpo.='<tr>';
							$cuerpo.='<td '.$class.'>'.$value["id_tienda"].'</td>';
							$cuerpo.='<td '.$class.'>'.$value["nombre"].'</td>';
							$cuerpo.='<td '.$class.'>'.$value["provincia"].'</td>';
							$cuerpo.='<td '.$class.'>'.$value["departamento"].'</td>';
							$cuerpo.='<td '.$class.'>'.$value["direccion"].'</td>';
							
							if($value["verificada"]==1)
							$cuerpo.='<td style="background:green;"'.$class.'>Verificada</td>';
							else
							$cuerpo.='<td  style="background:red;"'.$class.'>No verificada</td>';
							
							$cuerpo.='<td '.$class.'><a href="http://www.wala.com.ar/admin/productos?id_tienda='.$value["id_tienda"].'">Ver Productos</a></td>';
							
							$cuerpo.='</td>';
				}
				
				echo $cuerpo;

}
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
		<link rel="stylesheet" type="text/css" href="../../assets/css/normalize.css" />
		<link rel="stylesheet" href="../../assets/css/fonts.css" />
		<link rel="stylesheet" href="../../assets/css/styles.css" />
		<link rel="stylesheet" href="../../assets/css/skdslider.css" />
		<link rel="stylesheet" href="../../assets/css/jquery.dataTables.css">
		<link rel="stylesheet" href="../../assets/css/jquery-ui-1.10.4.custom.min.css">
		
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="../../assets/js/modernizr.custom.js"></script>
		<script type="text/javascript" src="../../assets/js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="../../assets/js/skdslider.js"></script>
		<script type="text/javascript" src="../../assets/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="../../assets/js/jquery.dataTables.columnFilter.js"></script>
		<script type="text/javascript" src="./js/tiendas.js"></script>
		
	</head>
	<body>
		<div class="container headercontainer">
			<header>
				<nav>
				
					<? //aqui incluimos el header 
						include_once('../../templates/header.php');
					?>
				</nav>
				
			</header>

			
				<div class="container" id="content">
				
				<a href="http://www.wala.com.ar/admin/tiendas/registrartienda" class="selected">Nueva tienda</a>
					<!-- tabla de tiendas disponibles del usuario en cuestion -->
						<table id="tbl_listadotiendas">
					 
							<thead>
							<tr>
							<th>Nro Tienda</th>
							<th>Nombre Tienda</th>
							<th>Provincia</th>
							<th>Departamento</th>
							<th>Direccion</th>
							<th>Verificada</th>
							<th>Accion</th>
							</tr>
							</thead>
							<tbody id="bodylistadotiendas">
							
							<?php
								generar_cuerpo();
							?>
							
							</tbody>
							
								<tfoot>
									<tr>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
								</tfoot>
							</table>
					
				</div>
				
				
				
				
				

		
		
		
		
		
		
		
		<footer>
			
			<p id="sig">Copyright &copy; 2014 Wala. Todos los derechos reservados.</p>
		
		</footer>
		
		</div>
		
		
	</body>
</html>