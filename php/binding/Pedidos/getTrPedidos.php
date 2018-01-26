<?php

require_once '../../clases/config/config.php';
require_once '../../clases/config/Dbmysqli.php';

$IdPedido=1;//$_POST['IdFamilia'];
$Clave= ''; //$_POST['Clave'];
$Descripcion=''; //$_POST['Descripcion'];


if ($stmt = $mysqli->prepare("CALL sp_getPedidosSAS(?)"))
{
    //Vinculando parametros a la consultad
    if (!$stmt->bind_param("i", $IdPedido)) {
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
    $totalRegistros = 0;
    $jsonResult = array();

    //$i=0;
    $resultStmtToArray = array();
    while($rows=$resultado->fetch_assoc()){

        //array_push($resultStmtToGrid, $rows);
        $resultStmtToArray[]=array_map('utf8_encode', $rows);
        //$totalRegistros = $rows["TOTAL"];

        //echo "<p>FAMILIA:".$resultStmtToArray[$i]["descripcion"];

        //$i++;
    }

    //$jsonResult["total"] = $totalRegistros;
    //$jsonResult["rows"]= $resultStmtToArray;
    $jsonResult= $resultStmtToArray;

    //print_r($resultado);
    echo json_encode($jsonResult);

}
else
{
    echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
}



?>