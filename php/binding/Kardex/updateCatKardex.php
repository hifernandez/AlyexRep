<?php

require_once '../../clases/config/config.php';
require_once '../../clases/config/Dbmysqli.php';

//Variables recibidas para el POST.
//HARCODE.
//DATOS DEL CLIENTE.
/*	 $p_ID_giro= 1;
$p_ID_cp= 1;
$p_ClaveCliente= 12030653;
$p_RazonSocial= "COOPER S.A. DE C.V.";
$p_RFCCliente= "BASE931221";
$p_NumProveedor= 12030653;
$p_CalleNum= "CALLE 11, ESQUINA 2";
//DATOS DEL CONTACTO DEL CLIENTE.
$p_NombreContact= "Heriberto Israel";
$p_ApellidosContact="Fernández Torres.";
$p_PuestoContact="Lider de proyecto";
$p_NumeroContacto=70967510;
$p_CelularContact=5567924912;
$p_EmailContacto= "hi.fernandez@outlook.com";  */

//SIN HARCODE
//DATOS DE PRENSA.

$p_id_kardex = $_POST['p_id_kardex'];
$p_comboClaveKardex= $_POST['p_comboClaveKardex'];
$p_comboClaveTurno= $_POST['p_comboClaveTurno'];
$p_comboClaveStatus= $_POST['p_comboClaveStatus'];
$p_spinHoraInicio= $_POST['p_spinHoraInicio'];
$p_spinTimeCalenta = $_POST['p_spinTimeCalenta'];
$p_dtFechaExtru = $_POST['p_dtFechaExtru'];
$p_txtPresExtru = $_POST['p_txtPresExtru'];
$p_txtTempDado =$_POST['p_txtTempDado'];
$p_txtTempBols = $_POST['p_txtTempBols'];
$p_txtTempCont = $_POST['p_txtTempCont'];
$p_txt3Lingotes = $_POST['p_txt3Lingotes'];
$p_txtTempOper = $_POST['p_txtTempOper'];
$p_txtTempExt= $_POST['p_txtTempExt'];
$p_txtVelExtr =$_POST['p_txtVelExtr'];
$p_txtKGBrutos =$_POST['p_txtKGBrutos'];
$p_txtLingExt=$_POST['p_txtLingExt'];
$p_btnTipoExt = $_POST['p_btnTipoExt'];
$p_btnCantCuna =$_POST['p_btnCantCuna'];
$p_txtComentExtru = $_POST['p_txtComentExtru'];



//Preparando afectación a la BD.

if ($stmt = $mysqli->prepare("CALL sp_updateKardexCatSAS(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
{
    //Vinculando parametros a la consultad
    if (!$stmt->bind_param("iiiisdsddddddddddsis",$p_id_kardex, $p_comboClaveKardex,    $p_comboClaveTurno,    $p_comboClaveStatus,    $p_spinHoraInicio,    $p_spinTimeCalenta,    $p_dtFechaExtru,    $p_txtPresExtru,    $p_txtTempDado,    $p_txtTempBols,    $p_txtTempCont,    $p_txt3Lingotes,    $p_txtTempOper,    $p_txtTempExt,    $p_txtVelExtr,    $p_txtKGBrutos,    $p_txtLingExt,    $p_btnTipoExt,    $p_btnCantCuna,    $p_txtComentExtru            )) {
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


    $resultClientesGrid = array();
    while($rows=$resultado->fetch_assoc()){

        //array_push($resultClientesGrid, $rows);
        //$resultClientesGrid[]=array_map('utf8_encode', $rows);


        $resultClientesGrid = array(
        'MESSAGE'=> $rows["MESSAGE"]);


    }


    //print_r($resultado);
    echo json_encode($resultClientesGrid);


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