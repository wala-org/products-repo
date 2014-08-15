<?php
session_start();
require_once('../api/config/paths.php');
require_once(CONFIG_PATH.'/conexion.php');
require_once(CONTROLLER_PATH.'/loadTipos.php');
require_once(CONTROLLER_PATH.'/loadTiposDescripcion.php');	
	$arrayoftipos = array();
		
	$loadTipos = new loadTipos();
	$loadTiposDescripcion = new loadTiposDescripcion();
	
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
		$tipoinfo[]=$loadTipos->getTiposById($key)[0]["nombre"];
		$tipoids[]=$loadTipos->getTiposById($key)[0]["id_tipo"];
	}
	
	$tiposarray=[];
	//Armamos el tipo que corresponde, tambien deberiamos tener la descripcion en alguna tabla, para hacer mas tarde
	$tipostring='';
	for($i=sizeof($tipoinfo);$i>=0;$i--)
	{
		$tipostring.=$tipoinfo[$i];
	}
	
	$tiposarray['tipo_personalidad']=$tipostring;
	$tiposarray['tipo_descripcion']=utf8_encode($loadTiposDescripcion->getTiposDescripcionByIds($tipoids[3],$tipoids[2],$tipoids[1],$tipoids[0])[0]['descripcion']);
	
	echo json_encode($tiposarray);
	
	
?>
	