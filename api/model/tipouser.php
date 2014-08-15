<?php
require_once('./entidad.php');

	class tipouser implements entidad{
	
		private $id_tipouser;
		private $nombre;
		private $sexo;
		private $edad_hasta;
		private $edad_desde;
		
		function __construct($arrayOfData=''){
			
			if(isset($arrayOfData["id_tipouser"]) and strlen($arrayOfData["id_tipouser"])>0)
			$this->id_tipouser=$arrayOfData["id_tipouser"];
			else
			$this->id_tipouser='NULL';
			
			if(isset($arrayOfData["sexo"]) and strlen($arrayOfData["sexo"])>0)
			$this->sexo=$arrayOfData["sexo"];
			else
			$this->sexo='NULL';
			
			if(isset($arrayOfData["edad_hasta"]) and strlen($arrayOfData["edad_hasta"])>0)
			$this->edad_hasta=$arrayOfData["edad_hasta"];
			else
			$this->edad_hasta='NULL';
			
			if(isset($arrayOfData["edad_desde"]) and strlen($arrayOfData["edad_desde"])>0)
			$this->edad_desde=$arrayOfData["edad_desde"];
			else
			$this->edad_desde='NULL';
			
			if(isset($arrayOfData["nombre"]) and strlen($arrayOfData["nombre"])>0)
			$this->nombre="'".$arrayOfData["nombre"]."'";
			else
			$this->nombre='NULL';
			
		}
		
		public function getSelectQuery(){
		
			$sql = 'select * from tipouser';
			
			return $sql;
		
		}

		public function getInsertQuery(){
		
			$sql = 'insert into tipouser values('.$this->id_tipouser.", ".$this->nombre.", ".$this->sexo.", ".$this->edad_hasta.", ".$this->edad_desde." );";
			
			return $sql;
		}
		
		public function getUpdateQuery(){}

		public function getDeleteQuery(){}
	
	}





?>