<?php
include 'conexion.php';

$sql = "select * from pregunta where id_tipouser=9";

$result = $db->query($sql);
echo '<form method="post">';
while($row = mysqli_fetch_array($result)) {
  echo $row["pregunta"] . "<br>";
  $sqlr = "select * from opciones where fk_pregunta=".$row["id_pregunta"];
  $resultr = $db->query($sqlr);
  echo '<select name="pregunta'.$row["id_pregunta"].'">';
  while($rowr = mysqli_fetch_array($resultr)) {
  echo '<option value='.$rowr['id_opcion'].'>'.$rowr['texto'].'</option>';
  }
  echo '</select><br>';
  
} 
echo '<input type="submit" value="enviar">';
echo '</form>';

$cuentatipos = array();

if(isset($_POST)){

	foreach($_POST as $key => $value){
		//var_dump($key);
		$sqlt = "select id_tipo from tipo_opcion where id_opcion=".$value;
		$resultt = $db->query($sqlt);
		while($rowt = mysqli_fetch_array($resultt)) {
				if(!isset($cuentatipos[$rowt[0]]))
				$cuentatipos[$rowt[0]]=1;
				else
				$cuentatipos[$rowt[0]]++;
		}
		//echo '<br> tipo: '.$rowt[0].'<br>';

		

		
	}
	//echo 'Array de tipos: ';
	//var_dump($cuentatipos);
	
	foreach($cuentatipos as $key => $value){
	//echo '<br> el tipo: '.$key.' tiene la cantidad: '.$value;
	}
	arsort($cuentatipos);
	
	//echo '<br>Array de tipos Luego de asort: ';
	
	//var_dump($cuentatipos);
	$cuentaproductos = array();
	
	
		foreach($cuentatipos as $key => $value){
	
		$sqltp = 'select id_producto from tipos_producto where id_tipo='.$key;
		$resulttp = $db->query($sqltp);
		  while($rowtp = mysqli_fetch_array($resulttp)) {
		  
		  if(!isset($cuentaproductos[$rowtp['id_producto']]))
		  $cuentaproductos[$rowtp['id_producto']]=$value;
		  else
		  $cuentaproductos[$rowtp['id_producto']]+=$value;
		  
		  
		 
		  /*
			echo '<br>es del tipo: '.$key.', el producto '.$rowtp['id_producto'];
			
				$sqlprod = 'select nombre,precio from producto where id_producto='.$rowtp['id_producto'];
				$resultprod = $db->query($sqlprod);
				$rowprod = mysqli_fetch_array(($resultprod));
				

				
				echo '<br><br>'.'tipo de producto '.$key;
				echo '<br>nombre del producto '.$rowprod['nombre'];
				echo '<br>precio del producto '.$rowprod['precio'].'<br>';*/
			
		  }
	
	}
	arsort($cuentaproductos);
	 foreach($cuentaproductos as $clave => $valor){
				$sqlprod = 'select nombre,precio,imagen from producto where id_producto='.$clave;
				$resultprod = $db->query($sqlprod);
				
				//echo '<br>'.$clave.'<br>';
				
				$rowprod = mysqli_fetch_array(($resultprod));
				echo '<div style="text-align:center;background:orange;width:20%;height:400px;float:left;border:1px solid black;">';
				echo '<br>'.$rowprod['nombre'].'<br>';
				if(isset($rowprod['imagen']))
				echo '<img style="width:100%;height:200px;" src='.$rowprod['imagen'].' /><br>';
				else
				echo '<img style="width:100%;height:200px;" src="../img/imagennodisp.jpg" /><br>';
				echo '<br><b>$'.$rowprod['precio'].'</b><br>';
				echo '</div>';
		  }
		  
	//echo '<br> Array de productos con suma de cantidad de veces seleccionadas de cada tipo:';
	//var_dump( $cuentaproductos);
}

?>