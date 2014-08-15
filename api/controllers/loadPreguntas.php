<?php
require_once(CONFIG_PATH.'/conexion.php');
require_once(MODEL_PATH.'/pregunta.php');

	class loadPreguntas{
	
		function __construct(){
		}
		/*Obtiene todas las preguntas*/
		public function getAllPreguntas(){
				$array= array();
				$pregunta = new pregunta();
				$sql = $pregunta->getSelectQuery();
				$conexion = new conexion();
				$db=$conexion->getConection();
				$result = $db->query($sql);
				while($row = mysqli_fetch_array($result)) {
				$array[]=$row;
				}
				
				return $array;
		}
		
		/*Obtiene la pregunta asociada aun id de pregunta, por ej un p_sig de una opcion*/
		public function getPreguntaById($idpregunta){
				$array= array();
				$pregunta = new pregunta();
				$sql = $pregunta->getSelectQueryById($idpregunta);
				$conexion = new conexion();
				$db=$conexion->getConection();
				$result = $db->query($sql);
				while($row = mysqli_fetch_array($result)) {
				$array[]=$row;
				}
				
				return $array;
		}
		
		public function getFirstPregunta(){
				$array= array();
				$pregunta = new pregunta();
				$sql = $pregunta->getFirstPregunta();
				$conexion = new conexion();
				$db=$conexion->getConection();
				$result = $db->query($sql);
				while($row = mysqli_fetch_array($result)) {
				$array[]=$row;
				}
				
				return $array;
		}
	}


?>