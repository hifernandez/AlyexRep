<?php
require_once '../../clases/config/config.php';
require_once '../../clases/config/Dbmysqli.php';

$idDibujo = $_POST['idDibujo'];
$idDado = $_POST['idDado'];
$claveRD = $_POST['claveRD'];
$digitoRD = $_POST['digitoRD'];
$fechaRD = date("Y-m-d H:i:s", strtotime($_POST['fechaRD']));
$cavidadRD = $_POST['cavidadRD'];
$observRD = $_POST['observRD'];
$relExtrRD = $_POST['relExtrRD'];
$tipoDado = $_POST['tipoDado'];


if ($stmt = $mysqli->prepare("CALL sp_updateRDAprobCatSAS(?,?,?,?,?,?,?,?,?)"))
{
    //Vinculando parametros a la consultad
    if (!$stmt->bind_param("iisisisii", $idDibujo,$idDado,$claveRD, $digitoRD,$fechaRD,$cavidadRD,$observRD, $relExtrRD, $tipoDado)) {
        echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
    }
    // ejecutar la consulta
    if (!$stmt->execute()) {
        echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
        $mysqli->rollback();
        echo "Todas las consultas han sido revertidas";
    }else{
        $mysqli->commit();
    }
    if (!($resultado = $stmt->get_result())) {
        echo "<p>Falló la obtención del conjunto de resultados: (" . $stmt->errno . ") " . $stmt->error;
    }

    //Haciendo uso de los resultados obtenidos


    $resultCasosGrid = array();
    while($rows=$resultado->fetch_assoc()){
        $resultCasosGrid = array(
        'MESSAGE'=> $rows["MESSAGE"]);
    }
    //print_r($resultado);
    echo json_encode($resultCasosGrid);
}
else
{
    echo json_encode(array('errorMsg'=>'Algo paso aquí.'));
    //echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
}
?>