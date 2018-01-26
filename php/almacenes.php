	<!-- SECCI�N DE FORMULARIO CON LOS CONTROLES PARA VISUALIZAR LOS CAT�LOGOS-->
	<div class="container">
		<div class="row" id="pwd-container">
			<center>
				<!-- BARRA DE NAVEGACI�N DE CAT�LOGOS -->
				<nav class="navbar navbar-default">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-4" aria-expanded="false">
						<span class="sr-only">Navegador</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="#">Almacenes</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-4">
					  <ul class="nav navbar-nav">
							<li id="btnAlmaMatPr"><a href="#" 
								onclick="pintaAlmacenSel(1)">Materia prima</a></li>
							<li id="btnAlmaProdProc"><a href="#" 
								onclick="pintaAlmacenSel(2)">Producci�n en proceso</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
									aria-haspopup="true" aria-expanded="false">Registro de empaque <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li id="btnAlmaProdTer"><a href="#" 
										onclick="pintaAlmacenSel(3)">Producto terminado</a></li> 
								</ul>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>

				<!-- ******************************-->

				<!--SECCI�N DE GRID PARA ENLISTAR LA DOCUMENTACI�N DE LA BASE DE DATOS -->
				<div id="divAlmaMatPr">
					<?php
						//echo "<H1>DESARROLLO EN PROCESO</H1>";
						require_once("almacen/materiaPrima.php");
					?>
				</div>
				<div id="divAlmaProdProc">
					<?php
						//echo "<H1>DESARROLLO EN PROCESO</H1>";
						require_once("almacen/prodEnProceso.php");
					?>
				</div>
				<div id="divAlmaProdTer">
					<?php
						//echo "<H1>DESARROLLO EN PROCESO</H1>";
						require_once("almacen/prodTerminado.php");
					?>
				</div>
			</center>
		</div>
	</div>


<script>
	$(document).ready(function(){
		pintaAlmacenSel(1);
	});

</script>

