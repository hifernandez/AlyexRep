<input id="tipoOperacionKardex" type="hidden" value="" />
<table id="dgKardex" title="Kardex" class="easyui-datagrid" style="width:auto;height:450px;"
       url="php/binding/Kardex/getCatKardex.php"
       toolbar="#toolKardex"
       rownumbers="true"
       fitColumns="true"
       singleSelect="true"
       pagination="true"
       loadMsg="Cargando información...">
    <thead>
        <tr>
            <!--<th field="ck" checkbox="true" ></th>-->
            <th data-options="field:'id_kardex'" hidden></th>
            <th data-options="field:'id_dado'" hidden></th>
            <th data-options="field:'id_turno'" hidden></th>
            <th data-options="field:'id_status'" hidden></th>
            <th data-options="field:'id_status'" hidden></th>
            }<th data-options="field:'clave_dado'">Clave dado</th>
            <th data-options="field:'entrada_horno'">Entrada al horno</th>
            <th data-options="field:'hora_inicio'">Hora de inicio</th>
            <th data-options="field:'tiempo_calentamiento'">Tiempo de calentamiento</th>
            <!--<th data-options="field:'fecha_extrusion'">Fecha de extrusión</th>-->
            <th data-options="field:'pres_extrusion'">Pres. Extrusion</th>
            <th data-options="field:'temperatura_dado'">Temperatura dado</th>
            <th data-options="field:'temperatura_bolster'">Temperatura bolster</th>
            <th data-options="field:'temperatura_contenedor'">Temperatura contenedor</th>
            <th data-options="field:'primeros_3_lingotes'">Primeros 3 lingotes</th>
            <th data-options="field:'temperatura_oper'">Temperatura oper.</th>
            <th data-options="field:'temperatura_ext'">Temperatura ext.</th>
            <th data-options="field:'velocidad_extrusion'">Velocidad extrusión</th>
            <th data-options="field:'kg_brutos_buenos'">Kg brutos buenos</th>
            <th data-options="field:'ling_ext'">Ling. ext.</th>
            <th data-options="field:'tipo_ext'">Tipo extrusion</th>
            <th data-options="field:'cantidad_cuna'">Cantidad cuna</th>
            <th data-options="field:'comentarios_extrusion'">Comentarios de extrusión</th>
        </tr>
    </thead>
</table>

<!--Cargando la barra de edición y busqueda-->
<div id="toolKardex">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEDICIONKARDEX('ALTAKARDEX')">Alta registro de kardex</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEDICIONKARDEX('EDICIONKARDEX')">Editar registro de kardex</a>
   <!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="EliminarDado()">Eliminar dado</a>-->
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
<div id="dlgKardex" class="easyui-dialog" style="width:auto"
     closed="true" modal="true">
    <form id="fmEditarKardex" method="post" novalidate style="margin:0;padding:20px 50px">
        <div style="margin-bottom:5px;font-size:14px;">Datos de Kardex:</div>
        <table class="table">
            <TR>
                <td>Clave dado:</td>
                <TD>
                    <input id="comboClaveKardex" class="easyui-combogrid" name="comboClaveKardex" style="width:100%;padding:5px" data-options="
                           required:true,
                           panelWidth:305,
                           idField:'id_detail_dado',
                           textField:'clave_dado',
                           url:'php/binding/Dados/Detail/getCatDetail.php',
                    columns:[[
                    {field:'clave_dado',title:'Dado', width:80},
                    {field:'nombre_dado',title:'Descripción ', width:170},
                    {field:'digito_dado',title:'Dígito ', width:50}
                    ]]">
                </TD>
                <td>Turno:</td>
                <TD>
                    <input id="comboClaveTurno" class="easyui-combogrid" name="comboClaveTurno" style="width:100%;padding:5px" data-options="
                           required:true,
                           panelWidth:260,
                           idField:'id_turno',
                           textField:'descripcion_turno',
                           url:'php/binding/Turno/getCatTurno.php',
                    columns:[[
                    {field:'descripcion_turno',title:'Descripción', width:85},
                    {field:'hra_inicio_turno',title:'Hora de inicio', width:85},
                    {field:'hra_final_turno',title:'Hora final ', width:85}
                    ]]">
                </TD>
                <td>Estatus:</td>
                <TD>
                    <input id="comboClaveStatus" class="easyui-combogrid" name="comboClaveStatus" style="width:100%;padding:5px" data-options="
                           required:true,
                           panelWidth:90,
                           idField:'id_status',
                           textField:'descripcion_status',
                           url:'php/binding/Turno/getCatStatusKardex.php',
                    columns:[[
                    {field:'descripcion_status',title:'Descripción', width:85}
                    ]]">
                </TD>
            </TR>
            <div style="margin-bottom:3px"></div>
            <TR>
                <td>Hora Inicio:</td>
                <TD>
                    <input id="spinHoraInicio" class="easyui-timespinner" style="width:100%" required="required" data-options="min:'00:00',showSeconds:true">
                </TD>
                <td>Tiempo de calentamiento:</td>
                <TD>
                    <input id="spinTimeCalenta" class="easyui-timespinner" style="width:100%" required="required" data-options="min:'00:00',showSeconds:true">
                </TD>
                <td>Fecha de extrusión:</td>
                <TD>
                    <input id="dtFechaExtru" type="text" class="easyui-datetimebox" required="required">

                </TD>
            </TR>
            <div style="margin-bottom:3px"></div>
            <TR>
                <td>Presión extrusión:</td>
                <TD>
                    <input id="txtPresExtru" name="txtPresExtru" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px">
                </TD>
                <td>Temperatura dado:</td>
                <TD>
                    <input id="txtTempDado" name="txtTempDado" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px">
                </TD>
                <td>Temperatura Bolster:</td>
                <TD>
                    <input id="txtTempBols" name="txtTempBols" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px">
                </TD>
            </TR>
            <div style="margin-bottom:3px"></div>
            <TR>
                <td>Temperatura contenedor:</td>
                <TD>
                    <input id="txtTempCont" name="txtTempCont" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px">
                </TD>
                <td>Primeros 3 lingotes:</td>
                <TD>
                    <input id="txt3Lingotes" name="txt3Lingotes" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px">
                </TD>
                <td>Temperatura Oper:</td>
                <TD>
                    <input id="txtTempOper" name="txtTempOper" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px" />
                </TD>
            </TR>
            <div style="margin-bottom:3px"></div>
            <TR>
                <td>Temperatura Ext:</td>
                <TD>
                    <input id="txtTempExt" name="txtDadoFactor" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px">
                </TD>
                <td>Velocidad extrusión</td>
                <TD>
                    <input id="txtVelExtr" name="txtVelExtr" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px" />
                    <BR>
                </TD>
                <td>Kg. Brutos Buenos: </td>
                <TD>
                    <input id="txtKGBrutos" name="txtKGBrutos" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px">
                </TD>
            </TR>
            <div style="margin-bottom:3px"></div>
            <TR>
                <td>Ling. Ext.:</td>
                <TD>
                    <input id="txtLingExt" name="txtLingExt" class="easyui-numberbox" data-options="precision:3, required:true" style="width:100%;padding:5px">
                </TD>
                <td>Tipo Ext.:</td>
                <td align="center">
                    <!-- <input id="btnEnsamble" class="easyui-switchbutton" data-options="required:'true',onText:'Si',offText:'No'" style="width:40%;padding:5px">-->
                    <select id="btnTipoExt" class="easyui-combobox" name="btnTipoExt" labelPosition="top" style="width:50PX;">
                        <option value="C">C</option>
                        <option value="P">P</option>
                        <option value="´M">M</option>
                    </select>
                </td>
                <td>Cantidad cuna:</td>
                <td align="center">
                    <!-- <input id="btnEnsamble" class="easyui-switchbutton" data-options="required:'true',onText:'Si',offText:'No'" style="width:40%;padding:5px">-->
                    <select id="btnCantCuna" class="easyui-combobox" name="btnTipoExt" labelPosition="top" style="width:50PX;">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </td>
            </TR>
            <div style="margin-bottom:3px"></div>
            <TR>
                <td colspan="2"></td>
                <td>Comentarios extrusión:</td>
                <TD align="center">
                    <input id="txtComentExtru" name="txtComentExtru" class="easyui-textbox" data-options="multiline:'true', required:true" style="width:100%;padding:5px">
                </TD>
                <TD colspan="2"></TD>
            </TR>
        </table>
    </form>
    <div style="margin-bottom:5px"></div>
    <div align="center">
        <button id="btnAltaKardex" type="button" onclick="guardaKardex()" class="btn btn-primary">Guardar</button>
        <button id="btnEditDado" type="button" onclick="guardaKardex()" class="btn btn-primary">Actualizar</button>
    </div>
    <div style="margin-bottom:10px"></div>

</div>
<!-- ******************************** -->



<script>
    $(document).ready(function () {
        $('#dgKardex').datagrid('reload');    // reload the user data
    });
    function btnBuscarFamilia() {
        $('#dgKardex').datagrid('reload');
    }
    function abrirModalEDICIONKARDEX(tipoOperacion) {
        switch (tipoOperacion) {
            case "EDICIONKARDEX":
                $('#tipoOperacionKardex').val("EDICIONKARDEX");
                var row = $('#dgKardex').datagrid('getSelected');
                if (row) {
                    //guardaKardex();
                    $('#dlgKardex').dialog('open').dialog('setTitle', 'Editar Kardex');
                    $('#fmEditarKardex').form('load', row);
                    $('#comboClaveKardex').combogrid("setValue", row.id_dado);
                    $('#comboClaveTurno').combogrid("setValue", row.id_turno);
                    $('#comboClaveStatus').combogrid("setValue", row.id_status);
                    $('#spinHoraInicio').textbox("setValue", row.hora_inicio);
                    $('#spinTimeCalenta').textbox("setValue", row.tiempo_calentamiento);
                    $('#dtFechaExtru').textbox("setValue", row.entrada_horno);
                    $('#txtPresExtru').textbox("setValue", row.pres_extrusion);
                    $('#txtTempDado').textbox("setValue", row.temperatura_dado);
                    $('#txtTempBols').textbox("setValue", row.temperatura_bolster);
                    $('#txtTempCont').textbox("setValue", row.temperatura_contenedor);
                    $('#txt3Lingotes').textbox("setValue", row.primeros_3_lingotes);
                    $('#txtTempOper').textbox("setValue", row.temperatura_oper);
                    $('#txtTempExt').textbox("setValue", row.temperatura_ext);
                    $('#txtVelExtr').textbox("setValue", row.velocidad_extrusion);
                    $('#txtKGBrutos').textbox("setValue", row.kg_brutos_buenos);
                    $('#txtLingExt').textbox("setValue", row.ling_ext);
                    $('#btnTipoExt').textbox("setValue", row.tipo_ext);
                    $('#btnCantCuna').textbox("setValue", row.cantidad_cuna);
                    $('#txtComentExtru').textbox("setValue", row.comentarios_extrusion);
                }
                else {
                    $.messager.alert('Error de edición', 'Debe seleccionar un producto dando clic sobre el registro para poder editarlo!', 'info');
                }
                break;
            case "ALTAKARDEX":
                $('#fmEditarKardex').form('clear');
                $('#tipoOperacionKardex').val("ALTAKARDEX");
                $('#dlgKardex').dialog('open').dialog('setTitle', 'Nuevo registro de Kardex');
                $('#fmEditarKardex').form('load');
               // $('#comboClaveKardex').textbox('disable');
                //$("#btnAltaEditDado").html('GUARDAR');
                break;
        }
    }// FIN
    function guardaKardex() {
        var tipoOperacionGuardado = $('#tipoOperacionKardex').val();
        switch (tipoOperacionGuardado) {
            case "EDICIONKARDEX":
                //alert("Entre al CASE Edicion Familia");
                //alert("El valor de TipoOperacion es: "+ tipoOperacionGuardado);
                var row = $('#dgKardex').datagrid('getSelected');
                var comboClaveKardex = $('#comboClaveKardex').combogrid("getValue");
                var comboClaveTurno = $('#comboClaveTurno').combogrid("getValue");
                var comboClaveStatus = $('#comboClaveStatus').combogrid("getValue");
                var spinHoraInicio = $('#spinHoraInicio').val();
                var spinTimeCalenta = $('#spinTimeCalenta').val();
                var dtFechaExtru = $('#dtFechaExtru').val();
                var txtPresExtru = $('#txtPresExtru').val();
                var txtTempDado = $('#txtTempDado').val();
                var txtTempBols = $('#txtTempBols').val();
                var txtTempCont = $('#txtTempCont').val();
                var txt3Lingotes = $('#txt3Lingotes').val();
                var txtTempOper = $('#txtTempOper').val();
                var txtTempExt = $('#txtTempExt').val();
                var txtVelExtr = $('#txtVelExtr').val();
                var txtKGBrutos = $('#txtKGBrutos').val();
                var txtLingExt = $('#txtLingExt').val();
                var btnTipoExt = $('#btnTipoExt').val();
                var btnCantCuna = $('#btnCantCuna').val();
                var txtComentExtru = $('#txtComentExtru').val();

                var dataSelectedContent = 'p_id_kardex=' + row.id_kardex +
                '&p_comboClaveKardex=' + comboClaveKardex +
                '&p_comboClaveTurno=' + comboClaveTurno +
                '&p_comboClaveStatus=' + comboClaveStatus +
                '&p_spinHoraInicio=' + spinHoraInicio +
                '&p_spinTimeCalenta=' + spinTimeCalenta +
                '&p_dtFechaExtru=' + dtFechaExtru +
                '&p_txtPresExtru=' + txtPresExtru +
                '&p_txtTempDado=' + txtTempDado +
                '&p_txtTempBols=' + txtTempBols +
                '&p_txtTempCont=' + txtTempCont +
                '&p_txt3Lingotes=' + txt3Lingotes +
                '&p_txtTempOper=' + txtTempOper +
                '&p_txtTempExt=' + txtTempExt +
                '&p_txtVelExtr=' + txtVelExtr +
                '&p_txtKGBrutos=' + txtKGBrutos +
                '&p_txtLingExt=' + txtLingExt +
                '&p_btnTipoExt=' + btnTipoExt +
                '&p_btnCantCuna=' + btnCantCuna +
                '&p_txtComentExtru=' + txtComentExtru;
                //var dataSelectedContent = 'Clave=' + txtClave + '&Nombre=' + txtNombre + '&Nota=' + txtNotas + '&AreaSing=' + txtAreaSing + '&AreaSmtr=' + txtAreaSmtr + '&TeoricoSing=' + txtPesoSing + '&TeoricoSmtr=' + txtPesoSmtr + '&AnodizableSing=' + txtPesoAnSing + '&AnodizableSmtr=' + txtPesoAnSmtr + '&PbleSing=' + txtPbleSing + '&PbleSmtr=' + txtPbleSmtr + '&CircularSing=' + txtCirSing + '&CircularSmtr=' + txtCirSmtr + '&Factor=' + txtFactor + '&Version=' + txtVersion + '&Cavidad=' + txtCavidad + '&Extrusion=' + txtExtrusion + '&Esp=' + txtEsp + '&Observaciones=' + txtObservaciones + '&TipoOperacion=' + tipoOperacionGuardado;
                alert('El valor concatenado es = ' + dataSelectedContent);
                $.ajax(
                {
                    url: 'php/binding/Kardex/updateCatKardex.php',
                    type: 'post',
                    dataType: "json",
                    data: dataSelectedContent,
                    success: function (request) {
                        alert(request.responseText);
                        $('#dlgKardex').dialog('close');
                        $('#dgKardex').datagrid('reload');
                    },
                    error: function (request, settings) {
                        alert(request.responseText);
                    }
                });
               
                //alert("Se actualizó la información correctamente");
                break;
            case "ALTAKARDEX":
                //alert("Entre al CASE Edicion dado");
                //alert("El valor de TipoOperacion es: "+ tipoOperacionGuardado);
                var comboClaveKardex = $('#comboClaveKardex').combogrid("getValue");
                var comboClaveTurno = $('#comboClaveTurno').combogrid("getValue");
                var comboClaveStatus = $('#comboClaveStatus').combogrid("getValue");
                var spinHoraInicio = $('#spinHoraInicio').val();
                var spinTimeCalenta = $('#spinTimeCalenta').val();
                var dtFechaExtru = $('#dtFechaExtru').val();
                var txtPresExtru = $('#txtPresExtru').val();
                var txtTempDado = $('#txtTempDado').val();
                var txtTempBols = $('#txtTempBols').val();
                var txtTempCont = $('#txtTempCont').val();
                var txt3Lingotes = $('#txt3Lingotes').val();
                var txtTempOper = $('#txtTempOper').val();
                var txtTempExt = $('#txtTempExt').val();
                var txtVelExtr = $('#txtVelExtr').val();
                var txtKGBrutos = $('#txtKGBrutos').val();
                var txtLingExt = $('#txtLingExt').val();
                var btnTipoExt = $('#btnTipoExt').val();
                var btnCantCuna = $('#btnCantCuna').val();
                var txtComentExtru = $('#txtComentExtru').val();

                var dataSelectedContent = 'p_comboClaveKardex=' + comboClaveKardex +
                '&p_comboClaveTurno=' + comboClaveTurno +
                '&p_comboClaveStatus=' + comboClaveStatus +
                '&p_spinHoraInicio=' + spinHoraInicio +
                '&p_spinTimeCalenta=' + spinTimeCalenta +
                '&p_dtFechaExtru=' + dtFechaExtru +
                '&p_txtPresExtru=' + txtPresExtru +
                '&p_txtTempDado=' + txtTempDado +
                '&p_txtTempBols=' + txtTempBols +
                '&p_txtTempCont=' + txtTempCont +
                '&p_txt3Lingotes=' + txt3Lingotes +
                '&p_txtTempOper=' + txtTempOper +
                '&p_txtTempExt=' + txtTempExt +
                '&p_txtVelExtr=' + txtVelExtr +
                '&p_txtKGBrutos=' + txtKGBrutos +
                '&p_txtLingExt=' + txtLingExt +
                '&p_btnTipoExt=' + btnTipoExt +
                '&p_btnCantCuna=' + btnCantCuna +
                '&p_txtComentExtru=' + txtComentExtru;
                //var dataSelectedContent = 'Clave=' + txtClave + '&Nombre=' + txtNombre + '&Nota=' + txtNotas + '&AreaSing=' + txtAreaSing + '&AreaSmtr=' + txtAreaSmtr + '&TeoricoSing=' + txtPesoSing + '&TeoricoSmtr=' + txtPesoSmtr + '&AnodizableSing=' + txtPesoAnSing + '&AnodizableSmtr=' + txtPesoAnSmtr + '&PbleSing=' + txtPbleSing + '&PbleSmtr=' + txtPbleSmtr + '&CircularSing=' + txtCirSing + '&CircularSmtr=' + txtCirSmtr + '&Factor=' + txtFactor + '&Version=' + txtVersion + '&Cavidad=' + txtCavidad + '&Extrusion=' + txtExtrusion + '&Esp=' + txtEsp + '&Observaciones=' + txtObservaciones + '&TipoOperacion=' + tipoOperacionGuardado;
                //alert('El valor concatenado es = ' + dataSelectedContent);
                $.ajax(
                 {
                     url: 'php/binding/Kardex/setCatKardex.php',
                     type: 'post',
                     dataType: "json",
                     data: dataSelectedContent,
                     success: function (request) {
                         alert(request.responseText);
                      //   if (request.MESSAGE = 1) {
                            // $('#dlgKardex').dialog('close');
                          //   $('#dgKardex').datagrid('reload');
                        // }

                         
                     },
                     error: function (request, settings) {
                         alert(request.responseText);

                     }
                 });
                 
                break;
        }
        $('#dgKardex').datagrid('reload');
    }
    function EliminarDado() {
        var row = $('#dgKardex').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirma', 'Estás seguro de eliminarlo?', function (r) {
                if (r) {
                    $.post('php/binding/Dados/Detail/deleteCatDetail.php', { id_detail_dado: row.id_detail_dado }, function (result) {
                        //echo (row.id_detail_dado);
                        if (result.success) {
                            $('#dgKardex').datagrid('reload');	// reload the user data
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
