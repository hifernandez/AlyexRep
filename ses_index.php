<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=ISO-8859-1"> 
		<title>SAS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<link href="util/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
		<link href="util/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="util/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- Fav and touch icons -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
		<link rel="shortcut icon" href="ico/logo.jpg">
		<!--Easy UI elements-->
		<link rel="stylesheet" type="text/css" href="util/jquery-easyui-1.5.1/themes/default/easyui.css">
		<link rel="stylesheet" type="text/css" href="util/jquery-easyui-1.5.1/themes/icon.css">
		<link rel="stylesheet" type="text/css" href="util/jquery-easyui-1.5.1/demo/demo.css">

		<!-- Placed at the end of the document so the pages load faster -->
		<script src="util/jquery-3.2.0.min.js"></script>
		<script src="util/jquery-easyui-1.5.1/jquery.min.js"></script>
		<script src="util/jquery-easyui-1.5.1/jquery.easyui.min.js"></script>
		<script src="util/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://www.jeasyui.com/easyui/datagrid-detailview.js"></script>
		<!--JS creado manualmente-->
		<script src="js/DOMmanager.js"></script>

	</head>

	<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Navegador</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="brand" href="ses_index.php"><img alt="Brand" src="img/boton-inicio.png" width="28px" height="35px"></img> </a>
    </div>
			  
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
			<li><a href="?sec=catalogos">Catálogos</a></li>
			<li><a href="?sec=documentacion">Documentación</a></li>
			<li><a href="?sec=almacenes">Almacenes</a></li>
			<li><a href="?sec=produccion">Producción</a></li>
			<li><a href="?sec=ingenieria">Ingeniería</a></li>
			<li><a href="?sec=logistica">Logística</a></li>
			<li><a href="?sec=gestCalidad">Calidad</a></li>
			<li><a href="?sec=mantenimiento">Mantenimiento</a></li>
			<li><a href="?sec=aplicacion">Aplicación</a></li>
			<li><a href="?sec=paramSistema">Sistema</a></li>
			<li><a href="?sec=usuario"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php  echo $_SESSION['userName'];?></a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
	

      </ul>
    </div><!-- /.navbar-collapse -->
	
  </div><!-- /.container-fluid -->

</nav>
  
	
	

	<?php 
    echo('&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a class="brand" href="ses_index.php"><img alt="Brand" src="img/SAS.png" width="140px" height="35px"></img> </a>');
    $sec = "";
    if(isset($_GET['sec']))
        $sec = $_GET['sec'];
    if(empty($sec)) 
    { 
        include("bienvenido.html"); 
    }
    else
    {
        if(file_exists("php/".$sec.".php")) 
        {
            echo "<br><br>";
            include("php/".$sec.".php"); 
        }
        elseif(file_exists($sec.".html")) 
            include($sec.".html"); 
        else 
            echo 'Perdón pero la página solicitada no existe'; 
    }
    ?> 

		<footer>
		<center><p><p>&copy; Alyex. Aluminio y Extrusiones 2017.</p></center>
		</footer>

	</body>
</html>