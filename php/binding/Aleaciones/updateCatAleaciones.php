<?php

	require_once '../../clases/config/config.php';
	require_once '../../clases/config/Dbmysqli.php';

	$IdAleacion = intval($_POST['ID']);
	$Clave= $_POST['Clave'];
	$Descripcion= $_POST['Descripcion'];
	$Composicion= $_POST['Composicion'];
	$TipoOperacion = $_POST['TipoOperacion'];

	switch($TipoOperacion){
		case "EDICIONALEACION":
									if ($stmt = $mysqli->prepare("CALL sp_updateAleaCatSAS(?,?,?,?)"))
									{
										//echo ($IdAleacion);
										//Vinculando parametros a la consultad
										if (!$stmt->bind_param("isss", $IdAleacion,$Clave,$Descripcion,$Composicion)) {
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

		case "ALTAALEACION":
								if ($stmt = $mysqli->prepare("CALL sp_insertAleaCatSAS(?,?,?)"))
									{
										//Vinculando parametros a la consultad
										if (!$stmt->bind_param("sss",$Clave,$Descripcion,$Composicion)) {
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
	};



?>