<input id="tipoOperacionDados" type="hidden" value="" />
<table id="dgDados" title="Dados" class="easyui-datagrid" style="width:auto;height:450px;"
       url="php/binding/Dados/Detail/getCatDetail.php"
       toolbar="#toolDados"
       rownumbers="true"
       fitColumns="true"
       singleSelect="true"
       pagination="true"
       loadMsg="Cargando información...">
    <thead>
        <tr>
            <!--<th field="ck" checkbox="true" ></th>-->
            <th data-options="field:'id_detail_dado'" hidden></th>
            <th data-options="field:'id_tipo'" hidden></th>
            <th data-options="field:'clave_dado'">Clave</th>
            <th data-options="field:'digito_dado'">Dígito</th>
            <th data-options="field:'nombre_dado'">Nombre</th>
            <th data-options="field:'nota_dado'">Notas</th>
            <th data-options="field:'area_dado_sing'">Area Sistema Ingles</th>
            <th data-options="field:'area_dado_smtr'">Area Sistema Métrico</th>
            <th data-options="field:'p_teorico_dado_sing'">Peso teórico Sistema Ingles</th>
            <th data-options="field:'p_teorico_dado_smtr'">Peso teórico Sistema Métrico</th>
            <th data-options="field:'p_anodizable_dado_sing'">Perimetro anodizable Sistema Ingles</th>
            <th data-options="field:'p_anodizable_dado_smtr'">Perimetro anodizable Sistema Métrico</th>
            <th data-options="field:'p_pble_dado_sing'">Perimetro anodizable Sistema Ingles</th>
            <th data-options="field:'p_pble_dado_smtr'">Perimetro pulible Sistema Métrico</th>
            <th data-options="field:'o_circular_dado_sing'">&Oslash; . Circular Sistema Ingles</th>
            <th data-options="field:'o_circular_dado_smtr'">&Oslash; . Circular Sistema Métrico</th>
            <th data-options="field:'factor_dado'">Factor</th>
            <th data-options="field:'version_dado'">Versión</th>
            <th data-options="field:'cav_dado'">Cavidades</th>
            <th data-options="field:'descripcion_tipo'">Tipo de dado</th>
            <th data-options="field:'r_extrusion_dado'">Relación de extrusion</th>
            <th data-options="field:'esp_dado'">Esp. Dado</th>
            <th data-options="field:'observacion_dado'">Observaciones</th>
        </tr>
    </thead>
</table>

<!--Cargando la barra de edición y busqueda-->
<div id="toolDados">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEdicionDado('ALTADADO')">Alta de dado</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEdicionDado('EDICIONDADO')">Editar dado</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="EliminarDado()">Eliminar dado</a>
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="muestraWord()">Reporte del dado</a>-->
    <br>
    <!--Busqueda de elementos-->
    <!--<TABLE BORDER=0 WIDTH=100 CELLPADDING=15 align="center">
        <TR>
            <TD >
                <input id="bscDadoClave" label="Clave" class="easyui-textbox" prompt="Clave" data-options="" style="width:300px">
            </TD>
            <TD>
                <div class="btn-group btn-group-lg" role="group" aria-label="...">
                    <button type="button" onclick="btnBuscarDados()" class="btn btn-primary btn-sm">BUSCAR</button>
                </div>
            </TD>
        </TR>
    </TABLE>-->
</div>




<!-- MODAL PARA MOSTRAR EN LA AGREGACIÓN -->
<div id="dlgDados" class="easyui-dialog" style="width:auto"
     closed="true" modal="true">
    <form id="fmEditarDado" method="post" novalidate style="margin:0;padding:20px 50px">
        <div style="margin-bottom:5px;font-size:14px;">Datos de Dado:</div>
        <table class="table">
            <TR>
                <td>Clave dado</td>
                <TD>
                    <input id="txtDadoClave" name="txtDadoClave" class="easyui-textbox" data-options="" style="width:100%;padding:5px">
                </TD>
                <td>Nombre dado</td>
                <TD>
                    <input id="txtDadoNombre" name="txtDadoNombre" class="easyui-textbox" style="width:100%;padding:5px">
                </TD>
                <td>Nota para dado</td>
                <TD>
                    <input id="txtNota" name="txtNota" class="easyui-textbox" style="width:100%;padding:5px" />
                </TD>
            </TR>
            <div style="margin-bottom:3px"></div>
            <TR>
                <td>Área Sistema Ingles</td>
                <TD>
                    <input id="txtDadoAreaSing" name="txtDadoAreaSing" class="easyui-numberbox" data-options="precision:3" style="width:100%;padding:5px">
                </TD>
                <td>Área Sistema Métrico</td>
                <TD>
                    <input id="txtDadoAreaSmtr" name="txtDadoAreaSmtr" class="easyui-numberbox" data-options="precision:3" style="width:100%;padding:5px">
                </TD>
                <td>Peso teórico Sistema Ingles</td>
                <TD>
                    <input id="txtDadoPesoTeoricoSing" name="txtDadoPesoTeoricoSing" class="easyui-numberbox" data-options="precision:3" style="width:100%;padding:5px">
                </TD>

            </TR>
            <div style="margin-bottom:3px"></div>
            <TR>
                <td>Peso teórico Sistema Métrico</td>
                <TD>
                    <input id="txtDadoPesoTeoricoSmtr" name="txtDadoPesoTeoricoSmtr" class="easyui-numberbox" data-options="precision:3" style="width:100%;padding:5px">
                </TD>
                <td>Perimetro anodizable Sistema Ingles</td>
                <TD>
                    <input id="txtDadoPesoAnSing" name="txtDadoPesoAnSing" class="easyui-numberbox" data-options="precision:3" style="width:100%;padding:5px">
                </TD>
                <td>Perimetro anodizable Sistema Métrico</td>
                <TD>
                    <input id="txtDadoPesoAnSmtr" name="txtDadoPesoAnSmtr" class="easyui-numberbox" data-options="precision:3" style="width:100%;padding:5px">
                </TD>
            </TR>
            <div style="margin-bottom:3px"></div>
            <TR>
                <td>Superficie pulible Sistema Ingles</td>
                <TD>
                    <input id="txtDadoPbleSing" name="txtDadoPbleSing" class="easyui-numberbox" data-options="precision:3" style="width:100%;padding:5px">
                </TD>
                <td>Superficie pulible Sistema Métrico</td>
                <TD>
                    <input id="txtDadoPbleSmtr" name="txtDadoPbleSmtr" class="easyui-numberbox" data-options="precision:3" style="width:100%;padding:5px">
                </TD>
                <td>&Oslash; circular Sistema Ingles</td>
                <TD>
                    <input id="txtDadoCirSing" name="txtDadoCirSing" class="easyui-numberbox" data-options="precision:3" style="width:100%;padding:5px">
                </TD>
            </TR>
            <div style="margin-bottom:3px"></div>
            <TR>
                <td>&Oslash; circular Sistema Métrico</td>
                <TD>
                    <input id="txtDadoCirSmtr" name="txtDadoCirSmtr" class="easyui-numberbox" data-options="precision:3" style="width:100%;padding:5px" />
                </TD>
                <td>Factor</td>
                <TD>
                    <input id="txtDadoFactor" name="txtDadoFactor" class="easyui-numberbox" data-options="precision:3" style="width:100%;padding:5px">
                </TD>
                <td>Versión</td>
                <TD>
                    <input id="txtDadoVersion" name="txtDadoVersion" class="easyui-textbox" data-options="" style="width:100%;padding:5px" />
                    <BR>
                </TD>
            </TR>
            <TR>
                <td>Cavidad</td>
                <TD>
                    <input id="txtDadoCavidad" name="txtDadoCavidad" class="easyui-numberbox" data-options="precision:3" style="width:100%;padding:5px">
                </TD>
                <td>Relacion de extrusión</td>
                <TD>
                    <input id="txtDadoExtrusion" name="txtDadoExtrusion" class="easyui-numberbox" data-options="precision:3" style="width:100%;padding:5px">
                </TD>
                <td>Espesor:</td>
                <TD>
                    <input id="txtDadoEsp" name="txtDadoEsp" class="easyui-textbox" data-options="" style="width:100%;padding:5px">
                </TD>
            </TR>
            <TR>
                <td>Dígito:</td>
                <TD>
                    <input id="txtdigito" name="txtdigito" class="easyui-numberbox" data-options="" style="width:100%;padding:5px">
                </TD>
                <td>Tipo de dado: </td>
                <TD>
                    <input id="comboTipoDado" class="easyui-combogrid" name="comboTipoDado" style="width:100%;padding:5px" data-options="
                           panelWidth:105,
                           idField:'id_tipo',
                           textField:'descripcion_tipo',
                           url:'php/binding/Dados/Tipo/getCatTipo.php',
                    columns:[[
                    {field:'descripcion_tipo',title:'Tipo de dado', width:100}
                    ]]">
                </TD>
                <td>Obervaciones</td>
                <TD align="center">
                    <input id="txtDadoObservaciones" name="txtDadoObservaciones" class="easyui-textbox" data-options="multiline:'true'" style="width:100%;padding:5px">
                </TD>
                <TD></TD>
                <TD></TD>
            </TR>
        </table>
    </form>
    <div style="margin-bottom:5px"></div>
    <div align="center">

        <button id="btnAltaEditDado" type="button" onclick="guardaDado()" class="btn btn-primary">Actualizar</button>

    </div>
    <div style="margin-bottom:10px"></div>

</div>
<!-- ******************************** -->



<script>
    $(document).ready(function () {
        $('#dgDados').datagrid('reload');    // reload the user data
    });
    function btnBuscarFamilia() {
        $('#dgDados').datagrid('reload');
    }
    function abrirModalEdicionDado(tipoOperacion) {
        switch (tipoOperacion) {
            case "EDICIONDADO":
                $('#tipoOperacionDados').val("EDICIONDADO");
                var row = $('#dgDados').datagrid('getSelected');
                if (row) {
                    //guardaDado();
                    $('#dlgDados').dialog('open').dialog('setTitle', 'Editar dado');
                    $('#fmEditarDado').form('load', row);
                    $('#txtDadoClave').textbox("setValue", row.clave_dado);
                    $('#txtDadoClave').textbox('enable');
                    $('#txtNota').textbox("setValue", row.nota_dado);
                    $('#txtDadoNombre').textbox("setValue", row.nombre_dado);
                    $('#txtDadoAreaSing').textbox("setValue", row.area_dado_sing);
                    $('#txtDadoAreaSmtr').textbox("setValue", row.area_dado_smtr);
                    $('#txtDadoPesoTeoricoSing').textbox("setValue", row.p_teorico_dado_sing);
                    $('#txtDadoPesoTeoricoSmtr').textbox("setValue", row.p_teorico_dado_smtr);
                    $('#txtDadoPesoAnSing').textbox("setValue", row.p_anodizable_dado_sing);
                    $('#txtDadoPesoAnSmtr').textbox("setValue", row.p_anodizable_dado_smtr);
                    $('#txtDadoPbleSing').textbox("setValue", row.p_pble_dado_sing);
                    $('#txtDadoPbleSmtr').textbox("setValue", row.p_pble_dado_smtr);
                    $('#txtDadoCirSing').textbox("setValue", row.o_circular_dado_sing);
                    $('#txtDadoCirSmtr').textbox("setValue", row.o_circular_dado_smtr);
                    $('#txtDadoFactor').textbox("setValue", row.factor_dado);
                    $('#txtDadoVersion').textbox("setValue", row.version_dado);
                    $('#txtDadoCavidad').textbox("setValue", row.cav_dado);
                    $('#txtDadoExtrusion').textbox("setValue", row.r_extrusion_dado);
                    $('#txtDadoEsp').textbox("setValue", row.esp_dado);
                    $('#txtDadoObservaciones').textbox("setValue", row.observacion_dado);
                    $('#txtdigito').textbox("setValue", row.digito_dado);
                    $('#comboTipoDado').combogrid("setValue", row.id_tipo);

                }
                else {
                    alert("Debe seleccionar un dado dando clic sobre el registro para poder editarlo.");
                }
                break;
            case "ALTADADO":
                $('#fmEditarDado').form('clear');
                $('#tipoOperacionDados').val("ALTADADO");
                $('#dlgDados').dialog('open').dialog('setTitle', 'Nuevo dado');
                $('#fmEditarDado').form('load');
                $('#txtDadoClave').textbox('disable');
                $("#btnAltaEditDado").html('GUARDAR');
                break;
        }
    }// FIN
    function guardaDado() {
        var tipoOperacionGuardado = $('#tipoOperacionDados').val();
        switch (tipoOperacionGuardado) {
            case "EDICIONDADO":
                //alert("Entre al CASE Edicion Familia");
                //alert("El valor de TipoOperacion es: "+ tipoOperacionGuardado);
                var row = $('#dgDados').datagrid('getSelected');
                var txtClave = $('#txtDadoClave').val();
                var txtNotas = $('#txtNota').val();
                var txtNombre = $('#txtDadoNombre').val();
                var txtAreaSing = $('#txtDadoAreaSing').val();
                var txtAreaSmtr = $('#txtDadoAreaSmtr').val();
                var txtPesoSing = $('#txtDadoPesoTeoricoSing').val();
                var txtPesoSmtr = $('#txtDadoPesoTeoricoSmtr').val();
                var txtPesoAnSing = $('#txtDadoPesoAnSing').val();
                var txtPesoAnSmtr = $('#txtDadoPesoAnSmtr').val();
                var txtPbleSing = $('#txtDadoPbleSing').val();
                var txtPbleSmtr = $('#txtDadoPbleSmtr').val();
                var txtCirSing = $('#txtDadoCirSing').val();
                var txtCirSmtr = $('#txtDadoCirSmtr').val();
                var txtFactor = $('#txtDadoFactor').val();
                var txtVersion = $('#txtDadoVersion').val();
                var txtCavidad = $('#txtDadoCavidad').val();
                var txtExtrusion = $('#txtDadoExtrusion').val();
                var txtEsp = $('#txtDadoEsp').val();
                var txtObservaciones = $('#txtDadoObservaciones').val();
                var txtDigito = $('#txtdigito').val();
                var txtTipoDado = $('#comboTipoDado').val();
                var dataSelectedContent = 'ID=' + row.id_detail_dado + '&tipoDado=' + txtTipoDado + '&Digito=' + txtDigito + '&Clave=' + txtClave + '&Nombre=' + txtNombre + '&Nota=' + txtNotas + '&AreaSing=' + txtAreaSing + '&AreaSmtr=' + txtAreaSmtr + '&TeoricoSing=' + txtPesoSing + '&TeoricoSmtr=' + txtPesoSmtr + '&AnodizableSing=' + txtPesoAnSing + '&AnodizableSmtr=' + txtPesoAnSmtr + '&PbleSing=' + txtPbleSing + '&PbleSmtr=' + txtPbleSmtr + '&CircularSing=' + txtCirSing + '&CircularSmtr=' + txtCirSmtr + '&Factor=' + txtFactor + '&Version=' + txtVersion + '&Cavidad=' + txtCavidad + '&Extrusion=' + txtExtrusion + '&Esp=' + txtEsp + '&Observaciones=' + txtObservaciones + '&TipoOperacion=' + tipoOperacionGuardado;
                //var dataSelectedContent = 'ID=' + row.id_detail_dado +'&Clave='+row.clave_dado+'&Descripcion='+row.descripcion_dado+'&Expuesta='+row.superficie_expuesta_dado+'&Pulida='+row.superficie_pulida_dado+'&Nombre='+row.nombre_dado+'&Nota='+row.nota_dado+'&AreaSing='+row.area_dado_sing+'&AreaSmtr='+row.area_dado_smtr+'&TeoricoSing='+row.p_teorico_dado_sing+'&TeoricoSmtr='+row.p_teorico_dado_smtr+'&AnodizableSing='+row.p_anodizable_dado_sing+'&AnodizableSmtr='+row.p_anodizable_dado_smtr+'&PbleSing='+row.p_pble_dado_sing+'&PbleSmtr='+row.p_pble_dado_smtr+'&CircularSing='+row.o_circular_dado_sing+'&CircularSmtr='+row.o_circular_dado_smtr+'&Factor='+row.factor_dado+'&Version='+row.version_dado+'&Cavidad='+row.cav_dado+'&Extrusion='+row.r_extrusion_dado+'&Esp='+row.esp_dado+'&Observaciones='+row.observacion_dado+'&TipoOperacion='+tipoOperacionGuardado;
                //alert('El valor concatenado es = '+dataSelectedContent);
                $.ajax(
                {
                    url: 'php/binding/Dados/Detail/updateCatDetail.php',
                    type: 'post',
                    dataType: "json",
                    data: dataSelectedContent,
                    success: function (request) {
                        //alert(request.responseText);
                    },
                    error: function (request, settings) {
                        //alert(request.responseText);
                    }
                });
                $('#dlgDados').dialog('close');
                $('#dgDados').datagrid('reload');
                //alert("Se actualizó la información correctamente");
                break;
            case "ALTADADO":
                //alert("Entre al CASE Edicion dado");
                //alert("El valor de TipoOperacion es: "+ tipoOperacionGuardado);
                var txtClave = $('#txtDadoClave').val();
                var txtNotas = $('#txtNota').val();
                var txtNombre = $('#txtDadoNombre').val();
                var txtAreaSing = $('#txtDadoAreaSing').val();
                var txtAreaSmtr = $('#txtDadoAreaSmtr').val();
                var txtPesoSing = $('#txtDadoPesoTeoricoSing').val();
                var txtPesoSmtr = $('#txtDadoPesoTeoricoSmtr').val();
                var txtPesoAnSing = $('#txtDadoPesoAnSing').val();
                var txtPesoAnSmtr = $('#txtDadoPesoAnSmtr').val();
                var txtPbleSing = $('#txtDadoPbleSing').val();
                var txtPbleSmtr = $('#txtDadoPbleSmtr').val();
                var txtCirSing = $('#txtDadoCirSing').val();
                var txtCirSmtr = $('#txtDadoCirSmtr').val();
                var txtFactor = $('#txtDadoFactor').val();
                var txtVersion = $('#txtDadoVersion').val();
                var txtCavidad = $('#txtDadoCavidad').val();
                var txtExtrusion = $('#txtDadoExtrusion').val();
                var txtEsp = $('#txtDadoEsp').val();
                var txtObservaciones = $('#txtDadoObservaciones').val();
                var txtDigito = $('#txtdigito').val();
                var txtTipoDado = $('#comboTipoDado').val();
                var dataSelectedContent = 'tipoDado=' + txtTipoDado + '&Digito=' + txtDigito + '&Clave=' + txtClave + '&Nombre=' + txtNombre + '&Nota=' + txtNotas + '&AreaSing=' + txtAreaSing + '&AreaSmtr=' + txtAreaSmtr + '&TeoricoSing=' + txtPesoSing + '&TeoricoSmtr=' + txtPesoSmtr + '&AnodizableSing=' + txtPesoAnSing + '&AnodizableSmtr=' + txtPesoAnSmtr + '&PbleSing=' + txtPbleSing + '&PbleSmtr=' + txtPbleSmtr + '&CircularSing=' + txtCirSing + '&CircularSmtr=' + txtCirSmtr + '&Factor=' + txtFactor + '&Version=' + txtVersion + '&Cavidad=' + txtCavidad + '&Extrusion=' + txtExtrusion + '&Esp=' + txtEsp + '&Observaciones=' + txtObservaciones + '&TipoOperacion=' + tipoOperacionGuardado;
                //var dataSelectedContent = 'Clave=' + txtClave + '&Nombre=' + txtNombre + '&Nota=' + txtNotas + '&AreaSing=' + txtAreaSing + '&AreaSmtr=' + txtAreaSmtr + '&TeoricoSing=' + txtPesoSing + '&TeoricoSmtr=' + txtPesoSmtr + '&AnodizableSing=' + txtPesoAnSing + '&AnodizableSmtr=' + txtPesoAnSmtr + '&PbleSing=' + txtPbleSing + '&PbleSmtr=' + txtPbleSmtr + '&CircularSing=' + txtCirSing + '&CircularSmtr=' + txtCirSmtr + '&Factor=' + txtFactor + '&Version=' + txtVersion + '&Cavidad=' + txtCavidad + '&Extrusion=' + txtExtrusion + '&Esp=' + txtEsp + '&Observaciones=' + txtObservaciones + '&TipoOperacion=' + tipoOperacionGuardado;
                //alert('El valor concatenado es = '+dataSelectedContent);
                $.ajax(
                {
                    url: 'php/binding/Dados/Detail/updateCatDetail.php',
                    type: 'post',
                    dataType: "json",
                    data: dataSelectedContent,
                    success: function (request) {
                        //alert(request.responseText);
                    },
                    error: function (request, settings) {
                        //alert(request.responseText);
                        
                    }
                });
                $('#dlgDados').dialog('close');
                $('#dgDados').datagrid('reload');
                break;
        }
        $('#dgDados').datagrid('reload');
    }
    function EliminarDado() {
        var row = $('#dgDados').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirma', 'Estás seguro de eliminarlo?', function (r) {
                if (r) {
                    $.post('php/binding/Dados/Detail/deleteCatDetail.php', { id_detail_dado: row.id_detail_dado }, function (result) {
                        //echo (row.id_detail_dado);
                        if (result.success) {
                            $('#dgDados').datagrid('reload');	// reload the user data
                        } else {
                            $.messager.show({	// show error message
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        }
                    }, 'json');
                }
            });
        }
    }
   
</script>
