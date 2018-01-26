<?php 
			//Activamos la sesión.
			session_start();
			
			
			/*Incluimos los ficheros necesarios*/
            require("php/clases/config/config.php");
			require("php/clases/config/Dbmysqli.php");
	
			
			
if(isset($_POST['login']))
{


//	$userName = secure($_POST['username'], $mysqli);
	//$passUser =  secure($_POST['password'], $mysqli);
	$userName = $_POST['username'];
	$passUser = $_POST['password'];
	
	
	//Validando si el usuario hizo check para mantener activa la sesión aunque se cierre el navegador.
	/*if($_POST['loginkeeping'] == true) {
				
					$_SESSION['login'] = $userName;
					setcookie("CMOTSESSID", $_COOKIE[session_name()], time()+86400);
				
	}else {
					$_SESSION['login'] = $userName;
					setcookie("CMOTSESSID", $_COOKIE[session_name()]);
	}*/

	
	if ($stmt = $mysqli->prepare("Call sp_getUserSAS(?,?)")){
					if (!$stmt->bind_param("ss",$userName,$passUser)) {
								echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
					}
					if (!$stmt->execute()) {
								echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
								if($mysqli->rollback()) 
									echo "ERR: Todas las consultas han sido revertidas";
								else												
									echo "ERR: Ocurrio un error al hacer RollBack";
					}else{ 
														$mysqli->commit();   
														//echo "Consultas ejecutadas correctamente";  
	
														
					}
					if (!($resultado = $stmt->get_result())) {
								echo "Falló la obtención del conjunto de resultados: (" . $stmt->errno . ") " . $stmt->error;
					}
					
					//var_dump($resultado->fetch_all());
					while($rows=$resultado->fetch_assoc()){
						
						if($rows["REGISTROS"] == "0"){
							
							
							//header("Location:index.php");
							echo "<script type="."\"text/javascript\">"."alert(\"Datos de usuario incorrectos, intente de nuevo o notifique a su administrador de sistemas.\");"."</script>";  
							echo "<script type="."\"text/javascript\">"."window.location.assign(\"index.php\");"."</script>";  
							exit;
							
						}else{

							$_SESSION['userName'] = $userName;
							$_SESSION['id_currentUser'] = 1;//$rows["ID_USER"];
//							header("Location:ses_index.php");
							header("Location:ses_index.php");
							exit;
										
						}
						
					}
					
					
					$stmt->close();
				    //$mysqli -> close(); 
		}
		else{
					echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
		} 
	
	
	
	
}
?>