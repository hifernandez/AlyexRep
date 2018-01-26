<input id="tipoOperacionClientes" type="hidden" value="" />
<input id="idclienteContacto" type="hidden" value="" />
<input id="IDCliente" type="hidden" value="0" />
<table id="dgClientes" name="dgClientes" title="Clientes" class="easyui-datagrid" style="width:auto;height:450px;"
       url="php/binding/Cliente/getCatCliente.php"
       toolbar="#toolClientes"
       rownumbers="true"
       fitColumns="true"
       singleSelect="true"
       pagination="true"
       loadMsg="Cargando información...">
    <thead>
        <tr>
            <!--<th field="ck" checkbox="true" ></th>-->
            <th data-options="field:'id_cliente'" hidden></th>
            <th data-options="field:'d_codigo'" hidden></th>
            <th data-options="field:'id_giro'" hidden></th>
            <th data-options="field:'desc_giro'">Giro</th>
            <th data-options="field:'razon_social_cliente'">Razón Social</th>
            <th data-options="field:'clave_cliente'">Clave Cliente</th>
            <th data-options="field:'rfc_cliente'">RFC Cliente</th>
            <th data-options="field:'num_proveedor_cliente'">No. Proveedor</th>
            <th data-options="field:'d_CP'">Código postal</th>
            <th data-options="field:'direccion_cliente'">Domicilio Cliente</th>


        </tr>
    </thead>
</table>
<!-- TOOLS GRID CLIENTES-->
<div id="toolClientes">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEdicionCliente('ALTACLIENTE')">Alta de cliente</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEdicionCliente('EDICIONCLIENTE')">Editar cliente</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="EliminarCliente()">Eliminar cliente</a>
    <!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="muestraWord()">Reporte del aleaciónn</a>-->
    <br>
    <!--Busqueda de elementos-->



</div>
<div id="toolContacto">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalContacto('ALTACONTACTO')">Alta de Contacto</a>
    <!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalContacto('EDICIONCONTACTO')">Editar Contacto</a>
     <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="EliminarContacto()">Eliminar Contacto</a>
     <!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="muestraWord()">Reporte del aleaciónn</a>-->



</div>

<!-- MODAL PARA MOSTRAR EN LA AGREGACIón -->
<div id="dlgClientes" class="easyui-dialog" style="width:auto"
     closed="true" modal="true">
    <form id="fmEditarCliente" method="post" novalidate style="margin:0;padding:20px 50px">
        <div style="margin-bottom:5px;font-size:14px;border-bottom:1px solid #ccc">Datos del cliente:</div>
        <table>

            <tr>
                <td>Giro:</td>
                <td>
                    <input id="comboGiroCliente" class="easyui-combogrid" name="comboGiroCliente" style="width:auto;padding:5px" data-options="
                           required:true,
                           panelWidth:280,
                           idField:'id_giro',
                           textField:'desc_sector',
                           textField:'desc_giro',
                           url:'php/binding/Cliente/giros/getCatGiroClientes.php',
                    columns:[[
                    {field:'desc_sector',title:'Sector', width:100},
                    {field:'desc_giro',title:'Giro', width:175}

                    ]]">
                </td>

            </tr>
            <tr>
                <td>Razón social:</td>
                <td><input id="txtRazonSocial" name="txtRazonSocial" class="easyui-textbox" data-options="required:true,missingMessage:'Falta razón social'" style="width:100%;padding:5px"></td>
            </tr>
            <div style="margin-bottom:3px">
            </div>
            <tr>
                <td>RFC cliente:</td>
                <td><input id="txtRFCCliente" name="txtRFCCliente" class="easyui-textbox" data-options="required:true" style="width:100%;padding:5px"></td>
            </tr>
            <tr>
                <td>Clave cliente:</td>
                <td><input id="txtClaveCliente" name="txtClaveCliente" class="easyui-numberbox" data-options="required:true" style="width:100%;padding:5px">
                <td>

            </tr>
            <div style="margin-bottom:3px">
            </div>
            <tr>
                <td>No. proveedor:</td>
                <td><input id="txtNoProveedor" name="txtNoProveedor" class="easyui-numberbox" data-options="required:true" style="width:100%;padding:5px"></td>
            </tr>
            <div style="margin-bottom:3px">
            </div>
            <tr>
                <td>Código postal:</td>
                <td>
                    <input id="comboCodPostal" class="easyui-combogrid" name="comboCodPostal" style="width:100%;padding:5px" data-options="
                           required:true,
                           panelWidth:405,
                           idField:'d_codigo',
                           textField:'d_CP',
                           url:'php/binding/CP/getCatCP.php',
                    columns:[[
                    {field:'D_mnpio',title:'Municipio', width:100},
                    {field:'d_estado',title:'Estado', width:100},
                    {field:'d_ciudad',title:'Ciudad', width:100},
                    {field:'d_CP',title:'CP', width:100}


                    ]]">
                </td>
            </tr>
            <tr>
                <td>Calle y no.:</td>
                <td><input id="txtCalleDirec" name="txtCalleDirec" class="easyui-textbox" data-options="required:true" style="width:100%;padding:5px"></td>
            </tr>
            <div style="margin-bottom:3px">
            </div>
        </table>
        <div style="margin-bottom:5px">
        </div>
        <div align="center">

            <button id="btnAltaCliente" type="button" onclick="guardaEditaCliente('GUARDADO')" class="btn btn-primary">Guardar</button>
            <button id="btnEditCliente" type="button" onclick="guardaEditaCliente('EDICION')" class="btn btn-primary">Actualizar</button>
        </div>
        <div style="margin-bottom:10px">
        </div>
    </form>
</div>
<!-- ******************************** -->
<div id="dlgContactos" class="easyui-dialog" style="width:auto"
     closed="true" modal="true">
    <form id="fmContactCliente" method="post" novalidate style="margin:0;padding:20px 50px;">
        <div style="margin-bottom:5px;font-size:14px;border-bottom:1px solid #ccc">Datos del contacto:</div>
        <table>
            <tr>
                <td>Nombre:</td>
                <td>
                    <input id="txtNomContacCL" name="txtNomContacCL" class="easyui-textbox" data-options="required:true" style="width:100%">
                </td>
            </tr>
            <tr>
                <td>Apellidos:</td>
                <td>
                    <input id="txtApellidosCL" name="txtApellidosCL" class="easyui-textbox" data-options="required:true" style="width:100%">
                </td>
            </tr>
            <tr>
                <td>Puesto:</td>
                <td>

                    <input id="txtPuestoContactCL" name="txtPuestoContactCL" class="easyui-textbox" data-options="required:true" style="width:100%">

                </td>
            </tr>
            <tr>
                <td>Teléfono fijo:</td>
                <td>

                    <input id="txtFijoClient" name="txtFijoClient" class="easyui-numberbox" data-options="required:true" style="width:100%">

                </td>
            </tr>
            <tr>
                <td>Celular:</td>
                <td>

                    <input id="txtCelularClient" name="txtCelularClient" class="easyui-numberbox" data-options="required:true" style="width:100%">

                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>

                    <input id="txtEmailContactCL" name="txtEmailContactCL" class="easyui-textbox" data-options="required:true, validType:'email'" type="email" style="width:100%">

                </td>
            </tr>
        </table>
        <div style="margin-bottom:5px">
        </div>
        <div align="center">

            <button id="btnAltaContacto" type="button" onclick="guardaEditaContacto('GUARDADO')" class="btn btn-primary">Guardar</button>
            <button id="btnEditContacto" type="button" onclick="guardaEditaContacto('EDICION')" class="btn btn-primary">Actualizar</button>
        </div>
        <div style="margin-bottom:10px">
        </div>
    </form>
</div>





<script>
    $(document).ready(function () {

        $('#dgClientes').datagrid('reload');   // reload the user data
        $("#toolContacto").hide();
    });

    function CargaGrid() {


        $('#dgClientes').datagrid('reload');

    }
    function abrirModalContacto(tipoOperacion) {
        switch (tipoOperacion) {
            case "ALTACONTACTO":
                //Ocultando botón de edición.
                $("#btnEditContacto").hide();
                $("#btnAltaContacto").show();
                //Controles de cliente.
                $('#dlgContactos').dialog('open').dialog('setTitle', 'Nuevo contacto');
                $('#fmContactCliente').form('clear');
                $('#fmContactCliente').form('load');

                //Fin de controles de cliente.
                break;

            case "EDICIONCONTACTO":
                $("#btnEditContacto").show();
                $("#btnAltaContacto").hide();
                //Controles de cliente.
                $('#dlgContactos').dialog('open').dialog('setTitle', 'Editar contacto');
                $('#fmContactCliente').form('clear');
                $('#fmContactCliente').form('load');
                break;
        }

    }
    function guardaEditaContacto(tipoOperacion) {

        switch (tipoOperacion) {
            case "GUARDADO":
                var p_id_cliente = $('#idclienteContacto').val();
                var p_nombre_contact = $('#txtNomContacCL').val();
                var p_apellidos_contact = $('#txtApellidosCL').val();
                var p_puesto_contact = $('#txtPuestoContactCL').val();
                var p_numero_contact = $('#txtFijoClient').val();
                var p_celular_contact = $('#txtCelularClient').val();
                var p_email_contact = $('#txtEmailContactCL').val();
                if (p_nombre_contact != '') {
                    if (p_apellidos_contact != '') {
                        if (p_puesto_contact != '') {
                            if (p_numero_contact != '') {
                                if (p_celular_contact != '') {
                                    if (p_email_contact != '') {
                                        //Concatenando valores para recuperar en el POST.
                                        var dataClienteContent = 'idCliente=' + p_id_cliente +
                                        '&NombreContact=' + p_nombre_contact +
                                        '&ApellidosContact=' + p_apellidos_contact +
                                        '&PuestoContact=' + p_puesto_contact +
                                        '&NumeroContacto=' + p_numero_contact +
                                        '&CelularContact=' + p_celular_contact +
                                        '&EmailContacto=' + p_email_contact;

                                        $.ajax(
                                                                     {
                                                                         url: 'php/binding/Cliente/contacto/setCatContacto.php',
                                                                         type: 'post',
                                                                         dataType: "json",
                                                                         data: dataClienteContent,
                                                                         success: function (request) {
                                                                             //$('#IDCliente').val(request.ID_CLIENTE);
                                                                             //alert("MESAJE RETORNO: "+request.MESSAGE);
                                                                             if (request.MESSAGE == 1) {
                                                                                 confirmaOperacionCliente('GUARDADOCLIENTE');
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
                                        $.messager.alert('Atención', 'El email es un valor requerido.', 'info');
                                    }
                                } else {
                                    $.messager.alert('Atención', 'El celular es un valor requerido.', 'info');
                                }
                            } else {
                                $.messager.alert('Atención', 'El número de teléfono es un valor requerido.', 'info');
                            }
                        } else {
                            $.messager.alert('Atención', 'El puesto es un valor requerido.', 'info');
                        }
                    } else {
                        $.messager.alert('Atención', 'El apellido de contacto es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atención', 'La nombre de contacto es un valor requerido.', 'info');
                }
                break;
            case "EDICION":
                if (p_nombre_contact != '') {
                    if (p_apellidos_contact != '') {
                        if (p_puesto_contact != '') {
                            if (p_numero_contact != '') {
                                if (p_celular_contact != '') {
                                    if (p_email_contact != '') {
                                        //Concatenando valores para recuperar en el POST.
                                        var dataClienteContent = 'idCliente=' + p_id_cliente +
                                        '&NombreContact=' + p_nombre_contact +
                                        '&ApellidosContact=' + p_apellidos_contact +
                                        '&PuestoContact=' + p_puesto_contact +
                                        '&NumeroContacto=' + p_numero_contact +
                                        '&CelularContact=' + p_celular_contact +
                                        '&EmailContacto=' + p_email_contact;

                                        $.ajax(
                                                                     {
                                                                         url: 'php/binding/Cliente/contacto/updateCatContacto.php',
                                                                         type: 'post',
                                                                         dataType: "json",
                                                                         data: dataClienteContent,
                                                                         success: function (request) {
                                                                             //$('#IDCliente').val(request.ID_CLIENTE);
                                                                             //alert("MESAJE RETORNO: "+request.MESSAGE);
                                                                             if (request.MESSAGE == 1) {
                                                                                 confirmaOperacionCliente('GUARDADO');
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
                                        $.messager.alert('Atención', 'El email es un valor requerido.', 'info');
                                    }
                                } else {
                                    $.messager.alert('Atención', 'El celular es un valor requerido.', 'info');
                                }
                            } else {
                                $.messager.alert('Atención', 'El número de teléfono es un valor requerido.', 'info');
                            }
                        } else {
                            $.messager.alert('Atención', 'El puesto es un valor requerido.', 'info');
                        }
                    } else {
                        $.messager.alert('Atención', 'El apellido de contacto es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atención', 'La nombre de contacto es un valor requerido.', 'info');
                }
                break;
        }

    }
    function abrirModalEdicionCliente(tipoOperacion) {

        switch (tipoOperacion) {
            case "EDICIONCLIENTE":
                //Ocultando botón de alta.
                $("#btnAltaCliente").hide();
                $("#btnEditCliente").show();
                $("#btnEditCliente").html('ACTUALIZAR');
                $('#tipoOperacionClientes').val("EDICIONCLIENTE");
                var row = $('#dgClientes').datagrid('getSelected');
                if (row) {

                    $('#dlgClientes').dialog('open').dialog('setTitle', 'Editar Cliente');
                    $('#fmEditarCliente').form('load', row);
                    $('#comboGiroCliente').combogrid("setValue", row.id_giro);
                    $('#txtRazonSocial').textbox("setValue", row.razon_social_cliente);
                    $('#txtRFCCliente').textbox("setValue", row.rfc_cliente);
                    $('#txtClaveCliente').textbox("setValue", row.clave_cliente);
                    $('#txtNoProveedor').textbox("setValue", row.num_proveedor_cliente);
                    $('#comboCodPostal').combogrid("setValue", row.d_codigo);
                    $('#txtCalleDirec').textbox("setValue", row.direccion_cliente);


                }
                else {
                    //alert("ATENCIón: Debe seleccionar un cliente dando clic sobre el registro para poder editarlo.");
                    $.messager.alert({
                        title: 'Atención',
                        icon: 'info',
                        msg: 'Debe seleccionar un cliente dando click sobre el registro para poder editarlo.',
                        fn: function () {

                            //$('#dgClientes').datagrid('reload');


                        }


                    });
                }
                break;

            case "ALTACLIENTE":

                //Ocultando botón de edición.
                $("#btnEditCliente").hide();
                $("#btnAltaCliente").show();
                //Controles de cliente.
                $('#dlgClientes').dialog('open').dialog('setTitle', 'Nuevo Cliente');
                $('#fmEditarCliente').form('clear');
                $('#tipoOperacionClientes').val("ALTACLIENTE");
                $('#fmEditarCliente').form('load');
                $("#btnAltaEditCliente").html('GUARDAR');
                //Fin de controles de cliente.

                //Controles de contacto de  cliente.
                $('#fmContactCliente').form('clear');

                //Fin de controles de contacto de cliente.



                break;
        }

    }// FIN

    //Fucniones para el guardado del cliente.
    function guardaEditaCliente(tipoOperacion) {

        switch (tipoOperacion) {
            case "GUARDADO":
                //Obteniendo paráetros para post inserción.
                //DATOS DE CLIENTE.
                var p_id_giro = $('#comboGiroCliente').combogrid("getValue");
                var p_id_cp_mx = $('#comboCodPostal').combogrid('getValue');
                var p_clave_cliente = $('#txtClaveCliente').val();
                var p_rsocial_cliente = $('#txtRazonSocial').val();
                var p_rfc_cliente = $('#txtRFCCliente').val();
                var p_numproveedor_cli = $('#txtNoProveedor').val();
                var p_calle_num = $('#txtCalleDirec').val();

                if (p_id_giro != '') {
                    if (p_id_cp_mx != '') {
                        if (p_rsocial_cliente != '') {
                            if (p_rfc_cliente != '') {
                                if (p_clave_cliente != '') {
                                    if (p_numproveedor_cli != '') {
                                        if (p_calle_num != '') {
                                            //Concatenando valores para recuperar en el POST.
                                            var dataClienteContent = 'ID_giro=' + p_id_giro +
                                                                                               '&ID_cp=' + p_id_cp_mx +
                                                                                               '&ClaveCliente=' + p_clave_cliente +
                                                                                               '&RazonSocial=' + p_rsocial_cliente +
                                                                                               '&RFCCliente=' + p_rfc_cliente +
                                                                                               '&NumProveedor=' + p_numproveedor_cli +
                                                                                               '&CalleNum=' + p_calle_num;

                                            $.ajax(
                                        {
                                            url: 'php/binding/Cliente/setCatCliente.php',
                                            type: 'post',
                                            dataType: "json",
                                            data: dataClienteContent,
                                            success: function (request) {
                                                //$('#IDCliente').val(request.ID_CLIENTE);
                                                //alert("MESAJE RETORNO: "+request.MESSAGE);
                                                if (request.MESSAGE == 1) {
                                                    confirmaOperacionCliente('GUARDADO');
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
                                            $.messager.alert('Atención', 'La calle y número son valor requerido.', 'info');
                                        }
                                    } else {
                                        $.messager.alert('Atención', 'El número de proveedor es un valor requerido.', 'info');
                                    }
                                } else {
                                    $.messager.alert('Atención', 'La clave del cliente es un valor requerido.', 'info');
                                }
                            } else {
                                $.messager.alert('Atención', 'El RFC del cliente es un valor requerido y debe tener 13 caractéres.', 'info');
                            }
                        } else {
                            $.messager.alert('Atención', 'La razón social es un valor requerido.', 'info');
                        }

                    } else {
                        $.messager.alert('Atención', 'El código postal es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atención', 'El giro de la empresa un valor requerido.', 'info');
                }
                break;
            case "EDICION":
                var row = $('#dgClientes').datagrid('getSelected');
                //Obteniendo paráetros para post inserción.
                //DATOS DE CLIENTE.
                var p_id_cliente = row.id_cliente;
                //alert("El id del cliente por actualizar es: " + p_id_cliente);
                var p_id_giro = $('#comboGiroCliente').combogrid("getValue");
                var p_id_cp_mx = $('#comboCodPostal').combogrid('getValue');
                var p_clave_cliente = $('#txtClaveCliente').val();
                var p_rsocial_cliente = $('#txtRazonSocial').val();
                var p_rfc_cliente = $('#txtRFCCliente').val();
                var p_numproveedor_cli = $('#txtNoProveedor').val();
                var p_calle_num = $('#txtCalleDirec').val();


                //Validaciones para los datos de cliente
                if (p_id_giro != '') {
                    if (p_id_cp_mx != '') {
                        if (p_rsocial_cliente != '') {
                            if (p_rfc_cliente != '') {
                                if (p_clave_cliente != '') {
                                    if (p_numproveedor_cli != '') {
                                        if (p_calle_num != '') {
                                            //Concatenando valores para recuperar en el POST.
                                            var dataClienteContent = 'IDCLIENTE=' + p_id_cliente +
                                                                      '&ID_giro=' + p_id_giro +
                                                                      '&ID_cp=' + p_id_cp_mx +
                                                                      '&ClaveCliente=' + p_clave_cliente +
                                                                      '&RazonSocial=' + p_rsocial_cliente +
                                                                      '&RFCCliente=' + p_rfc_cliente +
                                                                      '&NumProveedor=' + p_numproveedor_cli +
                                                                      '&CalleNum=' + p_calle_num;
                                            $.ajax(
                                               {
                                                   url: 'php/binding/Cliente/updateCatCliente.php',
                                                   type: 'post',
                                                   dataType: "json",
                                                   data: dataClienteContent,
                                                   success: function (request) {
                                                       //$('#IDCliente').val(request.ID_CLIENTE);
                                                       //alert("MESAJE RETORNO: "+request.MESSAGE);
                                                       if (request.MESSAGE == 1) {
                                                           confirmaOperacionCliente('EDICION');
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
                                            $.messager.alert('Atención', 'La calle y número son valor requerido.', 'info');
                                        }
                                    } else {
                                        $.messager.alert('Atención', 'El número de proveedor es un valor requerido.', 'info');
                                    }
                                } else {
                                    $.messager.alert('Atención', 'La clave del cliente es un valor requerido.', 'info');
                                }
                            } else {
                                $.messager.alert('Atención', 'El RFC del cliente es un valor requerido y debe tener 13 caractéres.', 'info');
                            }
                        } else {
                            $.messager.alert('Atención', 'La razón social es un valor requerido.', 'info');
                        }

                    } else {
                        $.messager.alert('Atención', 'El código postal es un valor requerido.', 'info');
                    }
                } else {
                    $.messager.alert('Atención', 'El giro de la empresa un valor requerido.', 'info');
                }

                break;
        }

    }

    function confirmaOperacionCliente(tipoOperacion) {

        switch (tipoOperacion) {
            case "GUARDADOCLIENTE":
                $('#dlgContactos').dialog('close');
                $('#fmEditarCcontacto').form('clear');

                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Contacto guardado exitosamente!',
                    fn: function () {

                        $('#ddv').datagrid('reload');


                    }


                });
                break;
            case "GUARDADO":

                $('#IDCliente').val();

                //alert("¡Cliente guardado exitosamente!");

                //$.messager.alert('Operación','¡Cliente guardado exitosamente!','info');
                $('#dlgClientes').dialog('close');
                $('#fmEditarCliente').form('clear');

                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Cliente guardado exitosamente!',
                    fn: function () {

                        $('#dgClientes').datagrid('reload');


                    }


                });
                break;
                //Operación de edición.
            case "EDICION":

                $('#IDCliente').val();

                $('#dlgClientes').dialog('close');
                $('#fmEditarCliente').form('clear');

                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Cliente actualizado exitosamente!',
                    fn: function () {

                        $('#dgClientes').datagrid('reload');


                    }


                });
                break;
                //Fin de operación de edición.
            case "BORRADO":

                $.messager.alert({
                    title: 'Operación',
                    msg: '¡Cliente eliminado exitosamente!',
                    fn: function () {

                        $('#dgClientes').datagrid('reload');


                    }


                });

                break;
        }


    }

    //Función para eliminar el cliente.
    function EliminarCliente() {


        var row = $('#dgClientes').datagrid('getSelected');
        if (row) {
            var ID_cliente = row.id_cliente;

            //alert("El id del cliente seleccionado es:" + ID_cliente);
            var dataClienteContent = 'IDCLIENTE=' + ID_cliente;

            //Preparado post.
            $.ajax(
            {
                url: 'php/binding/Cliente/deleteCatCliente.php',
                type: 'post',
                dataType: "json",
                data: dataClienteContent,
                success: function (request) {

                    //$('#IDCliente').val(request.ID_CLIENTE);
                    //alert("MESAJE RETORNO: "+request.MESSAGE);
                    if (request.success == true) {

                        confirmaOperacionCliente('BORRADO');

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
                msg: 'Debe seleccionar un cliente dando click sobre el registro para poder eliminarlo.',
                fn: function () {
                    $('#dgClientes').datagrid('reload');
                }
            });
        }

    }

    $('#dgClientes').datagrid({
        view: detailview,
        detailFormatter: function (index, row) {
            return '<div style="padding:2px"><table id="ddv" class="ddv"></table></div>';
        },
        onExpandRow: function (index, row) {
            var ddv = $(this).datagrid('getRowDetail', index).find('table.ddv');
            ddv.datagrid({
                url: 'php/binding/Cliente/contacto/getCatContactos.php?id_cliente=' + row.id_cliente,
                fitColumns: true,
                singleSelect: true,
                rownumbers: true,
                toolbar: '#toolContacto',
                loadMsg: '',
                height: 'auto',
                columns: [[
                    { field: 'id_contacto', title: 'Nombre de contacto', width: 100, hidden: true },
                    { field: 'nombre_contacto', title: 'Nombre de contacto', width: 100 },
                    { field: 'apellido_contacto', title: 'Apellidos', width: 100 },
                    { field: 'puesto_contacto', title: 'Puesto de contacto', width: 100 },
                    { field: 'numero_contacto', title: 'Número de contacto', width: 100 },
                    { field: 'celular_contacto', title: 'Celular de contacto', width: 100 },
                    { field: 'email_contacto', title: 'Email de contacto', width: 100 }
                ]],
                onResize: function () {
                    $('#dgClientes').datagrid('fixDetailRowHeight', index);
                },
                onLoadSuccess: function () {
                    setTimeout(function () {
                        $('#dgClientes').datagrid('fixDetailRowHeight', index);

                    }, 0);
                }
            });
            $('#dgClientes').datagrid('fixDetailRowHeight', index);
            $('#idclienteContacto').val(row.id_cliente);

        }
    });
</script>