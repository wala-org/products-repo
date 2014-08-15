<?php
require_once(MODEL_PATH.'/entidad.php');

	class tipos implements entidad{
	
		private $id_tipo;
		private $nombre;
		
		function __construct($arrayOfData=''){
			
			if(isset($arrayOfData["id_tipo"]) and strlen($arrayOfData["id_tipo"])>0)
			$this->id_tipo=$arrayOfData["id_tipo"];
			else
			$this->id_tipo='NULL';
			
			if(isset($arrayOfData["nombre"]) and strlen($arrayOfData["nombre"])>0)
			$this->nombre="'".$arrayOfData["nombre"]."'";
			else
			$this->nombre='NULL';
			
		
			
		}
		
		public function getSelectQueryByIdGrupoAndName($idgrupo,$name){
		
			$sql = 'select * from tipos where id_grupo='.$idgrupo.' and nombre='.$name;
		
			return $sql;
			
		}
		
		public function getSelectQuery(){
		
			$sql = 'select * from tipos';
			
			return $sql;
		
		}
		
		public function getSelectQueryById($id)
		{
		
			$sql = 'select * from tipos where id_tipo='.$id;
			
			return $sql;
		
		}
		
		public function getInsertQuery(){
		
			$sql = 'insert into tipos values('.$this->id_tipo.", ".$this->nombre." );";
			
			return $sql;
		}
		
		public function getUpdateQuery(){}

		public function getDeleteQuery(){}
	
	}





?>