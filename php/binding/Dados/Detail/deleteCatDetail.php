<?php
	
	require_once '../../../clases/config/config.php';	
	require_once '../../../clases/config/Dbmysqli.php';

	$IdDetail = $_POST['id_detail_dado'];

		
	if ($stmt = $mysqli->prepare("CALL sp_deleteDetailDadosCatSAS(?)"))
	{
		//Vinculando parametros a la consulta
		if (!$stmt->bind_param("i", $IdDetail)) {
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
	
	
	
?>