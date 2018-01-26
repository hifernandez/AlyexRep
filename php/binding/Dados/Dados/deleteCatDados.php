<?php
	
	require_once '../../../clases/config/config.php';	
	require_once '../../../clases/config/Dbmysqli.php';

	$IdHeader=$_POST['id_header_dado'];
	$ClaveDado= ''; //$_POST['Clave'];
	$TempleDado=''; //$_POST['Descripcion'];
	$AcabadoDado='';//$_POST['SubFamilia'];
	$CalidadDado='';
	$LineaDado='';
	$AleacionDado='';
	$ClienteDado='';
	$StatusDado='';

		
	if ($stmt = $mysqli->prepare("CALL sp_deleteHeaderCatSAS(?)"))
	{
		//Vinculando parametros a la consulta
		if (!$stmt->bind_param("i", $IdHeader)) {
				echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
		}
		// ejecutar la consulta 
		if (!$stmt->execute()) {
											
					echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
					$mysqli->rollback();  
					echo "Todas las consultas han sido revertidas";  
					
		}else{ 
					$mysqli->commit();   
					//echo "Consultas ejecutadas correctamente";  
					echo json_encode(array('success'=>true));
		}
		//Obteniendo los resultados de la cons
		
		//Haciendo uso de los resultados obtenido
	}
	else
	{
		echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	
	
	/*$i=0;
	while($i < 2)
	{
		$gridInfo[$i]['IdDado']=$i;
		$gridInfo[$i]['Clave']="A-".$i;
		$gridInfo[$i]['Descripcion']="B-".$i;
		$gridInfo[$i]['PesoTeorico']="C-".$i;
		$gridInfo[$i]['SuperficieExpuesta'] ="D-".$i;
		$gridInfo[$i]['SuperficiePulida']="E-".$i;
		$i++;
	}
	echo json_encode($gridInfo);*/

	
	
	
?>