<?php
require_once(CONFIG_PATH.'/conexion.php');
require_once(MODEL_PATH.'/tipos.php');
require_once(MODEL_PATH.'/tipo_opcion.php');
require_once(MODEL_PATH.'/tipos_producto.php');


	class loadTipos{
	
		function __construct(){
		}
		/*Obtiene todas los tipos*/
		public function getAllTipos(){
				$array= array();
				$tipos = new tipos();
				$sql = $tipos->getSelectQuery();
				$conexion = new conexion();
				$db=$conexion->getConection();
				$result = $db->query($sql);
				while($row = mysqli_fetch_array($result)) {
				$array[]=$row;
				}
				
				return $array;
		}
		
		/*Obtiene el tipo de una determinada opcion*/
		public function getTipoOpcion($opcion){
		
				$array= array();
				$tipo_opcion = new tipo_opcion();
				$sql = $tipo_opcion->getTipoOpcion($opcion);
				$conexion = new conexion();
				$db=$conexion->getConection();
				$result = $db->query($sql);
				while($row = mysqli_fetch_array($result)) {
				$array[]=$row;
				}
				
				
				return $array;
		}
		
		public function getTiposById($id)
		{
			$tipos = new tipos();
			$sql = $tipos->getSelectQueryById($id);
			$conexion = new conexion();
			$db=$conexion->getConection();
			$result = $db->query($sql);
			
			while($row = mysqli_fetch_array($result)) {
			$array[]=$row;
			}
			
			
			return $array;
			
		}
		
		//obtiene el id del tipo especificando su grupo y su nombre, no deberia repetirse un nombre dentro de un mismo grupo
		public function getIdTipoFromGrupoAndName(){
		}
		
		/*Obtiene el/los tipo/s de un determinado producto*/
		public function getTipoProducto($producto){
				
				$array= array();
				$tipos_producto = new tipos_producto();
				$sql = $tipos_producto->getTipoProducto($producto);
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