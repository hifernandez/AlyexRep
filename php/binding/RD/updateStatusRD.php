<?php
require_once '../../clases/config/config.php';
require_once '../../clases/config/Dbmysqli.php';
$ID_Dibujo = $_POST['IDdibujo'];
$ID_Header = $_POST['IDHeader'];
$FlagOper = $_POST['Flag_Oper'];
$MotivoCancela = $_POST['MotivoCancela'];
if ($stmt = $mysqli->prepare("CALL sp_updateEstatusRDSAS(?,?,?,?)"))
{
    //Vinculando parametros a la consultad
    if (!$stmt->bind_param("iiss", $ID_Dibujo, $ID_Header,$FlagOper,$MotivoCancela)) {
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