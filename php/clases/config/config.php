<?php

		//Estableciendo la zona horaria.
		date_default_timezone_set("America/Mexico_City");
		
		// Notificar todos los errores excepto E_NOTICE
		// Monitorear los logs del sistema en apache, pueden ocasionar problemas al estar almacenando grandes cantidades de memoria en un uso persistente.
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		
		// Para mostrar acentos si httpd.conf de apache no esta configurado (descomentar).
		//header('Content-Type: text/html; charset=ISO-8859-1'); 
		ini_set('default_charset','utf-8'); 
		
		//Bandera de configuración para acceso a BD local o en el servidor.
		/*	Tipos de bandera
		1.- local : se conecta a la BD en cliente local para pruebas
		2.- server: se conecta a la BD alojada en el servidor de pruebas:
			*/
		
				$flagConfig ="";
				$flagConfig ="server";
		
		
		if($flagConfig == "local"){
			
			//Datos de configuración de la conexión a la base de datos en ambiente localhost.
					
					//Servidor
							$hostname='localhost';
					//Usuario
							$username='root';
					//Password
							$password='';
					//Base de datos a utilizar
							$database='alyex_sas_dev';
		
	
			
		}else if($flagConfig == "server"){
			
			//echo "Entramos a conexion con servidor remoto...";
			//Datos de configuración de la conexión a la base de datos

							$hostname='localhost'; //IP DEL SERVIDOR.
					//Usuario
							$username='alyexDev'; //USUARIO DE BD DEL SERVIDOR MYSQL.
					//Password
							$password='alyex.Mysql';// PASSWORD DEL USUARIO DE BD.
					//Base de datos a utilizar
							$database='alyex_sas_dev'; //NOMBRE DE LA BS
			
			
		}else if($flagConfig == "serverCC"){
			
				
	
		}
		
		
			function secure($str,$sqlHandle)
			{
				$secured = strip_tags($str);
				$secured = htmlspecialchars($secured);
				$secured = mysqli_real_escape_string($sqlHandle,$secured);
				
				return $secured;
			}
		
		
		
		

?>