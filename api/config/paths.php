<?php
$config = array(   			// termina array "db"
"paths" => array(   //comienza array paths
	"raiz" => $_SERVER["DOCUMENT_ROOT"]."",
	"urlBase" => 'http://198.12.153.181'
	));
	
define("PATH_BASE",$config['paths']['urlBase']);	
define("API_PATH",$config['paths']['raiz'].'/api');
define("MODEL_PATH",  $config['paths']['raiz'].'/api/model');
define("MERCADOPAGO_PATH",  $config['paths']['raiz'].'/api/mercadopago');
define("CONTROLLER_PATH",  $config['paths']['raiz'].'/api/controllers');
define("CONFIG_PATH",  $config['paths']['raiz'].'/api/config');
define("MODEL_PATH_BASE",  $config['paths']['urlBase'].'/api/model');
define("MERCADOPAGO_PATH_BASE",  $config['paths']['urlBase'].'/api/mercadopago');
define("CONTROLLER_PATH_BASE",  $config['paths']['urlBase'].'/api/controllers');