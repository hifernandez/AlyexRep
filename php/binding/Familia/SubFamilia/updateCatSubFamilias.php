<?php

	require_once '../../../clases/config/config.php';
	require_once '../../../clases/config/Dbmysqli.php';
	$IdSubFam = intval($_POST['ID']);
	$Clave= $_POST['Clave'];
	$Descripcion= $_POST['Descripcion'];
	$TipoOperacion = $_POST['TipoOperacion'];


	switch($TipoOperacion){
		case "EDICIONSUBFAMILIA":
								if ($stmt = $mysqli->prepare("CALL sp_updateSubFamCatSAS(?,?,?)"))
								{
									//Vinculando parametros a la consulta
										if (!$stmt->bind_param("iss",$IdSubFam,$Clave,$Descripcion)) {
												echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
										}
										// ejecutar la consulta
										if (!$stmt->execute()) {

													echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
													$mysqli->rollback();
													//echo "Todas las consultas han sido revertidas";

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

		case "ALTASUBFAMILIA":
								//echo "Entraste a ALTAFAMILIA";
								if ($stmt = $mysqli->prepare("CALL sp_insertSubFamCatSAS(?,?)"))
								{
									//Vinculando parametros a la consulta
										if (!$stmt->bind_param("ss",$Clave,$Descripcion)) {
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