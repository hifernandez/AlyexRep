<input id="tipoOperacionTemples" type="hidden" value="" />
<table id="dgTemples" title="Temples" class="easyui-datagrid" style="width:auto;height:450px;"
       url="php/binding/Temple/getCatTemple.php"
       toolbar="#toolTemples"
       rownumbers="true"
       fitColumns="true"
       singleSelect="true"
       pagination="true"
       loadMsg="Cargando información...">
    <thead>
        <tr>
            <!--<th field="ck" checkbox="true" ></th>-->
            <th data-options="field:'id_temple'" hidden></th>
            <th data-options="field:'clave_temple',width:30">Temple</th>
            <th data-options="field:'descripcion_temple',width:30,editor:'text'">Descripción</th>
            <th data-options="field:'temperatura_temple',width:10,editor:'text'">Temperatura</th>
            <th data-options="field:'hrs_temple',width:10,editor:'text'">Horas</th>
            <th data-options="field:'dureza_inf_temple',width:10,editor:'text'">Dureza Inf</th>
            <th data-options="field:'dureza_sup_temple',width:10,editor:'text'">Dureza Sup</th>
        </tr>
    </thead>
</table>

<!--Cargando la barra de edición y busqueda-->
<div id="toolTemples">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEdicionTemple('ALTATEMPLE')">Alta de temple</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEdicionTemple('EDICIONTEMPLE')">Editar temple</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="EliminarTemple()">Eliminar temple</a>
    <!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="muestraWord()">Reporte del temple</a>-->
    <br>
    <!--Busqueda de elementos-->
    <!--	<TABLE BORDER=0 WIDTH=100 CELLPADDING=15 align="center">
            <TR>
                <TD >
                    <input id="bscTempClave" label="Clave" class="easyui-textbox" prompt="Clave" data-options="" style="width:300px">
                </TD>

                <TD>
                    <input id="bscTempDesc" label="Descripción" class="easyui-textbox" prompt="Descripción" data-options="" style="width:300px">
                </TD>

                <TD>
                    <div class="btn-group btn-group-lg" role="group" aria-label="...">
                        <button type="button" onclick="btnBuscarTemples()" class="btn btn-primary btn-sm">BUSCAR</button>
                    </div>
                </TD>
            </TR>
        </TABLE>-->
</div>



<!-- MODAL PARA MOSTRAR EN LA AGREGACIÓN -->
<div id="dlgTemples" class="easyui-dialog" style="width:auto"
     closed="true" modal="true">
    <form id="fmEditarTemple" method="post" novalidate style="margin:0;padding:20px 50px">
        <div style="margin-bottom:5px;font-size:14px;border-bottom:1px solid #ccc">Datos de temple:</div>
        <TABLE>
            <TR>
                <td>Clave:</td>
                <TD>
                    <input id="txtTemClave" name="txtTemClave" class="easyui-textbox" data-options="required:true" style="width:100%;padding:5px">
                </TD>
            </TR>
            <div style="margin-bottom:3px"></div>
            <TR>
                <td>Descripción:</td>
                <TD>
                    <input id="txtTemDescripcion" name="txtTemDescripcion" class="easyui-textbox" data-options="required:true"  style="width:100%;padding:5px">
                </TD>
            </TR>
            <div style="margin-bottom:3px"></div>
            <TR>
                <td>Temperatura:</td>
                <TD>
                    <input id="txtTemTemperatura" name="txtTemTemperatura" class="easyui-numberbox" data-options="required:true"  style="width:100%;padding:5px">
                </TD>
            </TR>
            <div style="margin-bottom:3px"></div>
            <TR>
                <td>Horas:</td>
                <TD>
                    <input id="txtTemHoras" name="txtTemHoras" class="easyui-numberbox" data-options="required:true"  style="width:100%;padding:5px">
                    <BR>
                </TD>
            </TR>
            <div style="margin-bottom:3px"></div>
            <TR>
                <td>Dureza inferior:</td>
                <TD>
                    <input id="txtTemDurezaInf" name="txtTemDurezaInf" class="easyui-numberbox" data-options="required:true"  style="width:100%;padding:5px">
                </TD>
            </TR>
            <div style="margin-bottom:3px"></div>
            <TR>
                <td>Dureza superior:</td>
                <TD>
                    <input id="txtTemDurezaSup" name="txtTemDurezaSup" class="easyui-numberbox" data-options="required:true"  style="width:100%;padding:5px">
                </TD>
            </TR>

        </TABLE>
        <div style="margin-bottom:5px">
        </div>
        <div align="center">
            <button id="btnEditTemple" type="button" onclick="guardaTemple()" class="btn btn-primary">ACTUALIZAR</button>
            <button id="btnAltaTemple" type="button" onclick="guardaTemple()" class="btn btn-primary">GUARDAR</button>
        </div>
        <div style="margin-bottom:10px">
        </div>
    </form>
</div>
<!-- ******************************** -->



<script>
    $(document).ready(function () {

        $('#dgTemples').datagrid('reload');    // reload the user data

    });

    function btnBuscarFamilia() {


        $('#dgTemples').datagrid('reload');


    }
    function abrirModalEdicionTemple(tipoOperacion) {
        switch (tipoOperacion) {
            case "EDICIONTEMPLE":
                $('#tipoOperacionTemples').val("EDICIONTEMPLE");
                var row = $('#dgTemples').datagrid('getSelected');
                if (row) {
                    //guardaTemple();
                    $('#dlgTemples').dialog('open').dialog('setTitle', 'Editar temple');
                    $('#fmEditarTemple').form('load', row);
                    $('#txtTemClave').textbox("setValue", row.clave_temple);
                    $('#txtTemDescripcion').textbox("setValue", row.descripcion_temple);
                    $('#txtTemTemperatura').textbox("setValue", row.temperatura_temple);
                    $('#txtTemHoras').textbox("setValue", row.hrs_temple);
                    $('#txtTemDurezaInf').textbox("setValue", row.dureza_inf_temple);
                    $('#txtTemDurezaSup').textbox("setValue", row.dureza_sup_temple);
                    $('#btnEditTemple').show();
                    $('#btnAltaTemple').hide();

                }
                else {
                    $.messager.alert('Error de edición', 'Debe seleccionar un producto dando clic sobre el registro para poder editarlo!', 'info');
                }
                break;

            case "ALTATEMPLE":
                $('#fmEditarTemple').form('clear');
                $('#tipoOperacionTemples').val("ALTATEMPLE");
                $('#dlgTemples').dialog('open').dialog('setTitle', 'Nuevo temple');
                $('#fmEditarTemple').form('load');
                $('#btnEditTemple').hide();
                $('#btnAltaTemple').show();
                break;
        }

    }// FIN

    function guardaTemple() {
        var tipoOperacionGuardado = $('#tipoOperacionTemples').val();
        switch (tipoOperacionGuardado) {
            case "EDICIONTEMPLE":

                var claveTxt = $('#txtTemClave').val();
                var descTxt = $('#txtTemDescripcion').val();
                var temTxt = $('#txtTemTemperatura').val();
                var hrsTxt = $('#txtTemHoras').val();
                var infTxt = $('#txtTemDurezaInf').val();
                var supTxt = $('#txtTemDurezaSup').val();

                if (claveTxt != '') {
                    if (descTxt != '') {
                        if (temTxt != '') {
                            if (hrsTxt != '') {
                                if (infTxt != '') {
                                    if (supTxt != '') {
                                        var dataSelectedContent = 'ID=' + $('#dgTemples').datagrid('getSelected').id_temple + '&Clave=' + claveTxt + '&Descripcion=' + descTxt + '&Temperatura=' + temTxt + '&Horas=' + hrsTxt + '&Inferior=' + infTxt + '&Superior=' + supTxt + '&TipoOperacion=' + tipoOperacionGuardado;
                                        //var dataSelectedContent = 'ID=' + row.id_temple +'&Clave='+row.clave_temple+'&Descripcion='+row.descripcion_temple+'&Temperatura='+row.temperatura_temple+'&Horas='+row.hrs_temple+'&Inferior='+row.dureza_inf_temple+'&Superior='+row.dureza_sup_temple+'&TipoOperacion='+tipoOperacionGuardado;

                                        //alert ('El valor de Data =' + dataSelectedContent);
                                        //alert(request.Clave+" "+request.Descripcion);

                                        $.ajax(
                                        {
                                            url: 'php/binding/Temple/updateCatTemple.php',
                                            type: 'post',
                                            dataType: "json",
                                            data: dataSelectedContent,
                                            success: function (request) {
                                                //	alert(request.responseText);
                                                $.messager.alert({
                                                    title: 'Operación',
                                                    msg: '¡Temple actualizado exitosamente!',



                                                });
                                                $('#dlgTemples').dialog('close');
                                                $('#dgTemples').datagrid('reload');

                                            },
                                            error: function (request, settings) {
                                                //alert(request.responseText);
                                            }
                                        });
                                    } else {
                                        $.messager.alert('Atención', 'La dureza superior es un valor requerido.', 'info');
                                    }
                                } else {
                                    $.messager.alert('Atención', 'La dureza inferior es un valor requerido.', 'info');
                                }
                            } else {
                                $.messager.alert('Atención', 'Las horas son un valor requerido.', 'info');
                            }
                        } else {
                            $.messager.alert('Atención', 'La temperatura es un valor requerido.', 'info');
                        }
                    } else {
                        $.messager.alert('Atención', 'La descripción es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atención', 'La clave del temple es un valor requerido.', 'info');
                }

               
                break;
            case "ALTATEMPLE":
                //alert("Entre al CASE Edicion Temple");
                //alert("El valor de TipoOperacion es: "+ tipoOperacionGuardado);
                var row = $('#dgTemples').datagrid('getSelected');
                var claveTxt = $('#txtTemClave').val();
                var descTxt = $('#txtTemDescripcion').val();
                var temTxt = $('#txtTemTemperatura').val();
                var hrsTxt = $('#txtTemHoras').val();
                var infTxt = $('#txtTemDurezaInf').val();
                var supTxt = $('#txtTemDurezaSup').val();

                if (claveTxt != '') {
                    if (descTxt != '') {
                        if (temTxt != '') {
                            if (hrsTxt != '') {
                                if (infTxt != '') {
                                    if (supTxt != '') {
                                        var dataSelectedContent = 'Clave=' + claveTxt + '&Descripcion=' + descTxt + '&Temperatura=' + temTxt + '&Horas=' + hrsTxt + '&Inferior=' + infTxt + '&Superior=' + supTxt + '&TipoOperacion=' + tipoOperacionGuardado;

                                        //alert ('El valor de Data =' + row.id_temple);
                                        //alert(dataSelectedContent);

                                        $.ajax(
                                        {
                                            url: 'php/binding/Temple/updateCatTemple.php',
                                            type: 'post',
                                            dataType: "json",
                                            data: dataSelectedContent,
                                            success: function (request) {
                                                $.messager.alert({
                                                    title: 'Operación',
                                                    msg: '¡Temple guardado exitosamente!',
                                                });
                                                $('#dlgTemples').dialog('close');
                                                $('#dgTemples').datagrid('reload');
                                            },
                                            error: function (request, settings) {
                                                //alert(request.responseText);
                                            }
                                        });
                                       
                                    } else {
                                        $.messager.alert('Atención', 'La dureza superior es un valor requerido.', 'info');
                                    }
                                } else {
                                    $.messager.alert('Atención', 'La dureza inferior es un valor requerido.', 'info');
                                }
                            } else {
                                $.messager.alert('Atención', 'Las horas son un valor requerido.', 'info');
                            }
                        } else {
                            $.messager.alert('Atención', 'La temperatura es un valor requerido.', 'info');
                        }
                    } else {
                        $.messager.alert('Atención', 'La descripción es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atención', 'La clave del temple es un valor requerido.', 'info');
                }
                break;
        }
    }

    function EliminarTemple() {
        var row = $('#dgTemples').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirma', 'Estás seguro de eliminarlo?', function (r) {
                if (r) {
                    $.post('php/binding/Temple/deleteCatTemple.php', { id_temple: row.id_temple }, function (result) {
                        if (result.success) {
                            $('#dgTemples').datagrid('reload');
                            $.messager.alert({
                                title: 'Operación',
                                msg: '¡Temple borrado exitosamente!',

                            });// reload the user data
                        } else {
                            $.messager.alert({	// show error message
                                title: 'Error',
                                msg: "No se puede elimnar, está relacionado a un producto"
                            });
                        }
                    }, 'json');
                }
            });
        }
    }

    /*$.extend($.fn.datagrid.methods, {
        editCell: function(jq,param){
            return jq.each(function(){
                var opts = $(this).datagrid('options');
                var fields = $(this).datagrid('getColumnFields',true).concat($(this).datagrid('getColumnFields'));
                for(var i=0; i<fields.length; i++){
                    var col = $(this).datagrid('getColumnOption', fields[i]);
                    col.editor1 = col.editor;
                    if (fields[i] != param.field){
                        col.editor = null;
                    }
                }
                $(this).datagrid('beginEdit', param.index);
                var ed = $(this).datagrid('getEditor', param);
                if (ed){
                    if ($(ed.target).hasClass('textbox-f')){
                        $(ed.target).textbox('textbox').focus();
                    } else {
                        $(ed.target).focus();
                    }
                }
                for(var i=0; i<fields.length; i++){
                    var col = $(this).datagrid('getColumnOption', fields[i]);
                    col.editor = col.editor1;
                }
            });
        },
        enableCellEditing: function(jq){
            return jq.each(function(){
                var dg = $(this);
                var opts = dg.datagrid('options');
                opts.oldOnClickCell = opts.onClickCell;
                opts.onClickCell = function(index, field){
                    if (opts.editIndex != undefined){
                        if (dg.datagrid('validateRow', opts.editIndex)){
                            dg.datagrid('endEdit', opts.editIndex);
                            opts.editIndex = undefined;
                        } else {
                            return;
                        }
                    }
                    dg.datagrid('selectRow', index).datagrid('editCell', {
                        index: index,
                        field: field
                    });
                    opts.editIndex = index;
                    opts.oldOnClickCell.call(this, index, field);
                }
            });
        }
    });

    $(function(){
        $('#dgTemples').datagrid().datagrid('enableCellEditing');
    })*/


</script>
