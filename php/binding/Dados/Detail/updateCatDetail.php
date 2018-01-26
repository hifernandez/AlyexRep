<?php

	require_once '../../../clases/config/config.php';
	require_once '../../../clases/config/Dbmysqli.php';
    //Datos Hardcore
    /*$IdDetail = 1;
	$A = 101010;
	$E = 'El dado de prueba';
	$F = 'Notas para prueba';
	$G = 0.999;
	$H = 0.999;
	$I =  0.999;
	$J =  0.999;
	$K =  0.999;
	$L = 0.999;
	$M =  0.999;
	$N = 0.999;
	$O =  0.999;
	$P =  0.999;
	$Q = 2;
	$R = 0002;
	$S =3;
	$T = 27;
	$U = 'ejemplo';
	$V ='observacions';
	$TipoOperacion= 'ALTADADO';*/

    //Datos por POST
	$IdDetail = $_POST['ID'];
	$A = $_POST['Clave'];
	$E = $_POST['Nombre'];
	$F = $_POST['Nota'];
	$G = $_POST['AreaSing'];
	$H = $_POST['AreaSmtr'];
	$I = $_POST['TeoricoSing'];
	$J = $_POST['TeoricoSmtr'];
	$K = $_POST['AnodizableSing'];
	$L = $_POST['AnodizableSmtr'];
	$M = $_POST['PbleSing'];
	$N = $_POST['PbleSmtr'];
	$O = $_POST['CircularSing'];
	$P = $_POST['CircularSmtr'];
	$Q = $_POST['Factor'];
	$R = $_POST['Version'];
	$S = $_POST['Cavidad'];
	$T = $_POST['Extrusion'];
	$U = $_POST['Esp'];
	$V = $_POST['Observaciones'];
    $Digito = $_POST['Digito'];
	$tipoDado = $_POST['tipoDado'];
	$TipoOperacion= $_POST['TipoOperacion'];


	switch($TipoOperacion){
		case "EDICIONDADO":
								if ($stmt = $mysqli->prepare("CALL sp_updateDetailDadosCatSAS(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
								{
									//echo"Entraste hasta aca EDICION";
									//Vinculando parametros a la consulta
									if (!$stmt->bind_param("isssddddddddddisiissii",$IdDetail,$A,$E,$F,$G,$H,$I,$J,$K,$L,$M,$N,$O,$P,$Q,$R,$S,$T,$U,$V,$tipoDado,$Digito)) {
											echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
									}
									// ejecutar la consulta
									if (!$stmt->execute()) {

												echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
												$mysqli->rollback();
												echo "Todas las consultas han sido revertidas";

									}else{
												$mysqli->commit();
												echo "Consultas ejecutadas correctamente";
									}
									//Obteniendo los resultados de la consulta
								}
								else
								{
									echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
								}
		break;

		case "ALTADADO":
            if ($stmt = $mysqli->prepare("CALL sp_insertDetailDadosCatSAS(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
            {

									echo"Entraste hasta aca ALTA";
									//Vinculando parametros a la consulta
									if (!$stmt->bind_param("sssddddddddddisiissii",$A,$E,$F,$G,$H,$I,$J,$K,$L,$M,$N,$O,$P,$Q,$R,$S,$T,$U,$V,$tipoDado,$Digito)) {
											echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
									}
									// ejecutar la consulta
									if (!$stmt->execute()) {

												echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
												$mysqli->rollback();
												echo "Todas las consultas han sido revertidas";

									}else{
												$mysqli->commit();
												echo "Consultas ejecutadas correctamente";
									}
									//Obteniendo los resultados de la consulta
								}
								else
								{
									echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
								}


		break;

	}



?>