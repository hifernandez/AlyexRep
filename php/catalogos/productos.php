<input id="tipoOperacionProductos" type="hidden" value="" />
<table id="dgProductos" title="Productos" class="easyui-datagrid" style="width:auto;height:450px;"
       data-options="
       iconCls: 'icon-edit' ,
       singleSelect: 'true' ,
       rownumbers: 'true' ,
       fitColumns: 'true' ,
       toolbar: '#toolProductos' ,
       url: 'php/binding/Dados/Dados/getCatDados.php' ,
       method: 'get' ,
       pagination:'true',
       loadMsg:'Cargando información...'
       ">
    <thead>
        <tr>
            <!--<th field="ck" checkbox="true" ></th>-->
            <th data-options="field:'id_header_dado'" hidden></th>
            <th data-options="field:'id_detail_dado'" hidden></th>
            <th data-options="field:'id_temple'" hidden></th>
            <th data-options="field:'id_acabado'" hidden></th>
            <th data-options="field:'id_calidad'" hidden></th>
            <th data-options="field:'id_linea'" hidden></th>
            <th data-options="field:'id_aleacion'" hidden></th>
            <th data-options="field:'id_familia'" hidden></th>
            <th data-options="field:'id_longitud'" hidden></th>
            <th data-options="field:'clave_dado',width:10">Clave Dado</th>
            <th data-options="field:'descripcion_acabado',width:20">Acabado</th>
            <th data-options="field:'descripcion_temple',width:20">Temple</th>
            <th data-options="field:'descripcion_calidad',width:20">Calidad</th>
            <th data-options="field:'descripcion_linea',width:20">Línea</th>
            <th data-options="field:'clave_aleacion',width:10">Aleación</th>
            <th data-options="field:'descripcion_familia',width:20">Familia</th>
            <th data-options="field:'descripcion_longitud',width:20">Longitud</th>
        </tr>
    </thead>
</table>

<!--Cargando la barra de edición y busqueda-->
<div id="toolProductos">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEdicionProducto('ALTAPRODUCTO')">Alta de producto</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEdicionProducto('EDICIONPRODUCTO')">Editar producto</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="EliminarProducto()">Eliminar producto</a>
    <br>
    <!--Busqueda de elementos-->
    <!--<TABLE BORDER=0 WIDTH=100 CELLPADDING=15 align="center">
        <TR>

            <TD >
                <input id="bscProdClave" label="Clave" class="easyui-textbox" prompt="Clave" data-options="" style="width:300px">
            </TD>
            <TD>
                <div class="btn-group btn-group-lg" role="group" aria-label="...">
                    <button type="button" onclick="btnBuscarProductos()" class="btn btn-primary btn-sm">BUSCAR</button>
                </div>
            </TD>
        </TR>
    </TABLE>-->

</div>





<!-- MODAL PARA MOSTRAR EN LA AGREGACIÓN -->


<div id="dlgProductos" class="easyui-dialog" style="width:auto"
     closed="true" modal="true">
    <form id="fmEditarProducto" method="post" novalidate style="margin:0;padding:20px 50px">
        <div style="margin-bottom:5px;font-size:14px;border-bottom:1px solid #ccc">Datos de Producto:</div>
        <TABLE>
            <TR>
                <td>Clave dado</td>
                <TD>
                    <input id="comboClaveDado" class="easyui-combogrid" name="comboClaveDado" style="width:100%;padding:5px" data-options="
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
            </TR>
            <tr>
                <td>Acabado dado:</td>
                <TD>
                    <input id="comboClaveAcabado" class="easyui-combogrid" name="comboClaveAcabado" style="width:100%;padding:5px" data-options="
                           required:true,
                           panelWidth:255,
                           idField:'id_acabado',
                           textField:'descripcion_acabado',
                           url:'php/binding/Acabados/getCatAcabados.php',
                    columns:[[
                    {field:'clave_acabado',title:'Acabado', width:100},
                    {field:'descripcion_acabado',title:'Descripción', width:150}
                    ]]">
                </TD>
            </tr>
            <TR>
                <td>Temple dado:</td>
                <TD>
                    <input id="comboClaveTemple" class="easyui-combogrid" name="comboClaveTemple" style="width:100%;padding:5px" data-options="
                           required:true,
                           panelWidth:255,
                           idField:'id_temple',
                           textField:'descripcion_temple',
                           url:'php/binding/Temple/getCatTemple.php',
                    columns:[[
                    {field:'clave_temple',title:'Temple', width:100},
                    {field:'descripcion_temple',title:'Descripción', width:150}
                    ]]">
                    <BR>
                </TD>
            </TR>
            <TR>
                <td>Calidad dado:</td>
                <TD>
                    <input id="comboClaveCalidad" class="easyui-combogrid" name="comboClaveCalidad" style="width:100%;padding:5px" data-options="
                           required:true,
                           panelWidth:255,
                           idField:'id_calidad',
                           textField:'descripcion_calidad',
                           url:'php/binding/Calidad/getCatCalidad.php',
                    columns:[[
                    {field:'nombre_calidad',title:'Calidad', width:100},
                    {field:'descripcion_calidad',title:'Descripción', width:150}
                    ]]">
                    <BR>
                </TD>
            </TR>
            <TR>
                <td>Línea dado:</td>
                <TD>
                    <input id="comboClaveLinea" class="easyui-combogrid" name="comboClaveLinea" style="width:100%;padding:5px" data-options="
                           required:true,
                           panelWidth:255,
                           idField:'id_linea',
                           textField:'descripcion_linea',
                           url:'php/binding/Linea/getCatLinea.php',
                    columns:[[
                    {field:'nombre_linea',title:'Linea', width:95},
                    {field:'descripcion_linea',title:'Descripción Linea', width:155}
                    ]]">
                    <BR>
                </TD>
            </TR>
            <TR>
                <td>Aleación dado:</td>
                <TD>
                    <input id="comboClaveAleacion" class="easyui-combogrid" name="comboClaveAleacion" style="width:100%;padding:5px" data-options="
                           required:true,
                           panelWidth:255,
                           idField:'id_aleacion',
                           textField:'clave_aleacion',
                           url:'php/binding/Aleaciones/getCatAleaciones.php',
                    columns:[[
                    {field:'clave_aleacion',title:'Aleación', width:110},
                    {field:'descripcion_aleacion',title:'Descripción', width:140}
                    ]]">
                    <BR>
                </TD>
            </TR>
            <TR>
                <td>Familia dado:</td>
                <TD>
                    <input id="comboClaveFamilia" class="easyui-combogrid" name="comboClaveFamilia" style="width:100%;padding:5px" data-options="
                           required:true,
                           panelWidth:355,
                           idField:'id_familia',
                           textField:'descripcion_familia',
                           url:'php/binding/Familia/getCatFamilias.php',
                    columns:[[
                    {field:'clave_familia',title:'Aleación', width:50},
                    {field:'descripcion_familia',title:'Familia', width:140},
                    {field:'descripcion_subfamilia',title:'Subfamilia Aleación', width:160}
                    ]]">
                    <BR>
                </TD>
            </TR>
            <TR>
                <td>Longitud dado:</td>
                <TD>
                    <input id="comboClaveLongitud" class="easyui-combogrid" name="comboClaveLongitud" style="width:100%;padding:5px" data-options="
                           required:true,
                           panelWidth:255,
                           idField:'id_longitud',
                           textField:'descripcion_longitud',
                           url:'php/binding/Longitud/getCatLongitudes.php',
                    columns:[[
                    {field:'clave_longitud',title:'Clave Longitud', width:100},
                    {field:'descripcion_longitud',title:'Descripción Longitud', width:150}
                    ]]">
                    <BR>
                </TD>
            </TR>
        </TABLE>
        <div style="margin-bottom:5px">
        </div>
        <div align="center">
            <button id="btnEditProducto" type="button" onclick="guardaProducto()" class="btn btn-primary">ACTUALIZAR</button>
            <button id="btnAltaProducto" type="button" onclick="guardaProducto()" class="btn btn-primary">GUARDAR</button>
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

    function abrirModalEdicionProducto(tipoOperacion) {
        switch (tipoOperacion) {
            case "EDICIONPRODUCTO":
                $('#tipoOperacionProductos').val("EDICIONPRODUCTO");
                var row = $('#dgProductos').datagrid('getSelected');
                if (row) {
                    //guardaProducto();
                    $('#fmEditarProducto').form('clear');
                    $('#dlgProductos').dialog('open').dialog('setTitle', 'Editar producto');
                    $('#fmEditarProducto').form('load', row);
                    $('#comboClaveDado').combogrid("setValue", row.id_detail_dado);
                    $('#comboClaveAcabado').combogrid("setValue", row.id_acabado);
                    $('#comboClaveTemple').combogrid("setValue", row.id_temple);
                    $('#comboClaveCalidad').combogrid("setValue", row.id_calidad);
                    $('#comboClaveLinea').combogrid("setValue", row.id_linea);
                    $('#comboClaveFamilia').combogrid("setValue", row.id_familia);
                    $('#comboClaveAleacion').combogrid("setValue", row.id_aleacion);
                    $('#comboClaveLongitud').combogrid("setValue", row.id_longitud);
                    $('#btnAltaProducto').hide();
                    $('#btnEditProducto').show();
                }
                else {
                    $.messager.alert('Error de edición', 'Debe seleccionar un producto dando clic sobre el registro para poder editarlo!', 'info');
                }
                break;

            case "ALTAPRODUCTO":
                $('#fmEditarProducto').form('clear');
                $('#tipoOperacionProductos').val("ALTAPRODUCTO");
                $('#dlgProductos').dialog('open').dialog('setTitle', 'Nuevo producto');
                $('#fmEditarProducto').form('load');
                $('#btnAltaProducto').show();
                $('#btnEditProducto').hide();
                break;
        }

    }// FIN

    function guardaProducto() {
        var tipoOperacionGuardado = $('#tipoOperacionProductos').val();
        switch (tipoOperacionGuardado) {
            case "EDICIONPRODUCTO":

                var dadoTxt = $('#comboClaveDado').combogrid("getValue");
                var acabadoTxt = $('#comboClaveAcabado').combogrid("getValue");
                var templeTxt = $('#comboClaveTemple').combogrid("getValue");
                var calidadTxt = $('#comboClaveCalidad').combogrid("getValue");
                var lineaTxt = $('#comboClaveLinea').combogrid("getValue");
                var aleacionTxt = $('#comboClaveAleacion').combogrid("getValue");
                var familiaTxt = $('#comboClaveFamilia').combogrid("getValue");
                var longitudTxt = $('#comboClaveLongitud').combogrid("getValue");


                if (dadoTxt != '') {
                    if (acabadoTxt != '') {
                        if (templeTxt != '') {
                            if (calidadTxt != '') {
                                if (lineaTxt != '') {
                                    if (aleacionTxt != '') {
                                        if (familiaTxt != '') {
                                            if (longitudTxt != '') {
                                                var dataSelectedContent = 'ID=' + $('#dgProductos').datagrid('getSelected').id_header_dado + '&DADO=' + dadoTxt + '&ACABADO=' + acabadoTxt + '&TEMPLE=' + templeTxt + '&CALIDAD=' + calidadTxt + '&LINEA=' + lineaTxt + '&ALEACION=' + aleacionTxt + '&LONGITUD=' + longitudTxt + '&FAMILIA=' + familiaTxt + '&TipoOperacion=' + tipoOperacionGuardado;
                                                //alert(dataSelectedContent);
                                                $.ajax(
                                                    {
                                                        url: 'php/binding/Dados/Dados/updateCatDados.php',
                                                        type: 'post',
                                                        dataType: "json",
                                                        data: dataSelectedContent,
                                                        success: function (request) {
                                                            $.messager.alert({
                                                                title: 'Operación',
                                                                msg: '¡Producto actualizado exitosamente!',
                                                                msg: '¡Producto guardado exitosamente!',
                                                            });
                                                            $('#dlgProductos').dialog('close');
                                                            $('#dgProductos').datagrid('reload');
                                                        },
                                                        error: function (request, settings) {
                                                            //alert(request.responseText);
                                                        }
                                                    });

                                            } else {
                                                $.messager.alert('Atención', 'La longitud es un valor requerido.', 'info');
                                            }
                                        } else {
                                            $.messager.alert('Atención', 'La familia es un valor requerido.', 'info');
                                        }
                                    } else {
                                        $.messager.alert('Atención', 'La aleación es un valor requerido.', 'info');
                                    }
                                } else {
                                    $.messager.alert('Atención', 'La línea es un valor requerido.', 'info');
                                }
                            } else {
                                $.messager.alert('Atención', 'La calidad es un valor requerido.', 'info');
                            }
                        } else {
                            $.messager.alert('Atención', 'El temple es un valor requerido.', 'info');
                        }
                    } else {
                        $.messager.alert('Atención', 'El acabado es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atención', 'El dado es un valor requerido.', 'info');
                }

                break;

            case "ALTAPRODUCTO":
                var row = $('#dgProductos').datagrid('getSelected');
                var dadoTxt = $('#comboClaveDado').combogrid("getValue");
                var acabadoTxt = $('#comboClaveAcabado').combogrid("getValue");
                var templeTxt = $('#comboClaveTemple').combogrid("getValue");
                var calidadTxt = $('#comboClaveCalidad').combogrid("getValue");
                var lineaTxt = $('#comboClaveLinea').combogrid("getValue");
                var aleacionTxt = $('#comboClaveAleacion').combogrid("getValue");
                var familiaTxt = $('#comboClaveFamilia').combogrid("getValue");
                var longitudTxt = $('#comboClaveLongitud').combogrid("getValue");


                if (dadoTxt != '') {
                    if (acabadoTxt != '') {
                        if (templeTxt != '') {
                            if (calidadTxt != '') {
                                if (lineaTxt != '') {
                                    if (aleacionTxt != '') {
                                        if (familiaTxt != '') {
                                            if (longitudTxt != '') {
                                                var dataSelectedContent = 'DADO=' + dadoTxt + '&ACABADO=' + acabadoTxt + '&TEMPLE=' + templeTxt + '&CALIDAD=' + calidadTxt + '&LINEA=' + lineaTxt + '&ALEACION=' + aleacionTxt + '&LONGITUD=' + longitudTxt + '&FAMILIA=' + familiaTxt + '&TipoOperacion=' + tipoOperacionGuardado;
                                                //alert(dataSelectedContent);
                                                $.ajax(
                                                     {
                                                         url: 'php/binding/Dados/Dados/updateCatDados.php',
                                                         type: 'post',
                                                         dataType: "json",
                                                         data: dataSelectedContent,
                                                         success: function (request) {
                                                             $.messager.alert({
                                                                 title: 'Operación',
                                                                 msg: '¡Producto guardado exitosamente!',
                                                             });
                                                             $('#dlgProductos').dialog('close');
                                                             $('#dgProductos').datagrid('reload');
                                                         },
                                                         error: function (request, settings) {

                                                             alert('Entraste al error');
                                                             alert(request.responseText);
                                                         }
                                                     });

                                            } else {
                                                $.messager.alert('Atención', 'La longitud es un valor requerido.', 'info');
                                            }
                                        } else {
                                            $.messager.alert('Atención', 'La familia es un valor requerido.', 'info');
                                        }
                                    } else {
                                        $.messager.alert('Atención', 'La aleación es un valor requerido.', 'info');
                                    }
                                } else {
                                    $.messager.alert('Atención', 'La línea es un valor requerido.', 'info');
                                }
                            } else {
                                $.messager.alert('Atención', 'La calidad es un valor requerido.', 'info');
                            }
                        } else {
                            $.messager.alert('Atención', 'El temple es un valor requerido.', 'info');
                        }
                    } else {
                        $.messager.alert('Atención', 'El acabado es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atención', 'El dado es un valor requerido.', 'info');
                }




                break;
        }

    }

    function EliminarProducto() {
        var row = $('#dgProductos').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirma', 'Estás seguro de eliminarlo?', function (r) {
                if (r) {
                    $.post('php/binding/Dados/Dados/deleteCatDados.php', { id_header_dado: row.id_header_dado }, function (result) {
                        if (result.success) {
                            $('#dgProductos').datagrid('reload');	// reload the user data
                        } else {
                            $.messager.show({	// show error message
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        }
                        $.messager.alert({
                            title: 'Operación',
                            msg: '¡Producto eliminado exitosamente!',



                        });
                    }, 'json');
                }
            });
        }
    }


</script>
