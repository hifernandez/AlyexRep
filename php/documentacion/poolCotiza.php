 
    <table  id="dgPoolCotizaciones" title="Pool cotizaciones" class="easyui-datagrid" style="width:auto;height:450px;"
			url= "php/binding/Cotizaciones/getTrCotizacion.php";
            toolbar="#toolPoolCotizas" 
            rownumbers="true" 
			fitColumns="true" 
			singleSelect="true"
			pagination ="true"
			loadMsg = "Cargando informaci�n...">
        <thead>
			<tr>
				<!--<th field="ck" checkbox="true" ></th>-->
				<!--<th data-options="field:'id_cotizacion'" hidden></th>-->
				<th data-options="field:'id_cotizacion',width:33" >ID Cotizaci�n</th>
				<th data-options="field:'clave_cliente',width:33" >Clave Cliente</th>
				<th data-options="field:'fecha_cotizacion',width:33" >Fecha Cotizaci�n</th>
				<th data-options="field:'subtotal_cotizacion',width:33,editor:'text'">Subtotal </th>
                <th data-options="field:'total_cotizacion',width:33, editor:'text'">Total</th>
                <th data-options="field:'observaciones_cotizacion',width:33, editor:'text'">Observaciones</th>
                <th data-options="field:'cotizacion_status',width:33, editor:'text'">Estatus</th>
            </tr>
        </thead>
    </table>
	<!--Cargando la barra de edici�n y busqueda-->
	<div id="toolPoolCotizas">
        <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="cambiaEstatusCot('APROBAR')">Aprobar Cotizaci�n</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="cambiaEstatusCot('CANCELAR')">Cancelar Cotizaci�n</a>
		<br>
		
	</div>
	
	
			<!-- MODAL PARA MOSTRAR EL MOTIVO DE CANCELACI�N-->
	<div id="dlgMotivoCotiza" class="easyui-dialog" style="width:auto;height:auto;padding:10px 20px"
	closed="true" buttons="#dlg-buttons" data-options="iconCls:'icon-error',modal:true,title:'Motivo de cancelaci�n'">
        <form id="fmMotivoCancela" method="post" novalidate>
			<fieldset align="center">
				<form enctype="multipart/form-data" id="Datos"  name="Datos" method="post"	onsubmit="return dropDownVal()">
					
								<div align="center">
								Especifique el motivo de la cancelaci�n:
								<br>
								<br>
								<div class="btn-group btn-group-lg" role="group" aria-label="...">
									<button id="btnAprobaEstatus" type="button" onclick="actualizaCotizaStatus()" class="btn btn-primary btn-sm">S�</button>
								</div>
								<div class="btn-group btn-group-lg" role="group" aria-label="...">
									<button id="btnAprobaEstatus" type="button" onclick="actualizaCotizaStatus()" class="btn btn-primary btn-sm">NO</button>
								</div>
								</div>
						

				</form>
			</fieldset>	
        </form>
    </div>


<!-- ******************************** -->
<script>
   /* $(document).ready(function ()
	{
         $('#dgPoolCotizacionesciones').datagrid('reload');   // reload the user data
		
    });�*/
    function cambiaEstatusCot(tipoOperacion) {
        switch(tipoOperacion){
            case "APROBAR":
                                var row = $('#dgPoolCotizaciones').datagrid('getSelected');
                                if (row){
                
                                        
                                            $.messager.confirm({
                                                title: 'Operaci�n',
                                                msg: '�Desea aprobar la cotizaci�n?. Ser� enviada al pool de pedidos.',
                                                cancel: 'Cancelar',
                                                fn: function (r) {
                                                    if (r) {
                                                        var ID_cotiza = row.id_cotizacion;
                                                        var flag_oper = "APROBAR";
                                                        var motivoCancela = "-";
                                                        //alert("El id del cliente seleccionado es:" + ID_cliente);
                                                        var dataCotizaContent = 'IDCotiza=' + ID_cotiza +
                                                                                '&Flag_Oper=' + flag_oper+
                                                                                '&MotivoCancela=' + motivoCancela;
                                                        alert(dataCotizaContent);
                                                        //Preparado post.
                                                        $.ajax({
                                                            url: 'php/binding/Cotizaciones/updateTrCotizacion.php',
                                                            type: 'post',
                                                            dataType: "json",
                                                            data: dataCotizaContent,
                                                            success: function (request) {
                                                                //$('#IDCliente').val(request.ID_CLIENTE);
                                                                //alert("MESAJE RETORNO: "+request.MESSAGE);
                                                                if (request.success == true) {
                                                                    confirmaOperacionCot('APROBAR');
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
                                                                 $('#dgPoolCotizaciones').datagrid('reload');
                                                    }
                                                }
                                            });
                                         
                
                                }else{
                    
                                            $.messager.alert({
                                                title: 'Atenci�n',
                                                icon:'info',
                                                msg: 'Debe seleccionar una cotizaci�n dando click sobre el registro para poder aprobarla.',
                                                fn: function(){
							
                                                    $('#dgPoolCotizaciones').datagrid('reload');
							
							
                                                }
							
						
                                            });
                                }
                break;
            case "CANCELAR":
                                var row = $('#dgPoolCotizaciones').datagrid('getSelected');
                                if (row) {
                                            $.messager.confirm({
                                                title: 'Operaci�n',
                                                msg: '�Desea cancelar la cotizaci�n?. Ser� descartada y no tendr� continuidad.',
                                                cancel: 'Cancelar',
                                                fn: function (rCancel) {
                                                    if (rCancel) {
                                                                //$('#dlgMotivoCotiza').dialog('OPEN');
                                                                $.messager.prompt({
                                                                    title: 'Motivo de cancelaci�n',
                                                                    msg: '�Cu�l es el motivo por el cual se cancela esta cotizaci�n?',
                                                                    fn: function (rMotivo) {
                                                                        if (rMotivo) {
                                                                                        var ID_cotiza = row.id_cotizacion;
                                                                                        var flag_oper = "CANCELAR";
                                                                                        var motivoCancela = rMotivo;
                                                                                       
                                                                                        var dataCotizaContent = 'IDCotiza=' + ID_cotiza +
                                                                                                                '&Flag_Oper=' + flag_oper +
                                                                                                                '&MotivoCancela=' + motivoCancela;
                                                                                        //Preparado post.
                                                                                        $.ajax({
                                                                                            url: 'php/binding/Cotizaciones/updateTrCotizacion.php',
                                                                                            type: 'post',
                                                                                            dataType: "json",
                                                                                            data: dataCotizaContent,
                                                                                            success: function (request) {
                                                                                                //$('#IDCliente').val(request.ID_CLIENTE);
                                                                                                //alert("MESAJE RETORNO: "+request.MESSAGE);
                                                                                                if (request.success == true) {
                                                                                                    confirmaOperacionCot('CANCELAR');
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
                                                        $('#dgPoolCotizaciones').datagrid('reload');
                                                    }
                                                }
                                            });
                                } else {
                                            $.messager.alert({
                                                title: 'Atenci�n',
                                                icon: 'info',
                                                msg: 'Debe seleccionar una cotizaci�n dando click sobre el registro para poder cancelarla.',
                                                fn: function () {
                                                    $('#dgPoolCotizaciones').datagrid('reload');
                                                }
                                            });
                                }
                break;
        }
    }
    //Funci�n para mensajes de confirmaci�n. 
    function confirmaOperacionCot(tipoOperacion) {
        switch (tipoOperacion) {
            case "APROBAR":
                                    $.messager.alert({
                                    title: 'Operaci�n',
                                    msg: '�Cotizaci�n aprobada exitosamente!',
                                    fn: function () {
                                                $('#dgPoolCotizaciones').datagrid('reload');
                                         }
                                    });
                break;
            case "CANCELAR":
                            
                                $.messager.alert({
                                    title: 'Operaci�n',
                                    msg: '�Cotizaci�n cancelada exitosamente!',
                                    fn: function () {
                                        $('#dgPoolCotizaciones').datagrid('reload');
                                    }
                                });
                break;
        
        
        
        
        
        
        
        
        
        
        }
    }
</script>