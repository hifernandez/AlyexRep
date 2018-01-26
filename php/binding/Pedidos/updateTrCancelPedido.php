<?php
require_once '../../clases/config/config.php';
require_once '../../clases/config/Dbmysqli.php';

$ID_Pedido = $_POST['IDPedido'];
$FlagOper = $_POST['Flag_Oper'];
$MotivoRechaza = $_POST['MotivoRechaza'];
$StatusPed = 2;


if ($stmt = $mysqli->prepare("CALL sp_updateStatusCancelPedSAS(?,?)"))
{
    //Vinculando parametros a la consultad
    if (!$stmt->bind_param("ii", $ID_Pedido,$StatusPed)) {
        echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
    }
    // ejecutar la consulta
    if (!$stmt->execute()) {
        echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
        $mysqli->rollback();
        echo "Todas las consultas han sido revertidas";
    }else{
        $mysqli->commit();
        echo json_encode(array('success'=>true));
        //echo "Consultas ejecutadas correctamente";
    }
}
else
{
    echo json_encode(array('errorMsg'=>'Algo paso aquí.'));
    //echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
                    }
?>