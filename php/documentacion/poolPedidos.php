<table id="dgPoolPedidos" title="Pool pedidos" class="easyui-datagrid" style="width:auto;height:450px;"
       url="php/binding/Pedidos/getTrPedidos.php" ;
       toolbar="#toolPoolPedidos"
       rownumbers="true"
       fitColumns="true"
       singleSelect="true"
       pagination="true"
       loadMsg="Cargando información...">
    <thead>
        <tr>
            <!--<th field="ck" checkbox="true" ></th>-->
            <!--<th data-options="field:'id_cotizacion'" hidden></th>-->
            <th data-options="field:'id_pedido',width:33">ID Pedido</th>
            <th data-options="field:'id_cotizacion',width:33">Cotización origen</th>
            <th data-options="field:'nombre_cliente',width:33">Cliente</th>
            <th data-options="field:'fecha_recepcion',width:33,editor:'text'">Fecha recepción ODC</th>
            <th data-options="field:'status_ped',width:33, editor:'text'">Estatus</th>
        </tr>
    </thead>
</table>
<!--Cargando la barra de edición y busqueda-->
<div id="toolPoolPedidos">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="cambiaEstatusPed('AUTORIZAR')">Autorizar Pedido</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="cambiaEstatusPed('RECHAZAR')">Rechazar Pedido</a>
    <br>

</div>


<!-- ******************************** -->
<script>

    /* $(document).ready(function ()
	{
         $('#dgPoolCotizacionesciones').datagrid('reload');   // reload the user data

    });*/
    function cambiaEstatusPed(tipoOperacion) {
        switch (tipoOperacion) {
            case "AUTORIZAR":


                var row = $('#dgPoolPedidos').datagrid('getSelected');
                if (row) {


                    $.messager.confirm({
                        title: 'Operación',
                        msg: '¿Desea autorizar el pedido?. Será convertido en ordenes de trabajo.',
                        cancel: 'Cancelar',
                        fn: function (r) {
                            if (r) {
                                var ID_pedido = row.id_pedido;
                                var flag_oper = "AUTORIZAR";
                                var motivoRechaza = "-";
                                //alert("El id del cliente seleccionado es:" + ID_cliente);
                                var dataPedidoContent = 'IDPedido=' + ID_pedido +
                                                        '&Flag_Oper=' + flag_oper +
                                                        '&MotivoRechaza=' + motivoRechaza;
                               // alert(dataPedidoContent);
                                //Preparado post.
                                $.ajax({
                                    url: 'php/binding/Pedidos/updateTrPedido.php',
                                    type: 'post',
                                    dataType: "json",
                                    data: dataPedidoContent,
                                    success: function (request) {
                                        //$('#IDCliente').val(request.ID_CLIENTE);
                                        //alert("MESAJE RETORNO: "+request.MESSAGE);
                                        if (request.success == true) {
                                            confirmaOperacionPed('AUTORIZAR');
                                        } else {
                                            alert("Ocurrio un error");
                                        }
                                    },
                                    error: function (request, settings) {
                                        alert("Entre al error AJAX... " + request.responseText);
                                        //alert(request.responseText);
                                    }
                                });
                            } else {
                                $('#dgPoolPedidos').datagrid('reload');
                            }
                        }
                    });


                } else {

                    $.messager.alert({
                        title: 'Atención',
                        icon: 'info',
                        msg: 'Debe seleccionar un pedido dando click sobre el registro para poder autorizarlo.',
                        fn: function () {

                            $('#dgPoolPedidos').datagrid('reload');


                        }


                    });
                }



                break;
                case "RECHAZAR":


                var row = $('#dgPoolPedidos').datagrid('getSelected');
                if (row) {


                    $.messager.confirm({
                        title: 'Operación',
                        msg: '¿Desea cancelar el pedido?.',
                        cancel: 'Cancelar',
                        fn: function (r) {
                            if (r) {
                                var ID_pedido = row.id_pedido;
                                var flag_oper = "RECHAZAR";
                                var motivoRechaza = "-";
                                //alert("El id del cliente seleccionado es:" + ID_cliente);
                                var dataPedidoContent = 'IDPedido=' + ID_pedido +
                                                        '&Flag_Oper=' + flag_oper +
                                                        '&MotivoRechaza=' + motivoRechaza;
                                //alert(dataPedidoContent);
                                //Preparado post.
                                $.ajax({
                                    url: 'php/binding/Pedidos/updateTrCancelPedido.php',
                                    type: 'post',
                                    dataType: "json",
                                    data: dataPedidoContent,
                                    success: function (request) {
                                        //$('#IDCliente').val(request.ID_CLIENTE);
                                        //alert("MESAJE RETORNO: "+request.MESSAGE);
                                        if (request.success == true) {
                                            confirmaOperacionPed('RECHAZAR');
                                        } else {
                                            alert("Ocurrio un error");
                                        }
                                    },
                                    error: function (request, settings) {
                                        alert("Entre al error AJAX... " + request.responseText);
                                        //alert(request.responseText);
                                    }
                                });
                            } else {
                                $('#dgPoolPedidos').datagrid('reload');
                            }
                        }
                    });


                } else {

                    $.messager.alert({
                        title: 'Atención',
                        icon: 'info',
                        msg: 'Debe seleccionar un pedido dando click sobre el registro para poder autorizarlo.',
                        fn: function () {

                            $('#dgPoolPedidos').datagrid('reload');


                        }


                    });
                }



                break;

        }

    }


    //Función para mensajes de confirmación. 
    function confirmaOperacionPed(tipoOperacion) {
        switch (tipoOperacion) {


            case "AUTORIZAR":
                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Pedido autorizado exitosamente!',
                    fn: function () {
                        $('#dgPoolPedidos').datagrid('reload');
                    }
                });
                break;

            case "RECHAZAR":

                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Pedido rechazado exitosamente!',
                    fn: function () {
                        $('#dgPoolPedidos').datagrid('reload');
                    }
                });
                break;


        }
    }


    </script>
