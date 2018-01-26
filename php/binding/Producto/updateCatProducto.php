<?php

	require_once '../../clases/config/config.php';
	require_once '../../clases/config/Dbmysqli.php';

	$IdAcabado = intval($_POST['ID']);
	$Clave= $_POST['Clave'];
	$Descripcion= $_POST['Descripcion'];
	$Micras= $_POST['Micras'];
	$TipoOperacion = $_POST['TipoOperacion'];


	switch($TipoOperacion){
		case "EDICIONACABADO":
								if ($stmt = $mysqli->prepare("CALL sp_updateAcaCatSAS(?,?,?,?)"))
								{
									//echo "llegaste hasta aca!";
									//Vinculando parametros a la consultad
								if (!$stmt->bind_param("issd", $IdAcabado,$Clave,$Descripcion,$Micras)) {
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
		case "ALTAACABADO":

							if ($stmt = $mysqli->prepare("CALL sp_insertAcaCatSAS(?,?,?)"))
								{
									//Vinculando parametros a la consultad
									if (!$stmt->bind_param("ssd",$Clave,$Descripcion,$Micras)) {
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


?>