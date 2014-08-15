<?php
require_once(MODEL_PATH.'/entidad.php');

	class tipouser_producto implements entidad{
	
		private $id_tipouser;
		private $id_producto;
		
		function __construct($arrayOfData=''){
			
			if(isset($arrayOfData["id_tipouser"]) and strlen($arrayOfData["id_tipouser"])>0)
			$this->id_tipouser=$arrayOfData["id_tipouser"];
			else
			$this->id_tipouser='NULL';
			
			if(isset($arrayOfData["id_producto"]) and strlen($arrayOfData["id_producto"])>0)
			$this->id_producto=$arrayOfData["id_producto"];
			else
			$this->id_producto='NULL';
			
		
			
		}
		
		public function getProductoByType($tipo){
		
			$sql = 'select id_producto from tipouser_producto where id_tipouser='.$tipo;
			
			return $sql;
		
		}
		
		public function getSelectQuery(){
		
			$sql = 'select * from tipouser_producto';
			
			return $sql;
		
		}
		
		public function getInsertQuery(){
		
			$sql = 'insert into tipouser_producto values('.$this->id_tipouser.", ".$this->id_producto." );";
			
			return $sql;
		}
		
		public function getUpdateQuery(){}

		public function getDeleteQuery(){}
	
	}





?>