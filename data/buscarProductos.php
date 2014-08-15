<?php
session_start();
	require_once('../api/config/paths.php');
	require_once(CONFIG_PATH.'/conexion.php');
	require_once(CONTROLLER_PATH.'/loadTipos.php');
	require_once(CONTROLLER_PATH.'/loadProductos.php');
	require_once(CONTROLLER_PATH.'/loadTiendas.php');
	require_once (MERCADOPAGO_PATH.'/mercadopago.php');

	$arrayoftipos = array();
	$arrayofpruductos = array();
	
	$loadTipos = new loadTipos();
	$loadProductos = new loadProductos();
	$loadTiendas = new loadTiendas();
	

	foreach($_POST as $clave => $valor){

		foreach($valor as $clave2 => $valor2){
			if($valor2!=''){
			//echo $clave2.' - '.$valor2;
			$arrayoftipos[$clave2]=$valor2;
			}
		}

	}

	arsort($arrayoftipos);
	
	
	//var_dump($arrayoftipos);
	
	foreach($arrayoftipos as $key => $value){
	
		//echo $key;
		
		$productos = $loadProductos->getAllProductsByType($key);
			foreach($productos as $key2 => $value2){
					//var_dump($value2['id_producto']);
					
					if(!isset($arrayofpruductos[$value2['id_producto']])){
					$arrayofpruductos[$value2['id_producto']]=$value;
					}
					else{
					$arrayofpruductos[$value2['id_producto']]+=$value;
					}
			}
		
	
	}
	
	
	

	arsort($arrayofpruductos);
	
	$jsonproducts = array();
	
	foreach($arrayofpruductos as $clave => $valor){	
		if($loadProductos->getProductById($clave)!=null){
			$tmp['info_producto']=$loadProductos->getProductById($clave);
			$tmp['match_producto']=$valor;
			$jsonproducts[]=$tmp;
			}
	}
	
	

	
	echo json_encode($jsonproducts);

?>