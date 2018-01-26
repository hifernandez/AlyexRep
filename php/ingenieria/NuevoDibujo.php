<input id="tipoOperacionClientes" type="hidden" value="" />
<input id="IDNuevoDib" type="hidden" value="0" />
<table id="dgNvoDibujos" name="dgNvoDibujos" title="Dibujos nuevos" class="easyui-datagrid" style="width:auto;height:450px;"
       url="php/binding/RD/getCatRD.php"
       toolbar="#toolNvoDibujo"
       rownumbers="true"
       fitColumns="true"
       singleSelect="true"
       pagination="true"
       loadMsg="Cargando información...">
    <thead>
        <tr>
            <!--<th field="ck" checkbox="true" ></th>-->

            <th data-options="field:'id_nvodibujo'" hidden></th>
            <th data-options="field:'id_header'" hidden></th>
            <th data-options="field:'id_cliente'" hidden></th>
            <th data-options="field:'id_header_dado'" hidden></th>
            <th data-options="field:'area_dado_sing'" hidden></th>
            <th data-options="field:'area_dado_smtr'" hidden></th>
            <th data-options="field:'p_teorico_dado_sing'" hidden></th>
            <th data-options="field:'p_teorico_dado_smtr'" hidden></th>
            <th data-options="field:'p_anodizable_dado_sing'" hidden></th>
            <th data-options="field:'p_anodizable_dado_smtr'" hidden></th>
            <th data-options="field:'p_pble_dado_sing'" hidden></th>
            <th data-options="field:'p_pble_dado_smtr'" hidden></th>
            <th data-options="field:'o_circular_dado_sing'" hidden></th>
            <th data-options="field:'o_circular_dado_smtr'" hidden></th>

            <th data-options="field:'id_temple_dado'" hidden></th>
            <th data-options="field:'id_acabado'" hidden></th>
            <th data-options="field:'id_aleacion_dado'" hidden></th>

            <th data-options="field:'cod_nvodibujo'">Código del dibujo</th>
            <th data-options="field:'nombre_dado'">Nombre del dibujo</th>
            <th data-options="field:'long_sing_nvodibujo'">Longitud Perfil Pulgadas</th>
            <th data-options="field:'long_smtr_nvodibujo'">Longitud Perfil milímetros</th>
            <th data-options="field:'tol_esp_sing_nvodibujo'">Tolerancias Especiales Pulgadas</th>
            <th data-options="field:'tol_esp_smtr_nvodibujo'">Tolerancias Especiales milímetros</th>
            <th data-options="field:'dim_crit_sing_nvodibujo'">Dimensiones críticas pulgadas</th>
            <th data-options="field:'dim_crit_smtr_nvodibujo'">Dimensiones críticas milímetros</th>
            <th data-options="field:'sup_exp_sing_nvodibujo'">Superficie expuesta pulgadas</th>
            <th data-options="field:'sup_exp_smtr_nvodibujo'">Superficie expuesta milímetros</th>
            <th data-options="field:'ton_men_nvodibujo'">Tonelaje mensual</th>
            <th data-options="field:'ton_anual_nvodibujo'">Tonelaje anual</th>
            <th data-options="field:'piezas_paquete_nvodibujo'">Piezas por paquete</th>
            <th data-options="field:'observacion_dado'">Observaciones</th>


        </tr>
    </thead>
</table>
<!-- TOOLS GRID CLIENTES-->
<div id="toolNvoDibujo">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEdicionNvoDibujo('ALTANVODIBUJO')">Alta de dibujo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEdicionNvoDibujo('EDICIONNVODIBUJO')">Editar dibujo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="EliminarNvoDibujo()">Eliminar dibujo</a>
    <!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="muestraWord()">Reporte del aleaciónn</a>-->
    <br>
    <!--Busqueda de elementos-->



</div>

<div id="windowNvoDibujo" class="easyui-window" title="Solicitud nuevo dibujo" style="width:auto;"
     data-options="modal:true, selected:true,collapsible: false, minimizable:false,maximizable:false, closable:true, shadow:false, closed:true">
    <div id="accordionDibujo" class="easyui-accordion" style="width:auto;">
        <div title="Perfil">
            <form id="fmEditarDibujo" method="post" novalidate style="margin:0;padding:20px 50px">
                <div style="margin-bottom:5px;font-size:14px;">Datos de Dado:</div>
                <table class="table">
                    <TR>
                        <td>
                            Cliente:
                        </td>
                        <td>
                            <select onclick="" id="textClienteD" class="easyui-combogrid" name="dept" style="width:100%;padding:5px"
                                    data-options="
                                    required:true,
                                    panelWidth:250,
                                    idField:'id_cliente',
                                    textField:'razon_social_cliente',
                                    url:'php/binding/Cliente/getCatCliente.php',
                            columns:[[
                            {field:'razon_social_cliente',title:'ID Cliente'},
                            {field:'rfc_cliente',title:'RFC Cliente'}
                            ]]
                            "></select>
                        </td>
                        <td>Nombre dado</td>
                        <TD>
                            <input id="txtDadoNombreD" name="txtDadoNombre" class="easyui-textbox" data-options="required:true" style="width:100%;padding:5px">
                        </TD>
                        <td>Código cliente</td>
                        <TD>
                            <input id="txtCodClientD" name="txtCodClient" class="easyui-numberbox" data-options="required:true" style="width:100%;padding:5px" />
                        </TD>
                    </TR>
                    <div style="margin-bottom:3px"></div>
                    <tr>
                        <td>Área Sistema Ingles</td>
                        <TD>
                            <input id="txtDadoAreaSingD" name="txtDadoAreaSing" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px">
                        </TD>
                        <td>Área Sistema Métrico</td>
                        <TD>
                            <input id="txtDadoAreaSmtrD" name="txtDadoAreaSmtr" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px">
                        </TD>
                        <td>Peso teórico Sistema Ingles</td>
                        <TD>
                            <input id="txtDadoPesoTeoricoSingD" name="txtDadoPesoTeoricoSing" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px">
                        </TD>

                    </tr>
                    <div style="margin-bottom:3px"></div>
                    <TR>
                        <td>Peso teórico Sistema Métrico</td>
                        <TD>
                            <input id="txtDadoPesoTeoricoSmtrD" name="txtDadoPesoTeoricoSmtr" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px">
                        </TD>
                        <td>Perimetro anodizable Sistema Ingles</td>
                        <TD>
                            <input id="txtDadoPesoAnSingD" name="txtDadoPesoAnSing" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px">
                        </TD>
                        <td>Perimetro anodizable Sistema Métrico</td>
                        <TD>
                            <input id="txtDadoPesoAnSmtrD" name="txtDadoPesoAnSmtr" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px">
                        </TD>
                    </TR>
                    <div style="margin-bottom:3px"></div>
                    <TR>
                        <td>Superficie pulible Sistema Ingles</td>
                        <TD>
                            <input id="txtDadoPbleSingD" name="txtDadoPbleSing" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px">
                        </TD>
                        <td>Superficie pulible Sistema Métrico</td>
                        <TD>
                            <input id="txtDadoPbleSmtrD" name="txtDadoPbleSmtr" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px">
                        </TD>
                        <td>O circular Sistema Ingles</td>
                        <TD>
                            <input id="txtDadoCirSingD" name="txtDadoCirSing" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px">
                        </TD>
                    </TR>
                    <div style="margin-bottom:3px"></div>
                    <TR>
                        <td>O circular Sistema Métrico</td>
                        <TD>
                            <input id="txtDadoCirSmtrD" name="txtDadoCirSmtr" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px" />
                        </TD>
                        <td>Aleación:</td>
                        <TD>
                            <input id="comboClaveAleacionD" class="easyui-combogrid" name="comboClaveAleacion" style="width:100%;padding:5px" data-options="
                                   required:true,
                                   panelWidth:255,
                                   idField:'id_aleacion',
                                   textField:'clave_aleacion',
                                   url:'php/binding/Aleaciones/getCatAleaciones.php',
                            columns:[[
                            {field:'clave_aleacion',title:'Aleación', width:110},
                            {field:'descripcion_aleacion',title:'Descripción', width:140}
                            ]]">
                        </TD>
                        <td>Tratamiento térmico:</td>
                        <TD>
                            <input id="comboClaveTempleD" class="easyui-combogrid" name="comboClaveTemple" style="width:100%;padding:5px" data-options="
                                   required:true,
                                   panelWidth:255,
                                   idField:'id_temple',
                                   textField:'descripcion_temple',
                                   url:'php/binding/Temple/getCatTemple.php',
                            columns:[[
                            {field:'clave_temple',title:'Temple', width:100},
                            {field:'descripcion_temple',title:'Descripción', width:150}
                            ]]">
                        </TD>
                    </TR>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Acabado:</td>
                        <TD>
                            <input id="comboClaveAcabadoD" class="easyui-combogrid" name="comboClaveAcabado" style="width:100%;padding:5px" data-options="
                                   required:'true',
                                   panelWidth:255,
                                   idField:'id_acabado',
                                   textField:'descripcion_acabado',
                                   url:'php/binding/Acabados/getCatAcabados.php',
                            columns:[[
                            {field:'clave_acabado',title:'Acabado', width:100},
                            {field:'descripcion_acabado',title:'Descripción', width:150}
                            ]]">
                        </TD>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </form>

        </div>
        <div title="Datos dibujo" style="padding:10px;">
            <form id="fmEditarNvoDibujo" method="post" novalidate style="margin:0;padding:20px 50px">
                <div style="margin-bottom:5px;font-size:14px">Datos del dibujo:</div>
                <table class="table">

                    <tr>
                        <td rowspan="2">Longitud del perfil:</td>
                        <td><input id="txtLonPerPulg" name="txtLonPerPulg" class="easyui-numberbox" data-options="required:'true',precision:3" prompt="Pulgadas" style="width:100%;padding:5px"></td>
                        <td rowspan="2">Tolerancias especiales:</td>
                        <td><input id="txtTolEspPulg" name="txtTolEspPulg" class="easyui-numberbox" data-options="required:'true',precision:3" prompt="Pulgadas" style="width:100%;padding:5px"></td>
                        <td>Entrega muestra física:</td>
                        <td align="center">
                            <select id="btnFisico" class="easyui-combobox" name="btnFisico" labelPosition="top" style="width:auto;">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </td>

                    </tr>
                    <tr>

                        <td><input id="txtLonPerMm" name="txtLonPerMm" class="easyui-numberbox" data-options="required:'true',precision:3" prompt="Milímetro" style="width:100%;padding:5px"></td>

                        <td><input id="txtTolEspMm" name="txtTolEspMm" class="easyui-numberbox" data-options="required:'true',precision:3" prompt="Milímetro" style="width:100%;padding:5px"></td>
                        <td>Entrega ensamble:</td>
                        <td align="center">
                            <!-- <input id="btnEnsamble" class="easyui-switchbutton" data-options="required:'true',onText:'Si',offText:'No'" style="width:40%;padding:5px">-->
                            <select id="btnEnsamble" class="easyui-combobox" name="btnFisico" labelPosition="top" style="width:auto;">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </td>



                    </tr>
                    <tr>
                        <td rowspan="2">Dimensiones críticas:</td>
                        <td><input id="txtCritPulg" name="txtCritPulg" class="easyui-numberbox" data-options="required:'true',precision:3" prompt="Pulgadas" style="width:100%;padding:5px"></td>
                        <td rowspan="2">Superficie expuesta:</td>
                        <td><input id="txtSuperExpPulg" name="txtSuperExpPulg" class="easyui-numberbox" data-options="required:'true',precision:3" prompt="Pulgadas" style="width:100%;padding:5px"></td>
                        <td>Entrega dibujo:</td>
                        <td align="center">
                            <!--<input id="btnDibujo" class="easyui-switchbutton" data-options="required:'true',onText:'Si',offText:'No'" style="width:40%;padding:5px">-->
                            <select id="btnDibujo" class="easyui-combobox" name="btnFisico" labelPosition="top" style="width:auto;">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </td>



                    </tr>
                    <tr>

                        <td><input id="txtCritMm" name="txtCritMm" class="easyui-numberbox" data-options="required:'true',precision:3" prompt="Milímetro" style="width:100%;padding:5px"></td>

                        <td><input id="txtSuperExpMm" name="txtSuperExpMm" class="easyui-numberbox" data-options="required:'true',precision:3" prompt="Milímetro" style="width:100%;padding:5px"></td>
                        <td>Croquis:</td>
                        <td align="center">
                            <!-- <input id="btnCroquis" class="easyui-switchbutton" data-options="required:'true',onText:'Si',offText:'No'" style="width:40%;padding:5px">-->
                            <select id="btnCroquis" class="easyui-combobox" name="btnFisico" labelPosition="top" style="width:auto;">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </td>


                    </tr>
                    <tr>
                        <td>Tonelaje mensual:</td>
                        <td><input id="txtTonMen" name="txtTonMen" class="easyui-numberbox" data-options="required:'true',precision:3" style="width:100%;padding:5px"></td>
                        <td>Tonelaje anual:</td>
                        <td><input id="txtTonAnual" name="txtTonAnual" class="easyui-numberbox" data-options="required:'true',precision:3" style="width:100%;padding:5px"></td>
                        <td>Dibujo dimensiones completas:</td>
                        <td align="center">
                            <select id="btnDimCompletas" class="easyui-combobox" name="btnFisico" labelPosition="top" style="width:auto;">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td rowspan="2">Observaciones:</td>
                        <td rowspan="2"><input id="txtObserDib" name="txtObserDib" class="easyui-textbox" data-options="required:'true',multiline:'true' " style="width:100%;padding:5px"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td colspan="2"<div style="margin-bottom:5px;font-size:14px">Tipo y forma de empaque:</div></td>
                        <td colspan="4"></td>

                    </tr>

                    <tr>
                        <td>Cartón corrugado:</td>
                        <td align="center">
                            <select id="btnCorrugado" class="easyui-combobox" name="btnFisico" labelPosition="top" style="width:auto;">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </td>
                        <td>Polystrech:</td>
                        <td align="center">
                            <select id="btnPoly" class="easyui-combobox" name="btnFisico" labelPosition="top" style="width:auto;">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </td>
                        <td>Papel kraft:</td>
                        <td align="center">
                            <select id="btnKraft" class="easyui-combobox" name="btnFisico" labelPosition="top" style="width:auto;">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Piezas por paquete:</td>
                        <td><input id="txtPzPaq" name="txtPzPaq" class="easyui-numberbox" data-options="required:'true',precision:0" style="width:100%;padding:5px"></td>

                    </tr>
                </table>
            </form>
            <div style="margin-bottom:5px"></div>
            <div align="center">
                <button id="btnAltaDibujo" type="button" onclick="guardaEditaNvoDibujo('GUARDADO')" class="btn btn-primary">Guardar</button>
                <button id="btnEditDibujo" type="button" onclick="guardaEditaNvoDibujo('EDICION')" class="btn btn-primary">Actualizar</button>

            </div>
            <div style="margin-bottom:10px"></div>
        </div>

    </div>
</div>




<script>
    $(document).ready(function () {

        $('#dgNvoDibujos').datagrid('reload');   // reload the user data
        $("#btnEditDibujo").hide();

    });

    function CargaGrid() {
        $('#dgNvoDibujos').datagrid('reload');
    }


    function abrirModalEdicionNvoDibujo(tipoOperacion) {


        switch (tipoOperacion) {
            case "EDICIONNVODIBUJO":
                //Ocultando botón de alta.
                $("#btnAltaDibujo").hide();
                $("#btnEditDibujo").show();
                //$("#btnEditDibujo").html('ACTUALIZAR');
                $('#tipoOperacionClientes').val("EDICIONNVODIBUJO");
                var row = $('#dgNvoDibujos').datagrid('getSelected');
                if (row) {

                    $('#windowNvoDibujo').window('open');
                    $('#fmEditarNvoDibujo').form('load', row);
                    $('#fmEditarDibujo').form('load', row);
                    //  fmEditarNvoDibujo fmEditarDibujo

                    $('#txtDadoNombreD').textbox("setValue", row.nombre_dado);
                    $('#txtDadoAreaSingD').numberbox("setValue", row.area_dado_sing);
                    $('#txtDadoAreaSmtrD').numberbox("setValue", row.area_dado_smtr);
                    $('#txtDadoPesoTeoricoSingD').numberbox("setValue", row.p_teorico_dado_sing);
                    $('#txtDadoPesoTeoricoSmtrD').numberbox("setValue", row.p_teorico_dado_smtr);
                    $('#txtDadoPesoAnSingD').numberbox("setValue", row.p_anodizable_dado_sing);
                    $('#txtDadoPesoAnSmtrD').numberbox("setValue", row.p_anodizable_dado_smtr);
                    $('#txtDadoPbleSingD').numberbox("setValue", row.p_pble_dado_sing);
                    $('#txtDadoPbleSmtrD').numberbox("setValue", row.p_pble_dado_smtr);
                    $('#txtDadoCirSingD').numberbox("setValue", row.o_circular_dado_sing);
                    $('#txtDadoCirSmtrD').numberbox("setValue", row.o_circular_dado_smtr);

                    //DATOS DE NUEVO PRODUCTO
                    $('#comboClaveAcabadoD').combogrid("setValue", row.id_acabado);
                    $('#comboClaveTempleD').combogrid("setValue", row.id_temple_dado);
                    $('#comboClaveAleacionD').combogrid("setValue", row.id_aleacion_dado);

                    //DATOS DEL NUEVO DIBUJO
                    $('#textClienteD').combogrid("setValue", row.id_cliente);
                    $('#txtCodClientD').textbox("setValue", row.cod_nvodibujo);

                    $('#txtLonPerPulg').numberbox("setValue", row.long_sing_nvodibujo);
                    $('#txtLonPerMm').numberbox("setValue", row.long_smtr_nvodibujo);
                    $('#txtTolEspPulg').numberbox("setValue", row.tol_esp_sing_nvodibujo);
                    $('#txtTolEspMm').numberbox("setValue", row.tol_esp_smtr_nvodibujo);

                    $('#txtCritPulg').numberbox("setValue", row.dim_crit_sing_nvodibujo);
                    $('#txtCritMm').numberbox("setValue", row.dim_crit_smtr_nvodibujo);
                    $('#txtSuperExpPulg').numberbox("setValue", row.sup_exp_sing_nvodibujo);
                    $('#txtSuperExpMm').numberbox("setValue", row.sup_exp_smtr_nvodibujo);


                    $('#txtTonMen').numberbox("setValue", row.ton_men_nvodibujo);
                    $('#txtTonAnual').numberbox("setValue", row.ton_anual_nvodibujo);
                    $('#txtObserDib').textbox("setValue", row.observacion_dado);


                    $('#btnFisico').combobox("setValue", row.mues_fis_nvodibujo);
                    $('#btnEnsamble').combobox("setValue", row.ensamble_nvodibujo);
                    $('#btnDibujo').combobox("setValue", row.dibujo_nvodibujo);
                    $('#btnCroquis').combobox("setValue", row.croquis_nvodibujo);
                    $('#btnDimCompletas').combobox("setValue", row.dim_completas_nvodibujo);
                    $('#btnCorrugado').combobox("setValue", row.carton_corr_nvodibujo);
                    $('#btnPoly').combobox("setValue", row.poly_nvodibujo);
                    $('#btnKraft').combobox("setValue", row.kraft_nvodibujo);
                    $('#txtPzPaq').numberbox("setValue", row.piezas_paquete_nvodibujo);


                }
                else {
                    //alert("ATENCIón: Debe seleccionar un cliente dando clic sobre el registro para poder editarlo.");
                    $.messager.alert({
                        title: 'Atención',
                        icon: 'info',
                        msg: 'Debe seleccionar un dibujo dando click sobre el registro para poder editarlo.',
                        fn: function () {

                            //$('#dgNvoDibujos').datagrid('reload');


                        }


                    });
                }
                break;

            case "ALTANVODIBUJO":

                //Ocultando botón de edición.
                $("#btnEditDibujo").hide();
                $("#btnAltaDibujo").show();
                //Controles de dibujo.
                $('#windowNvoDibujo').window('open');//.dialog('setTitle', 'Nuevo Dibujo');
                $('#fmEditarNvoDibujo').form('clear');
                $('#fmEditarDibujo').form('clear');
                $('#tipoOperacionClientes').val("ALTANVODIBUJO");
                $('#fmEditarNvoDibujo').form('load');
                $("#btnAltaEditCliente").html('GUARDAR');
                //Fin de controles de dibujo.



                break;
        }

    }// FIN

    //Fucniones para el guardado del cliente.
    function guardaEditaNvoDibujo(tipoOperacion) {

        switch (tipoOperacion) {
            case "GUARDADO":
                //Obteniendo paráetros para post inserción.
                //DATOS DE NUEVO DADO SP INSERTA DADO
                var txtNombre = $('#txtDadoNombreD').val();
                var txtAreaSing = $('#txtDadoAreaSingD').val();
                var txtAreaSmtr = $('#txtDadoAreaSmtrD').val();
                var txtPesoSing = $('#txtDadoPesoTeoricoSingD').val();
                var txtPesoSmtr = $('#txtDadoPesoTeoricoSmtrD').val();
                var txtPesoAnSing = $('#txtDadoPesoAnSingD').val();
                var txtPesoAnSmtr = $('#txtDadoPesoAnSmtrD').val();
                var txtPbleSing = $('#txtDadoPbleSingD').val();
                var txtPbleSmtr = $('#txtDadoPbleSmtrD').val();
                var txtCirSing = $('#txtDadoCirSingD').val();
                var txtCirSmtr = $('#txtDadoCirSmtrD').val();

                //DATOS DE NUEVO PRODUCTO
                var acabadoTxt = $('#comboClaveAcabadoD').combogrid("getValue");
                var templeTxt = $('#comboClaveTempleD').combogrid("getValue");
                var aleacionTxt = $('#comboClaveAleacionD').combogrid("getValue");

                //DATOS DEL NUEVO DIBUJO
                var clienteTxt = $('#textClienteD').combogrid("getValue");
                var codClienteTxt = $('#txtCodClientD').val();

                var longPulgTxt = $('#txtLonPerPulg').val();
                var longMiliTxt = $('#txtLonPerMm').val();
                var tolePulgTxt = $('#txtTolEspPulg').val();
                var toleMiliTxt = $('#txtTolEspMm').val();
                var fisicoTxt = $('#btnFisico').combobox("getValue");
                var ensambleTxt = $('#btnEnsamble').combobox("getValue"); 

                var dimPulgTxt = $('#txtCritPulg').val();
                var dimMiliTxt = $('#txtCritMm').val();
                var expPulgTxt = $('#txtSuperExpPulg').val();
                var expMiliTxt = $('#txtSuperExpMm').val();
                var dibEntregaTxt = $('#btnDibujo').combobox("getValue");
                var croquisTxt = $('#btnCroquis').combobox("getValue");

                var tonalajeMensualTxt = $('#txtTonMen').val();
                var tonelajeAnualTxt = $('#txtTonAnual').val();
                var observaTxt = $('#txtObserDib').val();
                var dimCompletasTxt = $('#btnDimCompletas').combobox("getValue");

                var corrugadoTxt = $('#btnCorrugado').combobox("getValue");
                var polyTxt = $('#btnPoly').combobox("getValue");
                var kraftTxt = $('#btnKraft').combobox("getValue");
                var piezasTxt = $('#txtPzPaq').val();

                if (clienteTxt != '') {
                    if (txtNombre != '') {
                        if (codClienteTxt != '') {
                            if (txtAreaSing != '') {
                                if (txtAreaSmtr != '') {
                                    if (txtPesoSing != '') {
                                        if (txtPesoSmtr != '') {
                                            if (txtPesoAnSing != '') {
                                                if (txtPesoAnSmtr != '') {
                                                    if (txtPbleSing != '') {
                                                        if (txtPbleSmtr != '') {
                                                            if (txtCirSing != '') {                
                                                                if (txtCirSmtr != '') {
                                                                    if (acabadoTxt != '') {
                                                                        if (templeTxt != '') {
                                                                            if (aleacionTxt != '') {
                                                                                if (longPulgTxt != '' && longMiliTxt == '' || longPulgTxt == '' && longMiliTxt != '' || longPulgTxt != '' && longMiliTxt != '') {
                                                                                    if (tolePulgTxt != '' && toleMiliTxt == '' || tolePulgTxt == '' && toleMiliTxt != '' || tolePulgTxt != '' && toleMiliTxt != '') {
                                                                                        if (fisicoTxt != '') {
                                                                                            if (ensambleTxt != '') {
                                                                                                if (dimPulgTxt != '' && dimMiliTxt == '' || dimPulgTxt == '' && dimMiliTxt != '' || dimPulgTxt != '' && dimMiliTxt != '') {
                                                                                                    if (expPulgTxt != '' && expMiliTxt == '' || expPulgTxt == '' && expMiliTxt != '' || expPulgTxt != '' && expMiliTxt != '') {
                                                                                                        if (dibEntregaTxt != '') {
                                                                                                            if (croquisTxt != '') {
                                                                                                                if (tonalajeMensualTxt != '') {
                                                                                                                    if (tonelajeAnualTxt != '') {
                                                                                                                        if (dimCompletasTxt != '') {
                                                                                                                            if (observaTxt != '') {
                                                                                                                                if (corrugadoTxt != '' && polyTxt != '' &&  kraftTxt != '') {
                                                                                                                                    if (piezasTxt != '') {
                                                                                                                                        var dataSelectedContent = 'Nombre=' + txtNombre + '&AreaSing=' + txtAreaSing + '&AreaSmtr=' + txtAreaSmtr + '&TeoricoSing=' + txtPesoSing + '&TeoricoSmtr=' + txtPesoSmtr + '&AnodizableSing=' + txtPesoAnSing + '&AnodizableSmtr=' + txtPesoAnSmtr + '&PbleSing=' + txtPbleSing + '&PbleSmtr=' + txtPbleSmtr + '&CircularSing=' + txtCirSing + '&CircularSmtr=' + txtCirSmtr + '&ACABADO=' + acabadoTxt + '&TEMPLE=' + templeTxt + '&ALEACION=' + aleacionTxt + '&clienteId=' + clienteTxt + '&codCliente=' + codClienteTxt + '&longPulgadas=' + longPulgTxt + '&longMili=' + longMiliTxt + '&toleranciaPulg=' + tolePulgTxt + '&toleranciaMili=' + toleMiliTxt + '&btnFisico=' + fisicoTxt + '&btnEnsamble=' + ensambleTxt + '&criticaPulg=' + dimPulgTxt + '&criticaMili=' + dimMiliTxt + '&superficiePulg=' + expPulgTxt + '&superficieMili=' + expMiliTxt + '&btnDibEntregado=' + dibEntregaTxt + '&btnCroquis=' + croquisTxt + '&tonelajeMensual=' + tonalajeMensualTxt + '&tonelajeAnual=' + tonelajeAnualTxt + '&observaciones=' + observaTxt + '&dimCompletasBtn=' + dimCompletasTxt + '&corrugadoBtn=' + corrugadoTxt + '&polyBtn=' + polyTxt + '&kraftBtn=' + kraftTxt + '&numeroPiezas=' + piezasTxt;
                                                                                                                                        //alert(dataSelectedContent);

                                                                                                                                        $.ajax(
                                                                                                                                         {
                                                                                                                                             url: 'php/binding/RD/setCatRD.php',
                                                                                                                                             type: 'post',
                                                                                                                                             dataType: "json",
                                                                                                                                             data: dataSelectedContent,
                                                                                                                                             success: function (request) {
                                                                                                                                                 if (request.MESSAGE == 1) {
                                                                                                                                                     confirmaOperacionNvoDibujo('GUARDADO');
                                                                                                                                                 } else {
                                                                                                                                                     alert("Ocurrio un error");
                                                                                                                                                 }
                                                                                                                                             },
                                                                                                                                             error: function (request, settings) {
                                                                                                                                                 alert("Entre al error AJAX... " + request.responseText);
                                                                                                                                                 //alert(request.responseText);
                                                                                                                                             }
                                                                                                                                         });
                                                                                                                                    } else {
                                                                                                                                        $.messager.alert('Atenci&oacute;n', 'El número de piezas por paquete es un valor requerido.', 'info');
                                                                                                                                    }
                                                                                                                                } else {
                                                                                                                                    $.messager.alert('Atenci&oacute;n', 'El tipo de forma de empaque puede ser cartón corrugado, polystrech o papel kraft son valor requerido.', 'info');
                                                                                                                                }
                                                                                                                            } else {
                                                                                                                                $.messager.alert('Atenci&oacute;n', 'Las observaciones son valor requerido.', 'info');
                                                                                                                            }
                                                                                                                        } else {
                                                                                                                            $.messager.alert('Atenci&oacute;n', 'El dato dimensiones completas es un valor requerido.', 'info');
                                                                                                                        }
                                                                                                                    } else {
                                                                                                                        $.messager.alert('Atenci&oacute;n', 'El tonelaje anual es un valor requerido.', 'info');
                                                                                                                    }
                                                                                                                } else {
                                                                                                                    $.messager.alert('Atenci&oacute;n', 'El tonelaje mensual es un valor requerido.', 'info');
                                                                                                                }
                                                                                                            } else {
                                                                                                                $.messager.alert('Atenci&oacute;n', 'El dato croquis es un valor requerido.', 'info');
                                                                                                            }
                                                                                                        } else {
                                                                                                            $.messager.alert('Atenci&oacute;n', 'El dato de entrega dinujo es un valor requerido.', 'info');
                                                                                                        }
                                                                                                    } else {
                                                                                                        $.messager.alert('Atenci&oacute;n', 'La superficie expuesta en pulgadas o en milimetros son valores requerido.', 'info');
                                                                                                    }
                                                                                                } else {
                                                                                                    $.messager.alert('Atenci&oacute;n', 'Las dimensiones críticas en pulgadas o en milimetros son valores requerido.', 'info');
                                                                                                }
                                                                                            } else {
                                                                                                $.messager.alert('Atenci&oacute;n', 'El dato de ensamble es un valor requerido.', 'info');
                                                                                            }
                                                                                        } else {
                                                                                            $.messager.alert('Atenci&oacute;n', 'El dato de entrega muestra física es un valor requerido.', 'info');
                                                                                        }
                                                                                    } else {
                                                                                        $.messager.alert('Atenci&oacute;n', 'Las tolerancias especiales en pulgadas o en milimetros son valores requerido.', 'info');
                                                                                    }
                                                                                } else {
                                                                                    $.messager.alert('Atenci&oacute;n', 'La longitud en pulgadas o en milimetros son valores requerido.', 'info');
                                                                                }
                                                                            } else {
                                                                                $.messager.alert('Atenci&oacute;n', 'La aleación un valor requerido.', 'info');
                                                                            }
                                                                        } else {
                                                                            $.messager.alert('Atenci&oacute;n', 'El temple ess un valor requerido.', 'info');
                                                                        }
                                                                    } else {
                                                                        $.messager.alert('Atenci&oacute;n', 'El acabado es un valor requerido.', 'info');
                                                                    }
                                                                } else {
                                                                    $.messager.alert('Atenci&oacute;n', 'El &Oslash; circular en sistema métrico un valor requerido.', 'info');
                                                                }
                                                            } else {
                                                                $.messager.alert('Atenci&oacute;n', 'El &Oslash; circular en sistema ingles un valor requerido.', 'info');
                                                            }
                                                        } else {
                                                            $.messager.alert('Atenci&oacute;n', 'La superficie pulible en sistema métrico un valor requerido.', 'info');
                                                        }
                                                    } else {
                                                        $.messager.alert('Atenci&oacute;n', 'La superficie pulible en sistema ingles un valor requerido.', 'info');
                                                    }
                                                } else {
                                                    $.messager.alert('Atenci&oacute;n', 'El perímetro anodizable en sistema métrico un valor requerido.', 'info');
                                                }
                                            } else {
                                                $.messager.alert('Atenci&oacute;n', 'El perímetro anodizable en sistema ingles un valor requerido.', 'info');
                                            }
                                        } else {
                                            $.messager.alert('Atenci&oacute;n', 'El peso teórico en sistema métrico un valor requerido.', 'info');
                                        }
                                    } else {
                                        $.messager.alert('Atenci&oacute;n', 'El peso teórico en sistema ingles un valor requerido.', 'info');
                                    }
                                } else {
                                    $.messager.alert('Atenci&oacute;n', 'El área en sistema métrico un valor requerido.', 'info');
                                }
                            } else {
                                $.messager.alert('Atenci&oacute;n', 'El área en sistema ingles un valor requerido.', 'info');
                            }
                        } else {
                            $.messager.alert('Atenci&oacute;n', 'El código del cliente es un valor requerido.', 'info');
                        }
                    } else {
                        $.messager.alert('Atenci&oacute;n', 'El nombre del dado es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atenci&oacute;n', 'El cliente es un valor requerido.', 'info');
                }


                break;
            case "EDICION":
                var row = $('#dgNvoDibujos').datagrid('getSelected');
                //Obteniendo paráetros para post inserción.
                //DATOS DE NUEVO DADO SP INSERTA DADO
                var txtNombre = $('#txtDadoNombreD').val();
                var txtAreaSing = $('#txtDadoAreaSingD').val();
                var txtAreaSmtr = $('#txtDadoAreaSmtrD').val();
                var txtPesoSing = $('#txtDadoPesoTeoricoSingD').val();
                var txtPesoSmtr = $('#txtDadoPesoTeoricoSmtrD').val();
                var txtPesoAnSing = $('#txtDadoPesoAnSingD').val();
                var txtPesoAnSmtr = $('#txtDadoPesoAnSmtrD').val();
                var txtPbleSing = $('#txtDadoPbleSingD').val();
                var txtPbleSmtr = $('#txtDadoPbleSmtrD').val();
                var txtCirSing = $('#txtDadoCirSingD').val();
                var txtCirSmtr = $('#txtDadoCirSmtrD').val();

                //DATOS DE NUEVO PRODUCTO
                var acabadoTxt = $('#comboClaveAcabadoD').combogrid("getValue");
                var templeTxt = $('#comboClaveTempleD').combogrid("getValue");
                var aleacionTxt = $('#comboClaveAleacionD').combogrid("getValue");

                //DATOS DEL NUEVO DIBUJO
                var clienteTxt = $('#textClienteD').combogrid("getValue");
                var codClienteTxt = $('#txtCodClientD').val();

                var longPulgTxt = $('#txtLonPerPulg').val();
                var longMiliTxt = $('#txtLonPerMm').val();
                var tolePulgTxt = $('#txtTolEspPulg').val();
                var toleMiliTxt = $('#txtTolEspMm').val();
                var fisicoTxt = $('#btnFisico').combobox("getValue");
                var ensambleTxt = $('#btnEnsamble').combobox("getValue");

                var dimPulgTxt = $('#txtCritPulg').val();
                var dimMiliTxt = $('#txtCritMm').val();
                var expPulgTxt = $('#txtSuperExpPulg').val();
                var expMiliTxt = $('#txtSuperExpMm').val();
                var dibEntregaTxt = $('#btnDibujo').combobox("getValue");
                var croquisTxt = $('#btnCroquis').combobox("getValue");

                var tonalajeMensualTxt = $('#txtTonMen').val();
                var tonelajeAnualTxt = $('#txtTonAnual').val();
                var observaTxt = $('#txtObserDib').val();
                var dimCompletasTxt = $('#btnDimCompletas').combobox("getValue");

                var corrugadoTxt = $('#btnCorrugado').combobox("getValue");
                var polyTxt = $('#btnPoly').combobox("getValue");
                var kraftTxt = $('#btnKraft').combobox("getValue");
                var piezasTxt = $('#txtPzPaq').val();

                if (clienteTxt != '') {
                    if (txtNombre != '') {
                        if (codClienteTxt != '') {
                            if (txtAreaSing != '') {
                                if (txtAreaSmtr != '') {
                                    if (txtPesoSing != '') {
                                        if (txtPesoSmtr != '') {
                                            if (txtPesoAnSing != '') {
                                                if (txtPesoAnSmtr != '') {
                                                    if (txtPbleSing != '') {
                                                        if (txtPbleSmtr != '') {
                                                            if (txtCirSing != '') {
                                                                if (txtCirSmtr != '') {
                                                                    if (acabadoTxt != '') {
                                                                        if (templeTxt != '') {
                                                                            if (aleacionTxt != '') {
                                                                                if (longPulgTxt != '' && longMiliTxt == '' || longPulgTxt == '' && longMiliTxt != '' || longPulgTxt != '' && longMiliTxt != '') {
                                                                                    if (tolePulgTxt != '' && toleMiliTxt == '' || tolePulgTxt == '' && toleMiliTxt != '' || tolePulgTxt != '' && toleMiliTxt != '') {
                                                                                        if (fisicoTxt != '') {
                                                                                            if (ensambleTxt != '') {
                                                                                                if (dimPulgTxt != '' && dimMiliTxt == '' || dimPulgTxt == '' && dimMiliTxt != '' || dimPulgTxt != '' && dimMiliTxt != '') {
                                                                                                    if (expPulgTxt != '' && expMiliTxt == '' || expPulgTxt == '' && expMiliTxt != '' || expPulgTxt != '' && expMiliTxt != '') {
                                                                                                        if (dibEntregaTxt != '') {
                                                                                                            if (croquisTxt != '') {
                                                                                                                if (tonalajeMensualTxt != '') {
                                                                                                                    if (tonelajeAnualTxt != '') {
                                                                                                                        if (dimCompletasTxt != '') {
                                                                                                                            if (observaTxt != '') {
                                                                                                                                if (corrugadoTxt != '' && polyTxt != '' && kraftTxt != '') {
                                                                                                                                    if (piezasTxt != '') {
                                                                                                                                        var dataSelectedContent = 'idNvoDibujo=' + row.id_nvodibujo + '&idHeader=' + row.id_header + '&idDado=' + row.id_detail_dado + '&Nombre=' + txtNombre + '&AreaSing=' + txtAreaSing + '&AreaSmtr=' + txtAreaSmtr + '&TeoricoSing=' + txtPesoSing + '&TeoricoSmtr=' + txtPesoSmtr + '&AnodizableSing=' + txtPesoAnSing + '&AnodizableSmtr=' + txtPesoAnSmtr + '&PbleSing=' + txtPbleSing + '&PbleSmtr=' + txtPbleSmtr + '&CircularSing=' + txtCirSing + '&CircularSmtr=' + txtCirSmtr + '&ACABADO=' + acabadoTxt + '&TEMPLE=' + templeTxt + '&ALEACION=' + aleacionTxt + '&clienteId=' + clienteTxt + '&codCliente=' + codClienteTxt + '&longPulgadas=' + longPulgTxt + '&longMili=' + longMiliTxt + '&toleranciaPulg=' + tolePulgTxt + '&toleranciaMili=' + toleMiliTxt + '&btnFisico=' + fisicoTxt + '&btnEnsamble=' + ensambleTxt + '&criticaPulg=' + dimPulgTxt + '&criticaMili=' + dimMiliTxt + '&superficiePulg=' + expPulgTxt + '&superficieMili=' + expMiliTxt + '&btnDibEntregado=' + dibEntregaTxt + '&btnCroquis=' + croquisTxt + '&tonelajeMensual=' + tonalajeMensualTxt + '&tonelajeAnual=' + tonelajeAnualTxt + '&observaciones=' + observaTxt + '&dimCompletasBtn=' + dimCompletasTxt + '&corrugadoBtn=' + corrugadoTxt + '&polyBtn=' + polyTxt + '&kraftBtn=' + kraftTxt + '&numeroPiezas=' + piezasTxt;
                                                                                                                                        //alert(dataSelectedContent);
                                                                                                                                        //Preparado post.
                                                                                                                                        $.ajax(
                                                                                                                                        {
                                                                                                                                            url: 'php/binding/RD/updateCatRD.php',
                                                                                                                                            type: 'post',
                                                                                                                                            dataType: "json",
                                                                                                                                            data: dataSelectedContent,
                                                                                                                                            success: function (request) {
                                                                                                                                                if (request.MESSAGE == 1) {
                                                                                                                                                    confirmaOperacionNvoDibujo('EDICION');
                                                                                                                                                } else {
                                                                                                                                                    alert("Ocurrio un error");
                                                                                                                                                }
                                                                                                                                            },
                                                                                                                                            error: function (request, settings) {
                                                                                                                                                alert("Entre al error AJAX... " + request.responseText);
                                                                                                                                            }
                                                                                                                                        });
                                                                                                                                    } else {
                                                                                                                                        $.messager.alert('Atenci&oacute;n', 'El número de piezas por paquete es un valor requerido.', 'info');
                                                                                                                                    }
                                                                                                                                } else {
                                                                                                                                    $.messager.alert('Atenci&oacute;n', 'El tipo de forma de empaque puede ser cartón corrugado, polystrech o papel kraft son valor requerido.', 'info');
                                                                                                                                }
                                                                                                                            } else {
                                                                                                                                $.messager.alert('Atenci&oacute;n', 'Las observaciones son valor requerido.', 'info');
                                                                                                                            }
                                                                                                                        } else {
                                                                                                                            $.messager.alert('Atenci&oacute;n', 'El dato dimensiones completas es un valor requerido.', 'info');
                                                                                                                        }
                                                                                                                    } else {
                                                                                                                        $.messager.alert('Atenci&oacute;n', 'El tonelaje anual es un valor requerido.', 'info');
                                                                                                                    }
                                                                                                                } else {
                                                                                                                    $.messager.alert('Atenci&oacute;n', 'El tonelaje mensual es un valor requerido.', 'info');
                                                                                                                }
                                                                                                            } else {
                                                                                                                $.messager.alert('Atenci&oacute;n', 'El dato croquis es un valor requerido.', 'info');
                                                                                                            }
                                                                                                        } else {
                                                                                                            $.messager.alert('Atenci&oacute;n', 'El dato de entrega dinujo es un valor requerido.', 'info');
                                                                                                        }
                                                                                                    } else {
                                                                                                        $.messager.alert('Atenci&oacute;n', 'La superficie expuesta en pulgadas o en milimetros son valores requerido.', 'info');
                                                                                                    }
                                                                                                } else {
                                                                                                    $.messager.alert('Atenci&oacute;n', 'Las dimensiones críticas en pulgadas o en milimetros son valores requerido.', 'info');
                                                                                                }
                                                                                            } else {
                                                                                                $.messager.alert('Atenci&oacute;n', 'El dato de ensamble es un valor requerido.', 'info');
                                                                                            }
                                                                                        } else {
                                                                                            $.messager.alert('Atenci&oacute;n', 'El dato de entrega muestra física es un valor requerido.', 'info');
                                                                                        }
                                                                                    } else {
                                                                                        $.messager.alert('Atenci&oacute;n', 'Las tolerancias especiales en pulgadas o en milimetros son valores requerido.', 'info');
                                                                                    }
                                                                                } else {
                                                                                    $.messager.alert('Atenci&oacute;n', 'La longitud en pulgadas o en milimetros son valores requerido.', 'info');
                                                                                }
                                                                            } else {
                                                                                $.messager.alert('Atenci&oacute;n', 'La aleación un valor requerido.', 'info');
                                                                            }
                                                                        } else {
                                                                            $.messager.alert('Atenci&oacute;n', 'El temple ess un valor requerido.', 'info');
                                                                        }
                                                                    } else {
                                                                        $.messager.alert('Atenci&oacute;n', 'El acabado es un valor requerido.', 'info');
                                                                    }
                                                                } else {
                                                                    $.messager.alert('Atenci&oacute;n', 'El &Oslash; circular en sistema métrico un valor requerido.', 'info');
                                                                }
                                                            } else {
                                                                $.messager.alert('Atenci&oacute;n', 'El &Oslash; circular en sistema ingles un valor requerido.', 'info');
                                                            }
                                                        } else {
                                                            $.messager.alert('Atenci&oacute;n', 'La superficie pulible en sistema métrico un valor requerido.', 'info');
                                                        }
                                                    } else {
                                                        $.messager.alert('Atenci&oacute;n', 'La superficie pulible en sistema ingles un valor requerido.', 'info');
                                                    }
                                                } else {
                                                    $.messager.alert('Atenci&oacute;n', 'El perímetro anodizable en sistema métrico un valor requerido.', 'info');
                                                }
                                            } else {
                                                $.messager.alert('Atenci&oacute;n', 'El perímetro anodizable en sistema ingles un valor requerido.', 'info');
                                            }
                                        } else {
                                            $.messager.alert('Atenci&oacute;n', 'El peso teórico en sistema métrico un valor requerido.', 'info');
                                        }
                                    } else {
                                        $.messager.alert('Atenci&oacute;n', 'El peso teórico en sistema ingles un valor requerido.', 'info');
                                    }
                                } else {
                                    $.messager.alert('Atenci&oacute;n', 'El área en sistema métrico un valor requerido.', 'info');
                                }
                            } else {
                                $.messager.alert('Atenci&oacute;n', 'El área en sistema ingles un valor requerido.', 'info');
                            }
                        } else {
                            $.messager.alert('Atenci&oacute;n', 'El código del cliente es un valor requerido.', 'info');
                        }
                    } else {
                        $.messager.alert('Atenci&oacute;n', 'El nombre del dado es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atenci&oacute;n', 'El cliente es un valor requerido.', 'info');
                }


               
                break;
        }

    }

    function confirmaOperacionNvoDibujo(tipoOperacion) {

        switch (tipoOperacion) {
            case "GUARDADO":

                $('#IDNuevoDib').val();

                //alert("¡Cliente guardado exitosamente!");

                //$.messager.alert('Operación','¡Cliente guardado exitosamente!','info');
                $('#windowNvoDibujo').window('close');
                $('#fmEditarNvoDibujo').form('clear');
                $('#fmEditarDibujo').form('clear');


                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Nuevo dibujo guardado exitosamente!',
                    fn: function () {

                        $('#dgNvoDibujos').datagrid('reload');


                    }


                });
                break;
                //Operación de edición.
            case "EDICION":

                $('#IDNuevoDib').val();

                $('#windowNvoDibujo').window('close');
                $('#fmEditarNvoDibujo').form('clear');
                $('#fmEditarDibujo').form('clear');

                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Dibujo actualizado exitosamente!',
                    fn: function () {

                        $('#dgNvoDibujos').datagrid('reload');


                    }


                });
                break;
                //Fin de operación de edición.
            case "BORRADO":

                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Dibujo eliminado exitosamente!',
                    fn: function () {

                        $('#dgNvoDibujos').datagrid('reload');


                    }


                });

                break;
        }


    }

    //Función para eliminar el cliente.
    function EliminarNvoDibujo() {


        var row = $('#dgNvoDibujos').datagrid('getSelected');
        if (row) {
            var ID_cliente = row.id_cliente;

            //alert("El id del cliente seleccionado es:" + ID_cliente);
            var dataClienteContent = 'IDNuevoDib=' + ID_cliente;

            //Preparado post.
            $.ajax(
            {
                url: 'php/binding/Cliente/deleteCatCliente.php',
                type: 'post',
                dataType: 'json',
                data: dataClienteContent,
                success: function (request) {

                    //$('#IDNuevoDib').val(request.ID_CLIENTE);
                    //alert("MESAJE RETORNO: "+request.MESSAGE);
                    if (request.success == true) {

                        confirmaOperacionNvoDibujo('BORRADO');

                    } else {

                        alert("Ocurrio un error");

                    }

                },
                error: function (request, settings) {
                    alert("Entre al error AJAX... " + request.responseText);
                    //alert(request.responseText);
                }
            });





        } else {

            $.messager.alert({
                title: 'Atención',
                icon: 'info',
                msg: 'Debe seleccionar un cliente dando click sobre el registro para poder eliminarlo.',
                fn: function () {

                    $('#dgNvoDibujos').datagrid('reload');


                }


            });




        }



    }






    //Funciones para contacto cliente:
    function muestraFormContact() {

        if (!$('#cbAddContact').prop('checked')) {
            //alert('Seleccionado');
            $('#divContactoCliente').hide();

        } else {

            $('#divContactoCliente').show();

        }


    }


</script>
