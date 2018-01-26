<input id="tipoOperacionAleaciones" type="hidden" value="" />
<table id="dgAleaciones" title="Aleaciones" class="easyui-datagrid" style="width:auto;height:450px;"
       url="php/binding/Aleaciones/getCatAleaciones.php"
       toolbar="#toolAleaciones"
       rownumbers="true"
       fitColumns="true"
       singleSelect="true"
       pagination="true"
       loadMsg="Cargando información...">
    <thead>
        <tr>
            <!--<th field="ck" checkbox="true" ></th>-->
            <th data-options="field:'id_aleacion'" hidden></th>
            <th data-options="field:'clave_aleacion',width:33">Aleaci&oacute;n</th>
            <th data-options="field:'descripcion_aleacion',width:33, editor:'text'">Descripci&oacute;n</th>
            <th data-options="field:'comp_quimica_aleacion',width:33, editor:'text'">Composici&oacute;n Qu&iacute;mica</th>
        </tr>
    </thead>
</table>

<!--Cargando la barra de edición y busqueda-->
<div id="toolAleaciones">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEdicionALeacion('ALTAALEACION')">Alta de aleaci&oacute;n</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEdicionALeacion('EDICIONALEACION')">Editar aleaci&oacute;n</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="EliminarAleacion()">Eliminar aleaci&oacute;n</a>
    <!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="muestraWord()">Reporte del aleación</a>-->
    <br>
    <!--Busqueda de elementos-->
    <!--<TABLE BORDER=0 WIDTH=100 CELLPADDING=15 align="center">
        <TR>
            <TD >
                <input id="bscAleClave" label="Clave" class="easyui-textbox" prompt="Clave" data-options="" style="width:300px">
            </TD>

            <TD>
                <input id="bscAleDesc" label="Descripción" class="easyui-textbox" prompt="Descripción" data-options="" style="width:300px">
            </TD>
            <TD>
                <div class="btn-group btn-group-lg" role="group" aria-label="...">
                    <button type="button" onclick="btnBuscarAleaciones()" class="btn btn-primary btn-sm">BUSCAR</button>
                </div>
            </TD>
        </TR>
    </TABLE>-->
</div>


<!-- MODAL PARA MOSTRAR EN LA AGREGACIÓN -->
<div id="dlgAleaciones" class="easyui-dialog" style="width:300px;height:auto;padding:10px 20px"
     closed="true" buttons="#dlg-buttons">
    <form id="fmEditarAleacion" method="post" novalidate>

        <div style="margin-bottom:5px;font-size:14px;border-bottom:1px solid #ccc">Datos de la aleaci&oacute;n:</div>
        <div style="margin-bottom:5px"></div>
        <table>
            <tr>
                <td>Clave:</td>
                <td>
                    <input id="txtAleClave" name="txtAleClave" class="easyui-textbox" data-options="required:true" style="width:100%;padding:5px" />
                </td>

            </tr>
            <tr>
                <td>Descripci&oacute;n:</td>
                <td><input id="txtAleDescripcion" name="txtAleDescripcion" class="easyui-textbox" data-options="required:true" style="width:100%;padding:5px"></td>
            </tr>
            <tr>
                <td>Composici&oacute;n qu&iacute;mica:</td>
                <td><input id="txtAleComposicion" name="txtAleComposicion" class="easyui-textbox" data-options="required:true" style="width:100%"></td>
            </tr>


        </table>
        <div style="margin-bottom:5px"></div>
        <div align="center">

            <button id="btnAltaAleacion" type="button" onclick="guardaAleacion()" class="btn btn-primary">GUARDAR</button>
            <button id="btnEditAleacion" type="button" onclick="guardaAleacion()" class="btn btn-primary">ACTUALIZAR</button>


        </div>
        <div style="margin-bottom:10px">
        </div>






        <!--<TABLE BORDER=1 CELLPADDING=45 align="center">
            <TR>
                <TD>
                    <input id="txtAleClave" name="txtAleClave" label="Aleación" class="easyui-textbox" prompt="Aleación" data-options="" style="width:380px">
                    <BR>
                </TD>
            </TR>
            <TR>
                <TD>
                    <input id="txtAleDescripcion" name="txtAleDescripcion" label="Descripción" class="easyui-textbox" prompt="Descripción" data-options="" style="width:380px">
                    <BR>
                </TD>
            </TR>
            <TR>
                <TD>
                    <input id="txtAleComposicion" name="txtAleComposicion" label="Composición Química" class="easyui-textbox" prompt="Composición Química" data-options="" style="width:380px">
                    <BR>
                </TD>
            </TR>

            <TR>
                <TD>
                    <div align="center">
                    <div class="btn-group btn-group-lg" role="group" aria-label="...">
                        <button id="btnAltaEditAleacion" type="button" onclick="guardaAleacion()" class="btn btn-primary btn-sm">ACTUALIZAR</button>
                    </div>
                    </div>
                </TD>

            </TR>
        </TABLE>-->
    </form>

</div>
<!-- ******************************** -->



<script>
    $(document).ready(function () {

        $('#dgAleaciones').datagrid('reload');    // reload the user data

    });

    function btnBuscarFamilia() {


        $('#dgAleaciones').datagrid('reload');


    }


    function abrirModalEdicionALeacion(tipoOperacion) {
        switch (tipoOperacion) {
            case "EDICIONALEACION":
                $('#tipoOperacionAleaciones').val("EDICIONALEACION");
                var row = $('#dgAleaciones').datagrid('getSelected');
                if (row) {
                    //guardaAleacion();
                    $('#dlgAleaciones').dialog('open').dialog('setTitle', 'Editar Aleacion');
                    $('#fmEditarAleacion').form('load', row);
                    $('#txtAleClave').textbox("setValue", row.clave_aleacion);
                    $('#txtAleDescripcion').textbox("setValue", row.descripcion_aleacion);
                    $('#txtAleComposicion').textbox("setValue", row.comp_quimica_aleacion);
                    $('#btnAltaAleacion').hide();
                    $('#btnEditAleacion').show();


                }
                else {
                    $.messager.alert({
                        title: 'Atenci&oacute; n',
                        icon: 'info',
                        msg: 'Debe seleccionar un registro dando click sobre el  para poder editarlo.',
                        fn: function () {

                            $('#dgAleaciones').datagrid('reload');


                        }
                    });
                }
                break;

            case "ALTAALEACION":
                $('#fmEditarFamilia').form('clear');
                $('#tipoOperacionAleaciones').val("ALTAALEACION");
                $('#dlgAleaciones').dialog('open').dialog('setTitle', 'Nueva Aleaci&oacute;n');
                $('#fmEditarAleacion').form('load');
                $('#btnEditAleacion').hide();
                $('#btnAltaAleacion').show();
                break;
        }

    }// FIN

    function guardaAleacion() {
        var tipoOperacionGuardado = $('#tipoOperacionAleaciones').val();
        switch (tipoOperacionGuardado) {
            case "EDICIONALEACION":
                var claveTxt = $('#txtAleClave').val();
                var descTxt = $('#txtAleDescripcion').val();
                var compTxt = $('#txtAleComposicion').val();

                if (claveTxt != '') {
                    if (descTxt != '') {
                        if (compTxt != '') {
                            var dataSelectedContent = 'ID=' + $('#dgAleaciones').datagrid('getSelected').id_aleacion + '&Clave=' + claveTxt + '&Descripcion=' + descTxt + '&Composicion=' + compTxt + '&TipoOperacion=' + tipoOperacionGuardado;

                            $.ajax(
                            {
                                url: 'php/binding/Aleaciones/updateCatAleaciones.php',
                                type: 'post',
                                dataType: "json",
                                data: dataSelectedContent,
                                success: function (request) {
                                    confirmaOperacionAleacion('EDICION');
                                },
                                error: function (request, settings) {
                                    confirmaOperacionAleacion('ERROR');
                                }
                            });
                        } else {
                            $.messager.alert('Atenci&oacute;n', 'La composici&oacute;n es un valor requerido.', 'info');
                        }
                    } else {
                        $.messager.alert('Atenci&oacute;n', 'La descripci&oacute;n es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atenci&oacute;n', 'La clave de la aleaci&oacute;n es un valor requerido.', 'info');
                }

              

                break;
            case "ALTAALEACION":
                var claveTxt = $('#txtAleClave').val();
                var descTxt = $('#txtAleDescripcion').val();
                var compTxt = $('#txtAleComposicion').val();


                if (claveTxt != '') {
                    if (descTxt != '') {
                        if (compTxt != '') {
                            var dataSelectedContent = 'Clave=' + claveTxt + '&Descripcion=' + descTxt + '&Composicion=' + compTxt + '&TipoOperacion=' + tipoOperacionGuardado;
                            $.ajax(
                            {
                                url: 'php/binding/Aleaciones/updateCatAleaciones.php',
                                type: 'post',
                                dataType: "json",
                                data: dataSelectedContent,
                                success: function (request) {
                                    confirmaOperacionAleacion('GUARDADO');

                                },
                                error: function (request, settings) {
                                    confirmaOperacionAleacion('ERROR');
                                }
                            });
                        } else {
                            $.messager.alert('Atenci&oacute;n', 'La composici&oacute;n es un valor requerido.', 'info');
                        }
                    } else {
                        $.messager.alert('Atenci&oacute;n', 'La descripci&oacute;n es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atenci&oacute;n', 'La clave de la aleaci&oacute;n es un valor requerido.', 'info');
                }
                
                break;
        }


    }


    function EliminarAleacion() {
        var row = $('#dgAleaciones').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirma', '&iquest;Est&aacute;s seguro de eliminarlo?', function (r) {
                if (r) {
                    $.post('php/binding/Aleaciones/deleteCatAleaciones.php', { id_aleacion: row.id_aleacion }, function (result) {
                        if (result.success) {
                            confirmaOperacionAleacion('BORRADO');	// reload the user data
                        } else {
                            confirmaOperacionAleacion('ERROR');
                        }
                    }, 'json');
                }
            });
        } else {
            $.messager.alert({
                title: 'Atenci&oacute;n',
                icon: 'info',
                msg: 'Debe seleccionar un registro dando click sobre el  para poder editarlo.',
                fn: function () {

                    $('#dgAleaciones').datagrid('reload');


                }
            });
        }
    }
    function confirmaOperacionAleacion(tipoOperacion) {

        switch (tipoOperacion) {
            case "GUARDADO":

                //$.messager.alert('Operación','¡Cliente guardado exitosamente!','info');
                $('#dlgAleaciones').dialog('close');
                $('#fmEditarAleacion').form('clear');

                $.messager.alert({
                    title: 'Operaci&oacute;n',
                    msg: '&iexcl;Aleaci&oacute;n guardada exitosamente!',
                    fn: function () {

                        $('#dgAleaciones').datagrid('reload');

                    }


                });
                break;
                //Operación de edición.
            case "EDICION":

                $('#dlgAleaciones').dialog('close');
                $('#fmEditarAleacion').form('clear');

                $.messager.alert({
                    title: 'Operaci&oacute;n',
                    msg: '&iexcl;Aleaci&oacute;n actualizada exitosamente!',
                    fn: function () {

                        $('#dgAleaciones').datagrid('reload');

                    }


                });

                break;
                //Fin de operación de edición.
            case "BORRADO":

                $.messager.alert({
                    title: 'Operaci&oacute;n',
                    msg: '&iexcl;Aleaci&oacute;n eliminada exitosamente!',
                    fn: function () {

                        $('#dgAleaciones').datagrid('reload');


                    }


                });

                break;

            case "ERROR":

                $('#dlgAleaciones').dialog('close');
                $('#fmEditarAleacion').form('clear');


                $.messager.alert({
                    title: 'Operaci&oacute;n',
                    icon: 'warning',
                    msg: '¡Verifique que la operación sea correcta!',
                    fn: function () {

                        $('#dgAleaciones').datagrid('reload');


                    }


                });

                break;
        }


    }


</script>
