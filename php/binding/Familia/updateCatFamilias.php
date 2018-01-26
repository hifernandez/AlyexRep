<?php

	require_once '../../clases/config/config.php';
	require_once '../../clases/config/Dbmysqli.php';
	$IdFamilia = intval($_POST['ID']);
	$Clave= $_POST['Clave'];
	$Descripcion= $_POST['Descripcion'];
	$SubFamilia=intval($_POST['SubFamilia']);
	$TipoOperacion = $_POST['TipoOperacion'];


	switch($TipoOperacion){
		case "EDICIONFAMILIA":
								if ($stmt = $mysqli->prepare("CALL sp_updateFamCatSAS(?,?,?,?)"))
								{
									//Vinculando parametros a la consulta
										if (!$stmt->bind_param("iiss",$IdFamilia,$SubFamilia,$Clave,$Descripcion)) {
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

		case "ALTAFAMILIA":
								//echo "Entraste a ALTAFAMILIA";
								if ($stmt = $mysqli->prepare("CALL sp_insertFamCatSAS(?,?,?)"))
								{
									//Vinculando parametros a la consulta
										if (!$stmt->bind_param("iss",$SubFamilia,$Clave,$Descripcion)) {
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
													//echo "Consultas ejecutadas correctamente";
										}

                                }
                                else
									{
										echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
									}

		break;
	};





?>