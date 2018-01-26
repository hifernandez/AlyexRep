
<?php

	if (!empty($_POST))
		$ID = $_POST['ID'];
	else
		$ID=0;
	
	$i=0;
	while($i < 2)
	{
		$gridInfo[$i]['clave_familia']="Z-".$i;
		$gridInfo[$i]['descripcion_familia']="A-".$i;
		$gridInfo[$i]['subfamilia_familia']="B-".$i;
		$i++;
	}
	
	$Clave=$gridInfo[$ID]['clave_familia'];
	$Descripcion=$gridInfo[$ID]['descripcion_familia'];
	$SubFamilia=$gridInfo[$ID]['subfamilia_familia'];
	$info = array(
        'clave_familia' => $Clave,
        'descripcion_familia' => $Descripcion,
        'subfamilia_familia' => $SubFamilia		
     );
	 
    echo json_encode($info);

?>