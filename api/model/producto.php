<?php
require_once(MODEL_PATH.'/entidad.php');

	class producto implements entidad{
	
		private $id_producto;
		private $id_tienda;
		private $nombre;
		private $precio;
		private $link;
		private $imagen;

		
		function __construct($arrayOfData=''){
			
			if(isset($arrayOfData["id_producto"]) and strlen($arrayOfData["id_producto"])>0)
			$this->id_producto=$arrayOfData["id_producto"];
			else
			$this->id_producto='NULL';
			
			if(isset($arrayOfData["id_tienda"]) and strlen($arrayOfData["id_tienda"])>0)
			$this->id_tienda=$arrayOfData["id_tienda"];
			else
			$this->id_tienda='NULL';
			
			if(isset($arrayOfData["nombre"]) and strlen($arrayOfData["nombre"])>0)
			$this->nombre=$arrayOfData["nombre"];
			else
			$this->nombre='NULL';
			
			if(isset($arrayOfData["precio"]) and strlen($arrayOfData["precio"])>0)
			$this->precio="'".$arrayOfData["precio"]."'";
			else
			$this->precio='NULL';
			
			if(isset($arrayOfData["link"]) and strlen($arrayOfData["link"])>0)
			$this->link="'".$arrayOfData["link"]."'";
			else
			$this->link='NULL';
			
			if(isset($arrayOfData["imagen"]) and strlen($arrayOfData["imagen"])>0)
			$this->imagen="'".$arrayOfData["imagen"]."'";
			else
			$this->imagen='NULL';

			
		}
		
		public function getSelectQuery(){
		
			$sql = 'select * from producto';
			
			return $sql;
		
		}
		
		public function getSelectQueryById($id){
		
			//$sql = 'select * from producto where id_producto='.$id.' and perfilado=1';
			$sql = 'select * from producto p join tienda t on p.id_tienda = t.id_tienda where p.id_producto='.$id.' and 
			p.perfilado=1 and t.verificada=1';
			
			return $sql;
		
		}


		public function getInsertQuery(){
		
			$sql = 'insert into producto values('.$this->id_producto.", ".$this->id_tienda.", ".$this->nombre.", ".$this->precio.", ".$this->link.", ".$this->imagen." );";
			
			return $sql;
		}
		
		public function getUpdateQuery(){}

		public function getDeleteQuery(){}
	
	}





?>