<?php

	require_once '../../clases/config/config.php';
	require_once '../../clases/config/Dbmysqli.php';

	$IdPerfil = intval($_POST['ID']);
	$IdFamilia=  intval($_POST['ID_FAM']);
	$nombrePerfil = $_POST['Clave'];
	$Descripcion = $_POST['Descripcion'];
	$TipoOperacion = $_POST['TipoOperacion'];

	switch($TipoOperacion){
		case "EDICIONPERFIL":
								if ($stmt = $mysqli->prepare("CALL sp_updatePerCatSAS(?,?,?,?)"))
								{
									//Vinculando parametros a la consultado
									if (!$stmt->bind_param("iiss", $IdPerfil,$IdFamilia,$nombrePerfil,$Descripcion)) {
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
		case "ALTAPERFIL":
							if ($stmt = $mysqli->prepare("CALL sp_insertPerCatSAS(?,?,?)"))
								{
									//Vinculando parametros a la consultad
									if (!$stmt->bind_param("ssi",$nombrePerfil,$Descripcion,$IdFamilia)) {
											echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
									}
									// ejecutar la consulta
									if (!$stmt->execute())
									{
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