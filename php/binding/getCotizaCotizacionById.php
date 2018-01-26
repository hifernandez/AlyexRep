<?php
	
	$i=0;
	while($i < 3)
	{
		if($i == 2)
		{
			$gridInfo[$i]['IdElemCotiza']=$i;
			$gridInfo[$i]['Item']="SUBTOTAL";
			$gridInfo[$i]['Cantidad']="30000";
			$gridInfo[$i]['Cliente']="IVA 16%".(30000*0.16);
			$gridInfo[$i]['PrecioUnitario']="TOTAL";
			$gridInfo[$i]['Importe']=30000*1.16;
		}
		else{
			$gridInfo[$i]['IdElemCotiza']=$i;
			$gridInfo[$i]['Item']="PERFIL Z  3 1/4 T6 - 3.66 - 10";
			$gridInfo[$i]['Cantidad']="3000";
			$gridInfo[$i]['Cliente']="COOPER CROUSE-HINDS  S DE RL DE CV";
			$gridInfo[$i]['PrecioUnitario']="4.52";
			$gridInfo[$i]['Importe']="18000";
		}
		$i++;
	}
	echo json_encode($gridInfo);

	
	
	
?>