<?php

require_once '../../../clases/config/config.php';
require_once '../../../clases/config/Dbmysqli.php';

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
$p_ApellidosContact="Fern�ndez Torres.";
$p_PuestoContact="Lider de proyecto";
$p_NumeroContacto=70967510;
$p_CelularContact=5567924912;
$p_EmailContacto= "hi.fernandez@outlook.com";  */

//SIN HARCODE.
//DATOS DEL CLIENTE.
/*    $p_ID_giro= $_POST['ID_giro'];
$p_ID_cp= $_POST['ID_cp'];
$p_ClaveCliente= $_POST['ClaveCliente'];
$p_RazonSocial= $_POST['RazonSocial'];
$p_RFCCliente= $_POST['RFCCliente'];
$p_NumProveedor= $_POST['NumProveedor'];
$p_CalleNum= $_POST['CalleNum'];*/
//DATOS DEL CONTACTO DEL CLIENTE.
$p_idCliente= $_POST['idCliente'];
$p_NombreContact= $_POST['NombreContact'];
$p_ApellidosContact= $_POST['ApellidosContact'];
$p_PuestoContact=$_POST['PuestoContact'];
$p_NumeroContacto= $_POST['NumeroContacto'];
$p_CelularContact=$_POST['CelularContact'];
$p_EmailContacto=$_POST['EmailContacto'];

//Preparando afectaci�n a la BD.

if ($stmt = $mysqli->prepare("CALL sp_insertContactoCatSAS(?,?,?,?,?,?,?)"))
{
    //Vinculando parametros a la consultad
    if (!$stmt->bind_param("issssss",$p_idCliente,$p_NombreContact,$p_ApellidosContact,$p_PuestoContact,$p_NumeroContacto,$p_CelularContact,$p_EmailContacto)) {
        echo "Fall� la vinculaci�n de par�metros: (" . $stmt->errno . ") " . $stmt->error;
    }
    // ejecutar la consulta
    if (!$stmt->execute()) {

        echo "Fall� la ejecuci�n: (" . $stmt->errno . ") " . $stmt->error;
        $mysqli->rollback();
        echo "Todas las consultas han sido revertidas";

    }else{
        $mysqli->commit();
        //echo "Consultas ejecutadas correctamente";
    }
    //Obteniendo los resultados de la consulta
    if (!($resultado = $stmt->get_result())) {
        echo "<p>Fall� la obtenci�n del conjunto de resultados: (" . $stmt->errno . ") " . $stmt->error;
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