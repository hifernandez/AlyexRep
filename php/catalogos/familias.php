<input id="tipoOperacionFamilias" type="hidden" value="" />
<table id="dgFamilias" title="Familias" class="easyui-datagrid" style="width:auto;height:450px;"
       url="php/binding/Familia/getCatFamilias.php" ;
       toolbar="#toolFamilias"
       rownumbers="true"
       fitColumns="true"
       singleSelect="true"
       pagination="true"
       loadMsg="Cargando información...">
    <thead>
        <tr>
            <!--<th field="ck" checkbox="true" ></th>-->
            <th data-options="field:'id_familia'" hidden></th>
            <th data-options="field:'id_subfamilia'" hidden></th>
            <th data-options="field:'clave_familia',width:33">Familia</th>
            <th data-options="field:'descripcion_familia',width:33,editor:'text'">Descripción</th>
            <th data-options="field:'descripcion_subfamilia',width:33, editor:'text'">SubFamilia</th>
        </tr>
    </thead>
</table>

<!--Cargando la barra de edición y busqueda-->
<div id="toolFamilias">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEdicionFamilia('ALTAFAMILIA')">Alta de familia</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEdicionFamilia('EDICIONFAMILIA')">Editar familia</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="EliminarFamilia()">Eliminar familia</a>
    <!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="muestraWord()">Reporte del familia</a>-->
    <br>
    <!--Busqueda de elementos-->
    <!--<TABLE BORDER=0 WIDTH=100 CELLPADDING=15 align="center">
        <TR>
            <TD >
                <input id="bscFamClave" label="Familia" class="easyui-textbox" prompt="Familia" data-options="" style="width:300px">
            </TD>
            <TD>
                <input id="bscFamDesc" label="Descripción" class="easyui-textbox" prompt="Descripción" data-options="" style="width:300px">
            </TD>
            <TD>
                <input id="bscFamSubF" label="SubFamilia" class="easyui-textbox" prompt="SubFamilia" data-options="" style="width:300px">
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
<div id="dlgFamilias" class="easyui-dialog" style="width:300px;height:auto;padding:10px 20px"
     closed="true" buttons="#dlg-buttons">
    <form id="fmEditarFamilia" method="post" novalidate>
        <div style="margin-bottom:5px;font-size:14px;border-bottom:1px solid #ccc">Datos de la Familia:</div>
        <div style="margin-bottom:5px"></div>
        <table>
            <tr>
                <td>Clave:</td>
                <td>
                    <input id="txtFamClave" name="txtFamClave" class="easyui-textbox" data-options="required:true" style="width:100%;padding:5px" />
                </td>

            </tr>
            <tr>
                <td>Descripción:</td>
                <td><input id="txtFamDescripcion" name="txtFamDescripcion" class="easyui-textbox" data-options="required:true" style="width:100%;padding:5px"></td>
            </tr>
            <tr>
                <td>Subfamilia:</td>
                <td>
                    <input id="txtFamSubFamilia" class="easyui-combobox" name="txtFamSubFamilia" style="width:100%;" data-options="
                           required:true,
                           url: 'php/binding/Familia/SubFamilia/getCatSubFamilias.php' ,
                           valueField: 'id_subfamilia' ,
                           textField: 'descripcion_subfamilia'
                           ">
                </td>
            </tr>

        </table>
        <div style="margin-bottom:5px"></div>
        <div align="center">

            <button id="btnAltaEditFamilia" type="button" onclick="guardaFamilia()" class="btn btn-primary">ACTUALIZAR</button>

        </div>
        <div style="margin-bottom:10px">
        </div>

    </form>
</div>
<!-- ******************************** -->



<script>
    $(document).ready(function () {
        $('#dgFamilias').datagrid('reload');    // reload the user data
    });

    function btnBuscarFamilia() {
        $('#dgFamilias').datagrid('reload');
    }


    function abrirModalEdicionFamilia(tipoOperacion) {
        switch (tipoOperacion) {
            case "EDICIONFAMILIA":
                $('#tipoOperacionFamilias').val("EDICIONFAMILIA");
                var row = $('#dgFamilias').datagrid('getSelected');
                if (row) {
                    //guardaFamilia();
                    $('#dlgFamilias').dialog('open').dialog('setTitle', 'Editar Familia');
                    $('#fmEditarFamilia').form('load', row);
                    $('#txtFamClave').textbox("setValue", row.clave_familia);
                    $('#txtFamDescripcion').textbox("setValue", row.descripcion_familia);
                    $('#txtFamSubFamilia').combobox("setValue", row.id_subfamilia);
                }
                else {
                    $.messager.alert({
                        title: 'Atención',
                        icon: 'info',
                        msg: 'Debe seleccionar un registro dando click sobre el  para poder editarlo.',
                        fn: function () {

                            $('#dgFamilias').datagrid('reload');


                        }
                    });
                }
                break;

            case "ALTAFAMILIA":
                $('#fmEditarFamilia').form('clear');
                $('#tipoOperacionFamilias').val("ALTAFAMILIA");
                $('#dlgFamilias').dialog('open').dialog('setTitle', 'Nueva familia');
                $('#fmEditarFamilia').form('load');

                $("#btnAltaEditFamilia").html('GUARDAR');
                break;

        }

    }// FIN

    function guardaFamilia() {
        var tipoOperacionGuardado = $('#tipoOperacionFamilias').val();
        //alert("El valor de TipoOperacion es: "+ tipoOperacionGuardado);
        switch (tipoOperacionGuardado) {
            case "EDICIONFAMILIA":
                //alert("Entre al CASE Edicion Familia");
                //alert("El valor de TipoOperacion es: "+ tipoOperacionGuardado);
                var row = $('#dgFamilias').datagrid('getSelected');
                var claveTxt = $('#txtFamClave').val();
                var descTxt = $('#txtFamDescripcion').val();
                var subTxt = $('#txtFamSubFamilia').val();
                if (claveTxt != '') {
                    if (descTxt != '') {
                        if (subTxt != '') {
                            var dataSelectedContent = 'ID=' + row.id_familia + '&Clave=' + claveTxt + '&Descripcion=' + descTxt + '&SubFamilia=' + subTxt + '&TipoOperacion=' + tipoOperacionGuardado;

                            //alert ('El valor de Row =' + row.id_familia);
                            //alert(dataSelectedContent);

                            $.ajax(
                            {
                                url: 'php/binding/Familia/updateCatFamilias.php',
                                type: 'post',
                                dataType: "json",
                                data: dataSelectedContent,
                                success: function (request) {
                                    //alert(request.responseText);
                                    confirmaOperacionfamilia("EDICION");
                                },
                                error: function (request, settings) {
                                    //alert(request.responseText);
                                    confirmaOperacionfamilia("ERROR");
                                }
                            });
                        }
                        else {
                            $.messager.alert('Atención', 'La subfamilia es un valor requerido.', 'info');
                        }
                    }
                    else {
                        $.messager.alert('Atención', 'La clave descripción es un valor requerido.', 'info');
                    }
                }
                else {
                    $.messager.alert('Atención', 'La clave de la familia es un valor requerido.', 'info');
                }
                

                break;
            case "ALTAFAMILIA":
                //alert("Se guardo correctamente la nueva familia");
                //var row = $('#dgFamilias').datagrid('getSelected');
                var claveTxt = $('#txtFamClave').val();
                var descTxt = $('#txtFamDescripcion').val();
                var subTxt = $('#txtFamSubFamilia').val();

                if (claveTxt != '') {
                    if (descTxt != '') {
                        if (subTxt != '') {
                            var dataSelectedContent = 'Clave=' + claveTxt + '&Descripcion=' + descTxt + '&SubFamilia=' + subTxt + '&TipoOperacion=' + tipoOperacionGuardado;

                            //alert ("El valor de dataSelectedContent ="+ dataSelectedContent);
                            //alert(request.Clave+" "+request.Descripcion);

                            $.ajax(
                            {
                                url: 'php/binding/Familia/updateCatFamilias.php',
                                type: 'post',
                                dataType: "json",
                                data: dataSelectedContent,
                                success: function (request) {
                                   // alert(request.responseText);
                                    confirmaOperacionfamilia("GUARDADO");
                                },
                                error: function (request, settings) {
                                    //alert(request.responseText);
                                    confirmaOperacionfamilia("ERROR");
                                }
                            });
                        }
                        else {
                            $.messager.alert('Atención', 'La subfamilia es un valor requerido.', 'info');
                        }
                    }
                    else {
                        $.messager.alert('Atención', 'La clave descripción es un valor requerido.', 'info');
                    }
                }
                else {
                    $.messager.alert('Atención', 'La clave de la familia es un valor requerido.', 'info');
                }

              

                break;
        }


    }


    function EliminarFamilia() {
        var row = $('#dgFamilias').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirma', 'Estás seguro de eliminarlo?', function (r) {
                if (r) {
                    $.post('php/binding/Familia/deleteCatFamilias.php', { id_familia: row.id_familia }, function (result) {
                        confirmaOperacionfamilia("BORRADO");
                        if (result.success) {
                            $('#dgFamilias').datagrid('reload');	// reload the user data
                        } else {

                            confirmaOperacionfamilia("ERROR");
                            //$.messager.show({	// show error message
                            //    title: 'Error',
                            //    msg: result.errorMsg
                            //});
                        }
                    }, 'json');
                }
            });
        } else {


            $.messager.alert({
                title: 'Atención',
                icon: 'info',
                msg: 'Debe seleccionar un registro dando click sobre el  para poder eliminarlo.',
                fn: function () {

                    $('#dgFamilias').datagrid('reload');


                }
            });

        }


    }


    function confirmaOperacionfamilia(tipoOperacion) {

        switch (tipoOperacion) {
            case "GUARDADO":

                //$.messager.alert('Operación','¡Cliente guardado exitosamente!','info');
                $('#dlgFamilias').dialog('close');
                $('#fmEditarFamilia').form('clear');

                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Familia guardada exitosamente!',
                    fn: function () {

                        $('#dgFamilias').datagrid('reload');

                    }


                });
                break;
                //Operación de edición.
            case "EDICION":

                $('#dlgFamilias').dialog('close');
                $('#fmEditarFamilia').form('clear');

                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Familia actualizada exitosamente!',
                    fn: function () {

                        $('#dgFamilias').datagrid('reload');

                    }


                });

                break;
                //Fin de operación de edición.
            case "BORRADO":

                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Familia eliminada exitosamente!',
                    fn: function () {

                        $('#dgFamilias').datagrid('reload');


                    }


                });

                break;

            case "ERROR":

                $('#dlgFamilias').dialog('close');
                $('#fmEditarFamilia').form('clear');

                $.messager.alert({
                    title: 'Operación',
                    icon: 'warning',
                    msg: '¡Verifique que la operación sea correcta!',
                    fn: function () {

                        $('#dgFamilias').datagrid('reload');


                    }


                });

                break;
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
			$('#dgFamilias').datagrid().datagrid('enableCellEditing');
		})*/
</script>
