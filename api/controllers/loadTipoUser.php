<?php
require_once('../config/conexion.php');
require_once('../model/tipouser_producto.php');

	class loadTipoUser{
	
		function __construct(){
		}
		/*Obtiene todas los Tipos de Usuarios*/
		public function getAllTipos(){
				$array= array();
				$tipouser_producto = new tipouser_producto();
				$sql = $tipouser_producto->getSelectQuery();
				$result = $db->query($sql);
				while($row = mysqli_fetch_array($result)) {
				$array[]=$row;
				}
				
				return $array;
		}
	}


?>