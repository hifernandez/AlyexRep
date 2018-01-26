	<!-- SECCIÓN DE FORMULARIO CON LOS CONTROLES PARA VISUALIZAR LOS CATÁLOGOS-->
	<div class="container">
		<div class="row" id="pwd-container">
			<center>
				<!-- BARRA DE NAVEGACIÓN DE DOCUMENTACIÓN -->
				<nav class="navbar navbar-default">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
					  data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Navegador</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>	
					  <a class="navbar-brand" href="#">Documentaci&oacute;n</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
										aria-haspopup="true" aria-expanded="false">Cotizaci&oacute;n<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li id="btnDocCotiza"><a href="#" 
										onclick="pintaDocumentoSel(1)">Registro de Cotizaci&oacute;n</a></li>
									<li id="btnPoolCotiza"><a href="#" 
										onclick="pintaDocumentoSel(8)">Pool de Cotizaciones</a></li>
								</ul>			
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
										aria-haspopup="true" aria-expanded="false">Pedido<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li id="btnDocPedido"><a href="#" 
										onclick="pintaDocumentoSel(2)">Registro de Pedido</a></li>
									<li id="btnDocPoolPed"><a href="#" 
										onclick="pintaDocumentoSel(3)">Pool de Pedidos</a></li>
								</ul>			
							</li>
							<li id="btnDocEstadisticas"><a href="#" 
								onclick="pintaDocumentoSel(9)">Estadisticas</a></li>
							<li id="btnDocOrdProd"><a href="#" 
								onclick="pintaDocumentoSel(10)">Orden de producci&oacute;n</a></li>
							<li id="btnDocOrdEmb"><a href="#" 
								onclick="pintaDocumentoSel(4)">Orden de embarque</a></li>
							<li id="btnDocRemision"><a href="#" 
								onclick="pintaDocumentoSel(5)">Remisi&oacute;n</a></li> 
							<li id="btnDocFactura"><a href="#" 
								onclick="pintaDocumentoSel(6)">Factura</a></li> 
							<li id="btnDocCobranza"><a href="#" 
								onclick="pintaDocumentoSel(7)">Cobranza</a></li> 
						</ul>
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>

				<!-- ******************************-->

				<!--SECCIÓN DE GRID PARA ENLISTAR LA DOCUMENTACIÓN DE LA BASE DE DATOS -->
				<div id="divDocCotiza">
					<?php
						//echo "<H1>DESARROLLO EN PROCESO</H1>";
						require_once("documentacion/cotiza.php");
					?>
				</div>
				<div id="divDocPedido">
					<?php
						//echo "<H1>DESARROLLO EN PROCESO crea</H1>";
						require_once("documentacion/pedido.php");
                    ?>
				</div>
                <div id="divDocPoolPed">
                    <?php
                    //echo "<H1>DESARROLLO EN PROCESO crea</H1>";
                    require_once("documentacion/poolPedidos.php");
                    ?>
                </div>
				<div id="divDocEstadisticas">
					<?php
						//echo "<H1>DESARROLLO EN PROCESO crea</H1>";
						require_once("documentacion/reporteCotiza.php");
					?>
				</div>
				<div id="divDocOrdProd">
					<?php
						//echo "<H1>DESARROLLO EN PROCESO</H1>";
						require_once("documentacion/ordenProd.php");
					?>
				</div>
				<div id="divDocOrdEmb">
					<?php
						//echo "<H1>DESARROLLO EN PROCESO</H1>";
						require_once("documentacion/ordenEmbarque.php");
					?>
				</div>
				<div id="divDocRemision">
					<?php
						//echo "<H1>DESARROLLO EN PROCESO</H1>";
						require_once("documentacion/hojaRemision.php");
					?>
				</div>
				<div id="divDocFactura">
					<?php
						echo "<H1>DESARROLLO EN PROCESO</H1>";
						//require_once("documentacion/longitudes.php");
					?>
				</div>
				<div id="divDocCobranza">
					<?php
						echo "<H1>DESARROLLO EN PROCESO</H1>";
						//require_once("documentacion/longitudes.php");
					?>
				</div>
				<div id="divPoolCotizacion">
					<?php
						//echo "<H1>DESARROLLO EN PROCESO</H1>";
						require_once("documentacion/poolCotiza.php");
					?>
				</div>
			</center>
		</div>
	</div>


<script>
	$(document).ready(function(){
		pintaDocumentoSel(1);
	});

</script>

