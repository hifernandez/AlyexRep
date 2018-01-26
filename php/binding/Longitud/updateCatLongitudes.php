<?php

	require_once '../../clases/config/config.php';
	require_once '../../clases/config/Dbmysqli.php';
	$IdLongitud = intval($_POST['ID']);
	$Clave= $_POST['Clave'];
	$Descripcion= $_POST['Descripcion'];
	$MetrosLong=$_POST['Metros'];
	$TipoOperacion = $_POST['TipoOperacion'];


	switch($TipoOperacion){
		case "EDICIONLONGITUD":
								if ($stmt = $mysqli->prepare("CALL sp_updateLongCatSAS(?,?,?,?)"))
								{
									//Vinculando parametros a la consulta
										if (!$stmt->bind_param("issd",$IdLongitud,$Clave,$Descripcion,$MetrosLong)) {
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

		case "ALTALONGITUD":
								//echo "Entraste a ALTAFAMILIA";
								if ($stmt = $mysqli->prepare("CALL sp_insertLongCatSAS(?,?,?)"))
								{
									//Vinculando parametros a la consulta
										if (!$stmt->bind_param("ssd",$Clave,$Descripcion,$MetrosLong)) {
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