<?php


			//echo "<p>llamado desde login<p>";
			//MySQLi
			require_once 'config.php';
			$mysqli = new mysqli($hostname, $username,$password, $database);
			if ($mysqli -> connect_errno) {
			die( "Fallo la conexi�n a MySQL: (" . $mysqli -> mysqli_connect_errno() 
			. ") " . $mysqli -> mysqli_connect_error());
			}
			else{
						//echo "Conexi�n exitosa MYQLI!";		
			}
			
			
			// Get thread id
			//$t_id=mysqli_thread_id($con);
			
			//$mysqli -> mysqli_kill($t_id);
			//if($mysqli -> close()){
				
				//echo "<p>Conexi�n cerrada exitosamente!";
				
			//}


?>
