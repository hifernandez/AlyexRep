<?php

	if (!empty($_POST))
		$ID = $_POST['ID'];
	else
		$ID=0;
	$i=0;
	while($i < 2)
	{
		$gridInfo[$i]['IdAcabado']=$i;
		$gridInfo[$i]['Clave']="A-".$i;
		$gridInfo[$i]['Descripcion']="B-".$i;
		$i++;
	}

	
	$IdAcabado=$gridInfo[$ID]['IdAcabado'];
	$Clave=$gridInfo[$ID]['Clave'];
	$Descripcion=$gridInfo[$ID]['Descripcion'];
	
	$info = array(
        'IdAcabado' => $IdAcabado,
        'Clave' => $Clave,
        'Descripcion' => $Descripcion		
     );
	 
    echo json_encode($info);

?>