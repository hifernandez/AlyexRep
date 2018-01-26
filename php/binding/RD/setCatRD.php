<?php

require_once '../../clases/config/config.php';
require_once '../../clases/config/Dbmysqli.php';

$Nombre = $_POST['Nombre'];
$AreaSing = $_POST['AreaSing'];
$AreaSmtr = $_POST['AreaSmtr'];
$TeoricoSing = $_POST['TeoricoSing'];
$TeoricoSmtr = $_POST['TeoricoSmtr'];
$AnodizableSing = $_POST['AnodizableSing'];
$AnodizableSmtr = $_POST['AnodizableSmtr'];
$PbleSing = $_POST['PbleSing'];
$PbleSmtr = $_POST['PbleSmtr'];
$CircularSing = $_POST['CircularSing'];
$CircularSmtr = $_POST['CircularSmtr'];

$TempleDado= intval($_POST['TEMPLE']);
$AcabadoDado=intval($_POST['ACABADO']);
$AleacionDado= intval($_POST['ALEACION']);

$clienteId = intval($_POST['clienteId']);
$codCliente = $_POST['codCliente'];
$longPulgadas = $_POST['longPulgadas'];
$longMili = $_POST['longMili'];
$toleranciaPulg = $_POST['toleranciaPulg'];
$toleranciaMili = $_POST['toleranciaMili'];
$btnFisico = $_POST['btnFisico'];
$btnEnsamble = $_POST['btnEnsamble'];
$criticaPulg = $_POST['criticaPulg'];
$criticaMili = $_POST['criticaMili'];
$superficiePulg = $_POST['superficiePulg'];
$superficieMili = $_POST['superficieMili'];
$btnDibEntregado = $_POST['btnDibEntregado'];
$btnCroquis = $_POST['btnCroquis'];
$tonelajeMensual = $_POST['tonelajeMensual'];
$tonelajeAnual = $_POST['tonelajeAnual'];
$observaciones = $_POST['observaciones'];
$dimCompletasBtn = $_POST['dimCompletasBtn'];
$corrugadoBtn = $_POST['corrugadoBtn'];
$polyBtn = $_POST['polyBtn'];
$kraftBtn = $_POST['kraftBtn'];
$numeroPiezas = $_POST['numeroPiezas'];

if ($stmt = $mysqli->prepare("CALL sp_insertRDCatSAS(?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"))
{
    //Vinculando parametros a la consulta
    if (!$stmt->bind_param("sddddddddddiiiiiddddddddddiiiiiiiiis", $Nombre, $AreaSing, $AreaSmtr, $TeoricoSing, $TeoricoSmtr, $AnodizableSing, $AnodizableSmtr, $PbleSing, $PbleSmtr, $CircularSing, $CircularSmtr, $TempleDado, $AcabadoDado , $AleacionDado , $clienteId, $codCliente, $longPulgadas, $longMili, $toleranciaPulg, $toleranciaMili, $criticaPulg, $criticaMili, $superficiePulg, $superficieMili, $tonelajeMensual, $tonelajeAnual, $btnFisico, $btnEnsamble, $btnDibEntregado, $btnCroquis, $dimCompletasBtn, $corrugadoBtn, $polyBtn, $kraftBtn, $numeroPiezas,$observaciones) ){
        echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
    }
    // ejecutar la consulta
    if (!$stmt->execute()) {

        echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
        $mysqli->rollback();
        echo "Todas las consultas han sido revertidas";

    }else{
        $mysqli->commit();

        if (!($resultado = $stmt->get_result())) {
            echo "<p>Falló la obtención del conjunto de resultados: (" . $stmt->errno . ") " . $stmt->error;
        }

        //Haciendo uso de los resultados obtenidos


        $resultCasosGrid = array();
        while($rows=$resultado->fetch_assoc()){

            //array_push($resultClientesGrid, $rows);
            //$resultClientesGrid[]=array_map('utf8_encode', $rows);


            $resultCasosGrid = array(
            'MESSAGE'=> $rows["MESSAGE"]);


        }


        //print_r($resultado);
        echo json_encode($resultCasosGrid);
        //echo "Consultas ejecutadas correctamente";
    }
    //Obteniendo los resultados de la consulta

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