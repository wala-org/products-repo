<?php
require_once(CONFIG_PATH.'/conexion.php');
require_once(MODEL_PATH.'/tipos.php');
require_once(MODEL_PATH.'/tipos_descripcion.php');



	class loadTiposDescripcion{
	
		function __construct(){
		}
		
		public function getTiposDescripcionByIds($id1,$id2,$id3,$id4)
		{
			$tipos_descripcion = new tipos_descripcion();
			$sql = $tipos_descripcion->getSelectQueryByIds($id1,$id2,$id3,$id4);
			$conexion = new conexion();
			$db=$conexion->getConection();
			$result = $db->query($sql);
			
			//echo $sql;
			
			while($row = mysqli_fetch_array($result)) {
			$array[]=$row;
			}
			
			
			return $array;
		}
		
		
	}