<?php
	
	require_once '../../clases/config/config.php';	
	require_once '../../clases/config/Dbmysqli.php';

	$IdLinea=0;//$_POST['IdFamilia'];
	$IdPerfil= 0; //$_POST['Clave'];
	$nombreLinea=''; //$_POST['Descripcion'];
	$Descripcion='';//$_POST['SubFamilia'];

		
	if ($stmt = $mysqli->prepare("CALL sp_getLineaCatSAS(?,?,?)"))
	{
		//Vinculando parametros a la consultad
		if (!$stmt->bind_param("iss", $IdLinea,$Descripcion,$nombreLinea)) {
				echo "Fall� la vinculaci�n de par�metros: (" . $stmt->errno . ") " . $stmt->error;
		}
		// ejecutar la consulta 
		if (!$stmt->execute()) {
											
					echo "Fall� la ejecuci�n: (" . $stmt->errno . ") " . $stmt->error;
					$mysqli->rollback();  
					echo "Todas las consultas han sido revertidas";  
					
		}else{ 
					$mysqli->commit();   
					//echo "Consultas ejecutadas correctamente";  
		}
		//Obteniendo los resultados de la consulta
		if (!($resultado = $stmt->get_result())) {
					echo "<p>Fall� la obtenci�n del conjunto de resultados: (" . $stmt->errno . ") " . $stmt->error;
		}
		
		//Haciendo uso de los resultados obtenidos
		$totalRegistros = 0;
		$jsonResult = array();
		
		//$i=0;
		$resultStmtToArray = array();
		while($rows=$resultado->fetch_assoc()){
				
				//array_push($resultStmtToGrid, $rows);
				$resultStmtToArray[]=array_map('utf8_encode', $rows);
				//$totalRegistros = $rows["TOTAL"];
				
				//echo "<p>FAMILIA:".$resultStmtToArray[$i]["descripcion"];

			    //$i++;
		}
					
					//$jsonResult["total"] = $totalRegistros;
					//$jsonResult["rows"]= $resultStmtToArray;
					$jsonResult = $resultStmtToArray;
		
		//print_r($resultado);
		echo json_encode($jsonResult); 
		
	}
	else
	{
		echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	
	
	//$i=0;
	/*while($i < 2)
	{
		$gridInfo[$i]['IdFamilia']=$i;		
		$gridInfo[$i]['Clave']="A-".$i;
		$gridInfo[$i]['Descripcion']="B-".$i;
		$gridInfo[$i]['SubFamilia']="C-".$i;
		$i++;
	}
	echo json_encode($gridInfo);*/

	
	
	
?>