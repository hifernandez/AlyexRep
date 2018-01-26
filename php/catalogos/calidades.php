    <input id="tipoOperacionCalidades" type="hidden" value=""/>
    <table  id="dgCalidades" title="Calidades" class="easyui-datagrid" style="width:auto;height:450px;"
            url="php/binding/Calidad/getCatCalidad.php" 
            toolbar="#toolCalidades" 
            rownumbers="true" 
			fitColumns="true" 
			singleSelect="true"
			pagination ="true"
			loadMsg = "Cargando información...">
        <thead>
            <tr>
				<!--<th field="ck" checkbox="true" ></th>-->
				<th data-options="field:'id_calidad'" hidden></th>
				<th data-options="field:'nombre_calidad',width:33">Calidad</th>
				<th data-options="field:'descripcion_calidad',width:33,editor:'text'">Descripción</th>
				<th data-options="field:'fecha_auditoria_calidad',width:33,editor:'text'">Fecha de Auditoría</th>
				<th data-options="field:'observaciones_calidad',width:33,editor:'text'">Observaciones</th>
            </tr>
        </thead>
    </table>
	
	<!--Cargando la barra de edición y busqueda-->
	<div id="toolCalidades">
        <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEdicionCalidad('ALTACALIDAD')">Alta de calidad</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEdicionCalidad('EDICIONCALIDAD')">Editar calidad</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="EliminarCalidad()">Eliminar calidad</a>
      
		<br>
		<!--Busqueda de elementos-->
		<!--<TABLE BORDER=0 WIDTH=100 CELLPADDING=15 align="center">
			<TR>
			<TR>
				<TD >
					<input id="bscCalClave" label="Clave" class="easyui-textbox" prompt="Clave" data-options="" style="width:300px">
				</TD>

				<TD>
					<input id="bscCalDesc" label="Descripción" class="easyui-textbox" prompt="Descripción" data-options="" style="width:300px">
				</TD>

				<TD>
					<div class="btn-group btn-group-lg" role="group" aria-label="...">
						<button type="button" onclick="btnBuscarCalidad()" class="btn btn-primary btn-sm">BUSCAR</button>
					</div>
				</TD>
			</TR>
		</TABLE>-->
	</div>
	

	
	<!-- MODAL PARA MOSTRAR EN LA AGREGACIÓN -->
	<div id="dlgCalidades" class="easyui-dialog" style="width:350px;height:auto;padding:10px 20px"
	closed="true" buttons="#dlg-buttons">
        <form id="fmEditarCalidad" method="post" novalidate>


            <div style="margin-bottom:5px;font-size:14px;border-bottom:1px solid #ccc">Datos de la calidad:</div>
            <div style="margin-bottom:5px"></div>
            <table>
                <tr>
                    <td>Clave:</td>
                    <td>
                        <input id="txtCalClave" name="txtCalClave" class="easyui-textbox" data-options="required:true"  style="width:100%;padding:5px" />
                    </td>

                </tr>
                <tr>
                    <td>Descripción:</td>
                    <td><input id="txtCalDescripcion" name="txtCalDescripcion" class="easyui-textbox" data-options="required:true" style="width:100%;padding:5px"></td>
                </tr>
                <tr>
                    <td>Fecha:</td>
                    <td><input id="txtAcaFecha" name="txtAcaFecha" class="easyui-datebox"data-options="required:true" style="width:100%"></td>
                </tr>
                <tr>
                    <td>Observaciones:</td>
                    <td><input id="txtAcaObservaciones" name="txtAcaObservaciones" class="easyui-textbox"  data-options="required:true" style="width:100%"></td>
                </tr>

            </table>
            <div style="margin-bottom:5px"></div>
            <div align="center">

                <button id="btnAltaCalidad" type="button" onclick="guardaCalidad()" class="btn btn-primary">GUARDAR</button>
                <button id="btnEditCalidad" type="button" onclick="guardaCalidad()" class="btn btn-primary">ACTUALIZAR</button>
                

            </div>
            <div style="margin-bottom:10px">
            </div>
       

        
        </form>
		

    </div>
	<!-- ******************************** -->

	
	
	<script>7
		$(document).ready(function() 
	{
		
		 $('#dgCalidades').datagrid('reload');   // reload the user data
	
	});
	
	function btnBuscarFamilia(){
		
		
		$('#dgCalidades').datagrid('reload');
		

	}
	function abrirModalEdicionCalidad(tipoOperacion)
	{
		switch(tipoOperacion)
		{
			case "EDICIONCALIDAD":
				$('#tipoOperacionCalidades').val("EDICIONCALIDAD");
				var row = $('#dgCalidades').datagrid('getSelected');
				if (row)
				{
					//guardaCalidad();
					$('#dlgCalidades').dialog('open').dialog('setTitle','Editar Calidad');
					$('#fmEditarCalidad').form('load');
					$('#txtCalClave').textbox("setValue",row.nombre_calidad);
					$('#txtCalDescripcion').textbox("setValue",row.descripcion_calidad);
					$('#txtAcaFecha').datebox("setValue",row.fecha_auditoria_calidad);
					$('#txtAcaObservaciones').textbox("setValue", row.observaciones_calidad);
					$('#btnAltaCalidad').hide();
					$('#btnEditCalidad').show();
				}
				else
				{
				    $.messager.alert({
				        title: 'Atención',
				        icon: 'info',
				        msg: 'Debe seleccionar un registro dando click sobre el  para poder editarlo.',
				        fn: function () {

				            $('#dgCalidades').datagrid('reload');


				        }
				    });
				}
			break;
			
			case "ALTACALIDAD":
				$('#fmEditarCalidad').form('clear');
				$('#tipoOperacionCalidades').val("ALTACALIDAD");
				$('#dlgCalidades').dialog('open').dialog('setTitle','Nueva Calidad');
				$('#fmEditarCalidad').form('load');
				$('#btnAltaCalidad').show();
				$('#btnEditCalidad').hide();
			break;
		}
		
	}// FIN 
	
	function guardaCalidad()
	{
		var tipoOperacionGuardado= $('#tipoOperacionCalidades').val();
		switch(tipoOperacionGuardado)
		{
			case "EDICIONCALIDAD":
				//alert("Entre al CASE Edicion Familia");
				//alert("El valor de TipoOperacion es: "+ tipoOperacionGuardado);
				var claveTxt = $('#txtCalClave').val();
				var descTxt = $('#txtCalDescripcion').val();
				var fechaTxt = $('#txtAcaFecha').val();
				var ObserTxt = $('#txtAcaObservaciones').val();

				if (claveTxt != '') {
				    if (descTxt != '') {
				        if (fechaTxt != '') {
				            if (ObserTxt != '') {
				                var dataSelectedContent = 'ID=' + $('#dgCalidades').datagrid('getSelected').id_calidad + '&Clave=' + claveTxt + '&Descripcion=' + descTxt + '&Fecha=' + fechaTxt + '&Observaciones=' + ObserTxt + '&TipoOperacion=' + tipoOperacionGuardado;
				                //var dataSelectedContent = 'ID=' + row.id_calidad +'&Clave='+row.nombre_calidad+'&Descripcion='+row.descripcion_calidad+'&TipoOperacion='+tipoOperacionGuardado;
				
				                $.ajax(
                                {
                                    url: 'php/binding/Calidad/updateCatCalidad.php',
                                    type: 'post',
                                    dataType: "json",
                                    data: dataSelectedContent,
                                    success: function (request) {
                                        confirmaOperacionCalidades('EDICION');
                                    },
                                    error: function (request, settings) {
                                        confirmaOperacionCalidades('ERROR');
                                    }
                                });
				            } else {
				                $.messager.alert('Atención', 'Las observaciones son un valor requerido.', 'info');
				            }
				        } else {
				            $.messager.alert('Atención', 'La fecha de auditoría es un valor requerido.', 'info');
				        }
				    } else {
				        $.messager.alert('Atención', 'La descripción es un valor requerido.', 'info');
				    }
				} else {
				    $.messager.alert('Atención', 'La clave de calidad es un valor requerido.', 'info');
				}
				
			break;
			case "ALTACALIDAD":
				
				//alert("Se guardo correctamente la nueva familia");
				//var row = $('#dgAleaciones').datagrid('getSelected');
				var claveTxt = $('#txtCalClave').val();
				var descTxt = $('#txtCalDescripcion').val();
				var fechaTxt = $('#txtAcaFecha').val();
				var ObserTxt = $('#txtAcaObservaciones').val();

				if (claveTxt != '') {
				    if (descTxt != '') {
				        if (fechaTxt != '') {
				            if (ObserTxt != '') {
				                var dataSelectedContent = 'Clave=' + claveTxt + '&Descripcion=' + descTxt + '&Fecha=' + fechaTxt + '&Observaciones=' + ObserTxt + '&TipoOperacion=' + tipoOperacionGuardado;
				                $.ajax(
                                {
                                    url: 'php/binding/Calidad/updateCatCalidad.php',
                                    type: 'post',
                                    dataType: "json",
                                    data: dataSelectedContent,
                                    success: function (request) {
                                        confirmaOperacionCalidades('GUARDADO');

                                    },
                                    error: function (request, settings) {
                                        confirmaOperacionCalidades('ERROR');
                                    }
                                });
				            } else {
				                $.messager.alert('Atención', 'Las observaciones son un valor requerido.', 'info');
				            }
				        } else {
				            $.messager.alert('Atención', 'La fecha de auditoría es un valor requerido.', 'info');
				        }
				    } else {
				        $.messager.alert('Atención', 'La descripción es un valor requerido.', 'info');
				    }
				} else {
				    $.messager.alert('Atención', 'La clave de calidad es un valor requerido.', 'info');
				}
			
				
			break;
		}
		
	}
	
	function EliminarCalidad()
	{
			var row = $('#dgCalidades').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirma','Estás seguro de eliminarlo?',function(r){
					if (r){
						$.post('php/binding/Calidad/deleteCatCalidad.php',{id_calidad:row.id_calidad},function(result){
							if (result.success){
							    confirmaOperacionCalidades("BORRADO");	// reload the user data
							} else {
							    confirmaOperacionCalidades("ERROR");
							}
						},'json');
					}
				});
			}
		}
	
	function confirmaOperacionCalidades(tipoOperacion) {

	    switch (tipoOperacion) {
	        case "GUARDADO":

	            //$.messager.alert('Operación','¡Cliente guardado exitosamente!','info');
	            $('#dlgCalidades').dialog('close');
	            $('#fmEditarCalidad').form('clear');

	            $.messager.alert({
	                title: 'Operación',
	                msg: '¡Calidad guardado exitosamente!',
	                fn: function () {

	                    $('#dgCalidades').datagrid('reload');

	                }


	            });
	            break;
	            //Operación de edición.
	        case "EDICION":

	            $('#dlgCalidades').dialog('close');
	            $('#fmEditarCalidad').form('clear');

	            $.messager.alert({
	                title: 'Operación',
	                msg: '¡Calidad actualizado exitosamente!',
	                fn: function () {

	                    $('#dgCalidades').datagrid('reload');

	                }


	            });

	            break;
	            //Fin de operación de edición.
	        case "BORRADO":

	            $.messager.alert({
	                title: 'Operación',
	                msg: '¡Calidad eliminado exitosamente!',
	                fn: function () {

	                    $('#dgCalidades').datagrid('reload');


	                }


	            });

	            break;

	        case "ERROR":

	            $('#dlgCalidades').dialog('close');
	            $('#fmEditarCalidad').form('clear');


	            $.messager.alert({
	                title: 'Operación',
	                icon: 'warning',
	                msg: '¡Verifique que la operación sea correcta!',
	                fn: function () {

	                    $('#dgCalidades').datagrid('reload');


	                }


	            });

	            break;
	    }


	}
	</script>


