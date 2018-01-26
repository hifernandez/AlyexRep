<input id="tipoOperacionSubFamilias" type="hidden" value="" />
<table id="dgSubFamilias" title="SubFamilias" class="easyui-datagrid" style="width:auto;height:450px;"
       url="php/binding/Familia/SubFamilia/getCatSubFamilias.php" ;
       toolbar="#toolSubFamilias"
       rownumbers="true"
       fitColumns="true"
       singleSelect="true"
       pagination="true"
       loadMsg="Cargando información...">
    <thead>
        <tr>
            <!--<th field="ck" checkbox="true" ></th>-->
            <th data-options="field:'id_subfamilia'" hidden></th>
            <th data-options="field:'clave_subfamilia',width:33">Clave</th>
            <th data-options="field:'descripcion_subfamilia',width:33, editor:'text'">SubFamilia</th>
        </tr>
    </thead>
</table>

<!--Cargando la barra de edición y busqueda-->
<div id="toolSubFamilias">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEdicionSubFamilia('ALTASUBFAMILIA')">Alta de SubFamilia</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEdicionSubFamilia('EDICIONSUBFAMILIA')">Editar SubFamilia</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="EliminarSubFamilia()">Eliminar SubFamilia</a>
    <!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="muestraWord()">Reporte del familia</a>-->
    <br>
    <!--Busqueda de elementos-->
    <!--<TABLE BORDER=0 WIDTH=100 CELLPADDING=15 align="center">
        <TR>
            <TD >
                <input id="bscFamClave" label="Clave" class="easyui-textbox" prompt="Clave" data-options="" style="width:300px">
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
<div id="dlgSubFamilias" class="easyui-dialog" style="width:300px;height:auto;padding:10px 20px"
     closed="true" buttons="#dlg-buttons">
    <form id="fmEditarSubFamilia" method="post" novalidate>

        <div style="margin-bottom:5px;font-size:14px;border-bottom:1px solid #ccc">Datos de la subfamilia:</div>
        <div style="margin-bottom:5px"></div>
        <table>
            <tr>
                <td>Clave:</td>
                <td>
                    <input id="txtSubFamClave" name="txtSubFamClave" class="easyui-textbox"  data-options="required:true" style="width:100%;padding:5px" />
                </td>

            </tr>
            <tr>
                <td>Descripción:</td>
                <td><input id="txtSubFamDescripcion" name="txtSubFamDescripcion" class="easyui-textbox" data-options="required:true" style="width:100%;padding:5px"></td>
            </tr>

        </table>
        <div style="margin-bottom:5px"></div>
        <div align="center">

            <button id="btnAltaEditSubFamilia" type="button" onclick="guardaSubFamilia()" class="btn btn-primary">ACTUALIZAR</button>


        </div>
        <div style="margin-bottom:10px">
        </div>

    </form>
</div>
<!-- ******************************** -->



<script>
    $(document).ready(function () {
        $('#dgSubFamilias').datagrid('reload');    // reload the user data
    });

    function btnBuscarFamilia() {
        $('#dgSubFamilias').datagrid('reload');
    }


    function abrirModalEdicionSubFamilia(tipoOperacion) {
        switch (tipoOperacion) {
            case "EDICIONSUBFAMILIA":
                $('#tipoOperacionSubFamilias').val("EDICIONSUBFAMILIA");
                $("#btnAltaEditSubFamilia").html('ACTUALIZAR');
                var row = $('#dgSubFamilias').datagrid('getSelected');
                if (row) {
                    //guardaSubFamilia();
                    $('#dlgSubFamilias').dialog('open').dialog('setTitle', 'Editar subfamilia');
                    $('#fmEditarSubFamilia').form('load', row);
                    $('#txtSubFamClave').textbox("setValue", row.clave_subfamilia);
                    $('#txtSubFamDescripcion').textbox("setValue", row.descripcion_subfamilia);
                    //$('#txtFamSubFamilia').combobox("setValue",row.id_subfamilia);
                }
                else {
                    $.messager.alert({
                        title: 'Atención',
                        icon: 'info',
                        msg: 'Debe seleccionar un registro dando click sobre el  para poder editarlo.',
                        fn: function () {

                            $('#dgSubFamilias').datagrid('reload');


                        }
                    });

                }
                break;

            case "ALTASUBFAMILIA":
                $('#fmEditarSubFamilia').form('clear');
                $('#tipoOperacionSubFamilias').val("ALTASUBFAMILIA");
                $('#dlgSubFamilias').dialog('open').dialog('setTitle', 'Nueva familia');
                $('#fmEditarSubFamilia').form('load');

                $("#btnAltaEditSubFamilia").html('GUARDAR');
                break;

        }

    }// FIN

    function guardaSubFamilia() {
        var tipoOperacionGuardado = $('#tipoOperacionSubFamilias').val();
        //alert("El valor de TipoOperacion es: "+ tipoOperacionGuardado);
        switch (tipoOperacionGuardado) {
            case "EDICIONSUBFAMILIA":
                //alert("Entre al CASE Edicion Familia");
                //alert("El valor de TipoOperacion es: "+ tipoOperacionGuardado);
                //var row = $('#dgSubFamilias').datagrid('getSelected');
                var claveTxt = $('#txtSubFamClave').val();
                var descTxt = $('#txtSubFamDescripcion').val();
                var subTxt = $('#txtFamSubFamilia').val();
                var id_sub = $('#dgSubFamilias').datagrid('getSelected').id_subfamilia;
                if (claveTxt != '') {
                    if (descTxt != '') {
                        var dataSelectedContent = 'ID=' + id_sub + '&Clave=' + claveTxt + '&Descripcion=' + descTxt + '&TipoOperacion=' + tipoOperacionGuardado;

                        //alert ('El valor de Row =' + row.id_familia);
                       // alert(dataSelectedContent);

                        $.ajax(
                        {
                            url: 'php/binding/Familia/SubFamilia/updateCatSubFamilias.php',
                            type: 'post',
                            dataType: "json",
                            data: dataSelectedContent,
                            success: function (request) {
                                //alert(request.responseText);
                                confirmaOperacionSubfamilia("EDICION");
                            },
                            error: function (request, settings) {
                                confirmaOperacionSubfamilia("EDICION");
                            }
                        });
                    }
                    else {
                        $.messager.alert('Atención', 'La descripción de la subfamilia es un valor requerido.', 'info');
                    }
                }
                else {
                    $.messager.alert('Atención', 'La clave de la subfamilia es un valor requerido.', 'info');
                }


                break;
            case "ALTASUBFAMILIA":
                //alert("Se guardo correctamente la nueva familia");
                //var row = $('#dgSubFamilias').datagrid('getSelected');
                var claveTxt = $('#txtSubFamClave').val();
                var descTxt = $('#txtSubFamDescripcion').val();
                var subTxt = $('#txtFamSubFamilia').val();

                if (claveTxt != '') {
                    if (descTxt != '') {
                        var dataSelectedContent = 'Clave=' + claveTxt + '&Descripcion=' + descTxt + '&SubFamilia=' + subTxt + '&TipoOperacion=' + tipoOperacionGuardado;

                        //alert ("El valor de dataSelectedContent ="+ dataSelectedContent);
                        //alert(request.Clave+" "+request.Descripcion);

                        $.ajax(
                        {
                            url: 'php/binding/Familia/SubFamilia/updateCatSubFamilias.php',
                            type: 'post',
                            dataType: "json",
                            data: dataSelectedContent,
                            success: function () {
                                //alert(request.responseText);

                                confirmaOperacionSubfamilia("GUARDADO");

                            },
                            error: function (request, settings) {
                                //alert(request.responseText);
                                confirmaOperacionSubfamilia("GUARDADO");
                            }
                        });

                    }
                    else {
                        $.messager.alert('Atención', 'La descripción de la subfamilia es un valor requerido.', 'info');
                    }
                }
                else {
                    $.messager.alert('Atención', 'La clave de la subfamilia es un valor requerido.', 'info');
                }
               
                break;
        }


    }


    function EliminarSubFamilia() {
        var row = $('#dgSubFamilias').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirma', '¿Desea eliminar este registro?', function (r) {
                if (r) {
                    $.post('php/binding/Familia/SubFamilia/deleteCatSubFamilias.php', { id_subfamilia: row.id_subfamilia }, function (result) {
                        confirmaOperacionSubfamilia("BORRADO");
                        if (result.success) {
                            $('#dgSubFamilias').datagrid('reload');	// reload the user data
                        } else {
                            $.messager.show({	// show error message
                                title: 'Error',
                                msg: result.errorMsg
                            });
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

                    $('#dgSubFamilias').datagrid('reload');


                }
            });




        }
    }


    function confirmaOperacionSubfamilia(tipoOperacion) {

        switch (tipoOperacion) {
            case "GUARDADO":

                //$.messager.alert('Operación','¡Cliente guardado exitosamente!','info');
                $('#dlgSubFamilias').dialog('close');
                $('#fmEditarSubFamilia').form('clear');

                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Subfamilia guardada exitosamente!',
                    fn: function () {

                        $('#dgSubFamilias').datagrid('reload');

                    }


                });
                break;
                //Operación de edición.
            case "EDICION":

                $('#dlgSubFamilias').dialog('close');
                $('#fmEditarSubFamilia').form('clear');

                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Subfamilia actualizada exitosamente!',
                    fn: function () {

                        $('#dgSubFamilias').datagrid('reload');

                    }


                });

                break;
                //Fin de operación de edición.
            case "BORRADO":

                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Subfamilia eliminada exitosamente!',
                    fn: function () {

                        $('#dgSubFamilias').datagrid('reload');


                    }


                });

                break;

            case "ERROR":

                $('#dlgSubFamilias').dialog('close');
                $('#fmEditarSubFamilia').form('clear');

                $.messager.alert({
                    title: 'Operación',
                    icon: 'warning',
                    msg: '¡Verifique que la operación sea correcta!',
                    fn: function () {

                        $('#dgSubFamilias').datagrid('reload');


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
			$('#dgSubFamilias').datagrid().datagrid('enableCellEditing');
		})*/
</script>
