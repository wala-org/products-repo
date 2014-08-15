<?php
require_once(MODEL_PATH.'/entidad.php');

	class tipo_opcion implements entidad{
	
		private $id_tipo;
		private $id_opcion;
		
		function __construct($arrayOfData=''){
			
			if(isset($arrayOfData["id_tipo"]) and strlen($arrayOfData["id_tipo"])>0)
			$this->id_tipo=$arrayOfData["id_tipo"];
			else
			$this->id_tipo='NULL';
			
			if(isset($arrayOfData["id_opcion"]) and strlen($arrayOfData["id_opcion"])>0)
			$this->id_opcion=$arrayOfData["id_opcion"];
			else
			$this->id_opcion='NULL';
			
		
			
		}
		
		
		public function getTipoOpcion($opcion){
		
			$sql = 'select id_tipo from tipo_opcion where id_opcion='.$opcion;
			
			return $sql;
		
		}
		
		public function getSelectQuery(){
		
			$sql = 'select * from tipo_opcion';
			
			return $sql;
		
		}
		
		public function getInsertQuery(){
		
			$sql = 'insert into tipo_opcion values('.$this->id_tipo.", ".$this->id_opcion." );";
			
			return $sql;
		}
		
		public function getUpdateQuery(){}

		public function getDeleteQuery(){}
	
	}





?>