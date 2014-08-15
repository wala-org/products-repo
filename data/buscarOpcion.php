<?php
session_start();
require_once('../api/config/paths.php');
require_once(CONFIG_PATH.'/conexion.php');
require_once(CONTROLLER_PATH.'/loadOpciones.php');

$loadOpciones = new loadOpciones();

if(isset($_POST['idpregunta']) and $_POST['idpregunta']!=''){
$opciones=$loadOpciones->getAllOptionsFromPregunta($_POST['idpregunta']);
}
           
echo json_encode($opciones);


?>