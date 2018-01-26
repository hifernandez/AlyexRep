 <?php

	require_once '../../../clases/config/config.php';
	require_once '../../../clases/config/Dbmysqli.php';
	$IdHeader=intval($_POST['ID']);
	$ClaveDado= intval($_POST['DADO']);
	$TempleDado= intval($_POST['TEMPLE']);
	$AcabadoDado=intval($_POST['ACABADO']);
	$LineaDado= intval($_POST['LINEA']);
	$AleacionDado= intval($_POST['ALEACION']);
	$CalidadDado= intval($_POST['CALIDAD']);
	$LongitudDado= intval($_POST['LONGITUD']);
	$FamiliaDado= intval($_POST['FAMILIA']);
	$TipoOperacion = $_POST['TipoOperacion'];

		switch($TipoOperacion){
			case "EDICIONPRODUCTO":
									if ($stmt = $mysqli->prepare("CALL sp_updateHeaderCatSAS(?,?,?,?,?,?,?,?,?)"))
									{
										//Vinculando parametros a la consulta
										if (!$stmt->bind_param("iiiiiiiii", $IdHeader,$ClaveDado,$TempleDado,$CalidadDado,$LineaDado,$AleacionDado,$LongitudDado,$FamiliaDado,$AcabadoDado)) {
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
			case "ALTAPRODUCTO":
									echo "Entraste a alta PRODUCTO";
									if ($stmt = $mysqli->prepare("CALL sp_insertHeaderCatSAS(?,?,?,?,?,?,?,?)"))
									{
										//Vinculando parametros a la consulta
											if (!$stmt->bind_param("iiiiiiii",$ClaveDado,$TempleDado,$CalidadDado,$LineaDado,$AleacionDado,$LongitudDado,$FamiliaDado,$AcabadoDado)) {
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
                                                        echo "ololololo";
											}

										}
										else
										{
											echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
										}

			break;
		}



?>