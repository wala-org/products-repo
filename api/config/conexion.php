	<?php
 
 	    

	
	class conexion{
	
		/*session_start();*/
	 private $db=null;
	 private $bd_host = "localhost"; 
	 private $bd_usuario = "wala_user"; 
	 private $bd_password = "yodecar8";
	 //$bd_usuario = "consultaBase";	 
	 //$bd_password = "sololee";
	 private $bd_base = "wala_db";
	 
	 public function getConection(){
			
			if($this->db===null)
			{
			$this->db=mysqli_connect($this->bd_host,$this->bd_usuario,$this->bd_password,$this->bd_base);  
			}
			
			return $this->db;
	 }
	
	
	}
?>
