<?php
session_start();
require_once('../../../../api/config/paths.php');
require_once(CONFIG_PATH.'/conexion.php');




$sql= " select CodProv, Provincia " ;

//si es argentina mostramos todos menos otro pais y todo el pais(no corresponde creo)
$sql.= " from provincias where CodProv!=00 and CodProv!=98";       


$sql.= " order by 1 ";

$conexion = new conexion();
$db=$conexion->getConection();
$result = $db->query($sql);



				while ($rec = mysqli_fetch_array($result))
				{
                                 
                                    $tmp['CodProv']=$rec['CodProv'];
                                    $tmp['Provincia']=utf8_encode($rec['Provincia']);
									$arr[]=$tmp;
				}

               
           
echo json_encode($arr);

?>