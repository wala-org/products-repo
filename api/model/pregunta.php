<?php
require_once(MODEL_PATH.'/entidad.php');

	class pregunta implements entidad{
	
		private $id_pregunta;
		private $pregunta;
		private $id_tipouser;
		
		function __construct($arrayOfData=''){
			
			if(isset($arrayOfData["id_pregunta"]) and strlen($arrayOfData["id_pregunta"])>0)
			$this->id_pregunta=$arrayOfData["id_pregunta"];
			else
			$this->id_pregunta='NULL';
			
			if(isset($arrayOfData["pregunta"]) and strlen($arrayOfData["pregunta"])>0)
			$this->pregunta="'".$arrayOfData["pregunta"]."'";
			else
			$this->pregunta='NULL';
			
			if(isset($arrayOfData["id_tipouser"]) and strlen($arrayOfData["id_tipouser"])>0)
			$this->id_tipouser=$arrayOfData["id_tipouser"];
			else
			$this->id_tipouser='NULL';
		
			
		}
		
		public function getSelectQuery(){
		
			$sql = 'select * from pregunta';
			
			return $sql;
		
		}
		
		public function getSelectQueryById($idpregunta){
			
			$sql = 'select * from pregunta where id_pregunta='.$idpregunta;
			
			return $sql;
		}
		
		public function getFirstPregunta(){
		
			$sql ='select * from pregunta limit 1';
			
			return $sql;
		
		}
		
		public function getInsertQuery(){
		
			$sql = 'insert into pregunta values('.$this->id_pregunta.", ".$this->pregunta.", ".$this->id_tipouser." );";
			
			return $sql;
		}
		
		public function getUpdateQuery(){}

		public function getDeleteQuery(){}
	
	}





?>