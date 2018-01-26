<?php
	
	require_once '../../clases/config/config.php';	
	require_once '../../clases/config/Dbmysqli.php';

	//Parametros Harcodeados
	$idUsuario = 1;// $_POST['ClaveCotizacion']; 
	$idCliente = 1;//$_POST['ClaveCliente'];
	$idStatus = 3;
	
	$DescCotiza = 'Sin Descripcion';//$_POST['DescCotizacion']; 
	$SubTotal = 0.0;//$_POST['SubTotCot']; 
	$TotalCot = 0.0;//$_POST['TotCot'];
	$ImpuestoCot = 16;//$_POST['ImpuestoCot']; 
	$ObservaCot = 'Sin Observacion';//$_POST['ObservaCot']; 
	$TipoMon = 'USA';//$_POST['TipoMonedaCot'];
	$nota = '';
	$motivCan = '';
	$clauTxt = '';

	$idCotiza =12;//$_POST['idCotizacionProducto'];
	$idHeader = 1;//$_POST['IdHeaderDado'];
	$idUnidad = 1;
	$idUsuario = 1;
	$itemCot = 10;//$_POST['ItemCot'];
	$CantPartida = 1000;// $_POST['CantPartidaCot'];
	$PrecioUni = 1.2;//$_POST['PUPartidaCot'];
	$obserCoti = '';
	/*
	
	/////Parametros por POST
	$idUsuario = 1;// $_POST['ClaveCotizacion']; 
	$idCliente = 1;//$_POST['ClaveCliente'];
	$idStatus = 3;
	
	$DescCotiza = 'Sin Descripcion';//$_POST['DescCotizacion']; 
	$SubTotal = $_POST['SubTotCot']; 
	$TotalCot = $_POST['TotCot'];
	$ImpuestoCot = $_POST['ImpuestoCot']; 
	$ObservaCot = 'Sin Observacion';//$_POST['ObservaCot']; 
	$TipoMon = $_POST['TipoMonedaCot'];
	$nota = '';
	$motivCan = '';
	$clauTxt = '';

	$idCotiza = $_POST['idCotizacionProducto'];
	$idHeader = $_POST['IdHeaderDado'];
	$idUnidad = 1;
	$idUsuario = 1;
	$itemCot = $_POST['ItemCot'];
	$CantPartida = $_POST['CantPartidaCot'];
	$PrecioUni = $_POST['PUPartidaCot'];
	$obserCoti = '';*/
	
	if ($stmt = $mysqli->prepare("CALL sp_insertCotizacionSAS(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
	{
		//Vinculando parametros a la consultad
		if (!$stmt->bind_param("iiisddisssssiiiiiids",$idUsuario,$idCliente,$idStatus,$DescCotiza,$SubTotal,$TotalCot,$ImpuestoCot,$ObservaCot,$TipoMon,$nota,$motivCan,$clauTxt,$idCotiza,$idHeader,$idUnidad,$idUsuario,$itemCot,$CantPartida,$PrecioUni,$obserCoti)) {
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
		$totalRegistros = 0;
		$jsonResult = array();
		
		//$i=0;
		$resultStmtToArray = array();
		while($rows=$resultado->fetch_assoc()){
				
				//array_push($resultStmtToGrid, $rows);
				//$resultStmtToArray[]=array_map('utf8_encode', $rows);
				//$totalRegistros = $rows["TOTAL"];
			$json_response_cot = array(
			'ID_COTIZACION' => $rows["ID_COTIZACION"],
			'MESSAGE'=> $rows["MESSAGE"]);
				//echo "<p>FAMILIA:".$resultStmtToArray[$i]["descripcion"];

			    //$i++;
		}
					
					//$jsonResult["total"] = $totalRegistros;
					//$jsonResult["rows"]= $resultStmtToArray;
					$jsonResult= $resultStmtToArray;
		
		//print_r($resultado);
		echo json_encode($json_response_cot); 
		
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