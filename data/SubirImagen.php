<?php


class SubirImagen{

private $uploadDir;
private $allowedExt=array();
private $allowedSize;
private $paths=array();

	function __construct($uploadDir,$allowedExt,$allowedSize){
			$this->uploadDir=$uploadDir;
			$this->allowedExt=$allowedExt;//array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG) for images
			$this->allowedSize=$allowedSize;
	}
	
	//sube las imagenes e inserta en la bd los path
	public function uploadFile(&$files,$idproducto){
	
	if (!is_dir($this->uploadDir)) {
				mkdir($this->uploadDir, 0777, true);}
	
				foreach($files['files']['tmp_name'] as $key => $tmp_name ){
				
				
							if (!empty($files['files']['tmp_name'][$key])) {
							
										if ($files['files']['error'][$key] !== UPLOAD_ERR_OK) {
										echo 'Cannot upload file'; die();
											throw new Exception('Cannot upload file');
										}

										// verify the file is a GIF, JPEG, or PNG
										/*$fileType = exif_imagetype($files['files']['tmp_name'][$key]);

										if (!in_array($fileType,$this->allowedExt)) {
										echo 'Cannot upload file2'; die();
												throw new Exception('Cannot upload file');
												
										}*/
											
											// ensure a safe filename
											$name = preg_replace("/[^A-Z0-9._-]/i", "_", $files['files']['name'][$key]);
											
											
											// don't overwrite an existing file
											$i = 0;
											$parts = pathinfo($this->uploadDir . $name);
											
											while (file_exists($this->uploadDir . $name)) {
												$i++;
												$name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
											}
											//save paths on assosiative array
											$this->paths[$key]=$name;
											//echo UPLOAD_DIR . $name; 
											// preserve file from temporary directory
											//var_dump($this->uploadDir.$name);
											$success = move_uploaded_file($files['files']['tmp_name'][$key],
												$this->uploadDir . $name);
											
											//key contiene a quien pertenece											
											
											
											
											if (!$success) { 
											echo 'Cannot upload file3'; die();
												throw new Exception('Cannot upload file');
											}
						}
			// set proper permissions on the new file
			//chmod($this->uploadDir . $name, 0777);
			}
	
	}
	
	public function getAllowedSize(){
	return $this->allowedSize;
	}
	
	public function getAllowedExt(){
	return $this->allowedExt;
	}
	
	public function getUploadDir(){
	return $this->uploadDir;
	}
	
	public function getPaths(){
	return $this->paths;
	}
	
	
	
	
}


?>