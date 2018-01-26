<input id="tipoOperacionLongitudes" type="hidden" value="" />
<table id="dgLongitudes" title="Longitudes" class="easyui-datagrid" style="width:auto;height:450px;"
       url="php/binding/Longitud/getCatLongitudes.php" ;
       toolbar="#toolLongitudes"
       rownumbers="true"
       fitColumns="true"
       singleSelect="true"
       pagination="true"
       loadMsg="Cargando información...">
    <thead>
        <tr>
            <!--<th field="ck" checkbox="true" ></th>-->
            <th data-options="field:'id_longitud'" hidden></th>
            <th data-options="field:'clave_longitud',width:33">Longitud</th>
            <th data-options="field:'descripcion_longitud',width:33">Descripción</th>
            <th data-options="field:'metros_longitud',width:33">Valor de longitud</th>
        </tr>
    </thead>
</table>

<!--Cargando la barra de edición y busqueda-->
<div id="toolLongitudes">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEdicionLongitud('ALTALONGITUD')">Alta de longitud</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEdicionLongitud('EDICIONLONGITUD')">Editar longitud</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="EliminarUsuario()">Eliminar longitud</a>
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="muestraWord()">Reporte del familia</a>-->
    <br>
    <!--Busqueda de elementos-->
    <!--	<TABLE BORDER=0 WIDTH=100 CELLPADDING=15 align="center">
            <TR>
                <TD >
                    <input id="bscLonLong" label="Longitud" class="easyui-textbox" prompt="Longitud" data-options="" style="width:300px">
                </TD>

                <TD>
                    <input id="bscLonDesc" label="Descripción" class="easyui-textbox" prompt="Descripción" data-options="" style="width:300px">
                </TD>
                <TD>
                    <div class="btn-group btn-group-lg" role="group" aria-label="...">
                        <button type="button" onclick="btnBuscarFamilia()" class="btn btn-primary btn-sm">BUSCAR</button>
                    </div>
                </TD>
            </TR>
        </TABLE>-->
</div>



<!-- MODAL PARA MOSTRAR EN LA AGREGACIÓN -->
<div id="dlgLongitud" class="easyui-dialog" style="width:auto"
     closed="true" modal="true">
    <form id="fmEditarLongitud" method="post" novalidate style="margin:0;padding:20px 50px">
        <div style="margin-bottom:5px;font-size:14px;border-bottom:1px solid #ccc">Datos de longitud:</div>
        <TABLE>
            <TR>
                <td>Clave: </td>
                <TD>
                    <input id="txtLonClave" name="txtLonClave" class="easyui-textbox" data-options="required:true" style="width:100%;padding:5px">
                    <BR>
                </TD>
            </TR>
            <div style="margin-bottom:3px"></div>
            <TR>
                <td>Desripción:</td>
                <TD>
                    <input id="txtLonDescripcion" name="txtLonDescripcion" class="easyui-textbox" data-options="required:true"style="width:100%;padding:5px">
                    <BR>
                </TD>
            </TR>
            <div style="margin-bottom:3px"></div>
            <TR>
                <td>Longitud en dígito:</td>
                <TD>
                    <input id="txtLonMetros" name="txtLonMetros" class="easyui-numberbox" data-options="min:0,precision:2, required:true" style="width:100%;padding:5px">
                    <BR>
                </TD>
            </TR>
        </TABLE>
        <div style="margin-bottom:5px">
        </div>
        <div align="center">
            <button id="btnEditLongitud" type="button" onclick="guardaLongitud()" class="btn btn-primary">Actualizar</button>
            <button id="btnAltaLongitud" type="button" onclick="guardaLongitud()" class="btn btn-primary">Guarda</button>
        </div> 
        <div style="margin-bottom:10px">
        </div>
    </form>
</div>
<!-- ******************************** -->



<script>
    $(document).ready(function () {
        $('#dgLongitudes').datagrid('reload');    // reload the user data
    });

    function btnBuscarFamilia() {
        $('#dgLongitudes').datagrid('reload');
    }


    function abrirModalEdicionLongitud(tipoOperacion) {
        switch (tipoOperacion) {
            case "EDICIONLONGITUD":
                $('#tipoOperacionLongitudes').val("EDICIONLONGITUD");
                var row = $('#dgLongitudes').datagrid('getSelected');
                if (row) {
                    //guardaLongitud();
                    $('#dlgLongitud').dialog('open').dialog('setTitle', 'Editar Longitud');
                    $('#fmEditarLongitud').form('load', row);
                    $('#txtLonClave').textbox("setValue", row.clave_longitud);
                    $('#txtLonDescripcion').textbox("setValue", row.descripcion_longitud);
                    $('#txtLonMetros').numberbox("setValue", row.metros_longitud);
                    $('#btnAltaLongitud').hide();
                    $('#btnEditLongitud').show();
                }
                else {
                    $.messager.alert('Error de edición', 'Debe seleccionar un producto dando clic sobre el registro para poder editarlo!', 'info');
                }
                break;

            case "ALTALONGITUD":
                $('#fmEditarLongitud').form('clear');
                $('#tipoOperacionLongitudes').val("ALTALONGITUD");
                $('#dlgLongitud').dialog('open').dialog('setTitle', 'Nueva Longitud');
                $('#fmEditarLongitud').form('load');
                $('#btnAltaLongitud').show();
                $('#btnEditLongitud').hide();
                break;

        }

    }// FIN

    function guardaLongitud() {
        var tipoOperacionGuardado = $('#tipoOperacionLongitudes').val();
        //alert("El valor de TipoOperacion es: "+ tipoOperacionGuardado);
        switch (tipoOperacionGuardado) {
            case "EDICIONLONGITUD":
                //alert("El valor de TipoOperacion es: "+ tipoOperacionGuardado);
                var claveTxt = $('#txtLonClave').val();
                var descTxt = $('#txtLonDescripcion').val();
                var subTxt = $('#txtLonMetros').val();

                if (claveTxt != '') {
                    if (descTxt != '') {
                        if (subTxt != '') {
                            var dataSelectedContent = 'ID=' + $('#dgLongitudes').datagrid('getSelected').id_longitud + '&Clave=' + claveTxt + '&Descripcion=' + descTxt + '&Metros=' + subTxt + '&TipoOperacion=' + tipoOperacionGuardado;
                            //var dataSelectedContent = 'ID=' + row.id_familia +'&Clave='+row.clave_familia+'&Descripcion='+row.descripcion_familia+'&SubFamilia='+row.subfamilia_familia+'&TipoOperacion='+tipoOperacionGuardado;

                            //alert ('El valor de Row =' + row.id_familia);
                            //alert(dataSelectedContent);

                            $.ajax(
                            {
                                url: 'php/binding/Longitud/updateCatLongitudes.php',
                                type: 'post',
                                dataType: "json",
                                data: dataSelectedContent,
                                success: function (request) {
                                    $.messager.alert({
                                        title: 'Operación',
                                        msg: '¡Longitud actualizada exitosamente!',
                                    });
                                    $('#dlgLongitud').dialog('close');
                                    $('#dgLongitudes').datagrid('reload');
                                },
                                error: function (request, settings) {
                                    //alert(request.responseText);
                                }
                            });
                        } else {
                            $.messager.alert('Atención', 'El valor númerico es un valor requerido.', 'info');
                        }
                    } else {
                        $.messager.alert('Atención', 'La descripción de la longitud es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atención', 'La clave de la longitud es un valor requerido.', 'info');
                }
                
               
                break;
            case "ALTALONGITUD":
                var claveTxt = $('#txtLonClave').val();
                var descTxt = $('#txtLonDescripcion').val();
                var subTxt = $('#txtLonMetros').val();

                if (claveTxt != '') {
                    if (descTxt != '') {
                        if (subTxt != '') {
                            var dataSelectedContent = 'Clave=' + claveTxt + '&Descripcion=' + descTxt + '&Metros=' + subTxt + '&TipoOperacion=' + tipoOperacionGuardado;

                            $.ajax(
                            {
                                url: 'php/binding/Longitud/updateCatLongitudes.php',
                                type: 'post',
                                dataType: "json",
                                data: dataSelectedContent,
                                success: function (request) {
                                    $.messager.alert({
                                        title: 'Operación',
                                        msg: '¡Longitud guardada exitosamente!',
                                    });
                                    $('#dlgLongitud').dialog('close');
                                    $('#dgLongitudes').datagrid('reload');
                                },
                                error: function (request, settings) {
                                    //alert(request.responseText);
                                }
                            });
                            
                        } else {
                            $.messager.alert('Atención', 'El valor númerico es un valor requerido.', 'info');
                        }
                    } else {
                        $.messager.alert('Atención', 'La descripción de la longitud es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atención', 'La clave de la longitud es un valor requerido.', 'info');
                }
               
                break;
        }

    }


    function EliminarUsuario() {
        var row = $('#dgLongitudes').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirma', 'Estás seguro de eliminarlo?', function (r) {
                if (r) {
                    $.post('php/binding/Longitud/deleteCatLongitudes.php', { id_longitud: row.id_longitud }, function (result) {
                        if (result.success) {
                            $('#dgLongitudes').datagrid('reload');	// reload the user data
                        } else {
                            $.messager.show({	// show error message
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        }
                        $.messager.alert({
                            title: 'Operación',
                            msg: '¡Longitud eliminada exitosamente!',



                        });
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
            $('#dgLongitudes').datagrid().datagrid('enableCellEditing');
        })*/
</script>
