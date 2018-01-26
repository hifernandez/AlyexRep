<?php

	if (!empty($_POST))
		$ID = $_POST['ID'];
	else
		$ID=0;

	$i=0;
	while($i < 2)
	{
		$gridInfo[$i]['IdDado']=$i;
		$gridInfo[$i]['IdClave']=$i;
		$gridInfo[$i]['Clave']="A-".$i;
		$gridInfo[$i]['Descripcion']="B-".$i;
		$gridInfo[$i]['PesoTeorico']="C-".$i;
		$gridInfo[$i]['SuperficieExpuesta'] ="D-".$i;
		$gridInfo[$i]['SuperficiePulida']="E-".$i;
		$i++;
	}
	
	$IdDado             =$gridInfo[$ID]['IdDado'];
	$IdClave            =$gridInfo[$ID]['IdClave'];
	$Clave              =$gridInfo[$ID]['Clave'];
	$Descripcion        =$gridInfo[$ID]['Descripcion'];
	$PesoTeorico        =$gridInfo[$ID]['PesoTeorico'];
	$SuperficieExpuesta =$gridInfo[$ID]['SuperficieExpuesta'];
	$SuperficiePulida	=$gridInfo[$ID]['SuperficiePulida'];
	
	$info = array(
        'IdClave' => $IdClave,
        'Clave' => $Clave,
        'Descripcion' => $Descripcion,
        'PesoTeorico' => $PesoTeorico,
        'SuperficieExpuesta' => $SuperficieExpuesta,
        'SuperficiePulida' => $SuperficiePulida
     );
	 
    echo json_encode($info);

?>