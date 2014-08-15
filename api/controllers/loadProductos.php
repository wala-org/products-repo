<?php
require_once(CONFIG_PATH.'/conexion.php');
require_once(MODEL_PATH.'/producto.php');
require_once(MODEL_PATH.'/tipos_producto.php');
require_once(MODEL_PATH.'/tipouser_producto.php');



	class loadProductos{
	
		function __construct(){
		}
		
		public function getProductById($idproducto){
				
				$producto = new producto();
				$sql = $producto->getSelectQueryById($idproducto);
				$conexion = new conexion();
				$db=$conexion->getConection();
				
				$result = $db->query($sql);
				while($row = mysqli_fetch_array($result)) {
				//var_dump($row);
					$tmp['id_producto']=$row['id_producto'];
					$tmp['nombre']=utf8_encode($row[2]);
					$tmp['precio']=$row['precio'];
					$tmp['id_tienda']=$row['id_tienda'];
					$tmp['descripcion']=$row['descripcion'];
					$tmp['link']=utf8_encode($row['link']);
					$tmp['imagen']=utf8_encode($row['imagen']);
					$product=$tmp;
				}
				
				
				return $product;
		}
		
		/*Obtiene todas los productos*/
		public function getAllProductos(){
				$array= array();
				$tmp=array();
				$producto = new producto();
				$sql = $producto->getSelectQuery();
				$conexion = new conexion();
				$db=$conexion->getConection();
				
				$result = $db->query($sql);
				while($row = mysqli_fetch_array($result)) {
				$tmp['id_producto']=$row['id_producto'];
				$tmp['nombre']=utf8_encode($row['nombre']);
				$tmp['precio']=$row['precio'];
				$tmp['link']=utf8_encode($row['link']);
				$tmp['imagen']=utf8_encode($row['imagen']);
				$array[]=$tmp;
				}
				
				return $array;
		}
		
		/*Obtiene todos los productos relacionados aun tipo*/
		public function getAllProductsByType($tipo){	
				$array= array();
				$tipos_producto = new tipos_producto();
				$sql = $tipos_producto->getProductoByType($tipo);
				$conexion = new conexion();
				$db=$conexion->getConection();
				
				$result = $db->query($sql);
				while($row = mysqli_fetch_array($result)) {
				$array[]=$row;
				}
				
				return $array;
		}
		
		/*Obtiene todos los productos relacionados a un tipouser*/
		public function getAllProductsByTypeOfUser($tipo){	
				$array= array();
				$tipouser_producto = new tipouser_producto();
				$sql = $tipouser_producto->getProductoByType($tipo);
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