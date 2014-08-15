<?php
require_once(CONFIG_PATH.'/conexion.php');
require_once(MODEL_PATH.'/opciones.php');


	class loadOpciones{
	
		function __construct(){
		}
		/*Obtiene todas las opciones*/
		public function getAllOpciones(){
				$array= array();
				$opciones = new opciones();
				$sql = $opciones->getSelectQuery();
				$conexion = new conexion();
				$db=$conexion->getConection();
				$result = $db->query($sql);
				while($row = mysqli_fetch_array($result)) {
				$array[]=$row;
				}
				
				return $array;
		}
		
		/*Obtiene todas las opciones de una determinada pregunta*/
		public function getAllOptionsFromPregunta($id_pregunta){
				$array=array();
				$opciones = new opciones();
				$sql = $opciones->getSelectQueryByIdPregunta($id_pregunta);
				$conexion = new conexion();
				$db=$conexion->getConection();
				$result = $db->query($sql);
				while($row = mysqli_fetch_array($result)) {
				//var_dump($row);die();
				$array[]=$row;
				}
				
				return $array;
		}
	}


?>