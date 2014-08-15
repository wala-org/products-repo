<?php
session_start();
require_once(MODEL_PATH.'/entidad.php');

	class tienda implements entidad{
	
		private $id_tienda;
		private $client_id;
		private $client_secret;
		private $nombre;
		private $lat;
		private $lng;
		private $direccion;
		private $url;
		private $facebook;
		private $twitter;
		private $image;
		private $id_usuario;
		
		
		function __construct($arrayOfData=''){


			if(isset($arrayOfData["image"]) and strlen($arrayOfData["image"])>0)
			$this->image="'".$arrayOfData["image"]."'";
			else
			$this->image='NULL';
			
			if(isset($arrayOfData["twitter"]) and strlen($arrayOfData["twitter"])>0)
			$this->twitter="'".$arrayOfData["twitter"]."'";
			else
			$this->twitter='NULL';
			
			if(isset($arrayOfData["facebook"]) and strlen($arrayOfData["facebook"])>0)
			$this->facebook="'".$arrayOfData["facebook"]."'";
			else
			$this->facebook='NULL';
			
			if(isset($arrayOfData["url"]) and strlen($arrayOfData["url"])>0)
			$this->url="'".$arrayOfData["url"]."'";
			else
			$this->url='NULL';
			
			if(isset($arrayOfData["direccion"]) and strlen($arrayOfData["direccion"])>0)
			$this->direccion="'".$arrayOfData["direccion"]."'";
			else
			$this->direccion='NULL';
			
			
			if(isset($arrayOfData["lng"]) and strlen($arrayOfData["lng"])>0)
			$this->lng=$arrayOfData["lng"];
			else
			$this->lng='NULL';
			
			
			if(isset($arrayOfData["id_tienda"]) and strlen($arrayOfData["id_tienda"])>0)
			$this->id_tienda=$arrayOfData["id_tienda"];
			else
			$this->id_tienda='NULL';
			
			if(isset($arrayOfData["client_id"]) and strlen($arrayOfData["client_id"])>0)
			$this->client_id="'".$arrayOfData["client_id"]."'";
			else
			$this->client_id='NULL';
			
			if(isset($arrayOfData["client_secret"]) and strlen($arrayOfData["client_secret"])>0)
			$this->client_secret="'".$arrayOfData["client_secret"]."'";
			else
			$this->client_secret='NULL';
			
			if(isset($arrayOfData["nombre"]) and strlen($arrayOfData["nombre"])>0)
			$this->nombre="'".$arrayOfData["nombre"]."'";
			else
			$this->nombre='NULL';
			
			if(isset($arrayOfData["lat"]) and strlen($arrayOfData["lat"])>0)
			$this->lat=$arrayOfData["lat"];
			else
			$this->lat='NULL';
			
			$this->id_usuario = $_SESSION['id_usuario'];
			
			
		}
		
		public function getSelectQuery(){
		
			$sql = 'select * from tienda';
			
			return $sql;
		
		}
		
		public function getSelectQueryById($id){
		
			$sql = 'select * from tienda where id_tienda='.$id;
			
			return $sql;
		
		}

		
		public function getInsertQuery(){
		
			$sql = 'insert into tienda values('.$this->id_tienda.", ".$this->client_id.", ".$this->client_secret.", ".
			$this->nombre.", ".$this->lat.", ".$this->lng.", ".$this->direccion.", ".$this->url.", ".$this->facebook.", ".$this->twitter
			.", ".$this->image.", ".$this->id_usuario." );";
			
			return $sql;
		}
		
		public function getUpdateQuery(){}

		public function getDeleteQuery(){}
	
	}





?>