<?php
	
	require_once '../../clases/config/config.php';	
	require_once '../../clases/config/Dbmysqli.php';

	$IdLinea = intval($_POST['id_linea']);
	$Clave= ''; //$_POST['Clave'];
	$Descripcion=''; //$_POST['Descripcion'];//$_POST['SubFamilia'];

	if($IdLinea != 0){
	if ($stmt = $mysqli->prepare("CALL sp_deleteLinCatSAS(?)"))
	{
		//Vinculando parametros a la consultad
		if (!$stmt->bind_param("i", $IdLinea)) {
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
					//echo "Consultas ejecutadas correctamente";  
		}
	}}
	else
	{
		echo json_encode(array('errorMsg'=>'No puedes eliminar, ya que esta relacionado con un producto'));
	}
	
	

	
	
	
?>