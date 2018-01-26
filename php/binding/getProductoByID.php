<?php

	if (!empty($_POST))
		$ID = $_POST['ID'];
	else
		$ID=0;

	$gridInfo=array();
	$i=0;
	while($i < 2)
	{
		$gridInfo[$i]['Clave'] = "A-".$i;
		$gridInfo[$i]['Descripcion'] = "B-".$i;
		$gridInfo[$i]['Unidad'] = "C-".$i;
		$gridInfo[$i]['Familia'] = "D-".$i;
		$gridInfo[$i]['Acabado'] = "E-".$i;
		$gridInfo[$i]['Longitud'] = "F-".$i;
		$gridInfo[$i]['Temple'] = "G-".$i;
		$gridInfo[$i]['PesoTeorico'] = "H-".$i;
		$i++;
	}

	$Clave=$gridInfo[$ID]['Clave'];
	$Descripcion=$gridInfo[$ID]['Descripcion'];
	$Unidad=$gridInfo[$ID]['Unidad'];
	$Familia=$gridInfo[$ID]['Familia'];
	$Acabado=$gridInfo[$ID]['Acabado'];
	$Longitud=$gridInfo[$ID]['Longitud'];
	$Temple=$gridInfo[$ID]['Temple'];
	$PesoTeorico=$gridInfo[$ID]['PesoTeorico'];
	
	$info = array(
        'Clave' => $Clave,
        'Descripcion' => $Descripcion,
        'Unidad' => $Unidad,
        'Familia' => $Familia,
        'Acabado' => $Acabado,
        'Longitud' => $Longitud,
        'Temple' => $Temple,
        'PesoTeorico' => $PesoTeorico
     );
	 
    echo json_encode($info);

?>