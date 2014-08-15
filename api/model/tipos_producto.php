<?php
require_once(MODEL_PATH.'/entidad.php');

	class tipos_producto implements entidad{
	
		private $id_tipo;
		private $id_producto;
		
		function __construct($arrayOfData=''){
			
			if(isset($arrayOfData["id_tipo"]) and strlen($arrayOfData["id_tipo"])>0)
			$this->id_tipo=$arrayOfData["id_tipo"];
			else
			$this->id_tipo='NULL';
			
			if(isset($arrayOfData["id_producto"]) and strlen($arrayOfData["id_producto"])>0)
			$this->id_producto=$arrayOfData["id_producto"];
			else
			$this->id_producto='NULL';
			
		
			
		}
		
		public function setIdProducto($id){
			$this->id_producto=$id;
		}
		
		public function getProductoByType($tipo){
		
			$sql = 'select id_producto from tipos_producto where id_tipo='.$tipo;
			
			return $sql;
		
		}
		
		public function getTipoProducto($producto){
			
			$sql = 'select id_tipo from tipos_producto where id_producto='.$producto;
			
			return $sql;
		}
		
		public function getSelectQuery(){
		
			$sql = 'select * from tipos_producto';
			
			return $sql;
		
		}
		
		public function getInsertQuery(){
		
			$sql = 'insert into tipos_producto values('.$this->id_tipo.", ".$this->id_producto." );";
			
			return $sql;
		}
		
		public function getUpdateQuery(){}

		public function getDeleteQuery(){}
	
	}





?>