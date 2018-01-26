<?php

	require_once '../../clases/config/config.php';
	require_once '../../clases/config/Dbmysqli.php';

	$IdCalidad = intval($_POST['ID']);
	$Clave= $_POST['Clave'];
	$Descripcion= $_POST['Descripcion'];
	$Fecha= date("Y-m-d H:i:s", strtotime($_POST['Fecha']));
	$Observaciones = $_POST['Observaciones'];
	$TipoOperacion = $_POST['TipoOperacion'];




	switch($TipoOperacion){
		case "EDICIONCALIDAD":
								if ($stmt = $mysqli->prepare("CALL sp_updateCalCatSAS(?,?,?,?,?)"))
								{

									//Vincula%o parametros a la consultad
									if (!$stmt->bind_param("issss", $IdCalidad,$Clave,$Descripcion,$Fecha,$Observaciones)) {
											echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
									}
									// ejecutar la consulta
									if (!$stmt->execute()) {

												echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
												$mysqli->rollback();
												echo "Todas las consultas han sido revertidas";

									}else{
												$mysqli->commit();
												echo json_encode(array('success'=>true));
									}
            //Obteniendo los resultados de la consulta

								}
								else
								{
									echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
								}
		break;

		case "ALTACALIDAD":
								if ($stmt = $mysqli->prepare("CALL sp_insertCalCatSAS(?,?,?,?)"))
									{
										//Vinculando parametros a la consultad
										if (!$stmt->bind_param("ssss",$Clave,$Descripcion,$Fecha,$Observaciones)) {
												echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
										}
										// ejecutar la consulta
										if (!$stmt->execute()) {

													echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
													$mysqli->rollback();
													echo "Todas las consultas han sido revertidas";

										}else{
													$mysqli->commit();
													echo json_encode(array('success'=>true));
										}
									}
									else
									{
										echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
									}



		break;


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