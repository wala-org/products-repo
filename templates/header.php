<link rel="stylesheet" href="http://www.wala.com.ar/assets/css/bootstrap/css/bootstrap.min.css" />
<?php
session_start();
?>
<link rel="stylesheet" href="http://www.wala.com.ar/assets/css/bootstrap/css/bootstrap-theme.min.css" />
<script type="text/javascript" src="http://www.wala.com.ar/assets/css/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://www.wala.com.ar/assets/js/login.js"></script>
<ul style="width:100%">
<?php
$header='<form id="menulogin" class="form-inline">';

//si el usuario esta logueado
if(isset($_SESSION['usuario']))
{
$header.='
			<div class="form-group">
					<a href="http://www.wala.com.ar/admin/users" class="btn btn-danger">Mi cuenta</a>
			</div>';
	//verificamos su rol
	switch($_SESSION['perfil'])
	{
		case 1:
		break;
		case 2:
		$header.='
				<div class="form-group">
					<a href="http://www.wala.com.ar/admin/tiendas" class="btn btn-danger">Tiendas</a>
				</div>';
		break;
		case 3:	
		$header.='
				<div class="form-group">
					<a href="http://www.wala.com.ar/admin/perfilar" class="btn btn-danger">Perfilar</a>
				</div>';
		break;
		default;
		break;
	}
$header.='
			<div class="form-group">
					<a href="http://www.wala.com.ar/data/logOut.php" class="btn btn-danger">LogOut</a>
				</div>';
}
else
{
$header.='	<div class="form-group">
				<div>
					 <label for="usuario">usuario</label>
					 <input type="text" name="usuario" id="usuario" class="form-control"/>
					 
					 <label for="password">password</label>
					 <input type="password" name="password" id="password" class="form-control"/>
					 
					<a id="btnlogin" name="btnlogin" href="javascript:void(0)" class="btn btn-danger">Log-In</a>
					<a href="http://www.wala.com.ar/admin/users/registraruser" class="btn btn-danger">Registrar</a>
					</div>
			</div>';
}

$header.='</form>';

echo $header;
?>
</ul>