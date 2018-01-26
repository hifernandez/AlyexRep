	<!-- SECCIÓN DE FORMULARIO CON LOS CONTROLES PARA VISUALIZAR LOS CATÁLOGOS-->
	<div class="container">
		<div class="row" id="pwd-container">
			<center>
				<!-- BARRA DE NAVEGACIÓN DE PRODUCCIÓN -->
				<nav class="navbar navbar-default">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Navegador</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="#">Producción</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav">
							<li id="btnProdBackOrd"><a href="#" 
								onclick="pintaProdSel(1)">Back Orders</a></li>
							<!-- SE QUITA LA OPCIÓN DADO QUE LAS OTS SE GENERAN POR ALGORITMO
                                <li id="btnProdCreaOrd"><a href="#" 
								onclick="pintaProdSel(2)">Crea ord. de extrusión</a></li>-->
							<li id="btnProdOrdExtr"><a href="#" 
								onclick="pintaProdSel(2)">Prog. ord. de extrusión</a></li>
							<li id="btnProdProgSem"><a href="#" 
								onclick="pintaProdSel(3)">Programa semanal</a></li> 
							<li id="btnRegExtrusion"><a href="#" 
								onclick="pintaProdSel(4)">Reg. de extrusión</a>
							</li>
							<li id="btnOrdPendProg"><a href="#" 
								onclick="pintaProdSel(5)">Ord. pendientes de prog.</a></li> 
					  </ul>
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
				<ul id="navExtrusion" class="nav nav-tabs nav-justified">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
											aria-haspopup="true" aria-expanded="false">Diario de extrusión <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li id="btnDocLibera"><a href="#" 
												onclick="pintaProdSel(4)">Registro de SCRAP</a></li> 
										</ul>
									</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
											aria-haspopup="true" aria-expanded="false">Reg. de corte <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li id="btnDocLibera"><a href="#" 
												onclick="pintaProdSel(4)">Registro de SCRAP</a></li> 
										</ul>
									</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
											aria-haspopup="true" aria-expanded="false">Reg. de horno<span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li id="btnDocLibera"><a href="#" 
												onclick="pintaProdSel(4)">Registro de SCRAP</a></li> 
										</ul>
									</li>
								</ul>

				<!-- ******************************-->

				<!--SECCIÓN DE GRID PARA ENLISTAR LA DOCUMENTACIÓN DE LA BASE DE DATOS -->
				<div id="divProdBackOrders">
					<?php
						//echo "<H1>DESARROLLO EN PROCESO</H1>";
					    require_once("produccion/backorders.php");
                    ?>
				</div>
                <div id="divProdOrdExtr">
                    <?php
						echo "<H1>DESARROLLO EN PROCESO</H1>";
						//require_once("catalogos/familias.php");
                    ?>
                </div>
				<div id="divProgSemanal">
					<?php
					    echo "<H1>DESARROLLO EN PROCESO</H1>";
						//require_once("catalogos/acabados.php");
					?>
				</div>
				<div id="divRegExtrusion">
					<?php
						echo "<H1>DESARROLLO EN PROCESO</H1>";
						//require_once("catalogos/longitudes.php");
                    ?>
				</div>
                <div id="divOrdsPendProg">
                    <?php
                    echo "<H1>DESARROLLO EN PROCESO</H1>";
                    //require_once("catalogos/longitudes.php");
                    ?>
                </div>
			</center>
		</div>
	</div>


<script>

	$(document).ready(function(){

	    pintaProdSel(1);
	  

	});

</script>

