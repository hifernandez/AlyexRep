<?php
	
	require_once '../../clases/config/config.php';	
	require_once '../../clases/config/Dbmysqli.php';

	$IdLinea=0;//$_POST['IdFamilia'];
	$IdPerfil= 1; //$_POST['Clave'];
	$nombreLinea=''; //$_POST['Descripcion'];
	$Descripcion='';//$_POST['SubFamilia'];

		
	if ($stmt = $mysqli->prepare("CALL sp_insertLinCatSAS(?,?,?)"))
	{
		//Vinculando parametros a la consultad
		if (!$stmt->bind_param("ssi",$Descripcion,$nombreLinea,$IdPerfil)) {
				echo "Fall� la vinculaci�n de par�metros: (" . $stmt->errno . ") " . $stmt->error;
		}
		// ejecutar la consulta 
		if (!$stmt->execute()) {
											
					echo "Fall� la ejecuci�n: (" . $stmt->errno . ") " . $stmt->error;
					$mysqli->rollback();  
					echo "Todas las consultas han sido revertidas";  
					
		}else{ 
					$mysqli->commit();   
					//echo "Consultas ejecutadas correctamente";  
		}
		//Obteniendo los resultados de la consulta
		if (!($resultado = $stmt->get_result())) {
					echo "<p>Fall� la obtenci�n del conjunto de resultados: (" . $stmt->errno . ") " . $stmt->error;
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