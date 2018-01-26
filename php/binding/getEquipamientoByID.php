<?php

	if (!empty($_POST))
		$ID = $_POST['ID'];
	else
		$ID=0;

		
	$i=0;
	while($i < 2)
	{
		$gridInfo[$i]['IdEquipo']=$i;
		$gridInfo[$i]['Clave']="A-".$i;
		$gridInfo[$i]['Tipo']="Bomba-".$i;
		$gridInfo[$i]['Descripcion']="bomba hidraulica-".$i;
		$i++;
	}

	$IdEquipo=	$gridInfo[$ID]['IdEquipo'];
	$Clave	=$gridInfo[$ID]['Clave'];
	$Tipo	=$gridInfo[$ID]['Tipo'];
	$Descripcion=	$gridInfo[$ID]['Descripcion'];

		
	$info = array(
        'IdEquipo' => $IdEquipo,
        'Clave' => $Clave,
		'Tipo' => $Tipo,
        'Descripcion' => $Descripcion		
     );
	 
    echo json_encode($info);

?>