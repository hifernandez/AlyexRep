<?php

	require_once '../../clases/config/config.php';
	require_once '../../clases/config/Dbmysqli.php';

	$idStatus=0;//$_POST['IdFamilia'];
	
	if ($stmt = $mysqli->prepare("CALL sp_getCatStatusKardexSAS(?)"))
	{
		//Vinculando parametros a la consulta
		if (!$stmt->bind_param("i", $idStatus)) {
				echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
		}
		// Ejecutar la consulta
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
					$jsonResult= $resultStmtToArray;

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