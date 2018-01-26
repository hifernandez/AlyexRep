<?php
	session_start();
?>	
<?php
	require_once '../../clases/config/config.php';
	require_once '../../clases/config/Dbmysqli.php';

	/*//Parametros Harcodeados
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
	*/

	/////Parametros por POST

    $updateCotiza = intval($_POST['UpdateCotiza']);
	$idUsuario = 1;// $_POST['ClaveCotizacion'];
	$idCliente = intval($_POST['ClaveCliente']);
	$idStatus = 3; //Estatus pendiente


	$DescCotiza = $_POST['DescCotizacion'];
	$SubTotal = $_POST['SubTotCot'];
	$TotalCot = $_POST['TotCot'];
	$ImpuestoCot = 16;//$_POST['ImpuestoCot'];
	$ObservaCot = 'Sin Observacion';//$_POST['ObservaCot'];
	$TipoMon = $_POST['TipoMonedaCot'];
	$nota = '';
	$motivCan = '';
	$clauTxt = '';
	    $idCotiza = $_SESSION["ID_COT_SES"];
    $fechaCrea = date("Y-m-d", strtotime($_POST['FechaCot']));
/*	if(isset($_SESSION["ID_COT_SES"])){
		$idCotiza = $_SESSION["ID_COT_SES"];
	}else{
		$idCotiza = $_POST['idCotizacionProducto'];
	}*/
	$idHeader = intval($_POST['IdHeaderDado']);
	$idUnidad = 1;
	$idUsuario = 1;
	$itemCot = intval($_POST['ItemCot']);
	$CantPartida = intval($_POST['CantPartidaCot']);
	$PrecioUni = $_POST['PUPartidaCot'];
	$obserCoti = $_POST['obserCoti'];
	$operacionCot = $_POST['operacionCot'];

	switch ($operacionCot){

		case "Header":
							if ($stmt = $mysqli->prepare("CALL sp_insertCotizacionSAS(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
	                        {
								//Vinculando parametros a la consultad
								if (!$stmt->bind_param("siiiiisddisssss",$fechaCrea,$idCotiza,$updateCotiza,$idUsuario,$idCliente,$idStatus,$DescCotiza,$SubTotal,$TotalCot,$ImpuestoCot,$ObservaCot,$TipoMon,$nota,$motivCan,$clauTxt)) {
										echo "Fall? la vinculaci?n de par?metros: (" . $stmt->errno . ") " . $stmt->error;
								}
								// ejecutar la consulta
								if (!$stmt->execute()) {

											echo "Fall? la ejecuci?n: (" . $stmt->errno . ") " . $stmt->error;
											$mysqli->rollback();
											echo "Todas las consultas han sido revertidas";

								}else{
											$mysqli->commit();
											//echo "Consultas ejecutadas correctamente";
								}
								//Obteniendo los resultados de la consulta
								if (!($resultado = $stmt->get_result())) {
											echo "<p>Fall? la obtenci?n del conjunto de resultados: (" . $stmt->errno . ") " . $stmt->error;
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
									'success'=>true,
									'ID_COTIZACION' => $rows["ID_COTIZACION"],
									'MESSAGE'=> $rows["MESSAGE"]);
									$_SESSION["ID_COT_SES"]=$rows["ID_COTIZACION"];
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




		break;


		case "Detalle":
							if ($stmt = $mysqli->prepare("CALL sp_insertCotizaProdSAS(?,?,?,?,?,?,?,?,?)"))
							{
								//Vinculando parametros a la consultad
								if (!$stmt->bind_param("iiiiiiids",$updateCotiza,$idCotiza,$idHeader,$idUnidad,$idUsuario,$itemCot,$CantPartida,$PrecioUni,$obserCoti)) {
										echo "Fall? la vinculaci?n de par?metros: (" . $stmt->errno . ") " . $stmt->error;
								}
								// ejecutar la consulta
								if (!$stmt->execute()) {

											echo "Fall? la ejecuci?n: (" . $stmt->errno . ") " . $stmt->error;
											$mysqli->rollback();
											echo "Todas las consultas han sido revertidas";

								}else{
											$mysqli->commit();
											//echo "Consultas ejecutadas correctamente";
								}
								//Obteniendo los resultados de la consulta
								if (!($resultado = $stmt->get_result())) {
											echo "<p>Fall? la obtenci?n del conjunto de resultados: (" . $stmt->errno . ") " . $stmt->error;
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
									'success'=>true,
									'ID_COTIZACION' => $rows["ID_COTIZACION"],
									'MESSAGE'=> $rows["MESSAGE"]);
									$_SESSION["ID_COT_SES"]=$rows["ID_COTIZACION"];
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
		break;

        case "updateDetalle":
            if ($stmt = $mysqli->prepare("CALL sp_insertCotizaProdSAS(?,?,?,?,?,?,?,?,?)"))
            {
                //Vinculando parametros a la consultad
                if (!$stmt->bind_param("iiiiiiids",$updateCotiza,$idCotiza,$idHeader,$idUnidad,$idUsuario,$itemCot,$CantPartida,$PrecioUni,$obserCoti)) {
                    echo "Fall? la vinculaci?n de par?metros: (" . $stmt->errno . ") " . $stmt->error;
                }
                        // ejecutar la consulta
                        if (!$stmt->execute()) {

                            echo "Fall? la ejecuci?n: (" . $stmt->errno . ") " . $stmt->error;
                            $mysqli->rollback();
                            echo "Todas las consultas han sido revertidas";

                        }else{
                            $mysqli->commit();
                            //echo "Consultas ejecutadas correctamente";
                            echo json_encode(array('success'=>true));
                        }

                    }
                    else
                    {
                        echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
                    }
        break;

		case "TerminarCot":
            if ($stmt = $mysqli->prepare("CALL sp_insertCotizacionSAS(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
            {
                //Vinculando parametros a la consultad
                if (!$stmt->bind_param("siiiiisddisssss",$fechaCrea,$idCotiza,$updateCotiza,$idUsuario,$idCliente,$idStatus,$DescCotiza,$SubTotal,$TotalCot,$ImpuestoCot,$ObservaCot,$TipoMon,$nota,$motivCan,$clauTxt)) {
                    echo "Fall? la vinculaci?n de par?metros: (" . $stmt->errno . ") " . $stmt->error;
                }
                // ejecutar la consulta
								if (!$stmt->execute()) {

                                    echo "Fall? la ejecuci?n: (" . $stmt->errno . ") " . $stmt->error;
                                    $mysqli->rollback();
                                    echo "Todas las consultas han sido revertidas";

								}else{
                                    $mysqli->commit();
                                    echo json_encode(array('success'=>true));
                                   unset ($_SESSION['ID_COT_SES']);
                                    //echo "Consultas ejecutadas correctamente";
								}
								//Obteniendo los resultados de la consul
							}
							else
							{
								echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
							}
            break;




	}





?>