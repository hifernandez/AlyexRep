<?php
				
				//Probando la conexión a la BD.
				include "config.php";
				//Instanciando objeto de conexión.
				$mysqli = new mysqli($hostname, $username, $password, $database);
				if ($mysqli->connect_errno) {
					
					echo "<p>Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error."<p>";
				
				}else{
							
							//Desplegando en pantalla los datos del servidor.
							echo "<p>Respuesta del servidor: ".$mysqli->host_info . "\n";
							echo "<p>Conexión satisfactoria a: ".$database."<p>";
				}
?>