	<!-- SECCI�N DE FORMULARIO CON LOS CONTROLES PARA VISUALIZAR LOS CAT�LOGOS-->
	<div class="container">
		<div class="row" id="pwd-container">
			<center>
				<!-- BARRA DE NAVEGACI�N DE CAT�LOGOS -->
				<nav class="navbar navbar-default">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false">
						<span class="sr-only">Navegador</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="#">Mantenimiento</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
					  <ul class="nav navbar-nav">
							<li id="btnDocCrea"><a href="#" 
								onclick="pintaDocumentoSel(1)">Paneaci�n de mantenimiento</a></li>
					</ul>
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
				<!-- ******************************-->
				<ul id="navPlanMantenim" class="nav nav-tabs nav-justified">
							<li id="btnDocCrea"><a href="#" 
								onclick="pintaDocumentoSel(1)">Mec�nico</a></li>
							<li id="btnDocCrea"><a href="#" 
								onclick="pintaDocumentoSel(2)">Electromec�nico</a></li>
							<li id="btnDocCrea"><a href="#" 
								onclick="pintaDocumentoSel(2)">Requerimientos de insumos</a></li>

				</ul>

				
				<!--SECCI�N DE GRID PARA ENLISTAR LA DOCUMENTACI�N DE LA BASE DE DATOS -->
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

