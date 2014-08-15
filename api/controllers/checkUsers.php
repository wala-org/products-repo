<?php
session_start();
require_once(CONFIG_PATH.'/conexion.php');
require_once(MODEL_PATH.'/usuario.php');

class checkUsers{

	public function checkUserByNameAndPass($name,$pass)
	{
				$usuario = new usuario();
				$sql = $usuario->authUserQuery($name,$pass);
				$conexion = new conexion();
				$db=$conexion->getConection();
				
				
				
				$result = $db->query($sql);
				if($db->affected_rows>0)
				{
					while($row = mysqli_fetch_array($result)) {
						$tmp['id_usuario']=$row['id_usuario'];
						$tmp['usuario']=utf8_encode($row['usuario']);
						$tmp['facebook']=utf8_encode($row['facebook']);
						$tmp['imagen']=$row['imagen'];
						$tmp['password']=utf8_encode($row['password']);
						$tmp['nivel']=$row['nivel'];
						$tmp['perfil']=$row['perfil'];
						$tmp['success']=true;
						
						$_SESSION['id_usuario']=$tmp['id_usuario'];
						$_SESSION['usuario']=$tmp['usuario'];
						$_SESSION['facebook']=$tmp['facebook'];
						$_SESSION['imagen']=$tmp['imagen'];
						$_SESSION['perfil']=$tmp['perfil'];
						
						$user=$tmp;
					}
					return $user;
				}
				else
				{
					$tmp['success']=false;
					return $tmp;
				}
				
				
	}

}