<?php
	
	$i=0;
	while($i < 2)
	{
		if($i == 1)
		{
			$gridInfo[$i]['IdElemPedido']=$i;
			$gridInfo[$i]['Item']="--";
			$gridInfo[$i]['Cantidad']="--";
			$gridInfo[$i]['Cliente']="--";
			$gridInfo[$i]['PTML']="TOTAL DE KILOS";
			$gridInfo[$i]['kilos']="1800";
			$gridInfo[$i]['FechaEntrega']="--";
		}
		else{
			$gridInfo[$i]['IdElemPedido']=$i;
			$gridInfo[$i]['Item']="PERFIL Z  3 1/4 T6 - 3.66 - 10";
			$gridInfo[$i]['Cantidad']="3000";
			$gridInfo[$i]['Cliente']="COOPER CROUSE-HINDS S DE RL DE CV";
			$gridInfo[$i]['PTML']="4.52";
			$gridInfo[$i]['kilos']="1800";
			$gridInfo[$i]['FechaEntrega']="2017/04/14";
		}
		$i++;
	}
	echo json_encode($gridInfo);

	
	
	
?>