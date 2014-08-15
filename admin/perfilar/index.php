<?php
error_reporting(0);
session_start();
require_once('../../api/config/paths.php');
require_once(CONFIG_PATH.'/conexion.php');

function generar_cuerpo()
{

$sql= "select * from producto where perfilado=2";
//echo $sql; die();
$conexion = new conexion();
$db=$conexion->getConection();
$result = $db->query($sql);

$arr = [];


				while ($rec = mysqli_fetch_array($result))
				{
					$tmp['id_producto']=$rec['id_producto'];
					$tmp['nombre']=utf8_encode($rec['nombre']);
					$tmp['precio']=$rec['precio'];
					$tmp['imagen']=$rec['imagen'];
					$arr[]=$tmp;
				}
				
				$cuerpo='';
				
				foreach($arr as $key => $value){

							$class='';
							
							$cuerpo.='<tr>';
							$cuerpo.='<td '.$class.'>'.$value["id_producto"].'</td>';
							$cuerpo.='<td '.$class.'>'.$value["nombre"].'</td>';
							$cuerpo.='<td '.$class.'>'.$value["precio"].'</td>';
							$cuerpo.='<td '.$class.'><img style="width:50px;height:50px;" src="http://www.wala.com.ar/assets/img/products/'.$value["imagen"].'"/></td>';
							$cuerpo.='<td '.$class.'><a href="http://www.wala.com.ar/admin/perfilar/doperfilado?id_producto='.$value["id_producto"].'">Perfilar</a></td>';
							
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
		<script type="text/javascript" src="./js/productosperfil.js"></script>
		
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
			
				<div id="content" class="container">
				
					<!-- tabla de tiendas disponibles del usuario en cuestion -->
						<table id="tbl_listadoproductosperfil">
					 
							<thead>
							<tr>
							<th>Nro Producto</th>
							<th>Nombre</th>
							<th>Precio</th>
							<th>Imagen</th>
							<th>Accion</th>
							</tr>
							</thead>
							<tbody id="bodylistadoproductosperfil">
							
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