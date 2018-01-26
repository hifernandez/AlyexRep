	<!-- SECCIÓN DE FORMULARIO CON LOS CONTROLES PARA VISUALIZAR LOS CATÁLOGOS-->
	<div class="container">
		<div class="row" id="pwd-container">
			<center>
				<!-- BARRA DE NAVEGACIÓN DE CATÁLOGOS -->
				<nav class="navbar navbar-default">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-7" aria-expanded="false">
						<span class="sr-only">Navegador</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="#">Logística</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-7">
					  <ul class="nav navbar-nav">
							<li id="btnDocCrea"><a href="#" 
								onclick="pintaDocumentoSel(1)">Registro de empaque</a></li>
							<li id="btnDocSeguim"><a href="#" 
								onclick="pintaDocumentoSel(2)">Orden de empaque</a></li>
							<li id="btnDocAcepta"><a href="#" 
								onclick="pintaDocumentoSel(3)">Carga de empaque a embarque</a></li>
							<li id="btnDocLibera"><a href="#" 
								onclick="pintaDocumentoSel(4)">Orden de embarque</a></li> 
							<li id="btnDocLibera"><a href="#" 
								onclick="pintaDocumentoSel(4)">Elaboración de remisión</a></li> 
							<li id="btnDocLibera"><a href="#" 
								onclick="pintaDocumentoSel(4)">Escaneo de remisión firmada</a></li> 
							<li id="btnDocLibera"><a href="#" 
								onclick="pintaDocumentoSel(4)">Devoluciones</a></li> 
							<li id="btnDocLibera"><a href="#" 
								onclick="pintaDocumentoSel(4)">Envío de remisiones via e-mail para facturar</a></li> 
					  </ul>
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>

				<!-- ******************************-->

				<!--SECCIÓN DE GRID PARA ENLISTAR LA DOCUMENTACIÓN DE LA BASE DE DATOS -->
				<div id="divDocCrea">
					<?php
						echo "<H1>DESARROLLO EN PROCESO</H1>";
						//require_once("catalogos/productos.php");
					?>
				</div>
				<div id="divDocSeguim">
					<?php
						echo "<H1>DESARROLLO EN PROCESO</H1>";
						//require_once("catalogos/familias.php");
					?>
				</div>
				<div id="divDocAcepta">
					<?php
						echo "<H1>DESARROLLO EN PROCESO</H1>";
						//require_once("catalogos/acabados.php");
					?>
				</div>
				<div id="divDocLibera">
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
		pintaDocumentoSel(1);
	});

</script>

