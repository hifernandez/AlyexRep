<input id="tipoOperacionLineas" type="hidden" value="" />
<table id="dgLineas" title="Línea" class="easyui-datagrid" style="width:auto;height:450px;"
       url="php/binding/Linea/getCatLinea.php" ;
       toolbar="#toolLineas"
       rownumbers="true"
       fitColumns="true"
       singleSelect="true"
       pagination="true"
       loadMsg="Cargando información...">
    <thead>
        <tr>
            <!--<th field="ck" checkbox="true" ></th>-->
            <th data-options="field:'id_linea'" hidden></th>
            <th data-options="field:'nombre_linea',width:33,editor:'text'">Línea</th>
            <th data-options="field:'descripcion_linea',width:33, editor:'text'">Descripción</th>
        </tr>
    </thead>
</table>

<!--Cargando la barra de edición y busqueda-->
<div id="toolLineas">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEdicionLinea('ALTALINEA')">Alta de Línea</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEdicionLinea('EDICIONLINEA')">Editar Línea</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="EliminarLinea()">Eliminar Línea</a>
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="muestraWord()">Reporte del Línea</a>-->
    <br>
    <!--Busqueda de elementos-->
    <!--	<TABLE BORDER=0 WIDTH=100 CELLPADDING=15 align="center">
            <TR>
                <TD >
                    <input id="bscFamClave" label="Linea" class="easyui-textbox" prompt="Línea" data-options="" style="width:300px">
                </TD>

                <TD>
                    <input id="bscFamDesc" label="Descripción" class="easyui-textbox" prompt="Descripción" data-options="" style="width:300px">
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
<div id="dlgLineas" class="easyui-dialog" style="width:auto"
     closed="true" modal="true">
    <form id="fmEditarPerfil" method="post" novalidate style="margin:0;padding:20px 50px">
        <div style="margin-bottom:5px;font-size:14px;border-bottom:1px solid #ccc">Datos de línea:</div>
        <TABLE>
            <TR>
                <td>Clave:</td>
                <TD>
                    <input id="txtLinNombre" name="txtLinNombre" class="easyui-textbox" data-options="required:true" style="width:100%;padding:5px">
                    <BR>
                </TD>
            </TR>
            <div style="margin-bottom:3px"></div>
            <TR>
                <td>Descripción:</td>
                <TD>
                    <input id="txtLinDescripcion" name="txtLinDescripcion" class="easyui-textbox" data-options="required:true" style="width:100%;padding:5px">
                    <BR>
                </TD>
            </TR>
        </TABLE>
        <div style="margin-bottom:5px">
        </div>
        <div align="center">
            <button id="btnAltaEditPerfil" type="button" onclick="guardaLinea()" class="btn btn-primary">Actualizar</button>
        </div>
        <div style="margin-bottom:10px">
        </div>
    </form>
</div>
<!-- ******************************** -->



<script>
    $(document).ready(function () {
        $('#dgLineas').datagrid('reload');    // reload the user data
    });

    function btnBuscarFamilia() {
        $('#dgLineas').datagrid('reload');
    }


    function abrirModalEdicionLinea(tipoOperacion) {
        switch (tipoOperacion) {
            case "EDICIONLINEA":
                $('#tipoOperacionLineas').val("EDICIONLINEA");
                var row = $('#dgLineas').datagrid('getSelected');
                if (row) {
                    //guardaLinea();
                    $('#dlgLineas').dialog('open').dialog('setTitle', 'Editar Línea');
                    $('#fmEditarPerfil').form('load', row);
                    $('#txtLinNombre').textbox("setValue", row.nombre_linea);
                    $('#txtLinDescripcion').textbox("setValue", row.descripcion_linea);
                }
                else {
                    $.messager.alert('Error de edición', 'Debe seleccionar un producto dando clic sobre el registro para poder editarlo!', 'info');
                }
                break;

            case "ALTALINEA":
                $('#fmEditarPerfil').form('clear');
                $('#tipoOperacionLineas').val("ALTALINEA");
                $('#dlgLineas').dialog('open').dialog('setTitle', 'Nuevo Línea');
                $('#fmEditarPerfil').form('load');

                $("#btnAltaEditPerfil").html('GUARDAR');
                break;

        }

    }// FIN

    function guardaLinea() {
        var tipoOperacionGuardado = $('#tipoOperacionLineas').val();
        //alert("El valor de TipoOperacion es: "+ tipoOperacionGuardado);
        switch (tipoOperacionGuardado) {
            case "EDICIONLINEA":
                var claveTxt = $('#txtLinNombre').val();
                var descTxt = $('#txtLinDescripcion').val();

                if (claveTxt != '') {
                    if (descTxt != '') {
                        var dataSelectedContent = 'ID=' + $('#dgLineas').datagrid('getSelected').id_linea + '&Clave=' + claveTxt + '&Descripcion=' + descTxt + '&TipoOperacion=' + tipoOperacionGuardado;
                        //var dataSelectedContent = 'ID=' + row.id_linea +'&ID_FAM='+row.id_perfil+'&Clave='+row.nombre_linea+'&Descripcion='+row.descripcion_linea+'&TipoOperacion='+tipoOperacionGuardado;
                        //alert(dataSelectedContent);

                        $.ajax(
                        {
                            url: 'php/binding/Linea/updateCatLinea.php',
                            type: 'post',
                            dataType: "json",
                            data: dataSelectedContent,
                            success: function (request) {
                                $.messager.alert({
                                    title: 'Operación',
                                    msg: '¡Línea actualizada exitosamente!',

                                });
                                $('#dlgLineas').dialog('close');
                                $('#dgLineas').datagrid('reload');
                            },
                            error: function (request, settings) {
                                //alert(request.responseText);
                            }
                        });
                    } else {
                        $.messager.alert('Atención', 'La descripción es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atención', 'La clave del acabado es un valor requerido.', 'info');
                }

             


                break;
            case "ALTALINEA":
                var claveTxt = $('#txtLinNombre').val();
                var descTxt = $('#txtLinDescripcion').val();
                if (claveTxt != '') {
                    if (descTxt != '') {
                        var dataSelectedContent = 'Clave=' + claveTxt + '&Descripcion=' + descTxt + '&TipoOperacion=' + tipoOperacionGuardado;

                        //	alert ("El valor de dataSelectedContent ="+dataSelectedContent);
                        $.ajax(
                        {
                            url: 'php/binding/Linea/updateCatLinea.php',
                            type: 'post',
                            dataType: "json",
                            data: dataSelectedContent,
                            success: function (request) {
                                $.messager.alert({
                                    title: 'Operación',
                                    msg: '¡Línea guardada exitosamente!',



                                });
                                $('#dlgLineas').dialog('close');
                                $('#dgLineas').datagrid('reload');
                            },
                            error: function (request, settings) {
                                //alert(request.responseText);
                            }
                        });
                    } else {
                        $.messager.alert('Atención', 'La descripción es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atención', 'La clave del acabado es un valor requerido.', 'info');
                }

                
               
                break;
        }


    }


    function EliminarLinea() {
        var row = $('#dgLineas').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirma', 'Estás seguro de eliminarlo?', function (r) {
                if (r) {
                    $.post('php/binding/Linea/deleteCatLineas.php', { id_linea: row.id_linea }, function (result) {
                        if (result.success) {
                            $('#dgLineas').datagrid('reload');
                            $.messager.alert({
                                title: 'Operación',
                                msg: '¡Línea borrada exitosamente!',



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

</script>
