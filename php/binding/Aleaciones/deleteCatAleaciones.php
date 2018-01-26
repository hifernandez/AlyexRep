<?php
	
	require_once '../../clases/config/config.php';	
	require_once '../../clases/config/Dbmysqli.php';

	$IdAleacion = intval($_POST['id_aleacion']);

		
	if ($stmt = $mysqli->prepare("CALL sp_deleteAleaCatSAS(?)"))
	{
		//Vinculando parametros a la consultad
		if (!$stmt->bind_param("i", $IdAleacion)) {
				echo "Fall� la vinculaci�n de par�metros: (" . $stmt->errno . ") " . $stmt->error;
		}
		// ejecutar la consulta 
		if (!$stmt->execute()) {
											
					echo "Fall� la ejecuci�n: (" . $stmt->errno . ") " . $stmt->error;
					$mysqli->rollback();  
					echo "Todas las consultas han sido revertidas";  
					
		}else{ 
					$mysqli->commit();   
					echo json_encode(array('success'=>true));
					//echo "Consultas ejecutadas correctamente";  
		}
		//Obteniendo los resultados de la consulta
		/*if (!($resultado = $stmt->get_result())) {
					echo "<p>Fall� la obtenci�n del conjunto de resultados: (" . $stmt->errno . ") " . $stmt->error;
		}
		
		//Haciendo uso de los resultados obtenidos
		
		
		$resultCasosGrid = array();
		while($rows=$resultado->fetch_object()){
				
				array_push($resultCasosGrid, $rows);
				

		}
		
		
		//print_r($resultado);
		echo json_encode($resultCasosGrid); */
	}
	else
	{
		echo json_encode(array('errorMsg'=>'Algo paso aqu�.'));
	}
	
	
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