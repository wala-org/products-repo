<?php
require_once(CONFIG_PATH.'/conexion.php');
require_once(MODEL_PATH.'/producto.php');
require_once(MODEL_PATH.'/tipos_producto.php');
require_once(MODEL_PATH.'/tipos.php');

	class insertProducto{
	
	//devuelve true o false si pudo o no, hay que tratarlo como una transaccion ya que depende de varias tablas
		public function insertProductoWithType($producto,$idtype){
		
			$conexion = new conexion();
			$db=$conexion->getConection();
			//comienza la transaccion
			mysqli_autocommit($db,FALSE);
			$product = new producto($producto);
			$sql = $producto->getInsertQuery();
			$result = $db->query($sql);
			
				if($result==false){
				mysqli_errno($db);
				return false;
				}
				
			//get the last id
			$id = mysqli_insert_id($db);
			
			$tipo_producto = new tipos_producto();
			$tipo_producto->setIdProducto($id);
			$sql = $tipo_producto->getInsertQuery();
			$result = $db->query($sql);
			
				if($result==false){
				mysqli_errno($db);
				return false;
				}
			
			mysqli_commit($db);
			return true;
		}
	
	
	}



?>