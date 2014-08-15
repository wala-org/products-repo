<?php
require_once(MODEL_PATH.'/entidad.php');

	class opciones implements entidad{
	
		private $id_opcion;
		private $fk_pregunta;
		private $p_sig;
		private $valor;
		private $texto;
		
		function __construct($arrayOfData=''){
			
			if(isset($arrayOfData["id_opcion"]) and strlen($arrayOfData["id_opcion"])>0)
			$this->id_opcion=$arrayOfData["id_opcion"];
			else
			$this->id_opcion='NULL';
			
			if(isset($arrayOfData["fk_pregunta"]) and strlen($arrayOfData["fk_pregunta"])>0)
			$this->fk_pregunta=$arrayOfData["fk_pregunta"];
			else
			$this->fk_pregunta='NULL';
			
			if(isset($arrayOfData["p_sig"]) and strlen($arrayOfData["p_sig"])>0)
			$this->p_sig=$arrayOfData["p_sig"];
			else
			$this->p_sig='NULL';
			
			if(isset($arrayOfData["valor"]) and strlen($arrayOfData["valor"])>0)
			$this->valor=$arrayOfData["valor"];
			else
			$this->valor='NULL';
			
			if(isset($arrayOfData["texto"]) and strlen($arrayOfData["texto"])>0)
			$this->texto="'".$arrayOfData["texto"]."'";
			else
			$this->texto='NULL';
			
		}
		
		public function getSelectQuery(){
		
			$sql = 'select * from opciones';
			
			return $sql;
		
		}

		public function getSelectQueryByIdPregunta($id_pregunta){
			
			$sql = 'select * from opciones where fk_pregunta='.$id_pregunta;
			
			return $sql;
		}
		
		public function getInsertQuery(){
		
			$sql = 'insert into opciones values('.$this->id_opcion.", ".$this->fk_pregunta.", ".$this->p_sig.", ".$this->valor.", ".$this->texto." );";
			
			return $sql;
		}
		
		public function getUpdateQuery(){}

		public function getDeleteQuery(){}
	
	}





?>