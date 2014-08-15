<?php
require_once(CONFIG_PATH.'/conexion.php');
require_once(MODEL_PATH.'/tienda.php');

	class loadTiendas{
	
		function __construct(){
		}
		
		//obtiene informacion de una tienda dado un id de una tienda
		public function getTiendaById($idtienda){
			$tienda = new tienda();
				$sql = $tienda->getSelectQueryById($idtienda);
				$conexion = new conexion();
				$db=$conexion->getConection();
				//echo $sql; die();
				$result = $db->query($sql);
				while($row = mysqli_fetch_array($result)) {
					$tmp['id_tienda']=$row['id_tienda'];
					$tmp['client_id']=utf8_encode($row['client_id']);
					$tmp['client_secret']=utf8_encode($row['client_secret']);
					$tmp['nombre']=utf8_encode($row['nombre']);
					$tmp['lat']=$row['lat'];
					$tmp['lng']=$row['lng'];
					$tmp['direccion']=utf8_encode($row['direccion']);
					$tmp['url']=utf8_encode($row['url']);
					$tmp['facebook']=utf8_encode($row['facebook']);
					$tmp['twitter']=utf8_encode($row['twitter']);
					$tmp['image']=utf8_encode($row['image']);
					$tiend=$tmp;
				}
				
				return $tiend;
		}
		
		
		
		/*Obtiene todas los productos*/
		public function getAllTiendas(){
		}
		
		
		
	}