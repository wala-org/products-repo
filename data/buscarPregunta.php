<?php
session_start();
	require_once('../api/config/paths.php');
	require_once(CONFIG_PATH.'/conexion.php');
	require_once(CONTROLLER_PATH.'/loadPreguntas.php');
	require_once(CONTROLLER_PATH.'/loadTipos.php');



	$loadPreguntas = new loadPreguntas();
	$loadTipos = new loadTipos();

	if(!isset($_POST['sigpreg']))
	{
		if(isset($_POST['idpregunta']) and $_POST['idpregunta']!='')
		{
			$preguntas = $loadPreguntas->getPreguntaById($_POST['idpregunta']);
		}
		else
		{
			$preguntas = $loadPreguntas->getFirstPregunta();
		}
	}
	else if($_POST['sigpreg']!=null){
			$tipo=$loadTipos->getTipoOpcion($_POST['opcion']);
			$preguntas = $loadPreguntas->getPreguntaById($_POST['sigpreg']);
	}
	else{
			$tipo=$loadTipos->getTipoOpcion($_POST['opcion']);
	}




	if(!isset($_POST['sigpreg']) || $_POST['sigpreg']!=null)
	{	
		if(isset($tipo))
		{
		$result = array_merge($preguntas[0],$tipo[0]);
		echo json_encode($result);
		}
		else
		echo json_encode($preguntas);
	}
	else{
	echo json_encode($tipo[0]);
	}

?>