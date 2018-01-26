<?php
session_start();
?>
<?php
require_once '../../clases/config/config.php';
require_once '../../clases/config/Dbmysqli.php';

$idCotizacion = $_GET['id_Cotizacion'];
$tipoOper = $_GET['tipo_Oper'];
$_SESSION["ID_COT_SES"] = $_GET['id_Cotizacion'];

switch($tipoOper){


    case "pedido":

                                if ($stmt = $mysqli->prepare("CALL sp_getCotProdById(?,?)"))
                                {
                                    //Vinculando parametros a la consultad
                                    if (!$stmt->bind_param("is", $idCotizacion,$tipoOper)) {
                                        echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
                                    }
                                    // ejecutar la consulta
                                    if (!$stmt->execute()) {

                                        echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
                                        $mysqli->rollback();
                                        echo "Todas las consultas han sido revertidas";

                                    }else{
                                        $mysqli->commit();
                                        //echo json_encode(array('success'=>true));

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
                                    // array('success'=>true);
                                    while($rows=$resultado->fetch_assoc()){

                                        //array_push($resultStmtToArray, $rows);
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

        break;//Break pedido.

    case "cotizacion":

                                if ($stmt = $mysqli->prepare("CALL sp_getCotProdById(?,?)"))
                                {
                                    //Vinculando parametros a la consultad
                                    if (!$stmt->bind_param("is", $idCotizacion,$tipoOper)) {
                                        echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
                                    }
                                    // ejecutar la consulta
                                    if (!$stmt->execute()) {

                                        echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
                                        $mysqli->rollback();
                                        echo "Todas las consultas han sido revertidas";

                                    }else{
                                        $mysqli->commit();
                                        //echo json_encode(array('success'=>true));

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
                                    // array('success'=>true);
                                    while($rows=$resultado->fetch_assoc()){

                                        //array_push($resultStmtToArray, $rows);
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

        break;//Break cotización.















}










?>