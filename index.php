<?php session_start(); ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>SAS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
		<link rel="shortcut icon" href="ico/logo.jpg">
    </head>	
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
               
                <span class="right">
                   
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header>
                <h1><span> </span></h1>
			<!--	<nav class="codrops-demos">
					<span> Texto <a target="_blank" href=".com/">Texto visible</a></span>
					
				</nav> -->
            </header>
            <section>
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="login.php" autocomplete="on" method="post"> 	
								<img src="img/logo.png"></img>
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Usuario</label>
                                    <input id="username" name="username" required="required" type="text" placeholder="mi usuario"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Contrase&ntilde;a </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="mi contrase&ntilde;a" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Mantener mi sesi&oacute;n activa.</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" name="login" value="Entrar" /> 
								</p>
                            </form>
                        </div>
                    </div>
                </div>  
            </section>
        </div>
			<div id="footer"> 
					<p> &copy; Aluminio y extrusiones.</p> 
			</div> 
        
    </body>
</html>