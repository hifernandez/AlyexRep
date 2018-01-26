<?php

	if (!empty($_POST))
		$ID = $_POST['ID'];
	else
		$ID=0;
	$i=0;
	while($i < 2)
	{
		$gridInfo[$i]['IdAleacion']=$i;
		$gridInfo[$i]['Clave']="A-".$i;
		$gridInfo[$i]['Descripcion']="B-".$i;
		$i++;
	}

	
	$IdAleacion=$gridInfo[$ID]['IdAleacion'];
	$Clave=$gridInfo[$ID]['Clave'];
	$Descripcion=$gridInfo[$ID]['Descripcion'];
	
	$info = array(
        'IdAleacion' => $IdAleacion,
        'Clave' => $Clave,
        'Descripcion' => $Descripcion		
     );
	 
    echo json_encode($info);

?>