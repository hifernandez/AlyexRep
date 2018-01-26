<?php

	require_once '../../clases/config/config.php';
	require_once '../../clases/config/Dbmysqli.php';

	$IdTemple = intval($_POST['ID']);
	$Clave = $_POST['Clave'];
	$Descripcion = $_POST['Descripcion'];
	$Temperatura = floatval($_POST['Temperatura']);
	$hrs = intval($_POST['Horas']);
	$durezaSup = intval($_POST['Superior']);
	$durezaInf = intval($_POST['Inferior']);
	$TipoOperacion = $_POST['TipoOperacion'];

	switch($TipoOperacion){
							case "EDICIONTEMPLE":
								//echo "Estas en update Edicion";
								if ($stmt = $mysqli->prepare("CALL sp_updateTemCatSAS(?,?,?,?,?,?,?)"))
								{
									//Vinculando parametros a la consultad
									if (!$stmt->bind_param("issdiii", $IdTemple,$Clave,$Descripcion,$Temperatura,$hrs, $durezaInf, $durezaSup)) {
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
							case "ALTATEMPLE":
							//echo "Estas en update Alta";
								if ($stmt = $mysqli->prepare("CALL sp_insertTempCatSAS(?,?,?,?,?,?)"))
								{
									//Vinculando parametros a la consultad
									if (!$stmt->bind_param("ssdiii",$Clave,$Descripcion,$Temperatura,$hrs, $durezaInf, $durezaSup)) {
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