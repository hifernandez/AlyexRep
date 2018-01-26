<?php
	
	require_once '../../../clases/config/config.php';	
	require_once '../../../clases/config/Dbmysqli.php';
	$IdDetail=0;//$_POST['IdFamilia'];

		
	if ($stmt = $mysqli->prepare("CALL sp_getDetailDadosCatSAS(?)"))
	{
		//Vinculando parametros a la consulta
		if (!$stmt->bind_param("i", $IdDetail)) {
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
		}
		//Obteniendo los resultados de la consulta
		if (!($resultado = $stmt->get_result())) {
					echo "<p>Falló la obtención del conjunto de resultados: (" . $stmt->errno . ") " . $stmt->error;
		}
		
		//Haciendo uso de los resultados obtenidos
		
		
		$resultCasosGrid = array();
		while($rows=$resultado->fetch_assoc()){
				
				
				//print_r($rows);
				//array_push($resultStmtToArray, $rows);
				//print_r($resultStmtToArray);
				$resultStmtToArray[]=array_map('utf8_encode', $rows);
				//utf8_decode($resultStmtToArray[$i]["descripcion_acabado"]);
				//$totalRegistros = $rows["TOTAL"];
				
				

			    $i++;
		}
		
		//echo "<p>DESCRIPCIÓN:".utf8_decode($resultStmtToArray[3]["descripcion_acabado"])."<p>";
					
					//$jsonResult["total"] = $totalRegistros;
					//$jsonResult["rows"]= $resultStmtToArray;
					$jsonResult = $resultStmtToArray;
					
					//print_r($jsonResult);
		
		//print_r($resultado);
		echo json_encode($jsonResult); 
		
	}
	else
	{
		echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
	}

	
	
	
?>