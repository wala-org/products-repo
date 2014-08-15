<?php
session_start();
require_once('../../../../api/config/paths.php');
require_once(CONFIG_PATH.'/conexion.php');


$provincia = (int)$_POST['provincia'];

$sql= " select CodDepart, Departamento " ;

//si es argentina mostramos todos menos otro pais y todo el pais(no corresponde creo)
$sql.= " from departamentos where CodProv=".$provincia;       


$sql.= " order by 1 ";

$conexion = new conexion();
$db=$conexion->getConection();
$result = $db->query($sql);



				while ($rec = mysqli_fetch_array($result))
				{
                                 
                                    $tmp['CodDepart']=$rec['CodDepart'];
                                    $tmp['Departamento']=utf8_encode($rec['Departamento']);
									$arr[]=$tmp;
				}

               
           
echo json_encode($arr);

?>