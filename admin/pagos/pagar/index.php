<?php
session_start();

/*
$passfrase = $_REQUEST['passfrase'];

if(!isset($_REQUEST['passfrase']) or $passfrase!='entrarawala' ){
echo 'sitio en construccion'; 
die();
}*/

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
		<link rel="stylesheet" href="../../../assets/css/animations.css" />
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="../../../assets/js/modernizr.custom.js"></script>
		<script type="text/javascript" src="../../../assets/js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="../../../assets/js/skdslider.js"></script>
		<script type="text/javascript" src="../../../assets/js/login.js"></script>
	</head>
	<body>
		<div class="container headercontainer">
			<header>
				<nav>
				
				<? //aqui incluimos el header 
				include_once('../../../templates/header.php');
				?>
						<!-- Esto va en wwwwala/admintienda, donde tendra el listado de sus tiendas, la administracion de sus productos, etc
						<!--<li><a href="http://www.wala.com.ar/registrartienda" class="selected">Registrar Tienda</a></li>-->
						
						<!-- aqui se registraran los usuarios de los diversos perfiles, por ahora: cliente, perfilador, tienda -->
					
				</nav>
				
			</header>
			
				<div id="content" class="container">
				
				
						<?php
						
						if(isset($_GET['idproducto'])){
										 $loadProductos = new loadProductos();
										 $loadTiendas = new loadTiendas();
										 $tmp['info_producto']=$loadProductos->getProductById($_GET['idproducto']);
										 $tmp['info_tienda']=$loadTiendas->getTiendaById($tmp['info_producto']['id_tienda']);
										 $mp = new MP($tmp['info_tienda']['client_id'],$tmp['info_tienda']['client_secret']);
										 $mp->sandbox_mode(TRUE);										 
										 //habria que armar todos los items y podrian tener de indices el id producto, para que el create_preference sea uno solo
										 $item = array(
													array(
														"title" => $tmp['info_producto']['nombre'],       
														"quantity" => 1,
														"currency_id" => "ARS",
														"unit_price" => intval($tmp['info_producto']['precio']),
														"picture_url" => "http://www.wala.com.ar/assets/img/products/".$tmp['info_producto']['imagen']
													)
										 ); 
										 //var_dump($item);
										 $preference_data = array(
												"items" => $item,
												"back_urls" => array(
												//falta definir estas urls
													'success' => 'http://www.wala.com.ar/mercadopago/index2.php',
													"failure" => "http://www.wala.com.ar/mercadopago/index2.php",
													'pending' => 'http://www.wala.com.ar/mercadopago/index2.php'
												)
										);
										$preference = $mp->create_preference ($preference_data);
										$html.='<div class="leftdivproduct"><h1>Tienda <b>'.$tmp['info_tienda']['nombre'].'</b></h1>';
										$html.='<h3>Producto: <b>'.$tmp['info_producto']['nombre'].'</b></h3>';
										$html.='<img style="width:40%;height:40%;" src="http://www.wala.com.ar/assets/img/products/'.$tmp['info_producto']['imagen'].'">';
										$html.='<p>Precio: $AR '.$tmp['info_producto']['precio'].'</p>';
										//esto hay que guardarlo, junto al client_id y el product_id 
										//(el client_id no puede ser nulo!), sino no se podrá hacer refund
										$html .= '<a href='.$preference['response']['sandbox_init_point'].' name="MP-Checkout" class="red-M-Rn-Ar-ArAll" mp-mode="modal" >Pagar</a>';
										$html .='<script type="text/javascript" src="http://mp-tools.mlstatic.com/buttons/render.js"></script></div>';
										$html.='<div class="rightdivproduct"><h3>Informacion: </h3><br>'.$tmp['info_producto']['descripcion'].'</div>';
										
										echo $html;
							//var_dump($_GET);
						}
						else
						echo 'Usted no ha seleccionado ningun producto para comprar';
						
						?>
				
				</div>
				
				
				
				
				
		
		
		
		
		
		
		<footer>
			
			<p id="sig">Copyright &copy; 2014 Wala. Todos los derechos reservados.</p>
		
		</footer>
		
		</div>
		
		
	</body>
</html>