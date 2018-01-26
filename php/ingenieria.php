<!-- SECCIÓN DE FORMULARIO CON LOS CONTROLES PARA VISUALIZAR LOS CATÁLOGOS-->
<div class="container">
    <div class="row" id="pwd-container">
        <center>
            <!-- BARRA DE NAVEGACIÓN DE CATÁLOGOS -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6" aria-expanded="false">
                            <span class="sr-only">Navegador</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Ingeniería</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
                        <ul class="nav navbar-nav">

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">
                                    Solicitud de matrices
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li id="btnSolMatriz">
                                        <a href="#" onclick="pintaIngenieria(1)">
                                            Solicitud de matrices
                                        </a>
                                    </li>
                                    <li id="btnPoolDib">
                                        <a href="#" onclick="pintaIngenieria(3)">
                                            Pool de dibujos
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    Requerimiento de dado
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li id="btnAprobDib">
                                        <a href="#" onclick="pintaIngenieria(4)">
                                            Dibujos aprobados (RD)
                                        </a>
                                    </li>
                                    <li id="btnPoolRd">
                                        <a href="#" onclick="pintaIngenieria(5)">
                                            Pool RD
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li id="btnRegMatriz">
                                <a href="#" onclick="pintaIngenieria(2)">
                                    Registro de matrices
                                </a>
                            </li>
                            <li id="btnKardex">
                                <a href="#"
                                    onclick="pintaIngenieria(6)">
                                    Kárdex de matrices
                                </a>
                            </li>
                            <li id="btnDocAcepta">
                                <a href="#" onclick="pintaDocumentoSel(3)">
                                    Mantenimiento de matrices
                                </a>
                            </li>
                            <li id="btnDocLibera">
                                <a href="#"
                                    onclick="pintaDocumentoSel(4)">
                                    Proyectos de ingeniería
                                </a>
                            </li>
                            <li id="btnDocLibera">
                                <a href="#"
                                    onclick="pintaDocumentoSel(4)">
                                    Requerimientos de ingeniería
                                </a>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

            <!-- ******************************-->

            <!--SECCIÓN DE GRID PARA ENLISTAR LA DOCUMENTACIÓN DE LA BASE DE DATOS -->
            <div id="divSolMatriz">
                <?php
                //echo "<H1>DESARROLLO EN PROCESO</H1>";
                require_once("ingenieria/nuevoDibujo.php");
                ?>
            </div>
            <div id="divRegMatriz">
                <?php
                //echo "<H1>DESARROLLO EN PROCESO</H1>";
                require_once("catalogos/dados.php");
                ?>
            </div>
            <div id="divPoolDib">
                <?php
                //echo "<H1>DESARROLLO EN PROCESO</H1>";
                require_once("ingenieria/poolDibujo.php");
                ?>
            </div>
            <div id="divAprobDib">
                <?php
                //echo "<H1>DESARROLLO EN PROCESO</H1>";
                require_once("ingenieria/RD.php");
                ?>
            </div>
            <div id="divPoolRD">
                <?php
                //echo "<H1>DESARROLLO EN PROCESO</H1>";
                require_once("ingenieria/poolRD.php");
                ?>
            </div>

            <div id="divKardex">
                <?php
                require_once("ingenieria/kardex.php");
                ?>
            </div>
            <div id="divDocLibera">
                <?php
                //echo "<H1>DESARROLLO EN PROCESO</H1>";
                //require_once("catalogos/longitudes.php");
                ?>
            </div>
        </center>
    </div>
</div>


<script>
    $(document).ready(function () {
        pintaIngenieria(1);
    });

</script>

