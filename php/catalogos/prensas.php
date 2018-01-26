<input id="tipoOperacionPrensas" type="hidden" value="" />
<input id="IDPrensa" type="hidden" value="0" />
<table id="dgPrensas" name="dgPrensas" title="Prensas" class="easyui-datagrid" style="width:auto;height:450px;"
       url="php/binding/Prensa/getCatPrensa.php"
       toolbar="#toolPrensas"
       rownumbers="true"
       fitcolumns="true"
       singleselect="true"
       pagination="true"
       loadmsg="Cargando información...">
    <thead>
        <tr>
            <!--<th field="ck" checkbox="true" ></th>-->
            <th data-options="field:'id_prensa'" hidden></th>
            <th data-options="field:'tem_sup_prensa'" hidden></th>
            <th data-options="field:'tem_inf_prensa'" hidden></th>
            <th data-options="field:'tem_mat_sup_prensa'" hidden></th>
            <th data-options="field:'tem_mat_inf_prensa'" hidden></th>
            <th data-options="field:'prensa_id_plc'" hidden></th>
            <th data-options="field:'cizalla_id_plc'" hidden></th>
            <th data-options="field:'horno_id_plc'" hidden></th>
            <th data-options="field:'puller_id_plc'" hidden></th>
            <th data-options="field:'mesa_enfria_plc'" hidden></th>
            <th data-options="field:'num_prensa'">Número</th>
            <th data-options="field:'descripcion_prensa'">Descripción</th>
            <th data-options="field:'capacidad_hrs_solidos'">Capacidad hrs. sólidos</th>
            <th data-options="field:'capacidad_hrs_huecos'">Capacidad hrs. huecos</th>
            <th data-options="field:'diametro_prensa'">Diametro</th>
            <th data-options="field:'presion_prensa'">Presión</th>
            <th data-options="field:'long_mesa_prensa'">Longitud Mesa</th>
            <th data-options="field:'long_min_ling_prensa'">Longitud Min. lingote</th>
            <th data-options="field:'long_max_prensa'">Longitud Max. lingote</th>
            <th data-options="field:'cabezote_prensa'">Cabezote</th>
            <th data-options="field:'mordaza_prensa'">Mordaza</th>
            <th data-options="field:'prensa_plc'">PLC prensa</th>
            <th data-options="field:'cizalla_plc'">PLC cizalla</th>
            <th data-options="field:'horno_plc'">PLC horno</th>
            <th data-options="field:'puller_plc'">PLC puller</th>
            <th data-options="field:'mesa_enfria_plc_desc'">PLC mesa de enfriamento</th>
            <th data-options="field:'temperatura_prensa'">Temperatura prensa</th>
            <th data-options="field:'temperatura_matriz'">Temperatura matriz</th>
            <th data-options="field:'velocidad_ext_prensa'">Velocidad de extrusión</th>
        </tr>
    </thead>
</table>
<!-- TOOLS GRID CLIENTES-->
<div id="toolPrensas">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconcls="icon-add" plain="true" onclick="abrirModalEdicionPrensa('ALTAPRENSA')">Alta de prensa</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconcls="icon-edit" plain="true" onclick="abrirModalEdicionPrensa('EDICIONPRENSA')">Editar prensa</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconcls="icon-remove" plain="true" onclick="EliminarPrensa()">Eliminar prensa </a>
    <!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="muestraWord()">Reporte del aleaciónn</a>-->
    <br />
    <!--Busqueda de elementos-->



</div>


<!-- MODAL PARA MOSTRAR EN LA AGREGACIón -->
<div id="dlgPrensas" class="easyui-dialog" style="width:auto"
     closed="true" modal="true">
    <form id="fmEditarPrensa" method="post" novalidate style="margin:0;padding:20px 50px">
        <div style="margin-bottom:5px;font-size:14px;">Datos de prensa:</div>
        <table class="table">
            <tr>
                <td>Número de prensa:</td>
                <td>
                    <input id="txtNumPrensa" name="txtNumPrensa" class="easyui-numberbox" required="true" style="width:100%;padding:5px" data-options="min:0,precision:0" />
                </td>
                <td>Descripción de prensa:</td>
                <td>
                    <input id="txtDescPrensa" name="txtxDescPrensa" class="easyui-textbox" required="true" style="width:100%;padding:5px" />
                </td>

                <td>Extrusión hra. dado sólido:</td>
                <td>
                    <input id="txtDadoSolido" name="txtDadoSolido" class="easyui-numberbox" required="true" style="width:100%;padding:5px" data-options="min:0,precision:3" />
                <td>
            </tr>
            <div style="margin-bottom:3px"></div>
            <tr>
                <td>Extrusión hra. dado hueco:</td>
                <td>
                    <input id="txtDadoHueco" name="txtDadoHueco" class="easyui-numberbox" required="true" style="width:100%;padding:5px" data-options="min:0,precision:3" />
                </td>

                <td>Diametro de salida lingote:</td>
                <td>
                    <input id="txtSalLingote" name="txtSalLingote" class="easyui-numberbox" required="true" style="width:100%;padding:5px" data-options="min:0,precision:3" />
                </td>

                <td>Presión:</td>
                <td>
                    <input id="txtPresPrensa" name="txtPresPrensa" class="easyui-numberbox" required="true" style="width:100%;padding:5px" data-options="min:0,precision:3" />
                </td>
            </tr>
            <div style="margin-bottom:3px"></div>
            <tr>
                <td>Longitud de mesa:</td>
                <td>
                    <input id="txtLongMesa" name="txtLongMesa" class="easyui-numberbox" required="true" style="width:100%;padding:5px" data-options="min:0,precision:3" />
                </td>

                <td>Longitud min. lingote:</td>
                <td>
                    <input id="txtLongMin" name="txtLongMin" class="easyui-numberbox" required="true" style="width:100%;padding:5px" data-options="min:0,precision:3" />
                </td>

                <td>Longitud max. lingote:</td>
                <td>
                    <input id="txtLongMax" name="txtLongMax" class="easyui-numberbox" required="true" style="width:100%;padding:5px" data-options="min:0,precision:3" />
                </td>
            </tr>
            <div style="margin-bottom:3px"></div>
            <tr>
                <td>Cabezote:</td>
                <td>
                    <input id="txtCabezote" name="txtCabezote" class="easyui-numberbox" required="true" style="width:100%;padding:5px" data-options="min:0,precision:3" />
                </td>

                <td>Mordaza:</td>
                <td>
                    <input id="txtMordaza" name="txtMordaza" class="easyui-numberbox" required="true" style="width:100%;padding:5px" data-options="min:0,precision:3" />
                </td>

                <td>Prensa PLC:</td>
                <td>
                    <select onclick="" id="txtPlcPrensa" class="easyui-combogrid" name="txtPlcPrensa" style="width:100%;padding:5px"
                            data-options="
                            required:true,
                            panelWidth:300,
                            idField:'id_plc',
                            textField:'descripcion_plc',
                            url:'php/binding/Prensa/PLC/getCatPLCPrensa.php',
                    columns:[[
                    {field:'id_plc',title:'ID PLC'},
                    {field:'descripcion_plc',title:'Desripción PLC'}
                    ]]
                    "></select>
                </td>
            </tr>
            <div style="margin-bottom:3px"></div>
            <tr>
                <td>Cizalla PLC:</td>
                <td>
                    <select onclick="" id="txtPlcCizalla" class="easyui-combogrid" name="txtPlcCizalla" style="width:100%;padding:5px"
                            data-options="
                            required:true,
                            panelWidth:300,
                            idField:'id_plc',
                            textField:'descripcion_plc',
                            url:'php/binding/Prensa/PLC/getCatPLCPrensa.php',
                    columns:[[
                    {field:'id_plc',title:'ID PLC'},
                    {field:'descripcion_plc',title:'Desripción PLC'}
                    ]]
                    "></select>
                </td>

                <td>Horno PLC:</td>
                <td>
                    <select onclick="" id="txtPlcHorno" class="easyui-combogrid" name="txtPlcHorno" style="width:100%;padding:5px"
                            data-options="
                            required:true,
                            panelWidth:300,
                            idField:'id_plc',
                            textField:'descripcion_plc',
                            url:'php/binding/Prensa/PLC/getCatPLCPrensa.php',
                    columns:[[
                    {field:'id_plc',title:'ID PLC'},
                    {field:'descripcion_plc',title:'Desripción PLC'}
                    ]]
                    "></select>
                </td>

                <td>Puller:</td>
                <td>
                    <select onclick="" id="txtPullPrensa" class="easyui-combogrid" name="txtPullPrensa" style="width:100%;padding:5px"
                            data-options="
                            required:true,
                            panelWidth:300,
                            idField:'id_plc',
                            textField:'descripcion_plc',
                            url:'php/binding/Prensa/PLC/getCatPLCPrensa.php',
                    columns:[[
                    {field:'id_plc',title:'ID PLC'},
                    {field:'descripcion_plc',title:'Desripción PLC'}
                    ]]
                    "></select>
                </td>
            </tr>
            <div style="margin-bottom:3px"></div>
            <tr>
                <td>Mesa de enfriamento:</td>
                <td>
                    <select onclick="" id="txtMesaEnfria" class="easyui-combogrid" name="txtMesaEnfria" style="width:100%;padding:5px"
                            data-options="
                            required:true,
                            panelWidth:300,
                            idField:'id_plc',
                            textField:'descripcion_plc',
                            url:'php/binding/Prensa/PLC/getCatPLCPrensa.php',
                    columns:[[
                    {field:'id_plc',title:'ID PLC'},
                    {field:'descripcion_plc',title:'Desripción PLC'}
                    ]]
                    "></select>

                </td>

                <td>Temperatura sup. tocho:</td>
                <td>
                    <input id="txtSupTocho" name="txtSupTocho" class="easyui-numberbox" required="true" style="width:100%;padding:5px" data-options="min:0,precision:3" />
                </td>

                <td>Temperatura min. tocho:</td>
                <td>
                    <input id="txtMinTocho" name="txtMinTocho" class="easyui-numberbox" required="true" style="width:100%;padding:5px" data-options="min:0,precision:3" />
                </td>
            </tr>
            <div style="margin-bottom:3px"></div>
            <tr>
                <td>Temperatura sup. matriz:</td>
                <td>
                    <input id="txtSupMatriz" name="txtSupMatriz" class="easyui-numberbox" required="true" style="width:100%;padding:5px" data-options="min:0,precision:3" />
                </td>

                <td>Temperatura min. matriz:</td>
                <td>
                    <input id="txtMinMatriz" name="txtMinMatriz" class="easyui-numberbox" required="true" style="width:100%;padding:5px" data-options="min:0,precision:3" />
                </td>

                <td>Velocidad de extrusión:</td>
                <td>
                    <input id="txtVelExt" name="txtVelExt" class="easyui-numberbox" required="true" style="width:100%;padding:5px" data-options="min:0,precision:3" />
                </td>
            </tr>


        </table>
    </form>
    <div style="margin-bottom:5px"></div>
    <div align="center">

        <button id="btnAltaPrensa" type="button" onclick="guardaEditaPrensas('GUARDADO')" class="btn btn-primary">Guardar</button>
        <button id="btnEditPrensa" type="button" onclick="guardaEditaPrensas('EDICION')" class="btn btn-primary">Actualizar</button>

    </div>
    <div style="margin-bottom:10px"></div>
</div>



<script>
    $(document).ready(function () {

        $('#dgPrensas').datagrid('reload');   // reload the user data
        $("#btnEditPrensa").hide();

    });

    function CargaGrid() {


        $('#dgPrensas').datagrid('reload');

    }


    function abrirModalEdicionPrensa(tipoOperacion) {
        //Ocultando elementos necesarios.
        //Contacto Cliente
        $('#divContactoCliente').hide();

        //Fin ocultando elementos.

        switch (tipoOperacion) {
            case "EDICIONPRENSA":
                //Ocultando botón de alta.
                $("#btnAltaPrensa").hide();
                $("#btnEditPrensa").show();
                $("#btnEditPrensa").html('ACTUALIZAR');
                $('#tipoOperacionPrensas').val("EDICIONPRENSA");
                var row = $('#dgPrensas').datagrid('getSelected');
                if (row) {

                    $('#dlgPrensas').dialog('open').dialog('setTitle', 'Editar prensa');
                    $('#fmEditarPrensa').form('load', row);
                    //Se obtienen los datos del grid y se setean en el form para editar una prensa
                    $('#txtNumPrensa').numberbox('setValue', row.num_prensa);
                    $('#txtDescPrensa').textbox('setValue', row.descripcion_prensa);
                    $('#txtDadoSolido').numberbox('setValue', row.capacidad_hrs_solidos);
                    $('#txtDadoHueco').numberbox('setValue', row.capacidad_hrs_huecos);
                    $('#txtSalLingote').numberbox('setValue', row.diametro_prensa);
                    $('#txtPresPrensa').numberbox('setValue', row.presion_prensa);
                    $('#txtLongMesa').numberbox('setValue', row.long_mesa_prensa);
                    $('#txtLongMin').numberbox('setValue', row.long_min_ling_prensa);
                    $('#txtLongMax').numberbox('setValue', row.long_max_prensa);
                    $('#txtCabezote').numberbox('setValue', row.cabezote_prensa);
                    $('#txtMordaza').numberbox('setValue', row.mordaza_prensa);
                    $('#txtPlcPrensa').combogrid("setValue", row.prensa_id_plc);
                    $('#txtPlcCizalla').combogrid("setValue", row.cizalla_id_plc);
                    $('#txtPlcHorno').combogrid("setValue", row.horno_id_plc);
                    $('#txtPullPrensa').combogrid("setValue", row.puller_id_plc);
                    $('#txtMesaEnfria').combogrid("setValue", row.mesa_enfria_plc);
                    $('#txtSupTocho').numberbox('setValue', row.tem_sup_prensa);
                    $('#txtMinTocho').numberbox('setValue', row.tem_inf_prensa);
                    $('#txtSupMatriz').numberbox('setValue', row.tem_mat_sup_prensa);
                    $('#txtMinMatriz').numberbox('setValue', row.tem_mat_inf_prensa);
                    $('#txtVelExt').numberbox('setValue', row.velocidad_ext_prensa);


                }
                else {
                    //alert("ATENCIón: Debe seleccionar un cliente dando clic sobre el registro para poder editarlo.");

                    $.messager.alert({
                        title: 'Atención',
                        icon: 'info',
                        msg: 'Debe seleccionar un cliente dando click sobre el registro para poder editarlo.',
                        fn: function () {

                            //$('#dgPrensas').datagrid('reload');


                        }


                    });
                }
                break;

            case "ALTAPRENSA":

                //Ocultando botón de edición.
                $("#btnEditPrensa").hide();
                $("#btnAltaPrensa").show();
                //Controles de Prensa.
                $('#dlgPrensas').dialog('open').dialog('setTitle', 'Nueva prensa');
                $('#fmEditarPrensa').form('clear');
                $('#tipoOperacionPrensas').val("ALTAPRENSA");
                $('#fmEditarPrensa').form('load');
                //Fin de controles de Alta Prensa
                break;
        }
    }// FIN

    //Fucniones para el guardado del cliente.
    function guardaEditaPrensas(tipoOperacion) {

        switch (tipoOperacion) {
            case "GUARDADO":
                //Obteniendo paráetros para post inserción.
                //DATOS DE CLIENTE.
                var p_num_prensa = $('#txtNumPrensa').val();
                var p_desc_prensa = $('#txtDescPrensa').val();
                var p_capacidad_solido = $('#txtDadoSolido').val();
                var p_capacidad_hueco = $('#txtDadoHueco').val();
                var p_diametro_prensa = $('#txtSalLingote').val();
                var p_presion_prensa = $('#txtPresPrensa').val();
                var p_long_mesa = $('#txtLongMesa').val();
                var p_min_ling_prensa = $('#txtLongMin').val();
                var p_long_max_prensa = $('#txtLongMax').val();
                var p_cabezote_prensa = $('#txtCabezote').val();
                var p_mordaza_prensa = $('#txtMordaza').val();
                var p_prensa_id = $('#txtPlcPrensa').combogrid("getValue");
                var p_cizalla_id = $('#txtPlcCizalla').combogrid("getValue");
                var p_horno_id = $('#txtPlcHorno').combogrid("getValue");
                var p_puller_id = $('#txtPullPrensa').combogrid("getValue");
                var mesa_enfria_id = $('#txtMesaEnfria').combogrid("getValue");
                var temp_sup_prensa = $('#txtSupTocho').val();
                var temp_inf_prensa = $('#txtMinTocho').val();
                var temp_sup_matriz = $('#txtSupMatriz').val();
                var temp_inf_matriz = $('#txtMinMatriz').val();
                var vel_ext_prensa = $('#txtVelExt').val();

                if (p_num_prensa != '') {
                    if (p_desc_prensa != '') {
                        if (p_capacidad_solido != '') {
                            if (p_capacidad_hueco != '') {
                                if (p_diametro_prensa != '') {
                                    if (p_presion_prensa != '') {
                                        if (p_long_mesa != '') {
                                            if (p_min_ling_prensa != '') {
                                                if (p_long_max_prensa != '') {
                                                    if (p_cabezote_prensa != '') {
                                                        if (p_mordaza_prensa != '') {
                                                            if (p_prensa_id != '') {
                                                                if (p_cizalla_id != '') {
                                                                    if (p_horno_id != '') {
                                                                        if (p_puller_id != '') {
                                                                            if (mesa_enfria_id != '') {
                                                                                if (temp_sup_prensa != '') {
                                                                                    if (temp_inf_prensa != '') {
                                                                                        if (temp_sup_matriz != '') {
                                                                                            if (temp_inf_matriz != '') {
                                                                                                if (vel_ext_prensa != '') {
                                                                                                    //Concatenando valores para recuperar en el POST.
                                                                                                    var dataClienteContent = 'num_prensa=' + p_num_prensa +
                                                                                                                             '&desc_prensas=' + p_desc_prensa +
                                                                                                                             '&capacidad_Solido=' + p_capacidad_solido +
                                                                                                                             '&capacidad_hueco=' + p_capacidad_hueco +
                                                                                                                             '&diametro_prensa=' + p_diametro_prensa +
                                                                                                                             '&presion_prensa=' + p_presion_prensa +
                                                                                                                             '&long_mesa=' + p_long_mesa +
                                                                                                                             '&min_ling_prensa=' + p_min_ling_prensa +
                                                                                                                             '&long_max_prensa=' + p_long_max_prensa +
                                                                                                                             '&cabezote_prensa=' + p_cabezote_prensa +
                                                                                                                             '&mordaza_prensa=' + p_mordaza_prensa +
                                                                                                                             '&prensa_id=' + p_prensa_id +
                                                                                                                             '&cizalla_id=' + p_cizalla_id +
                                                                                                                             '&horno_id=' + p_horno_id +
                                                                                                                             '&puller_id=' + p_puller_id +
                                                                                                                             '&mesa_enfria_id=' + mesa_enfria_id +
                                                                                                                             '&temp_sup_prensa=' + temp_sup_prensa +
                                                                                                                             '&temp_inf_prensa=' + temp_inf_prensa +
                                                                                                                             '&temp_sup_matriz=' + temp_sup_matriz +
                                                                                                                             '&temp_inf_matriz=' + temp_inf_matriz +
                                                                                                                             '&vel_ext_prensa=' + vel_ext_prensa;

                                                                                                    $.ajax(
                                                                                                  {
                                                                                                      url: 'php/binding/Prensa/setCatPrensa.php',
                                                                                                      type: 'post',
                                                                                                      dataType: "json",
                                                                                                      data: dataClienteContent,
                                                                                                      success: function (request) {
                                                                                                          if (request.MESSAGE == 1) {
                                                                                                              confirmaOperacionPrensa('EDICION');
                                                                                                          } else {
                                                                                                              alert("Ocurrio un error");
                                                                                                          }
                                                                                                      },
                                                                                                      error: function (request, settings) {
                                                                                                          alert("Entre al error AJAX... " + request.responseText);
                                                                                                      }
                                                                                                  });

                                                                                                } else {
                                                                                                    $.messager.alert('Atenci&oacute;n', 'La Velocidad de extrusión es un valor requerido.', 'info');
                                                                                                }
                                                                                            } else {
                                                                                                $.messager.alert('Atenci&oacute;n', 'La temperatura min. matriz es un valor requerido.', 'info');
                                                                                            }
                                                                                        } else {
                                                                                            $.messager.alert('Atenci&oacute;n', 'La temperatura sup. matriz: es un valor requerido.', 'info');
                                                                                        }
                                                                                    } else {
                                                                                        $.messager.alert('Atenci&oacute;n', 'La temperatura min. tocho es un valor requerido.', 'info');
                                                                                    }
                                                                                } else {
                                                                                    $.messager.alert('Atenci&oacute;n', 'La temperatura sup. tocho es un valor requerido.', 'info');
                                                                                }
                                                                            } else {
                                                                                $.messager.alert('Atenci&oacute;n', 'La mesa de enfriamento es un valor requerido.', 'info');
                                                                            }
                                                                        } else {
                                                                            $.messager.alert('Atenci&oacute;n', 'El puller es un valor requerido.', 'info');
                                                                        }
                                                                    } else {
                                                                        $.messager.alert('Atenci&oacute;n', 'El horno PLC es un valor requerido.', 'info');
                                                                    }
                                                                } else {
                                                                    $.messager.alert('Atenci&oacute;n', 'La cizalla PLC es un valor requerido.', 'info');
                                                                }
                                                            } else {
                                                                $.messager.alert('Atenci&oacute;n', 'La prensa PLC  es un valor requerido.', 'info');
                                                            }
                                                        } else {
                                                            $.messager.alert('Atenci&oacute;n', 'La mordaza es un valor requerido.', 'info');
                                                        }
                                                    } else {
                                                        $.messager.alert('Atenci&oacute;n', 'El cabezote es un valor requerido.', 'info');
                                                    }
                                                } else {
                                                    $.messager.alert('Atenci&oacute;n', 'La Longitud max. lingote es un valor requerido.', 'info');
                                                }
                                            } else {
                                                $.messager.alert('Atenci&oacute;n', 'La longitud min. lingote es un valor requerido.', 'info');
                                            }
                                        } else {
                                            $.messager.alert('Atenci&oacute;n', 'La longitud de mesa es un valor requerido.', 'info');
                                        }
                                    } else {
                                        $.messager.alert('Atenci&oacute;n', 'La presión es un valor requerido.', 'info');
                                    }
                                } else {
                                    $.messager.alert('Atenci&oacute;n', 'El diametro de salida lingote es un valor requerido.', 'info');
                                }
                            } else {
                                $.messager.alert('Atenci&oacute;n', 'La extrusión hra. dado hueco es un valor requerido.', 'info');
                            }
                        } else {
                            $.messager.alert('Atenci&oacute;n', 'La extrusión hra. dado sólido es un valor requerido.', 'info');
                        }
                    } else {
                        $.messager.alert('Atenci&oacute;n', 'La descripción es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atenci&oacute;n', 'El número de prensa es un valor requerido.', 'info');
                }

                break;
            case "EDICION":
                var row = $('#dgPrensas').datagrid('getSelected');
                //Obteniendo parámetros para post inserción.
                //DATOS DE PRENSA
                var p_num_prensa = $('#txtNumPrensa').val();
                var p_desc_prensa = $('#txtDescPrensa').val();
                var p_capacidad_solido = $('#txtDadoSolido').val();
                var p_capacidad_hueco = $('#txtDadoHueco').val();
                var p_diametro_prensa = $('#txtSalLingote').val();
                var p_presion_prensa = $('#txtPresPrensa').val();
                var p_long_mesa = $('#txtLongMesa').val();
                var p_min_ling_prensa = $('#txtLongMin').val();
                var p_long_max_prensa = $('#txtLongMax').val();
                var p_cabezote_prensa = $('#txtCabezote').val();
                var p_mordaza_prensa = $('#txtMordaza').val();
                var p_prensa_id = $('#txtPlcPrensa').combogrid("getValue");
                var p_cizalla_id = $('#txtPlcCizalla').combogrid("getValue");
                var p_horno_id = $('#txtPlcHorno').combogrid("getValue");
                var p_puller_id = $('#txtPullPrensa').combogrid("getValue");
                var mesa_enfria_id = $('#txtMesaEnfria').combogrid("getValue");
                var temp_sup_prensa = $('#txtSupTocho').val();
                var temp_inf_prensa = $('#txtMinTocho').val();
                var temp_sup_matriz = $('#txtSupMatriz').val();
                var temp_inf_matriz = $('#txtMinMatriz').val();
                var vel_ext_prensa = $('#txtVelExt').val();

                if (p_num_prensa != '') {
                    if (p_desc_prensa != '') {
                        if (p_capacidad_solido != '') {
                            if (p_capacidad_hueco != '') {
                                if (p_diametro_prensa != '') {
                                    if (p_presion_prensa != '') {
                                        if (p_long_mesa != '') {
                                            if (p_min_ling_prensa != '') {
                                                if (p_long_max_prensa != '') {
                                                    if (p_cabezote_prensa != '') {
                                                        if (p_mordaza_prensa != '') {
                                                            if (p_prensa_id != '') {
                                                                if (p_cizalla_id != '') {
                                                                    if (p_horno_id != '') {
                                                                        if (p_puller_id != '') {
                                                                            if (mesa_enfria_id != '') {
                                                                                if (temp_sup_prensa != '') {
                                                                                    if (temp_inf_prensa != '') {
                                                                                        if (temp_sup_matriz != '') {
                                                                                            if (temp_inf_matriz != '') {
                                                                                                if (vel_ext_prensa != '') {
                                                                                                    //Concatenando valores para recuperar en el POST.
                                                                                                    //Concatenando valores para recuperar en el POST.
                                                                                                    var dataClienteContent = 'id_prensa=' + row.id_prensa +
                                                                                                                             '&num_prensa=' + p_num_prensa +
                                                                                                                             '&desc_prensas=' + p_desc_prensa +
                                                                                                                             '&capacidad_Solido=' + p_capacidad_solido +
                                                                                                                             '&capacidad_hueco=' + p_capacidad_hueco +
                                                                                                                             '&diametro_prensa=' + p_diametro_prensa +
                                                                                                                             '&presion_prensa=' + p_presion_prensa +
                                                                                                                             '&long_mesa=' + p_long_mesa +
                                                                                                                             '&min_ling_prensa=' + p_min_ling_prensa +
                                                                                                                             '&long_max_prensa=' + p_long_max_prensa +
                                                                                                                             '&cabezote_prensa=' + p_cabezote_prensa +
                                                                                                                             '&mordaza_prensa=' + p_mordaza_prensa +
                                                                                                                             '&prensa_id=' + p_prensa_id +
                                                                                                                             '&cizalla_id=' + p_cizalla_id +
                                                                                                                             '&horno_id=' + p_horno_id +
                                                                                                                             '&puller_id=' + p_puller_id +
                                                                                                                             '&mesa_enfria_id=' + mesa_enfria_id +
                                                                                                                             '&temp_sup_prensa=' + temp_sup_prensa +
                                                                                                                             '&temp_inf_prensa=' + temp_inf_prensa +
                                                                                                                             '&temp_sup_matriz=' + temp_sup_matriz +
                                                                                                                             '&temp_inf_matriz=' + temp_inf_matriz +
                                                                                                                             '&vel_ext_prensa=' + vel_ext_prensa;

                                                                                                    //alert('Data del cliente por mandar: '+dataClienteContent);
                                                                                                    //Preparado post.
                                                                                                    $.ajax(
                                                                                                    {
                                                                                                        url: 'php/binding/Prensa/updateCatPrensa.php',
                                                                                                        type: 'post',
                                                                                                        dataType: "json",
                                                                                                        data: dataClienteContent,
                                                                                                        success: function (request) {
                                                                                                            if (request.MESSAGE == 1) {
                                                                                                                confirmaOperacionPrensa('EDICION');
                                                                                                            } else {
                                                                                                                alert("Ocurrio un error");
                                                                                                            }
                                                                                                        },
                                                                                                        error: function (request, settings) {
                                                                                                            alert("Entre al error AJAX... " + request.responseText);
                                                                                                        }
                                                                                                    });

                                                                                                } else {
                                                                                                    $.messager.alert('Atenci&oacute;n', 'La Velocidad de extrusión es un valor requerido.', 'info');
                                                                                                }
                                                                                            } else {
                                                                                                $.messager.alert('Atenci&oacute;n', 'La temperatura min. matriz es un valor requerido.', 'info');
                                                                                            }
                                                                                        } else {
                                                                                            $.messager.alert('Atenci&oacute;n', 'La temperatura sup. matriz: es un valor requerido.', 'info');
                                                                                        }
                                                                                    } else {
                                                                                        $.messager.alert('Atenci&oacute;n', 'La temperatura min. tocho es un valor requerido.', 'info');
                                                                                    }
                                                                                } else {
                                                                                    $.messager.alert('Atenci&oacute;n', 'La temperatura sup. tocho es un valor requerido.', 'info');
                                                                                }
                                                                            } else {
                                                                                $.messager.alert('Atenci&oacute;n', 'La mesa de enfriamento es un valor requerido.', 'info');
                                                                            }
                                                                        } else {
                                                                            $.messager.alert('Atenci&oacute;n', 'El puller es un valor requerido.', 'info');
                                                                        }
                                                                    } else {
                                                                        $.messager.alert('Atenci&oacute;n', 'El horno PLC es un valor requerido.', 'info');
                                                                    }
                                                                } else {
                                                                    $.messager.alert('Atenci&oacute;n', 'La cizalla PLC es un valor requerido.', 'info');
                                                                }
                                                            } else {
                                                                $.messager.alert('Atenci&oacute;n', 'La prensa PLC  es un valor requerido.', 'info');
                                                            }
                                                        } else {
                                                            $.messager.alert('Atenci&oacute;n', 'La mordaza es un valor requerido.', 'info');
                                                        }
                                                    } else {
                                                        $.messager.alert('Atenci&oacute;n', 'El cabezote es un valor requerido.', 'info');
                                                    }
                                                } else {
                                                    $.messager.alert('Atenci&oacute;n', 'La Longitud max. lingote es un valor requerido.', 'info');
                                                }
                                            } else {
                                                $.messager.alert('Atenci&oacute;n', 'La longitud min. lingote es un valor requerido.', 'info');
                                            }
                                        } else {
                                            $.messager.alert('Atenci&oacute;n', 'La longitud de mesa es un valor requerido.', 'info');
                                        }
                                    } else {
                                        $.messager.alert('Atenci&oacute;n', 'La presión es un valor requerido.', 'info');
                                    }
                                } else {
                                    $.messager.alert('Atenci&oacute;n', 'El diametro de salida lingote es un valor requerido.', 'info');
                                }
                            } else {
                                $.messager.alert('Atenci&oacute;n', 'La extrusión hra. dado hueco es un valor requerido.', 'info');
                            }
                        } else {
                            $.messager.alert('Atenci&oacute;n', 'La extrusión hra. dado sólido es un valor requerido.', 'info');
                        }
                    } else {
                        $.messager.alert('Atenci&oacute;n', 'La descripción es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atenci&oacute;n', 'El número de prensa es un valor requerido.', 'info');
                }
                break;
        }
    }

    function confirmaOperacionPrensa(tipoOperacion) {

        switch (tipoOperacion) {
            case "GUARDADO":

                $('#IDPrensa').val();

                $('#dlgPrensas').dialog('close');
                $('#fmEditarPrensa').form('clear');

                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Prensa guardada exitosamente!',
                    fn: function () {

                        $('#dgPrensas').datagrid('reload');


                    }


                });
                break;
                //Operación de edición.
            case "EDICION":

                $('#IDPrensa').val();

                $('#dlgPrensas').dialog('close');
                $('#fmEditarPrensa').form('clear');

                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Prensa actualizada exitosamente!',
                    fn: function () {

                        $('#dgPrensas').datagrid('reload');


                    }


                });
                break;
                //Fin de operación de edición.
            case "BORRADO":

                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Prensa eliminada exitosamente!',
                    fn: function () {

                        $('#dgPrensas').datagrid('reload');


                    }


                });

                break;
        }


    }

    //Función para eliminar el cliente.
    function EliminarPrensa() {

        var row = $('#dgPrensas').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirma', 'Estás seguro de eliminarlo?', function (r) {
                if (r) {
                    $.post('php/binding/Prensa/deleteCatPrensa.php', { ID_prensa: row.id_prensa }, function (result) {
                        if (result.success == true) {
                            confirmaOperacionPrensa('BORRADO');
                            $('#dgPrensas').datagrid('reload');	// reload the user data
                        } else {
                            $.messager.show({	// show error message
                                title: 'Error',
                                msg: 'Error, no se pudo eliminar.'
                            });
                        }
                    }, 'json');
                }
            });
        }
        /*  var row = $('#dgPrensas').datagrid('getSelected');
          if (row) {
              var ID_prensa = row.id_prensa;

              //alert("El id del cliente seleccionado es:" + ID_cliente);
              var dataClienteContent = 'IDPrensa=' + ID_prensa;

              //Preparado post.
              $.ajax(
              {
                  url: 'php/binding/Prensa/deleteCatPrensa.php',
                  type: 'post',
                  dataType: "json",
                  data: dataClienteContent,
                  success: function (request) {

                      //$('#IDPrensa').val(request.ID_CLIENTE);
                      //alert("MESAJE RETORNO: "+request.MESSAGE);
                      if (request.success == true) {

                          confirmaOperacionPrensa('BORRADO');

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

              $.messager.alert({
                  title: 'Atención',
                  icon: 'info',
                  msg: 'Debe seleccionar una prensa dando click sobre el registro para poder eliminarlo.',
                  fn: function () {

                      $('#dgPrensas').datagrid('reload');


                  }


              });




          }*/



    }

</script>