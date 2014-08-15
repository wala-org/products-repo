<?php
session_start();
require_once('../api/config/paths.php');
require_once(CONFIG_PATH.'/conexion.php');
require_once(CONTROLLER_PATH.'/checkUsers.php');

$checkUsers = new checkUsers();

if(isset($_POST['usuario']) and isset($_POST['password'])){
$checkUsersReturn=$checkUsers->checkUserByNameAndPass($_POST['usuario'],$_POST['password']);
}
           
echo json_encode($checkUsersReturn);


