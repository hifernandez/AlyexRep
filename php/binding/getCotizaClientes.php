



<?php
	/*
	include 'clases/config/config.php';	
	include 'clases/config/Dbmysqli.php';

	$idCaso=$_POST['casoID'];
	$categoria=$_POST['categoria'];
	$subcategoria=$_POST['subCategoria'];
	$dificultad=$_POST['dificultad'];
	$temaCaso=$_POST['temaCaso'];
	$SubDivLibreCaso=$_POST['SubDivLibreCaso'];
	$anioExam = $_POST['anioExam'];
	$sedeExam = $_POST['sedeExam'];

		
	if ($stmt = $mysqli->prepare("CALL sp_getCasosGrid(?,?,?,?,?,?,?,?)"))
	{
		//Vinculando parametros a la consulta
		if (!$stmt->bind_param("isssssss", $idCaso,$categoria,$subcategoria,$dificultad,$temaCaso,$SubDivLibreCaso, $anioExam, $sedeExam)) {
				echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
		}
		// ejecutar la consulta 
		if (!$stmt->execute()) {
											
					echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
					$mysqli->rollback();  
					echo "Todas las consultas han sido revertidas";  
					
		}else{ 
					$mysqli->commit();   
					//echo "Consultas ejecutadas correctamente";  
		}
		//Obteniendo los resultados de la consulta
		if (!($resultado = $stmt->get_result())) {
					echo "<p>Falló la obtención del conjunto de resultados: (" . $stmt->errno . ") " . $stmt->error;
		}
		
		//Haciendo uso de los resultados obtenidos
		
		
		$resultCasosGrid = array();
		while($rows=$resultado->fetch_object()){
				
				array_push($resultCasosGrid, $rows);
				

		}
		
		
		//print_r($resultado);
		echo json_encode($resultCasosGrid); 
	}
	else
	{
		echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	*/
	
	$i=0;
	while($i < 2)
	{
		$gridInfo[$i]['IdCliente']=$i;
		$gridInfo[$i]['Nombre']="A-".$i;
		$gridInfo[$i]['Direccion']="B-".$i;
		$i++;
	}
	echo json_encode($gridInfo);

	
	
	
?>