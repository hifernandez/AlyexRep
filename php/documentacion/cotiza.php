<input id="tipoOperacionCotiza" type="hidden" value="" />
<table id="dgCotiza" title="Cotizaciones" class="easyui-datagrid" style="width:auto;height:450px;"
       url="php/binding/Cotizaciones/getTrCotizacion.php" ;
       toolbar="#toolCotizas"
       rownumbers="true"
       fitColumns="true"
       singleSelect="true"
       pagination="true"
       loadMsg="Cargando información...">
    <thead>
        <tr>
            <!--<th field="ck" checkbox="true" ></th>-->
            <th data-options="field:'tipo_moneda_cotizacion'" hidden></th>
            <th data-options="field:'id_cliente'" hidden></th>
            <th data-options="field:'id_cotizacion',width:33">ID Cotización</th>
            <th data-options="field:'clave_cliente',width:33">Clave Cliente</th>
            <th data-options="field:'fecha_cotizacion',width:33">Fecha Cotización</th>
            <th data-options="field:'subtotal_cotizacion',width:33,editor:'text'">Subtotal </th>
            <th data-options="field:'total_cotizacion',width:33, editor:'text'">Total</th>
            <th data-options="field:'descripcion_cotizacion',width:33, editor:'text'">Observaciones</th>
            <th data-options="field:'cotizacion_status',width:33, editor:'text'">Estatus</th>
        </tr>
    </thead>
</table>

<!--Cargando la barra de edición y busqueda-->
<div id="toolCotizas">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="openWindow()">Alta de Cotizacion</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editarCotizacion()">Editar Cotizacion</a>
    <br>
    <!--Busqueda de elementos-->
    <!--<TABLE BORDER=0 WIDTH=100 CELLPADDING=15 align="center">
        <TR>
            <TD >
                <input id="bscFamClave" label="Clave" class="easyui-textbox" prompt="Clave" data-options="" style="width:300px">
            </TD>

            <TD>
                <input id="bscFamDesc" label="Descripción" class="easyui-textbox" prompt="Descripción" data-options="" style="width:300px">
            </TD>
        </TR>
        <TR>
            <TD>
                <select name="bscFamSubF" id="bscFamSubF" class="easyui-combobox" style="width:200px;">
                    <option value="">sub-Familia</option>
                </select>
            </TD>
            <TD></TD>
            <TD>
                <div class="btn-group btn-group-lg" role="group" aria-label="...">
                    <button type="button" onclick="btnBuscarFamilia()" class="btn btn-primary btn-sm">BUSCAR</button>
                </div>
            </TD>
        </TR>
    </TABLE>-->
</div>



<!-- MODAL PARA MOSTRAR EN LA AGREGACIóN -->
<div id="dlgCotiza" class="easyui-dialog" style="width:550px;height:400px;padding:10px 20px"
     closed="true" buttons="#dlg-buttons">
    <form id="fmEditarCotiza" method="post" novalidate>
        <fieldset align="center">
            <form enctype="multipart/form-data" id="Datos" name="Datos" method="post" onsubmit="return dropDownVal()">
                <TABLE BORDER=1 CELLPADDING=15 align="center">
                    <TR>
                        <TD>
                            <input id="txtFamClave" name="txtProdClave" label="Clave" class="easyui-textbox" prompt="Clave" data-options="" style="width:300px">
                            <BR>
                        </TD>
                    </TR>
                    <TR>
                        <TD>
                            <input id="txtFamDescripcion" name="txtProdDescripcion" label="Descripción" class="easyui-textbox" prompt="Descripción" data-options="" style="width:300px">
                            <BR>
                        </TD>
                    </TR>
                    <TR>
                        <TD>
                            <input id="txtFamSubFamilia" class="easyui-combobox" name="txtFamSubFamilia" prompt="SubFamilia" style="width:300px;" data-options="
                                   url: 'php/binding/Familia/SubFamilia/getCatSubFamilias.php' ,
                                   valueField: 'id_subfamilia' ,
                                   textField: 'descripcion_subfamilia' ,
                                   label: 'SubFamilia:' ,
                                   labelPosition: 'right'
                                   ">
                            <BR>
                        </TD>
                    </TR>
                    <TR>
                        <TD>
                            <div align="center">
                                <div class="btn-group" role="group" aria-label="...">
                                    <button id="btnAltaEditFamilia" type="button" onclick="guardaFamilia()" class="btn btn-primary btn-sm">ACTUALIZAR</button>
                                </div>
                            </div>
                        </TD>

                    </TR>
                </TABLE>
            </form>
        </fieldset>
    </form>
</div>
<!-- ******************************** -->
<div id="CrearCotizacion2" class="easyui-window" title="Crear cotización" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width: auto;height:500px;padding:10px;">
    <input id="total_valor" type="hidden" value="" />
    <input id="txtHiddenIDCot" type="hidden" value="0" />
    <form id="fmCrearCotiza" method="post" novalidate>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"> Header cotizaci&oacute;n</div>
            <!-- Table -->
            <table class="table">
                <TR>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </TR>
                <TR>
                    <td>
                        Cliente:
                    </td>
                    <TD>
                        <select onclick="" id="textCliente" class="easyui-combogrid" name="dept" style="width:250px;"
                                data-options="
                                required:true,
                                panelWidth:305,
                                idField:'id_cliente',
                                textField:'razon_social_cliente',
                                url:'php/binding/Cliente/getCatCliente.php',
                        columns:[[
                        {field:'razon_social_cliente',title:'ID Cliente',  width:200},
                        {field:'rfc_cliente',title:'RFC Cliente',width:100}
                        ]]
                        "></select>
                    </TD>
                    <td>
                        Tipo de moneda:
                    </td>
                    <TD>
                        <select data-options="required:true" id="textTipoMon" name="cotTipoMonedaSel" id="cotTipoMonedaSel" class="easyui-combobox" style="width:250px;">
                            <option value="MX">MXN</option>
                            <option value="US">US</option>

                        </select>

                    </TD>
                    <td>
                        Fecha de cotización:
                    </td>
                    <TD>
                        <input data-options="required:true" id="txtFechaCreacion" name="txtFechaCreacion" class="easyui-datebox" style="width:300px">
                    </TD>
                </TR>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Observaciones:</td>
                    <td>
                        <textarea id="ObserCotizacion" class="form-control custom-control" required="true" rows="3" style="resize:none"></textarea>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <TR>
                    <TD></TD>
                    <td></td>
                    <TD colspan="2">
                        <div align="center">
                            <div class="btn-group btn-group-s" role="group" aria-label="...">
                                <button id="btnAltaConcepto" type="button" onclick="abrirModalEdicionPartida('ALTAPARTIDA')" class="btn btn-primary btn-s">Agregar concepto</button>
                                <button id="btnAltaConceptoEdit" type="button" onclick="abrirModalEdicionPartida('AGREGAPARTIDA')" class="btn btn-primary btn-s">Agregar concepto</button>
                            </div>
                        </div>
                    </TD>
                    <td></td>
                    <TD></TD>
                </TR>
            </table>

            <table id="dgProductosCotizacion" title="Partidas cotización" class="easyui-datagrid" style="width:auto;height:450x;"
                   data-options="
                   iconCls: 'icon-save' ,
                   singleSelect: 'true' ,
                   fitColumns: 'true' ,
                   toolbar: '#toolEditCotiza' ,
                   pagination:'true',
                   loadMsg:'Cargando información...'
                   ">
                <thead>
                    <tr>
                        <th data-options="field:'id_header_dado'" hidden></th>
                        <th data-options="field:'id_cliente'" hidden></th>
                        <th data-options="field:'id_item',width:33">ITEM</th>
                        <th data-options="field:'cantidad',width:33, editor:'text'">CANTIDAD</th>
                        <th data-options="field:'descripcion_dado',width:33, editor:'text'">DESCRIPCION</th>
                        <th data-options="field:'clave_dado',width:33, editor:'text'">CLAVE DADO</th>
                        <th data-options="field:'clave_cliente',width:33, editor:'text'">CLAVE CLIENTE</th>
                        <th data-options="field:'longitud',width:33, editor:'text'">LONGITUD</th>
                        <th data-options="field:'acabado_dado',width:33, editor:'text'">ACABADO</th>
                        <th data-options="field:'precio_unitario',width:33, editor:'text'"> PRECIO UNITARIO</th>
                        <th data-options="field:'importe_dado',width:33, editor:'text'">IMPORTE</th>
                        <th data-options="field:'observacion_partida',width:33, editor:'text'">OBSERVACIÓN</th>
                    </tr>
                </thead>
            </table>
            <div id="toolEditCotiza">
                <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
                <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="$('#CrearCotizacion2').window('open')">Alta de Cotizacion</a>-->
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEdicionPartida('EDICIONPARTIDA')">Editar Partida</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="borrarPartida()">Eliminar Partida</a>
                <br>
            </div>

            <div align="center">
                <table class="table">
                    <TR>
                        <TD>
                            <input id="subtotal" type="text" class="easyui-numberbox" disabled label="Sub Total" data-options="min:0,precision:2">
                        </TD>
                        <TD>
                            <input id="iva" type="text" class="easyui-numberbox" disabled label="IVA" value=1 data-options="min:16,precision:2">
                        </TD>
                        <TD>
                            <input id="total" type="text" class="easyui-numberbox" disabled label="Total" data-options="min:0,precision:2">
                        </TD>
                    </TR>
                </table>
                <div class="btn-group btn-group-s" role="group" aria-label="...">
                    <button id="btnAltaCotizacion" type="button" onclick="guardaCotizacion()" class="btn btn-primary btn-s">TERMINAR COTIZACI&Oacute;N</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- MODAL PARA MOSTRAR EN LA AGREGACIóN DE PARTIDAS -->
<div id="dlgPartidas" class="easyui-dialog" style="width:auto; height:auto;"
     closed="true" modal="true">
    <form id="fmCrearPartida" method="post" novalidate style="margin:0;padding:20px 50px">
        <div style="margin-bottom:5px;font-size:14px;border-bottom:1px solid #ccc">Datos Partida</div>
        <table>
            <TR>
                <td>Perfil:</td>
                <TD>
                    <select required="true" id="comboDado" class="easyui-combogrid" name="dept" style="width:150px;"
                            data-options="
                            required:true,
                            panelWidth:665,
                            idField:'id_header_dado',
                            textField:'clave_dado',
                            url:'php/binding/Dados/Dados/getCatDados.php',
                    columns:[[
                    {field:'nombre_dado',title:'Descripcion Dado',width:130},
                    {field:'clave_dado',title:'Clave Dado', width:80},
                    {field:'descripcion_temple',title:'Temple',width:120},
                    {field:'clave_aleacion',title:'Aleacion',width:100},
                    {field:'descripcion_longitud',title:'Longitud',width:100},
                    {field:'descripcion_acabado',title:'Acabado',width:130}
                    ]]
                    "></select>
                </TD>
            </TR>
            <tr>
                <td>Cantidad:</td>
                <TD>
                    <input id="textCantidad" type="text" class="easyui-numberbox" data-options="required:true, min:1,precision:0" style="width:150px;">
                </TD>
            </tr>
            <tr>
                <td>Precio Unitario:</td>
                <TD>
                    <input id="textPrecioU" type="text" class="easyui-numberbox" data-options="required:true, min:1,precision:2" style="width:150px;">
                </TD>
            </tr>
            <tr>
                <td>Observaciones:</td>
                <td>
                    <textarea data-options="required:true" id="ObserPartida" class="form-control custom-control" rows="3" style="resize:none"></textarea>
                </td>
            </tr>
        </table>
        <div style="margin-bottom:5px"></div>
        <div align="center">
            <div class="btn-group btn-group-s" role="group" aria-label="...">
                <button id="btnAgregaConcepto" type="button" onclick="agregarConcepto()" class="btn btn-primary btn-s">Agregar partida</button>
            </div>
            <div class="btn-group btn-group-s" role="group" aria-label="...">
                <button id="btnEditarConcepto" type="button" onclick="abrirModalEdicionPartida('GUARDAREDICION')" class="btn btn-primary btn-s">Editar partida</button>
            </div>
            <div class="btn-group btn-group-s" role="group" aria-label="...">
                <button id="btnCerrarDialog" type="button" onclick="$('#dlgPartidas').dialog('close')" class="btn btn-primary btn-s">Terminar</button>
            </div>
        </div>
    </form>
</div>



<script>
    function editarCotizacion() {
        $('#btnAltaConcepto').hide();
        $('#btnAltaConceptoEdit').show();
        var row = $('#dgCotiza').datagrid('getSelected');
        if (row) {

            $('#CrearCotizacion2').window('open');
            $('#CrearCotizacion2').window('setTitle', 'Editar Cotización');
            $("#textCliente").combo('disable').combogrid("setValue", row.id_cliente);
            $("#textTipoMon").combo('disable').combobox("setValue", row.tipo_moneda_cotizacion);
           // alert(row.fecha_cotizacion);
            $("#txtFechaCreacion").datebox('enable').datebox("setValue", row.fecha_cotizacion);
            $("#ObserCotizacion").val(row.descripcion_cotizacion);
            // $("#ObserCotizacion").textbox('enable').textbox("setValue", row.Descripcion);
            $('#iva').numberbox('setValue', 16);
            $('#subtotal').numberbox('setValue', row.subtotal_cotizacion);
            $('#total').numberbox('setValue', row.total_cotizacion);
            var id_cotizacion = row.id_cotizacion;
            var getDataId = "php/binding/Cotizaciones/getProdById.php?id_Cotizacion=" + row.id_cotizacion + '&tipo_Oper=cotizacion';

            //$('#dgProductosCotizacion').datagrid('loadData', getDataId);
            $('#dgProductosCotizacion').datagrid({
                method: 'get',
                url: getDataId
            });

        }
        else {
            $.messager.alert('Error de edición', 'Debe seleccionar un producto dando clic sobre el registro para poder editarlo!', 'info');
            //   alert("Debe seleccionar un producto dando clic sobre el registro para poder editarlo.");
        }
    }

    function openWindow() {
        $('#CrearCotizacion2').window('open');
        $("#textCliente").combo('enable');
        $("#textTipoMon").combo('enable');
        $("#txtFechaCreacion").datebox('enable');
        $('#btnAltaConcepto').show();
        $('#btnAltaConceptoEdit').hide();
        $('#fmCrearCotiza').form('clear');
        $('#dgProductosCotizacion').datagrid('loadData', []);
        $('#dgCotiza').datagrid('unselectAll');
        $('#iva').numberbox('setValue', 16);
    }

    $(document).ready(function () {
        $("#toolEditCotiza").hide();
    });

    //FUNCION QUE BORRA UNA PARTIDA, HACE EL CALCULO NUEVO DE SUBTOTALES Y TOTALES Y
    function borrarPartida() {
        var x = 10;
        var total = 0;
        var subtotal = 0;
        var row = $('#dgProductosCotizacion').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirma', '¿Esta seguro de eliminar la partida?', function (r) {
                if (r) {
                    //alert(r);
                    var index = $('#dgProductosCotizacion').datagrid('getRowIndex', row);
                    $('#dgProductosCotizacion').datagrid('deleteRow', index);
                    $('#dgProductosCotizacion').datagrid('reload');
                    var totalPartidas = $('#dgProductosCotizacion').datagrid('getRows').length;
                    var PartidaIndex;

                    for (PartidaIndex = 0; PartidaIndex < totalPartidas; PartidaIndex++) {
                        $('#dgProductosCotizacion').datagrid('updateRow', {
                            index: PartidaIndex,
                            row: {
                                id_item: x
                            }
                        });

                        x = x + 10;
                        var importeRow = $('#dgProductosCotizacion').datagrid('getRows')[PartidaIndex].importe_dado;
                        subtotal = subtotal + importeRow;
                        total = (subtotal * 0.16) + subtotal;
                    }
                    $('#subtotal').numberbox('setValue', subtotal);
                    $('#total').numberbox('setValue', total);
                }
            });
        }
        $('#dgProductosCotizacion').datagrid('reload');
    }

    //FUNCION PARA EDITAR UNA PARTIDA
    function abrirModalEdicionPartida(tipoOperacion) {
        switch (tipoOperacion) {
            case "EDICIONPARTIDA":

                var row = $('#dgProductosCotizacion').datagrid('getSelected');
                if (row) {
                    $("#dlgPartidas").dialog('open').dialog('setTitle', 'Editar Partida');
                    $("#fmCrearPartida").form('load', row);
                    $("#btnCerrarDialog").hide();
                    $("#btnAgregaConcepto").hide();
                    $("#btnEditarConcepto").show();


                    $('#comboDado').combogrid("setValue", row.id_header_dado);
                    $('#textCantidad').textbox("setValue", row.cantidad);
                    $('#textPrecioU').textbox("setValue", row.precio_unitario);
                    $('#ObserPartida').val(row.observacion_partida);

                }
                else {
                    $.messager.alert('Error de edición', 'Debe seleccionar un producto dando clic sobre el registro para poder editarlo!', 'info');
                    //   alert("Debe seleccionar un producto dando clic sobre el registro para poder editarlo.");
                }
                break;

            case "ALTAPARTIDA":


                var idCliente = $('#textCliente').combogrid('getValue');
                var tipoMonTxt = $('#textTipoMon').combobox('getValue');
                var descripcion = $('#ObserCotizacion').val();
                var fechaCreac = $('#txtFechaCreacion').val();
                //alert(fechaCreac);
                var dataCabeceraContent = 'DescCotizacion=' + descripcion + '&FechaCot=' + fechaCreac + '&TipoMonedaCot=' + tipoMonTxt + '&ClaveCliente=' + idCliente + '&operacionCot=Header&UpdateCotiza=1';
                //alert(dataCabeceraContent);
                if (idCliente != '') {
                    if (tipoMonTxt != '') {
                        if (fechaCreac != '') {
                            if (descripcion != '') {

                                dataCabeceraContent = 'DescCotizacion=' + descripcion + '&FechaCot=' + fechaCreac + '&TipoMonedaCot=' + tipoMonTxt + '&ClaveCliente=' + idCliente + '&operacionCot=Header&UpdateCotiza=1';

                                //alert(dataCabeceraContent);
                                $.ajax(
                                   {
                                       async: true,
                                       url: 'php/binding/Cotizaciones/setTrCotizacion.php',
                                       type: 'post',
                                       dataType: "json",
                                       data: dataCabeceraContent,
                                       success: function (request) {

                                           $("#btnAltaConcepto").hide();
                                           $("#dlgPartidas").dialog('open').dialog('setTitle', 'Nueva Partida');
                                           $("#fmCrearPartida").form('clear');
                                           $("#fmCrearPartida").form('load');
                                           $("#btnAgregaConcepto").show();
                                           $("#btnEditarConcepto").hide();
                                           $("#btnCerrarDialog").show();

                                       },
                                       error: function (request, settings) {
                                           //alert("Entre al error AJAX... "+ request.responseText);
                                           //alert(request.responseText);
                                       }
                                   });
                            } else {
                                $.messager.alert('Atenci&oacute;n', 'La descripción es un valor requerido.', 'info');
                            }
                        } else {
                            $.messager.alert('Atenci&oacute;n', 'La fecha de creación es un valor requerido.', 'info');
                        }
                    } else {
                        $.messager.alert('Atenci&oacute;n', 'La moneda es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atenci&oacute;n', 'El cliente es un valor requerido.', 'info');
                }
                break;

            case "GUARDAREDICION":
                var x = 10;
                var total = 0;
                var subtotal = 0;
                var row = $('#dgProductosCotizacion').datagrid('getSelected');
                var indexRow = $('#dgProductosCotizacion').datagrid('getRowIndex', row);
                //alert(indexRow);
                var idDado = $('#comboDado').combogrid('getValue');
                var dadoTxt = $('#comboDado').combobox('getText');
                var gDado = $('#comboDado').combogrid('grid');
                var indexDado = gDado.datagrid('getRowIndex', idDado);
                var rDado = gDado.datagrid('getRows')[indexDado];
                var descLong = rDado.descripcion_longitud;
                var descAcab = rDado.descripcion_acabado;
                var descDado = rDado.nombre_dado;

                var idCliente = $('#textCliente').combogrid('getValue');
                var clienteTxt = $('#textCliente').combobox('getText');

                var tipoMonTxt = $('#textTipoMon').combobox('getValue');
                var cantidadTxt = $('#textCantidad').numberbox('getValue');
                var precioUTxt = $('#textPrecioU').numberbox('getValue');
                var importeTxt = precioUTxt * cantidadTxt;
                var observacionPartida = $('#ObserPartida').val();


                if (idDado != '') {
                    if (cantidadTxt != '') {
                        if (precioUTxt != '') {
                            if (observacionPartida != '') {
                                $('#dgProductosCotizacion').datagrid('updateRow', {
                                    index: indexRow,
                                    row: {
                                        id_header_dado: idDado,
                                        id_cliente: idCliente,
                                        descripcion_dado: descDado,
                                        cantidad: cantidadTxt,
                                        longitud: descLong,
                                        clave_cliente: clienteTxt,
                                        clave_dado: dadoTxt,
                                        acabado_dado: descAcab,
                                        precio_unitario: precioUTxt,
                                        importe_dado: importeTxt,
                                        observacion_partida: observacionPartida

                                    }
                                });
                                var totalPartidas = $('#dgProductosCotizacion').datagrid('getRows').length;
                                var PartidaIndex;
                                for (PartidaIndex = 0; PartidaIndex < totalPartidas; PartidaIndex++) {
                                    $('#dgProductosCotizacion').datagrid('updateRow', {
                                        index: PartidaIndex,
                                        row: {
                                            id_item: x
                                        }
                                    });
                                    x = x + 10;
                                    var importeRow = parseFloat($('#dgProductosCotizacion').datagrid('getRows')[PartidaIndex].importe_dado);
                                    subtotal = subtotal + importeRow;
                                    total = subtotal * 1.16;
                                }
                                $('#subtotal').numberbox('setValue', subtotal);
                                $('#total').numberbox('setValue', total);
                                $('#dgProductosCotizacion').datagrid('reload');
                                var dataPartidaContent = 'IdHeaderDado=' + idDado + '&ItemCot=' + $('#dgProductosCotizacion').datagrid('getRows')[indexRow].id_item + '&CantPartidaCot=' + cantidadTxt + '&obserCoti=' + observacionPartida + '&PUPartidaCot=' + precioUTxt + '&operacionCot=updateDetalle&UpdateCotiza=2';
                                $.ajax(
                                       {
                                           async: true,
                                           url: 'php/binding/Cotizaciones/setTrCotizacion.php',
                                           type: 'post',
                                           dataType: "json",
                                           data: dataPartidaContent,
                                           success: function (request) {
                                               $('#subtotal').numberbox('setValue', subtotal);
                                               $('#total').numberbox('setValue', total);
                                               $('#dgProductosCotizacion').datagrid('reload');
                                               $('#dgProductosCotizacion').datagrid('reload');
                                               $("#dlgPartidas").dialog('close');
                                           },
                                           error: function (request, settings) {
                                               // alert("Entre al error AJAX... "+ request.responseText);
                                               //alert(request.responseText);
                                           }
                                       });


                            } else {
                                $.messager.alert('Atenci&oacute;n', 'Las observaciones de la partida son un valor requerido.', 'info');
                            }
                        } else {
                            $.messager.alert('Atenci&oacute;n', 'El precio unitario es un valor requerido.', 'info');
                        }
                    } else {
                        $.messager.alert('Atenci&oacute;n', 'La cantidad es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atenci&oacute;n', 'El dado es un valor requerido.', 'info');
                }
              
                

                break;

            case "AGREGAPARTIDA":
                $("#dlgPartidas").dialog('open').dialog('setTitle', 'Nueva Partida');
                $("#fmCrearPartida").form('clear');
                $("#fmCrearPartida").form('load');
                $("#btnAgregaConcepto").show();
                $("#btnEditarConcepto").hide();
                $("#btnCerrarDialog").show();
                break;
        }

    }// FIN


    function agregarConcepto() {
        var x = 10;
        var total = 0;
        var subtotal = 0;
        $("#toolEditCotiza").show();
        $("#textCliente").combo('disable');
        $("#textTipoMon").combo('disable');
        $("#txtFechaCreacion").combo('disable');


        var idDado = $('#comboDado').combogrid('getValue');
        var dadoTxt = $('#comboDado').combobox('getText');

        var gDado = $('#comboDado').combogrid('grid');
        var indexDado = gDado.datagrid('getRowIndex', idDado);
        var rDado = gDado.datagrid('getRows')[indexDado];
        var descLong = rDado.descripcion_longitud;
        var descAcab = rDado.descripcion_acabado;
        var descDado = rDado.nombre_dado;

        var idCliente = $('#textCliente').combogrid('getValue');
        var clienteTxt = $('#textCliente').combobox('getText');

        var tipoMonTxt = $('#textTipoMon').combobox('getValue');
        var cantidadTxt = $('#textCantidad').numberbox('getValue');
        var precioUTxt = $('#textPrecioU').numberbox('getValue');
        var importeTxt = precioUTxt * cantidadTxt;
        var observacionPartida = $('#ObserPartida').val();

        //Agregar validaciones para todos los campos, que no este vacios

        $('#dgProductosCotizacion').datagrid('appendRow', { 	// index start with
            id_header_dado: idDado,
            id_cliente: idCliente,
            id_item: x,
            descripcion_dado: descDado,
            cantidad: cantidadTxt,
            longitud: descLong,
            clave_cliente: clienteTxt,
            clave_dado: dadoTxt,
            acabado_dado: descAcab,
            precio_unitario: precioUTxt,
            importe_dado: importeTxt,
            observacion_partida: observacionPartida
        });
        var totalPartidas = $('#dgProductosCotizacion').datagrid('getRows').length;
        var PartidaIndex;
        for (PartidaIndex = 0; PartidaIndex < totalPartidas; PartidaIndex++) {
            $('#dgProductosCotizacion').datagrid('updateRow', {
                index: PartidaIndex,
                row: {
                    id_item: x
                }
            });

            x = x + 10;
            var importeRow = $('#dgProductosCotizacion').datagrid('getRows')[PartidaIndex].importe_dado;
            subtotal = parseFloat(subtotal) + parseFloat(importeRow);
            total = parseFloat(subtotal) * 1.16;
        }
        //var item = $('#dgProductosCotizacion').datagrid('getRows')[totalPartidas-1].id_item;
        var dataPartidaContent = 'IdHeaderDado=' + idDado + '&ItemCot=' + $('#dgProductosCotizacion').datagrid('getRows')[totalPartidas - 1].id_item + '&CantPartidaCot=' + cantidadTxt + '&obserCoti=' + observacionPartida + '&PUPartidaCot=' + precioUTxt + '&operacionCot=Detalle&UpdateCotiza=1';
        //var dataPartidaContent = 'IdHeaderDado=' + idDado + '&ItemCot=' +x+ '&CantPartidaCot=' + cantidadTxt + '&obserCoti=' + observacionPartida + '&PUPartidaCot=' + precioUTxt + '&operacionCot=Detalle';

        //alert(dataPartidaContent);
        $.ajax(
               {
                   async: true,
                   url: 'php/binding/Cotizaciones/setTrCotizacion.php',
                   type: 'post',
                   dataType: "json",
                   data: dataPartidaContent,
                   success: function (request) {

                       // $('#txtHiddenIDCot').val(request.ID_COTIZACION);
                       // alert("El id de cotizacion es = "+request.ID_COTIZACION);
                       //alert('Estamos en el IF El valor del id es: '+request.ID_COTIZACION);
                       //alert(request.responseText);
                       $('#dgProductosCotizacion').datagrid('reload');
                       $('#subtotal').numberbox('setValue', subtotal);
                       $('#total').numberbox('setValue', total);
                   },
                   error: function (request, settings) {
                       //alert("Entre al error AJAX... "+ request.responseText);
                       //alert(request.responseText);
                   }
               });


    }
    //FUNCIóN PARA EL GUARDADO DE LA COTIZACIóN.
    function guardaCotizacion() {
        //EXTRAYENDO EL VALORES DE LA COTIZACIóN:
        var subTotalCot = $('#subtotal').textbox('getValue');
        var TotalCot = $('#total').textbox('getValue');
        var dataPartidaContent = 'SubTotCot=' + subTotalCot + '&TotCot=' + TotalCot + '&operacionCot=TerminarCot&UpdateCotiza=2';


        $.ajax(
               {
                   async: true,
                   url: 'php/binding/Cotizaciones/setTrCotizacion.php',
                   type: 'post',
                   dataType: "json",
                   data: dataPartidaContent,
                   success: function (request) {
                       //$('#txtHiddenIDCot').val(request.ID_COTIZACION);
                       //alert("El id de cotizacion es = "+request.ID_COTIZACION +"El index de la partida es = "+PartidaIndex );
                   },
                   error: function (request, settings) {
                       //alert("Entre al error AJAX... "+ request.responseText);
                       //alert(request.responseText);
                   }
               });
        $('#CrearCotizacion2').window('close');
        //$('#dgProductosCotizacion').datagrid('reload');

        $.messager.alert({
            title: 'Operación',
            msg: '¡Cotización guardada exitosamente!',
            fn: function () {

                $('#dgCotiza').datagrid('reload');


            }


        });

    }
</script>
