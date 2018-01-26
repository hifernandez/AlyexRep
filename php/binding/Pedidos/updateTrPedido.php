<?php
require_once '../../clases/config/config.php';
require_once '../../clases/config/Dbmysqli.php';

$ID_Pedido = $_POST['IDPedido'];
$FlagOper = $_POST['Flag_Oper'];
$MotivoRechaza = $_POST['MotivoRechaza'];
//Estatus del pedido. Nace en BD como pendiente.
$StatusPed = 3;


if ($stmt = $mysqli->prepare("CALL sp_updateStatusPedSAS(?,?)"))
{
    //Vinculando parametros a la consultad
    if (!$stmt->bind_param("ii", $ID_Pedido,$StatusPed)) {
        echo "Fall� la vinculaci�n de par�metros: (" . $stmt->errno . ") " . $stmt->error;
    }
    // ejecutar la consulta
    if (!$stmt->execute()) {
        echo "Fall� la ejecuci�n: (" . $stmt->errno . ") " . $stmt->error;
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
    echo json_encode(array('errorMsg'=>'Algo paso aqu�.'));
    //echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
                    }
?>