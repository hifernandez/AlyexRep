<?php

	require_once '../../clases/config/config.php';
	require_once '../../clases/config/Dbmysqli.php';
	$IdLinea = intval($_POST['ID']);
	$Clave= $_POST['Clave'];
	$Descripcion= $_POST['Descripcion'];
	$TipoOperacion = $_POST['TipoOperacion'];


	switch($TipoOperacion){
		case "EDICIONLINEA":
								if ($stmt = $mysqli->prepare("CALL sp_updateLinCatSAS(?,?,?)"))
								{
									//Vinculando parametros a la consulta
										if (!$stmt->bind_param("iss",$IdLinea,$Clave,$Descripcion)) {
												//echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
										}
										// ejecutar la consulta
										if (!$stmt->execute()) {

													//echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
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

		case "ALTALINEA":
								//echo "Entraste a ALTAFAMILIA";
								if ($stmt = $mysqli->prepare("CALL sp_insertLinCatSAS(?,?)"))
								{
									//Vinculando parametros a la consulta
										if (!$stmt->bind_param("ss",$Clave,$Descripcion)) {
											//echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
										}
										// ejecutar la consulta
										if (!$stmt->execute()) {

													//echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
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
	};





?>