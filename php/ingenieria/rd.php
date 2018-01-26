<!--DATAGRID PARA PEDIDOS A PARTIR DE LAS COTIZACIONES--->
<table id="dgAproDib" title="Dibujos aprobados" class="easyui-datagrid" style="width:auto;height:450px;"
       url="php/binding/RD/getCatRDAprob.php" ;
       toolbar="#toolRD"
       rownumbers="true"
       fitColumns="false"
       singleSelect="true"
       pagination="true"
       loadMsg="Cargando información...">
    <thead>
        <tr>
            <th data-options="field:'id_dibujo'" hidden></th>
            <th data-options="field:'id_detail_dado'" hidden></th>
            <th data-options="field:'id_header_dado'" hidden></th>
            <th data-options="field:'id_status'" hidden></th>

            <th data-options="field:'clave_dado'" hidden></th>
            <th data-options="field:'digito_dado'" hidden></th>
            <th data-options="field:'cav_dado'" hidden></th>
            <th data-options="field:'r_extrusion_dado'" hidden></th>
            <th data-options="field:'id_tipo'" hidden></th>
            <th data-options="field:'fecha_recepcion'" hidden></th>
            <th data-options="field:'observaciones_dibujo'" hidden></th>


            <th data-options="field:'cod_nvodibujo'">Código del dibujo</th>
            <th data-options="field:'nombre_dado'">Nombre del dibujo</th>
            <th data-options="field:'observacion_dado'">Observaciones del dado</th>
            <th data-options="field:'estatusDib'">Estatus Dibujo</th>
            <th data-options="field:'estatusRD'">Estatus para el RD</th>
        </tr>
    </thead>
</table>
<!---TOOLS PARA BOTONES DE CREACIÓN DE PEDIDO-->
<div id="toolRD">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="confirmaOperacionRD('CREACION')">Crear RD</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="confirmaOperacionRD('EDICION')">Editar RD</a>
    <!---<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="openWinPedidos()">Editar pedido</a>-->
    <br>
</div>

<!---WINDOW PARA LA CREACIÓN DEL PEDIDO-->
<!-- ******************************** -->
<div id="winCrearRD" class="easyui-window" title="Creación de RD" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width: auto;height:auto;padding:5px;">
    <form id="fmCrearRD" method="post" novalidate>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Cabecera RD</div>
            <!-- Table -->
            <table class="table">
                <TR>
                    <TD colspan="5"></TD>
                </TR>
                <TR>
                    <td>
                        Código dibujo:
                    </td>
                    <TD>
                        <input id="codDibujotxt" class="easyui-textbox" prompt="cod. dibujo" data-options="" style="width:200px">
                    </TD>
                    <td>
                        Clave Alyex:
                    </td>
                    <TD>
                        <input id="claveDibtxt" class="easyui-numberbox" prompt="clave" data-options="" style="width:200px">
                    </TD>
                    <td>
                        Dígito:
                    </td>
                    <TD>
                        <input id="digitoDadoTxt" class="easyui-numberbox" prompt="dígito" data-options="" style="width:200px">
                    </TD>


                </TR>
                <TR>
                    <td>
                        PDF del dibujo:
                    </td>
                    <td>
                        <input id="filePDFdib" name="filePDFdib" class="f1 easyui-filebox" style="width:200px"></input>
                    </td>
                    <td>
                        Imagen del dibujo:
                    </td>
                    <td>
                        <input id="fileImagedib" name="fileImagedib" class="f1 easyui-filebox" style="width:200px"></input>
                    </td>
                    <td>
                        Fecha de recepción:
                    </td>
                    <TD>
                        <input data-options="" id="FechaReceptxt" name="FechaReceptxt" class="easyui-datebox" prompt="Fecha"  style="width:200px">
                    </TD>


                </TR>
                <tr>
                    <td>
                        Cavidadaes:
                    </td>
                    <TD>
                        <input id="cavDadoTxt" class="easyui-numberbox" prompt="cavidades" data-options="" style="width:200px">
                    </TD>
                    <td>
                        Relación de extrusión:
                    </td>
                    <TD>
                        <input id="extrDadoTxt" class="easyui-numberbox" prompt="relación de extrusión" data-options="" style="width:200px">
                    </TD>
                    <td>Tipo de dado: </td>
                    <TD>
                        <input id="comboTipoDado" class="easyui-combogrid" name="comboTipoDado" style="width:200px;padding:5px" data-options="
                               panelWidth:105,
                               idField:'id_tipo',
                               textField:'descripcion_tipo',
                               url:'php/binding/Dados/Tipo/getCatTipo.php',
                        columns:[[
                        {field:'descripcion_tipo',title:'Tipo de dado', width:100}
                        ]]">
                    </TD>

                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>Observaciones:</td>
                    <td>
                        <textarea data-options="required:true" id="ObserRDtxt" class="form-control custom-control" cols="4" rows="3" style="resize:none"></textarea>
                    </td>
                    <td colspan="2"></td>
                </tr>
            </table>
            <!--BOTÓN PARA EL GUARDADO DEL RD-->
            <div align="center">
                <button id="btnAltaRD" type="button" onclick="guardaRD()" class="btn btn-primary btn-s">CREAR RD</button>
                <button id="btnEditRD" type="button" onclick="guardaRD()" class="btn btn-primary btn-s">EDITAR RD</button>
            </div>

        </div>

    </form>

</div>
<!---FIN WINDOW PARA LA CREACIÓN DEL RD-->
<!-- ******************************** -->
<!-- SCRIPTS PARA FUNCIONES -->
<script>

    $(document).ready(function () {
        $("#dgAproDib").datagrid('reload');

        $('#filePDFdib').filebox({
            buttonText: 'Selecciona',

        });

        $('#fileImagedib').filebox({
            buttonText: 'Selecciona',

        });


    });


    //Función para crear pedidos a partir de una cotización aprobada.
    function guardaRD() {

        //Controles
        //var p_codRD = $("#codDibujotxt").val();
        var p_claveRD = $("#claveDibtxt").val();
        var p_digRD = $("#digitoDadoTxt").val();
        var p_fechaRecepcion = $("#FechaReceptxt").val();
        var p_cavidadRD = $("#cavDadoTxt").val();
        var p_obserRD = $("#ObserRDtxt").val();
        var p_relExruRD = $("#extrDadoTxt").val();
        var p_tipoDadoRD = $("#comboTipoDado").combogrid('getValue');
        var id_dibujo = $('#dgAproDib').datagrid('getSelected').id_dibujo;
        var id_dado = $('#dgAproDib').datagrid('getSelected').id_detail_dado;
        //TO-DO:pendiente extracción de FILE para envio por POST del control "fileODCped".

        //Validaciones de campos requeridos.
        if (p_claveRD != '') {
            if (p_digRD != '') {
                if (p_fechaRecepcion != '') {
                    if (p_cavidadRD != '') {
                        if (p_obserRD != '') {
                            if (p_relExruRD != '') {
                                if (p_tipoDadoRD != '') {
                                    var dataRDPost = 'idDibujo=' + id_dibujo +
                                                    '&idDado=' + id_dado +
                                                    '&claveRD=' + p_claveRD +
                                                    '&digitoRD=' + p_digRD +
                                                    '&fechaRD=' + p_fechaRecepcion +
                                                    '&cavidadRD=' + p_cavidadRD +
                                                    '&observRD=' + p_obserRD +
                                                    '&relExtrRD=' + p_relExruRD +
                                                    '&tipoDado=' + p_tipoDadoRD;


                                    alert(dataRDPost);
                                    //Llamado AJAX para creación pedido.
                                    $.ajax(
                                    {
                                        async: true,
                                        url: 'php/binding/RD/updateCatRDAprob.php',
                                        type: 'post',
                                        dataType: "json",
                                        data: dataRDPost,
                                        success: function (request) {
                                            
                                            if (request.MESSAGE == 1) {
                                                confirmaOperacionRD('GUARDADO');
                                            } else {
                                                alert("Ocurrio un error");
                                            }

                                        },
                                        error: function (request, settings) {
                                            //alert(request);
                                            //confirmaOperacionRD("GUARDADO");
                                          //  alert(request.responseText);
                                        }
                                    });
                                    //FIN llamado AJAX creación pedido.
                                } else {
                                    $.messager.alert('Atención', 'El tipo de dado es un valor requerido.', 'info');
                                }//Else: validacion de tipo de dado.
                            } else {
                                $.messager.alert('Atención', 'La relación de extrusión es un valor requerido.', 'info');
                            }//Else: validacion de tipo de dado.
                        } else {
                            $.messager.alert('Atención', 'Las observaciones son un valor requerido.', 'info');
                        }//Else: validacion de clave.
                    } else {
                        $.messager.alert('Atención', 'La cavidad es un valor requerido.', 'info');
                    }//Else: validacion de dígito.
                } else {
                    $.messager.alert('Atención', 'La fecha de recepción es un valor requerido.', 'info');
                }//Else: validacion fecha de recepción.
            } else {
                $.messager.alert('Atención', 'El dígito es un valor requerido.', 'info');
            }//Else: validacion de cavidadaes.
        } else {
            $.messager.alert('Atención', 'La clave es un valor requerido.', 'info');
        }//Else: validacion de observacioness
        //FIN VALIDACIONES ENTRADA.
    }
    //PARA ENVIO DE MENSAJES SEGÚN LA OPERACIÓN:
    function confirmaOperacionRD(tipoOperacion) {

        switch (tipoOperacion) {

            case "CREACION":

                $('#btnAltaRD').show();
                $('#btnEditRD').hide();

                var row = $('#dgAproDib').datagrid('getSelected');
                if (row && row.clave_dado == "0000" || row) {

                    //Variables.row.id_cotizacion
                    alert(row.clave_dado);
                    $('#fmCrearRD').form('clear');
                    $('#winCrearRD').window('open');

                    //Asignación de valores a campos del formulario.
                    $('#codDibujotxt').textbox("setValue", row.cod_nvodibujo);
                    //  $('#codDibujotxt').textbox("setValue", row.cod_nvodibujo);
                    $('#codDibujotxt').textbox("disable");

                    //Carga de las partidas del pedido.
                } else {
                    if (row && row.clave_dado != "0000") {
                        $.messager.alert({
                            title: 'Atención',
                            icon: 'info',
                            msg: 'El registro ya fue creado, ahora puedes editarlo.',
                            fn: function () {

                                $("#dgAproDib").datagrid('reload');


                            }
                        });
                    } else {
                        $.messager.alert({
                            title: 'Atención',
                            icon: 'info',
                            msg: 'Debe seleccionar un dibujo dando click sobre el registro para crear un RD.',
                            fn: function () {

                                $("#dgAproDib").datagrid('reload');


                            }
                        });
                    }
                }

                break;

            case "GUARDADO":

                $('#fmCrearRD').form('clear');
                $('#winCrearRD').window('close');

                $.messager.alert({
                    title: 'Operación',
                    msg: '¡RD creado exitosamente!. Se envío al pool de RD pendiente de autorización.',
                    fn: function () {

                        $('#dgAproDib').datagrid('reload');

                    }


                });
                break;

                //Operación de edición.
            case "EDICION":

                $('#btnAltaRD').hide();
                $('#btnEditRD').show();

                var row = $('#dgAproDib').datagrid('getSelected');
                if (row && row.clave_dado != "0000") {

                    //Variables.row.id_cotizacion
                    $('#fmCrearRD').form('clear');
                    $('#winCrearRD').window('open');

                    //Asignación de valores a campos del formulario.
                    $('#codDibujotxt').textbox("setValue", row.cod_nvodibujo);
                    $('#claveDibtxt').numberbox("setValue", row.clave_dado);
                    $('#digitoDadoTxt').numberbox("setValue", row.digito_dado);
                    $('#cavDadoTxt').numberbox("setValue", row.cav_dado);
                    $('#extrDadoTxt').numberbox("setValue", row.r_extrusion_dado);
                    $('#ObserRDtxt').val(row.observaciones_dibujo);
                    $('#comboTipoDado').combogrid("setValue", row.id_tipo);
                    $('#codDibujotxt').textbox("disable");

                    //Carga de las partidas del pedido.


                } else {
                    if (row && row.clave_dado == "0000") {
                        $.messager.alert({
                            title: 'Atención',
                            icon: 'info',
                            msg: 'Primero debes de crear el registro antes de editarlo.',
                            fn: function () {

                                $("#dgAproDib").datagrid('reload');


                            }
                        });
                    } else {
                        $.messager.alert({
                            title: 'Atención',
                            icon: 'info',
                            msg: 'Debe seleccionar un dibujo dando click sobre el registro para crear un RD.',
                            fn: function () {

                                $("#dgAproDib").datagrid('reload');


                            }
                        });
                    }

                }

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

                $('#fmCrearRD').form('clear');
                $('#winCrearRD').window('open');


                $.messager.alert({
                    title: 'Operación',
                    icon: 'warning',
                    msg: '¡Ha ocurrido un error inesperado!. Comuniquese con el administrador de sistemas.',
                    fn: function () {

                        $('#dgAproDib').datagrid('reload');


                    }


                });

                break;
        }


    }



    function none() {


    }

</script>
