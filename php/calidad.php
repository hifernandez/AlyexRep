	<!-- SECCI�N DE FORMULARIO CON LOS CONTROLES PARA VISUALIZAR LOS CAT�LOGOS-->
	<div class="container">
		<div class="row" id="pwd-container">
			<center>
				<!-- BARRA DE NAVEGACI�N DE CAT�LOGOS -->
				<nav class="navbar navbar-default">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-8" aria-expanded="false">
						<span class="sr-only">Navegador</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="#">Log�stica</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-8">
					  <ul class="nav navbar-nav">
							<li id="btnDocCrea"><a href="#" 
								onclick="pintaDocumentoSel(1)">Registro de insidencias en puntos de revisi�n</a></li>
							<li id="btnDocSeguim"><a href="#" 
								onclick="pintaDocumentoSel(2)">Acciones correctivas</a></li>
							<li id="btnDocAcepta"><a href="#" 
								onclick="pintaDocumentoSel(3)">Recomendaciones especiales</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
									aria-haspopup="true" aria-expanded="false">C�rculos de calidad <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li id="btnDocLibera"><a href="#" 
										onclick="pintaProdSel(4)">Acuerdo de reuniones con ISO</a></li> 
								</ul>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>

				<!-- ******************************-->

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

