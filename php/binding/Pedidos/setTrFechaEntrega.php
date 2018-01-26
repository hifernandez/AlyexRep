<?php
session_start();
?>
<?php

require_once '../../clases/config/config.php';
require_once '../../clases/config/Dbmysqli.php';

//Par�metros recuperados POST.
$IDCotiza= $_POST['IdCotiza'];
$IDItem = $_POST['IdItem'];
$FechaEntrega = date("Y-m-d H:i:s", strtotime($_POST['FechaEntrega']));

//Par�metros recuperados por SESSION.
$idStatus = 3; //Estatus pendiente
$idUsuario = 1;


if ($stmt = $mysqli->prepare("CALL sp_updateFechaEntrega(?,?,?)"))
{
    //Vinculando parametros a la consultad
    if (!$stmt->bind_param("iis",$IDCotiza,$IDItem,$FechaEntrega)) {
        echo "Fall? la vinculaci?n de par?metros: (" . $stmt->errno . ") " . $stmt->error;
    }
    // ejecutar la consulta
    if (!$stmt->execute()) {

        echo "Fall? la ejecuci?n: (" . $stmt->errno . ") " . $stmt->error;
        $mysqli->rollback();
        echo "Todas las consultas han sido revertidas";

    }else{
        $mysqli->commit();
        //echo "Consultas ejecutadas correctamente";

        $json_response_cot = array(
         'success'=>true);
    }
    //Obteniendo los resultados de la consulta
    if (!($resultado = $stmt->get_result())) {
        echo "<p>Fall? la obtenci?n del conjunto de resultados: (" . $stmt->errno . ") " . $stmt->error;
    }


    //Haciendo uso de los resultados obtenidos
    $totalRegistros = 0;
    $jsonResult = array();

    //$i=0;
    $resultStmtToArray = array();
    //while($rows=$resultado->fetch_assoc()){

    //    //array_push($resultStmtToGrid, $rows);
    //    //$resultStmtToArray[]=array_map('utf8_encode', $rows);
    //    //$totalRegistros = $rows["TOTAL"];
    //    $json_response_cot = array(
    //    'success'=>true);
    //    //echo "<p>FAMILIA:".$resultStmtToArray[$i]["descripcion"];

    //    //$i++;
    //}

    //$jsonResult["total"] = $totalRegistros;
    //$jsonResult["rows"]= $resultStmtToArray;
    $jsonResult= $resultStmtToArray;

    //print_r($resultado);
    echo json_encode($json_response_cot);

}
else
{
    echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
}









?>