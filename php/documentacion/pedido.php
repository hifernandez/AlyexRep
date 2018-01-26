<!--DATAGRID PARA PEDIDOS A PARTIR DE LAS COTIZACIONES--->
<table id="dgCotizaPed" title="Cotizaciones aprobadas" class="easyui-datagrid" style="width:auto;height:450px;"
       url="php/binding/Pedidos/getTrCotizaAprob.php" ;
       toolbar="#toolPedidos"
       rownumbers="true"
       fitColumns="false"
       singleSelect="true"
       pagination="true"
       loadMsg="Cargando información...">
    <thead>
        <tr>
            <th data-options="field:'id_cotizacion'">ID Cotización</th>
            <th data-options="field:'fecha_cotizacion'">Fecha Cotización</th>
            <th data-options="field:'razon_social_cliente'">Nombre cliente</th>            
            <th data-options="field:'clave_cliente'">Clave Cliente</th>
            <th data-options="field:'subtotal_cotizacion'">Subtotal </th>
            <th data-options="field:'total_cotizacion'">Total</th>
            <th data-options="field:'total_kilos'">Total de Kilos</th>
            <th data-options="field:'observaciones_cotizacion'">Observaciones</th>
            <th data-options="field:'cotizacion_status'">Estatus</th>
        </tr>
    </thead>
</table>
<!---TOOLS PARA BOTONES DE CREACIÓN DE PEDIDO-->
<div id="toolPedidos">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="confirmaOperacionPedido('CREACION')">Crear pedido</a>
    <!---<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="openWinPedidos()">Editar pedido</a>-->
    <br>
</div>

<!---WINDOW PARA LA CREACIÓN DEL PEDIDO-->
<!-- ******************************** -->
<div id="winCrearPedido" class="easyui-window" title="Creación de pedido" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width: auto;height:auto;padding:5px;">
    <form id="fmCrearPedido" method="post" novalidate>
		<div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Cabecera pedido</div>
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
                        No. Orden de compra:
                    </td>
                    <TD>
                        <input id="odcPedidoTxt"  class="easyui-textbox" prompt="ODC" data-options="" style="width:200px">
                    </TD>
                    <td>
                       Cotización Origen:
                    </td>
                    <TD>
                        <input id="cotOrigPedidotxt" class="easyui-textbox" prompt="no. cotización" data-options="" style="width:200px">
                    </TD>
                    <td>
                        Número de Proveedor:
                    </td>
                    <TD>
                        <input id="noProveedortxt" class="easyui-textbox" prompt="no. proveedor" data-options="" style="width:200px">
                    </TD>
                    
                </TR>
				<TR>
                    <td>
                        Documento ODC:
                    </td>
                    <td>
                        <input id="fileODCped" name="fileODCped" class="f1 easyui-filebox"  style="width:200px"></input>
                    </td>
					<td>
                        Fecha de recepción:
                    </td>
                    <TD>
                        <input data-options="required:true" id="FechaCreaciontxt" name="FechaCreaciontxt" class="easyui-datebox" prompt="Fecha" data-options="" style="width:200px">
                    </TD>
					 <td>Observaciones:</td>
                    <td>
                        <textarea data-options="required:true" id="ObserCotizaciontxt" class="form-control custom-control" cols="4" rows="3" style="resize:none"></textarea>
                    </td>
				</TR>
                
                <TR>
                    <TD></TD>
                    <td></td>
                    <TD colspan="2">
                        <div align="center">
                            
                            <!--AQUI PUEDE IR UN AVISO/INSTEUCCIONES PARA LA ASIGNACIÓN DE FECHAS DE ENTREGA-->

                        </div>
                    </TD>
                    <td></td>
                    <TD></TD>
                </TR>
            </table>
            <!--DATAGRID PARA PEDIDOS A PARTIR DE LAS COTIZACIONES--->
            <table id="dgPartidasPed" title="Partidas pedido" class="easyui-datagrid" style="width:auto;height:auto;"
                   toolbar="#toolPartidasPed"
                   rownumbers="true"
                   fitColumns="true"
				   resizable = "true"
                   singleSelect="true"
                   pagination="true"
                   loadMsg="Cargando información...">
                <thead>
                    <tr>
                        <th data-options="field:'id_header_dado'" hidden></th>
                        <th data-options="field:'id_cliente'" hidden></th>
                        <th data-options="field:'id_item'">ITEM</th>
                        <th data-options="field:'cantidad'">CANTIDAD</th>
                        <th data-options="field:'descripcion_dado'">DESCRIPCION</th>
                        <th data-options="field:'clave_dado',">CLAVE DADO</th>
                        <!--<th data-options="field:'clave_cliente'">CLAVE CLIENTE</th>-->
                        <th data-options="field:'longitud'">LONGITUD</th>
                        <th data-options="field:'acabado_dado'">ACABADO</th>
                        <th data-options="field:'precio_unitario'"> PRECIO UNITARIO</th>
                        <th data-options="field:'importe_dado'">IMPORTE</th>
                        <th data-options="field:'pt_ml'">PT ML</th>
                        <th data-options="field:'kilos'">KILOS</th>
                        <th data-options="field:'fecha_entrega'">FECHA DE ENTREGA</th>
                    </tr>
                </thead>
            </table>
            <div style="margin-bottom:5px">
            </div>
            <!--BOTÓN PARA EL GUARDADO DEL PEDIDO-->
            <div align="center">
                <button id="btnAltaPedido" type="button" onclick="guardaPedido()" class="btn btn-primary btn-s">CREAR PEDIDO</button>
            </div>            
            <!---TOOLS PARA BOTONES DE CREACIÓN DE PEDIDO-->
            <div id="toolPartidasPed">
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="crearFechaEntregaPartida('CREACION')">Ingresar Fecha de entrega</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="crearFechaEntregaPartida('EDICION')">Editar fecha de entrega</a>
                <br>
            </div>

        </div>

	</form>
		
    </div> 
<!---FIN WINDOW PARA LA CREACIÓN DEL PEDIDO-->
<!-- ******************************** -->

<!---INICIO DIALOG PARA LA CREACIÓN DE LA FECHA DE ENTREGA-->
<!-- ******************************** -->
<div id="dlgFechaEntrega" class="easyui-dialog" style="width:auto"
     closed="true" modal="true">

    <form id="fmFechaEntregaPed" method="post" novalidate style="margin:0;padding:20px 50px">
        <div style="margin-bottom:5px;font-size:14px;border-bottom:1px solid #ccc">Datos de entrega compretida:</div>
        <table>
            <tr>
              
                <TD>
                    <input data-options="required:true" id="FechaEntregaDteBox" name="FechaEntregaDteBox" class="easyui-datebox" prompt="Fecha" data-options="" style="width:200px">
                </TD>
            </tr>
            <tr>
                <TD colspan="2">
                    <div style="margin-bottom:5px">
                    </div>
                    <div align="center">                      
                            <button id="btnGuardaFechaEntrega" type="button" onclick="crearFechaEntregaPartida('GUARDADO')" class="btn btn-primary btn-s">Asignar Fecha</button>
                        <button id="btnEditaFechaEntrega" type="button" onclick="crearFechaEntregaPartida('GUARDADO')" class="btn btn-primary btn-s">Editar Fecha</button>
                    </div>
                </TD>
            </tr>
        </table>
    </form>




</div>
<!---FIN DIALOG PARA LA CREACIÓN DE LA FECHA DE ENTREGA-->
<!-- ******************************** -->


    <!-- SCRIPTS PARA FUNCIONES -->
    <script>

        $(document).ready(function () {
            $("#dgCotizaPed").datagrid('reload');

            $('#fileODCped').filebox({
                buttonText: 'Selecciona',

            });


        });

        //Funciones para fecha de entrega de las partidas.
        function crearFechaEntregaPartida(tipoOperacion) {

            switch (tipoOperacion) {

                case "CREACION":

                    //Limpiando el control del calendario. 
                    $("#FechaEntregaDteBox").datebox('setValue', '');

                    var row = $('#dgPartidasPed').datagrid('getSelected');

                    if (row) {

                        $("#btnEditaFechaEntrega").hide();
                        $("#btnGuardaFechaEntrega").show();
                        $("#dlgFechaEntrega").dialog('open').dialog('setTitle', 'Asignación de fecha de entrega');
                       
                    } else {

                        $.messager.alert({
                            title: 'Atención',
                            icon: 'info',
                            msg: 'Debe seleccionar una partida del pedido dando click sobre el registro para asignar una fecha de entrega.',
                            fn: function () {

                                $("#dgPartidasPed").datagrid('reload');


                            }
                        });

                    }


                    break;


                case "EDICION":

                    //Limpiando el control del calendario. 
                    $("#FechaEntregaDteBox").datebox('setValue', '');

                    var row = $('#dgPartidasPed').datagrid('getSelected');

                    if (row) {

                        var fechaEntrega = row.fecha_entrega;

                            //Ocultando botón de creación.
                            $("#btnGuardaFechaEntrega").hide();
                            $("#btnEditaFechaEntrega").show();
                            $("#dlgFechaEntrega").dialog('open').dialog('setTitle', 'Actualización de fecha de entrega');
                            
                             //Asignando valor de fecha.
                            $("#FechaEntregaDteBox").datebox('setValue', fechaEntrega);


                    } else {

                        $.messager.alert({
                            title: 'Atención',
                            icon: 'info',
                            msg: 'Debe seleccionar una partida del pedido dando click sobre el registro para editar la fecha de entrega.',
                            fn: function () {

                                $("#dgPartidasPed").datagrid('reload');


                            }
                        });

                    }



                    break;
            
                case "GUARDADO":

                    var fechaEntregaControl = $('#FechaEntregaDteBox').datebox('getValue');

                    if (fechaEntregaControl != '') {
                    
                        //Obteniendo partida a la que se le asignará la fecha de entrega.
                        var rowPartida = $('#dgPartidasPed').datagrid('getSelected');
                        var indexRow = $('#dgPartidasPed').datagrid('getRowIndex', rowPartida);

                        //Actualizando la fecha de entrega de la partida. 
                        $('#dgPartidasPed').datagrid('updateRow', {
                            index: indexRow,
                            row: {
                                fecha_entrega: fechaEntregaControl
                            }
                        });

                        //Actualizando la fecha de entrega del item en BD. 

                        var rowCot = $('#dgCotizaPed').datagrid('getSelected');
                        var IDcotizaPartida = rowCot.id_cotizacion;
                        var IDItemPartida = rowPartida.id_item;

                        var dataPartidaFechaEntPost = 'IdCotiza=' + IDcotizaPartida +
                                                       '&IdItem=' + IDItemPartida +
                                                       '&FechaEntrega=' + fechaEntregaControl;

                        //Llamado AJAX para creación pedido.
                        $.ajax(
                        {
                            async: true,
                            url: 'php/binding/Pedidos/setTrFechaEntrega.php',
                            type: 'post',
                            dataType: "json",
                            data: dataPartidaFechaEntPost,
                            success: function (request) {


                                //confirmaOperacionPedido("PFECHA_GUARDADA");

                            },
                            error: function (request, settings) {

                                //confirmaOperacionPedido("ERROR");
                            }
                        });
                        //FIN llamado AJAX creación pedido.







                        //FIN actualización de fecha de entrega en BD. 





                        //Cerrando dialog.
                        $("#dlgFechaEntrega").dialog('close');

                    
                    }else{
        
                            $.messager.alert({
                            title: 'Atención',
                            icon: 'info',
                            msg: 'Debe seleccionar una fecha del calendario para continuar.'
                            });

            
                    }


                    break;


                case "ACTUALIZACION":

                    var fechaEntregaControl = $('#FechaEntregaDteBox').datebox('getValue');

                    if (fechaEntregaControl != '') {

                        //Obteniendo partida a la que se le asignará la fecha de entrega.
                        var row = $('#dgPartidasPed').datagrid('getSelected');
                        var indexRow = $('#dgPartidasPed').datagrid('getRowIndex', row);

                        //Actualizando la fecha de entrega de la partida. 
                        $('#dgPartidasPed').datagrid('updateRow', {
                            index: indexRow,
                            row: {
                                fecha_entrega: fechaEntregaControl
                            }
                        });


                        //Obteniendo partida a la que se le asignará la fecha de entrega.
                        var rowPartida = $('#dgPartidasPed').datagrid('getSelected');
                        var indexRow = $('#dgPartidasPed').datagrid('getRowIndex', rowPartida);

                        //Actualizando la fecha de entrega de la partida. 
                        $('#dgPartidasPed').datagrid('updateRow', {
                            index: indexRow,
                            row: {
                                fecha_entrega: fechaEntregaControl
                            }
                        });

                        //Actualizando la fecha de entrega del item en BD. 

                        var rowCot = $('#dgCotizaPed').datagrid('getSelected');
                        var IDcotizaPartida = rowCot.id_cotizacion;
                        var IDItemPartida = rowPartida.id_item;

                        var dataPartidaFechaEntPost = 'IdCotiza=' + IDcotizaPartida +
                                                       '&IdItem=' + IDItemPartida +
                                                       '&FechaEntrega=' + fechaEntregaControl;

                        //Llamado AJAX para creación pedido.
                        $.ajax(
                        {
                            async: true,
                            url: 'php/binding/Pedidos/setTrFechaEntrega.php',
                            type: 'post',
                            dataType: "json",
                            data: dataPartidaFechaEntPost,
                            success: function (request) {


                                //confirmaOperacionPedido("PFECHA_GUARDADA");

                            },
                            error: function (request, settings) {

                                //confirmaOperacionPedido("ERROR");
                            }
                        });
                        //FIN llamado AJAX creación pedido.

                        //Cerrando dialog.
                        $("#dlgFechaEntrega").dialog('close');


                    } else {

                        $.messager.alert({
                            title: 'Atención',
                            icon: 'info',
                            msg: 'Debe seleccionar una fecha del calendario para continuar.'
                        });


                    }


                    break;


            }










        }
        //FIN: Funciones para fecha de entrega de las partidas.






        //Función para carga del grid de las partidas del pedido.
        function cargaPartidasPed(idCotizacion) {

            //Variables.
            var getDataId = "php/binding/Cotizaciones/getProdById.php?id_Cotizacion=" + idCotizacion + "&tipo_Oper=pedido";

            $('#dgPartidasPed').datagrid({
                method: 'get',
                url: getDataId
            });




        }


        //Función para crear pedidos a partir de una cotización aprobada.
        function guardaPedido() {

            //Controles
            var p_odc_ped = $("#odcPedidoTxt").val();
            var p_cotOrigen = $("#cotOrigPedidotxt").val();
            var p_noProveedor = $("#noProveedortxt").val();
            var p_fechaRecep = $("#FechaCreaciontxt").val();
            var p_ObservaPed = $("#ObserCotizaciontxt").val();
            //TO-DO:pendiente extracción de FILE para envio por POST del control "fileODCped".

            //Validaciones de campos requeridos.
            if (p_odc_ped != '') {

                if (p_noProveedor != '') {

                    if (p_fechaRecep != '') {

                        var dataPedidoPost = 'ODCped=' + p_odc_ped + '&IdCotiza=' +
                                             p_cotOrigen + '&NoProveedor=' + p_noProveedor +
                                             '&FechaRecep=' + p_fechaRecep + '&ObservPed=' + p_ObservaPed;

                        // $.messager.alert('Atención', 'DATA:' + dataPedidoPost, 'info');

                        //Llamado AJAX para creación pedido.
                        $.ajax(
                        {
                            async: true,
                            url: 'php/binding/Pedidos/setTrPedido.php',
                            type: 'post',
                            dataType: "json",
                            data: dataPedidoPost,
                            success: function (request) {


                                confirmaOperacionPedido("GUARDADO");

                            },
                            error: function (request, settings) {

                                confirmaOperacionPedido("GUARDADO");
                            }
                        });
                        //FIN llamado AJAX creación pedido.


                    } else {
                        $.messager.alert('Atención', 'La fecha de recepción es un valor requerido.', 'info');
                    }//Else: validacion fecha de recepción.

                } else {
                    $.messager.alert('Atención', 'El no. de proveedor es un valor requerido.', 'info');
                }//Else:validación no proveedor.

            } else {
                $.messager.alert('Atención', 'El no. de orden de compra es un valor requerido.', 'info');
            }//Else:validación odc.
            //FIN VALIDACIONES ENTRADA.




        }





        //PARA ENVIO DE MENSAJES SEGÚN LA OPERACIÓN:
        function confirmaOperacionPedido(tipoOperacion) {

            switch (tipoOperacion) {

                case "CREACION":

                    var row = $('#dgCotizaPed').datagrid('getSelected');
                    if (row) {

                        //Variables.row.id_cotizacion
                        var idCotizacion = row.id_cotizacion;

                        $('#fmCrearPedido').form('clear');
                        $('#winCrearPedido').window('open');

                        //Asignación de valores a campos del formulario.
                        $('#cotOrigPedidotxt').textbox("setValue", idCotizacion);
                        $('#cotOrigPedidotxt').textbox("disable");

                        //Carga de las partidas del pedido.
                        cargaPartidasPed(idCotizacion);


                    } else {

                        $.messager.alert({
                            title: 'Atención',
                            icon: 'info',
                            msg: 'Debe seleccionar una cotización dando click sobre el registro para crear un pedido.',
                            fn: function () {

                                $("#dgCotizaPed").datagrid('reload');


                            }
                        });



                    }

                    break;

                case "GUARDADO":

                    $('#fmCrearPedido').form('clear');
                    $('#winCrearPedido').window('close');

                    $.messager.alert({
                        title: 'Operación',
                        msg: '¡Pedido creado exitosamente!. Se envío al pool de pedidos pendiente de autorización.',
                        fn: function () {

                            $('#dgCotizaPed').datagrid('reload');

                        }


                    });
                    break;

                    //Operación guardado de la fecha de entrega de la partida en BD.
                case "PFECHA_GUARDADA":








                    break;

                    //Operación de edición.
                case "EDICION":

                    $('#dlgAcabados').dialog('close');
                    $('#fmEditarAcabado').form('clear');

                    $.messager.alert({
                        title: 'Operación',
                        msg: '¡Acabado actualizado exitosamente!',
                        fn: function () {

                            $('#dgAcabados').datagrid('reload');

                        }


                    });

                    break;
                    //Fin de operación de edición.
                case "BORRADO":

                    $.messager.alert({
                        title: 'Operación',
                        msg: '¡Acabado eliminado exitosamente!',
                        fn: function () {

                            $('#dgAcabados').datagrid('reload');


                        }


                    });

                    break;

                case "ERROR":

                    $('#fmCrearPedido').form('clear');
                    $('#winCrearPedido').window('open');


                    $.messager.alert({
                        title: 'Operación',
                        icon: 'warning',
                        msg: '¡Ha ocurrido un error inesperado!. Comuniquese con el administrador de sistemas.',
                        fn: function () {

                            $('#dgCotizaPed').datagrid('reload');


                        }


                    });

                    break;
            }


        }



        function none() {


        }

    </script>
