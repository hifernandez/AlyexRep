<?php
	session_start();

	/*Incluimos los ficheros necesarios*/
			include '../clases/config/config.php';	
			include '../clases/config/Dbmysqli.php';
		
			$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
			$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

			$offset = ($page-1)*$rows;
			//echo $_SESSION['Segmento'];//Ya no se recibe la UMF, ahora el segmento que tiene todos los pacientes asignado al agente
			$segmento= $_SESSION['Segmento'];
			//echo $_SESSION['Segmento'];
		if ($stmt = $mysqli->prepare("CALL getAllProgramedCalls(?,?,?)")){
					
					//Vinculando parametros a la consulta
					if (!$stmt->bind_param("iis",$offset,$rows,$segmento)) {
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
					
					
					$outputPatients = array();
					$jsonResult = array();
					$totalPacientes = 0;
					
					//Metodo anterior FETCH_OBJECT, ocasionaba problemas con los acentos para pasar a JSON.
					/*while($rowsGrid=$resultado->fetch_object()){
							
							array_push($resultPatientsGrid, $rowsGrid);
							$totalPacientes = $rowsGrid->Total;

					}*/
					$i=0;
					//Método que guarda el result FETCH_ASSOC como arreglo asociativo.
					while($rowsGrid=$resultado->fetch_assoc()){
							
							$outputPatients[]=array_map('utf8_encode', $rowsGrid);
							$totalPacientes = $rowsGrid["Total"];
							
						switch($outputPatients[$i]["EstatusEnf"])
						{
							case "Not_Held1":
								$outputPatients[$i]["EstatusEnf"]="No asistio, reagendar";								
							break;
							case "Not Held"://Este servira en productivo en vez del anterior
								$outputPatients[$i]["EstatusEnf"]="No asistio, reagendar";								
							break;
							case "Not_Held2":
								$outputPatients[$i]["EstatusEnf"]="Sin ayuno, reagendar";
							break;
							case "Not_Held3":
								$outputPatients[$i]["EstatusEnf"]="Tomo medicamento, reagendar";								
							break;
							case "Not_Held4":
								$outputPatients[$i]["EstatusEnf"]="Mujer en periodo, reagendar";								
							break;
							case "Not_Held5":
								$outputPatients[$i]["EstatusEnf"]="Falta de muestras, reagendar";								
							break;
							default:
								$outputPatients[$i]["EstatusEnf"]="Primera cita";
							break;
						}
						$i++;

					}

					//Desplegando el GridView al usuario al igual que el total de registros.
					$jsonResult["total"] = $totalPacientes;
					$jsonResult["rows"]= $outputPatients;
					
					//print_r($output);
					//echo json_encode($jsonResult); 
					echo json_encode($jsonResult); 
					
					
					//print("</table>"); 
					// cerrar sentencia 
					//$stmt->close();
				    //$mysqli -> close(); 
					
		}else{
					echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
		}  
		

	// PARA DATOS DE PRUEBAS EN EL GRID.	
		
	/*$i=0;
	while($i < 4)
	{
		$gridInfo[$i]['IdProducto']=$i;
		$gridInfo[$i]['Clave']="A-".$i;
		$gridInfo[$i]['Descripcion']="B-".$i;
		$gridInfo[$i]['Unidad']="C-".$i;
		$gridInfo[$i]['Familia'] ="D-".$i;
		$gridInfo[$i]['Acabado']="E-".$i;
		$gridInfo[$i]['Longitud']="F-".$i;
		$gridInfo[$i]['Temple']="G-".$i;
		$gridInfo[$i]['PesoTeorico']="H-".$i;
		$i++;
	}
	
	echo json_encode($gridInfo); */


?>
	

	
	
