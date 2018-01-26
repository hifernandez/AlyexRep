    <input id="tipoOperacionAcabados" type="hidden" value=""/> 
	<table  id="dgAcabados" title="Acabados" class="easyui-datagrid" style="width:auto;height:450px;"
            url="php/binding/Acabados/getCatAcabados.php" 
            toolbar="#toolAcabados" 
            rownumbers="true" 
			fitColumns="true" 
			singleSelect="true"  
			pagination ="true"
			loadMsg = "Cargando información...">
        <thead>
            <tr>
				<!--<th field="ck" checkbox="true" ></th>-->
				<th data-options="field:'id_acabado'" hidden></th>
				<th data-options="field:'clave_acabado',width:33,editor:'text'">Acabado</th>
				<th data-options="field:'descripcion_acabado',width:33,editor:'text'">Descripción</th>
				<th data-options="field:'micras_esp_acabado',width:33,editor:'text'">Micras Espesor</th>
            </tr>
        </thead>
    </table>
	
	<!--Cargando la barra de edición y busqueda-->
	<div id="toolAcabados">
        <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEdicionAcabado('ALTAACABADO')">Alta de acabado</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEdicionAcabado('EDICIONACABADO')">Editar acabado</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="EliminarAcabado()">Eliminar acabado</a>
		<br>
		<!--Busqueda de elementos-->
		<!--<TABLE BORDER=0  align="center">
			<TR>
				<TD >
					<input id="bscAcaClave" label="Acabado" class="easyui-textbox" prompt="Acabado" data-options="" style="width:300px">
				</TD>

				<TD>
					<input id="bscAcaDesc" label="Descripción" class="easyui-textbox" prompt="Descripción" data-options="" style="width:300px">
				</TD>

				<TD>
					<div class="btn-group btn-group-lg" role="group" aria-label="...">
						<button type="button" onclick="btnBuscarAcabados()" class="btn btn-primary btn-sm">BUSCAR</button>
					</div>
				</TD>
			</TR>
		</TABLE>-->
	</div>
	
	
	
	
	<!-- MODAL PARA MOSTRAR EN LA AGREGACIÓN -->
	<div id="dlgAcabados" class="easyui-dialog" style="width:300px;height:auto;padding:10px 20px"
	closed="true" buttons="#dlg-buttons">
        <form id="fmEditarAcabado" method="post" novalidate>
			
            <div style="margin-bottom:5px;font-size:14px;border-bottom:1px solid #ccc">Datos del acabado:</div>
            <div style="margin-bottom:5px"></div>
            <table>
                <tr>
                    <td>Clave:</td>
                    <td>
                        <input id="txtAcaClave" name="txtAcaClave" class="easyui-textbox" data-options="required:true" style="width:100%;padding:5px" />
                    </td>

                </tr>
                <tr>
                    <td>Descripción:</td>
                    <td><input id="txtAcaDescripcion" name="txtAcaDescripcion" class="easyui-textbox" data-options="required:true" style="width:100%;padding:5px"></td>
                </tr>
                <tr>
                    <td>Micras Espesor:</td>
                    <td><input id="txtAcaMicras" name="txtAcaMicras" class="easyui-numberbox" data-options="precision:2, required:true" style="width:100%"></td>
                </tr>

                
            </table>
            <div style="margin-bottom:5px"></div>
            <div align="center">

                <button id="btnEditAcabado" type="button" onclick="guardaAcabado()" class="btn btn-primary">ACTUALIZAR</button>
                <button id="btnAltaAcabado" type="button" onclick="guardaAcabado()" class="btn btn-primary">GUARDAR</button>
               

            </div>
            <div style="margin-bottom:10px">
            </div>
            </form>
    </div>
	<!-- ******************************** -->

	
	
	<script>
	$(document).ready(function() 
	{
		
		 $('#dgAcabados').datagrid('reload');    // reload the user data
	
	});
	
	function btnBuscarFamilia(){
		
		
		 $('#dgAcabados').datagrid('reload'); 
		

	}
	
	
	function abrirModalEdicionAcabado(tipoOperacion)
	{
		switch(tipoOperacion)
		{
			case "EDICIONACABADO":
				//alert (tipoOperacion);
				$('#tipoOperacionAcabados').val("EDICIONACABADO");
				var row = $('#dgAcabados').datagrid('getSelected');
				if (row)
				{
					//guardaAcabado();
					$('#dlgAcabados').dialog('open').dialog('setTitle','Editar Acabado');
					$('#fmEditarAcabado').form('load',row);
					$('#txtAcaClave').textbox("setValue",row.clave_acabado);
					$('#txtAcaDescripcion').textbox("setValue",row.descripcion_acabado);
					$('#txtAcaMicras').textbox("setValue", row.micras_esp_acabado);
					$('#btnAltaAcabado').hide();
					$('#btnEditAcabado').show();
				}
				else
				{
				    $.messager.alert({
				        title: 'Atención',
				        icon: 'info',
				        msg: 'Debe seleccionar un registro dando click sobre el  para poder editarlo.',
				        fn: function () {

				            $('#dgAcabados').datagrid('reload');


				        }
				    });
				}
			break;
			
			case "ALTAACABADO":
				$('#fmEditarAcabado').form('clear');
				$('#tipoOperacionAcabados').val("ALTAACABADO");
				$('#dlgAcabados').dialog('open').dialog('setTitle','Nuevo Acabado');
				$('#fmEditarAcabado').form('load');
				$('#btnEditAcabado').hide();
				$('#btnAltaAcabado').show();
			break;
		}
		
	}// FIN 
	
	function guardaAcabado()
	{
		var tipoOperacionGuardado = $('#tipoOperacionAcabados').val();
		//alert("El valor de TipoOperacion es: "+ tipoOperacionGuardado);
		switch(tipoOperacionGuardado)
		{
			case "EDICIONACABADO":
			    var claveTxt = $('#txtAcaClave').val();
			    var descTxt = $('#txtAcaDescripcion').val();
			    var micraTxt = $('#txtAcaMicras').val();
			    if (claveTxt != '') {
			        if (descTxt != '') {
			            if (micraTxt != '') {
			                
			                var dataSelectedContent = 'ID=' + $('#dgAcabados').datagrid('getSelected').id_acabado + '&Clave=' + claveTxt + '&Descripcion=' + descTxt + '&Micras=' + micraTxt + '&TipoOperacion=' + tipoOperacionGuardado;

			                //alert ('El valor de Data =' + dataSelectedContent);
			                //alert(request.Clave+" "+request.Descripcion);

			                $.ajax(
                            {
                                url: 'php/binding/Acabados/updateCatAcabados.php',
                                type: 'post',
                                dataType: "json",
                                data: dataSelectedContent,
                                success: function (request) {
                                    //alert(request.responseText);
                                    confirmaOperacionAcabado("EDICION");
                                },
                                error: function (request, settings) {
                                    //alert(request.responseText);
                                    confirmaOperacionAcabado("EDICION");
                                }
                            });
			            } else {
			                $.messager.alert('Atención', 'Las micras son un valor requerido.', 'info');
			            }
			        } else {
			            $.messager.alert('Atención', 'La descripción del acabado es un valor requerido.', 'info');
			        }
			    }else{
			        $.messager.alert('Atención', 'La clave del acabado es un valor requerido.', 'info');
			    }
			break;
			case "ALTAACABADO":
				//alert("Se guardo correctamente la nueva familia");
			    //var row = $('#dgAcabados').datagrid('getSelected');
			    var claveTxt = $('#txtAcaClave').val();
			    var descTxt = $('#txtAcaDescripcion').val();
			    var micraTxt = $('#txtAcaMicras').val();
			    
			    if (claveTxt != '') {
			        if (descTxt != '') {
			            if (micraTxt != '') {
			                var dataSelectedContent = 'Clave=' + claveTxt + '&Descripcion=' + descTxt + '&Micras=' + micraTxt + '&TipoOperacion=' + tipoOperacionGuardado;
			                alert('Entraste a alta de acabado.');
			                $.ajax(
                                {
                                    url: 'php/binding/Acabados/updateCatAcabados.php',
                                    type: 'post',
                                    dataType: "json",
                                    data: dataSelectedContent,
                                    success: function (request) {
                                        //alert(request.responseText);
                                        confirmaOperacionAcabado("GUARDADO");

                                    },
                                    error: function (request, settings) {
                                        //alert(request.responseText);
                                        confirmaOperacionAcabado("GUARDADO");
                                    }
                                });
			            } else {
			                $.messager.alert('Atención', 'Las micras son un valor requerido.', 'info');
			            }
			        } else {
			            $.messager.alert('Atención', 'La descripción del acabado es un valor requerido.', 'info');
			        }
			    } else {
			        $.messager.alert('Atención', 'La clave del acabado es un valor requerido.', 'info');
			    }
			break;
		}
	
		
	}
	
		
	function EliminarAcabado()
	{
			var row = $('#dgAcabados').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirma','Estás seguro de eliminarlo?',function(r){
					if (r){
						$.post('php/binding/Acabados/deleteCatAcabados.php',{id_acabado:row.id_acabado},function(result){
						    $('#dgAcabados').datagrid('reload');
						    if (result.success) {
						        confirmaOperacionAcabado('BORRADO');
						       
						        // reload the user data
							} else {
						        confirmaOperacionAcabado('ERROR');
							}
						},'json');
					}
				});
			} else {

			    $.messager.alert({
			        title: 'Atención',
			        icon: 'info',
			        msg: 'Debe seleccionar un registro dando click sobre el  para poder eliminarlo.',
			        fn: function () {

			            $('#dgAcabados').datagrid('reload');


			        }
			    });




			}
	}


	function confirmaOperacionAcabado(tipoOperacion) {

	    switch (tipoOperacion) {
	        case "GUARDADO":

	            //$.messager.alert('Operación','¡Cliente guardado exitosamente!','info');
	            $('#dlgAcabados').dialog('close');
	            $('#fmEditarAcabado').form('clear');

	            $.messager.alert({
	                title: 'Operación',
	                msg: '¡Acabado guardado exitosamente!',
	                fn: function () {

	                    $('#dgAcabados').datagrid('reload');

	                }


	            });
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

	            $('#dlgAcabados').dialog('close');
	            $('#fmEditarAcabado').form('clear');


	            $.messager.alert({
	                title: 'Operación',
	                icon: 'warning',
	                msg: '¡Verifique que la operación sea correcta!',
	                fn: function () {

	                    $('#dgAcabados').datagrid('reload');


	                }


	            });

	            break;
	    }


	}


	</script>

