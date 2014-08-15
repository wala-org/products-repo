<?php
require_once(MODEL_PATH.'/entidad.php');


	class tipos_descripcion implements entidad{
	
		private $id_tipop1;
		private $id_tipop2;
		private $id_tipop3;
		private $id_tipop4;
		private $descripcion;
		
		function __construct($arrayOfData=''){
			
			if(isset($arrayOfData["id_tipop1"]) and strlen($arrayOfData["id_tipop1"])>0)
			$this->id_tipop1=$arrayOfData["id_tipop1"];
			else
			$this->id_tipop1='NULL';
			
			if(isset($arrayOfData["id_tipop2"]) and strlen($arrayOfData["id_tipop2"])>0)
			$this->id_tipop2=$arrayOfData["id_tipop2"];
			else
			$this->id_tipop2='NULL';
			
			if(isset($arrayOfData["id_tipop3"]) and strlen($arrayOfData["id_tipop3"])>0)
			$this->id_tipop3=$arrayOfData["id_tipop3"];
			else
			$this->id_tipop3='NULL';
			
			if(isset($arrayOfData["id_tipop4"]) and strlen($arrayOfData["id_tipop4"])>0)
			$this->id_tipop4=$arrayOfData["id_tipop4"];
			else
			$this->id_tipop4='NULL';
			
			if(isset($arrayOfData["descripcion"]) and strlen($arrayOfData["descripcion"])>0)
			$this->descripcion="'".$arrayOfData["descripcion"]."'";
			else
			$this->descripcion='NULL';
			
		
			
		}
		
		
		public function getSelectQuery(){
		
			$sql = 'select * from tipos_descripcion';
			
			return $sql;
		
		}
		
		public function getSelectQueryByIds($id1,$id2,$id3,$id4)
		{
		
			$sql = 'select * from tipos_descripcion where id_tipop1='.$id1.
			' and id_tipop2='.$id2.
			' and id_tipop3='.$id3.
			' and id_tipop4='.$id4;
			
			return $sql;
		
		}
		
		public function getInsertQuery(){
		}
		
		public function getUpdateQuery(){}

		public function getDeleteQuery(){}
	
	}





?>
