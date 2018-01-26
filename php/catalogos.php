<!-- SECCIÓN DE FORMULARIO CON LOS CONTROLES PARA VISUALIZAR LOS CATÁLOGOS-->
<div class="container">
    <div class="row" id="pwd-container">
        <center>
            <!-- BARRA DE NAVEGACIÓN DE CATÁLOGOS -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                            <span class="sr-only">Navegador</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Catálogos</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                        <ul class="nav navbar-nav">

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    Registro de Productos
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li id="btnSubFamilias">
                                        <a href="#"
                                            onclick="pintaCatalogoSel(10)">
                                            SubFamilias
                                        </a>
                                    </li>
                                    <li id="btnFamilias">
                                        <a href="#"
                                            onclick="pintaCatalogoSel(2)">
                                            Familias
                                        </a>
                                    </li>

                                    <li id="btnAcabados">
                                        <a href="#"
                                            onclick="pintaCatalogoSel(3)">
                                            Acabados
                                        </a>
                                    </li>
                                    <li id="btnCalidades">
                                        <a href="#"
                                            onclick="pintaCatalogoSel(4)">
                                            Calidades
                                        </a>
                                    </li>
                                    <li id="btnAleaciones">
                                        <a href="#"
                                            onclick="pintaCatalogoSel(5)">
                                            Aleaciones
                                        </a>
                                    </li>
                                    <li id="btnTemples">
                                        <a href="#"
                                            onclick="pintaCatalogoSel(6)">
                                            Temples
                                        </a>
                                    </li>
                                    <!--<li id="btnDados"><a href="#" onclick="pintaCatalogoSel(7)">Dados</a></li>-->
                                    <li id="btnLineas">
                                        <a href="#"
                                            onclick="pintaCatalogoSel(8)">
                                            Lineas
                                        </a>
                                    </li>
                                    <li id="btnLongitudes">
                                        <a href="#"
                                            onclick="pintaCatalogoSel(9)">
                                            Longitudes
                                        </a>
                                    </li>
                                    <li id="btnProductos">
                                        <a href="#"
                                            onclick="pintaCatalogoSel(1)">
                                            Productos
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    Registro Clientes
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li id="btnClientes">
                                        <a href="#"
                                            onclick="pintaCatalogoSel(11)">
                                            Clientes
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    Registro Proveedores
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li id="btnProveedores">
                                        <a href="#"
                                            onclick="pintaCatalogoSel(13)">
                                            Proveedores
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    Registro Prensas
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li id="btnPrensas">
                                        <a href="#"
                                            onclick="pintaCatalogoSel(12)">
                                            Prensas
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

            <!-- ******************************-->

            <!--SECCIÓN DE GRID PARA ENLISTAR LOS CATÁLOGOS DE LA BASE DE DATOS -->
            <div id="divProductos">
                <?php
                require_once("catalogos/productos.php");
                ?>
            </div>
            <div id="divFamilias">
                <?php
                require_once("catalogos/familias.php");
                ?>
            </div>
            <div id="divAcabados">
                <?php
                require_once("catalogos/acabados.php");
                ?>
            </div>
            <div id="divCalidades">
                <?php
                require_once("catalogos/calidades.php");
                ?>
            </div>
            <div id="divAleaciones">
                <?php
                require_once("catalogos/aleaciones.php");
                ?>
            </div>
            <div id="divTemples">
                <?php
                require_once("catalogos/temples.php");
                ?>
            </div>
            <div id="divDados">
                <?php
                require_once("catalogos/dados.php");
                ?>
            </div>
            <div id="divLinea">
                <?php
                require_once("catalogos/lineas.php");
                ?>
            </div>
            <div id="divLongitud">
                <?php
                require_once("catalogos/longitudes.php");
                ?>
            </div>
            <div id="divSubFamilia">
                <?php
                require_once("catalogos/subfamilias.php");
                ?>
            </div>
            <div id="divClientes">
                <?php
                //echo("Página en construcción");
                require_once("catalogos/clientes.php");
                ?>
            </div>
            <div id="divProveedores">
                <?php
                echo("Página en construcción");
                //require_once("catalogos/proveedores.php");
                ?>
            </div>
            <div id="divPrensas">
                <?php
                //echo("Página en construcción");
                require_once("catalogos/prensas.php");
                ?>
            </div>
        </center>
    </div>
</div>
<div id="cargando">Cargando...</div>

<script>
    $(document).ready(function () {
        pintaCatalogoSel(0);
    });
    $(window).load(function () {
        // Una vez se cargue al completo la página desaparecerá el div "cargando"
        $('#cargando').hide();
    });
</script>