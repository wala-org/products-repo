<?php
require_once('./entidad.php');

	class busqueda_opcion implements entidad{
	
		private $id_busqueda;
		private $id_opcion;
		
		function __construct($arrayOfData=''){
			
			if(isset($arrayOfData["id_busqueda"]) and strlen($arrayOfData["id_busqueda"])>0)
			$this->id_busqueda=$arrayOfData["id_busqueda"];
			else
			$this->id_busqueda='NULL';

			$this->fecha='NULL';
			
			if(isset($arrayOfData["id_opcion"]) and strlen($arrayOfData["id_opcion"])>0)
			$this->id_opcion=$arrayOfData["id_opcion"];
			else
			$this->id_opcion='NULL';
			

			
		}
		
		public function getSelectQuery(){
		
			$sql = 'select * from busqueda_opcion';
			
			return $sql;
		
		}
		
		public function getInsertQuery(){
		
			$sql = 'insert into busqueda_opcion values('.$this->id_busqueda.", ".$this->id_opcion." );";
			
			return $sql;
		}
		
		public function getUpdateQuery(){}

		public function getDeleteQuery(){}
	
	}





?>