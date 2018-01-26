
<table id="dgPoolDibujos" title="Pool dibujos" class="easyui-datagrid" style="width:auto;height:450px;"
       url="php/binding/RD/getCatRD.php"
       toolbar="#toolPoolDibujos"
       rownumbers="true"
       fitColumns="true"
       singleSelect="true"
       pagination="true"
       loadMsg="Cargando información...">
    <thead>
        <tr>
            <th data-options="field:'id_nvodibujo'" hidden></th>
            <th data-options="field:'id_header'" hidden></th>
            <th data-options="field:'id_cliente'" hidden></th>
            <th data-options="field:'id_header_dado'" hidden></th>

            <th data-options="field:'id_temple_dado'" hidden></th>
            <th data-options="field:'id_acabado'" hidden></th>
            <th data-options="field:'id_aleacion_dado'" hidden></th>

            <th data-options="field:'cod_nvodibujo'">Código del dibujo</th>
            <th data-options="field:'nombre_dado'">Nombre del dibujo</th>
            <th data-options="field:'ton_men_nvodibujo'">Tonelaje mensual</th>
            <th data-options="field:'ton_anual_nvodibujo'">Tonelaje anual</th>
            <th data-options="field:'piezas_paquete_nvodibujo'">Piezas por paquete</th>
            <th data-options="field:'observacion_dado'">Observaciones</th>
            <th data-options="field:'cotizacion_status'">Estatus</th>
        </tr>
    </thead>
</table>
<!--Cargando la barra de edición y busqueda-->
<div id="toolPoolDibujos">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="cambiaEstatusRD('APROBAR')">Aprobar dibujo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="cambiaEstatusRD('CANCELAR')">Cancelar dibujo</a>
    <br>

</div>


<!-- ******************************** -->
<script>
    /* $(document).ready(function ()
     {
          $('#dgPoolDibujosciones').datagrid('reload');   // reload the user data

     });Ç*/
    function cambiaEstatusRD(tipoOperacion) {
        switch (tipoOperacion) {
            case "APROBAR":
                var row = $('#dgPoolDibujos').datagrid('getSelected');
                if (row) {


                    $.messager.confirm({
                        title: 'Operación',
                        msg: '¿Desea aprobar la cotización?. Será enviada al pool de RD.',
                        cancel: 'Cancelar',
                        fn: function (r) {
                            if (r) {
                                var ID_dibujo = row.id_nvodibujo;
                                var ID_header = row.id_header_dado;
                                var flag_oper = "APROBAR";
                                var motivoCancela = "-";
                                //alert("El id del cliente seleccionado es:" + ID_cliente);
                                var dataCotizaContent = 'IDdibujo=' + ID_dibujo +
                                                           '&IDHeader=' + ID_header +
                                                        '&Flag_Oper=' + flag_oper +
                                                        '&MotivoCancela=' + motivoCancela;
                                alert(dataCotizaContent);
                                //Preparado post.
                                $.ajax({
                                    url: 'php/binding/RD/updateStatusRD.php',
                                    type: 'post',
                                    dataType: "json",
                                    data: dataCotizaContent,
                                    success: function (request) {
                                        //$('#IDCliente').val(request.ID_CLIENTE);
                                        //alert("MESAJE RETORNO: "+request.MESSAGE);
                                        if (request.success == true) {
                                            confirmaOperacionDib('APROBAR');
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
                                $('#dgPoolDibujos').datagrid('reload');
                            }
                        }
                    });


                } else {

                    $.messager.alert({
                        title: 'Atención',
                        icon: 'info',
                        msg: 'Debe seleccionar un dibujo dando click sobre el registro para poder aprobarla.',
                        fn: function () {

                            $('#dgPoolDibujos').datagrid('reload');


                        }


                    });
                }
                break;
            case "CANCELAR":
                var row = $('#dgPoolDibujos').datagrid('getSelected');
                if (row) {
                    $.messager.confirm({
                        title: 'Operación',
                        msg: '¿Desea cancelar la cotización?. Será descartada y no tendrá continuidad.',
                        cancel: 'Cancelar',
                        fn: function (rCancel) {
                            if (rCancel) {
                                //$('#dlgMotivoRD').dialog('OPEN');
                                $.messager.prompt({
                                    title: 'Motivo de cancelación',
                                    msg: '¿Cuál es el motivo por el cual se cancela este dibujo?',
                                    fn: function (rMotivo) {
                                        if (rMotivo) {
                                            var ID_dibujo = row.id_nvodibujo;
                                            var ID_header = row.id_header_dado;
                                            var flag_oper = "CANCELAR";
                                            var motivoCancela = rMotivo;

                                            var dataCotizaContent = 'IDdibujo=' + ID_dibujo +
                                                                        '&IDHeader=' + ID_header +
                                                                        '&Flag_Oper=' + flag_oper +
                                                                        '&MotivoCancela=' + motivoCancela;
                                            //Preparado post.
                                            $.ajax({
                                                url: 'php/binding/RD/updateStatusRD.php',
                                                type: 'post',
                                                dataType: "json",
                                                data: dataCotizaContent,
                                                success: function (request) {
                                                    //$('#IDCliente').val(request.ID_CLIENTE);
                                                    //alert("MESAJE RETORNO: "+request.MESSAGE);
                                                    if (request.success == true) {
                                                        confirmaOperacionDib('CANCELAR');
                                                    } else {
                                                        alert("Ocurrio un error");
                                                    }
                                                },
                                                error: function (request, settings) {
                                                    alert("Entre al error AJAX... " + request.responseText);
                                                    //alert(request.responseText);
                                                }
                                            });

                                        }
                                    }
                                });
                            } else {
                                $('#dgPoolDibujos').datagrid('reload');
                            }
                        }
                    });
                } else {
                    $.messager.alert({
                        title: 'Atención',
                        icon: 'info',
                        msg: 'Debe seleccionar un dibujo dando click sobre el registro para poder cancelarla.',
                        fn: function () {
                            $('#dgPoolDibujos').datagrid('reload');
                        }
                    });
                }
                break;
        }
    }
    //Función para mensajes de confirmación.
    function confirmaOperacionDib(tipoOperacion) {
        switch (tipoOperacion) {
            case "APROBAR":
                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Cotización aprobada exitosamente!',
                    fn: function () {
                        $('#dgPoolDibujos').datagrid('reload');
                    }
                });
                break;
            case "CANCELAR":

                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Cotización cancelada exitosamente!',
                    fn: function () {
                        $('#dgPoolDibujos').datagrid('reload');
                    }
                });
                break;










        }
    }
</script>