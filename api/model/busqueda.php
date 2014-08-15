<?php
require_once('./entidad.php');

	class busqueda implements entidad{
	
		private $id_busqueda=0;
		private $fecha;
		private $id_usuario;
		private $nombreagasajado;
		
		function __construct($arrayOfData=''){
			
			if(isset($arrayOfData["id_busqueda"]) and strlen($arrayOfData["id_busqueda"])>0)
			$this->id_busqueda=$arrayOfData["id_busqueda"];
			else
			$this->id_busqueda='NULL';
			
			if(isset($arrayOfData["fecha"]) and strlen($arrayOfData["fecha"])>0)
			$this->fecha="'".$arrayOfData["fecha"]."'";
			else
			$this->fecha='NULL';
			
			if(isset($arrayOfData["id_usuario"]) and strlen($arrayOfData["id_usuario"])>0)
			$this->id_usuario=$arrayOfData["id_usuario"];
			else
			$this->id_usuario='NULL';
			
			if(isset($arrayOfData["nombreagasajado"]) and strlen($arrayOfData["nombreagasajado"])>0)
			$this->nombreagasajado="'".$arrayOfData["nombreagasajado"]."'";
			else
			$this->nombreagasajado='NULL';
			
		}
		
		public function getSelectQuery(){
		
			$sql = 'select * from busqueda';
			
			return $sql;
		
		}
		
		public function getInsertQuery(){
		
			$sql = 'insert into busqueda values('.$this->id_busqueda.", ".$this->fecha.", ".$this->id_usuario.", ".$this->nombreagasajado." );";
			
			return $sql;
		}
		
		public function getUpdateQuery(){}

		public function getDeleteQuery(){}
	
	}





?>