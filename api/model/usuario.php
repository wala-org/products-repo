<?php
require_once(MODEL_PATH.'/entidad.php');

	class usuario implements entidad{
	
		private $id_usuario;
		private $usuario;
		private $facebook;
		private $imagen;
		private $password;
		private $nivel;
		private $perfil;
		
		function __construct($arrayOfData=''){
			
			if(isset($arrayOfData["id_usuario"]) and strlen($arrayOfData["id_usuario"])>0)
			$this->id_usuario=$arrayOfData["id_usuario"];
			else
			$this->id_usuario='NULL';
			
			if(isset($arrayOfData["usuario"]) and strlen($arrayOfData["usuario"])>0)
			$this->usuario="'".$arrayOfData["usuario"]."'";
			else
			$this->usuario='NULL';
			
			if(isset($arrayOfData["facebook"]) and strlen($arrayOfData["facebook"])>0)
			$this->facebook="'".$arrayOfData["facebook"]."'";
			else
			$this->facebook='NULL';
			
			if(isset($arrayOfData["imagen"]) and strlen($arrayOfData["imagen"])>0)
			$this->imagen="'".$arrayOfData["imagen"]."'";
			else
			$this->imagen='NULL';
			
			if(isset($arrayOfData["password"]) and strlen($arrayOfData["password"])>0)
			$this->password="'".$arrayOfData["password"]."'";
			else
			$this->password='NULL';
			
			if(isset($arrayOfData["nivel"]) and strlen($arrayOfData["nivel"])>0)
			$this->nivel=$arrayOfData["nivel"];
			else
			$this->nivel='NULL';
			
			if(isset($arrayOfData["perfil"]) and strlen($arrayOfData["perfil"])>0)
			$this->perfil=$arrayOfData["perfil"];
			else
			$this->perfil='NULL';
			
		}
		
		public function getSelectQuery(){
		
			$sql = 'select * from usuario';
			
			return $sql;
		
		}
		
		public function authUserQuery($username,$pass)
		{
			$sql = "select * from usuario where usuario='".$username."' and password='".md5($pass)."'";
			
			return $sql;
		}
		
		public function getInsertQuery(){
		
			$sql = 'insert into usuario values('.$this->id_usuario.", ".$this->usuario.", ".$this->facebook.", ".
			$this->imagen.", ".md5($this->password).", ".$this->nivel.", ".$this->perfil." );";
			
			return $sql;
		}
		
		public function getUpdateQuery(){}

		public function getDeleteQuery(){}
	
	}





?>