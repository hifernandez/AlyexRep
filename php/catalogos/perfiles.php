    <input id="tipoOperacionPerfiles" type="hidden" value=""/>
    <table  id="dgPerfiles" title="Perfiles" class="easyui-datagrid" style="width:auto;height:450px;"
			url= "php/binding/Perfil/getCatPerfil.php";
            toolbar="#toolPerfiles" 
            rownumbers="true" 
			fitColumns="true" 
			singleSelect="true"
			pagination ="true"
			loadMsg = "Cargando información...">
        <thead>
				<tr>
				<!--<th field="ck" checkbox="true" ></th>-->
				<th data-options="field:'id_perfil'" hidden></th>
				<th data-options="field:'id_familia'" hidden></th>
				<th data-options="field:'nombre_perfil',width:33,editor:'text'">Clave</th>
                <th data-options="field:'descripcion_perfil',width:33, editor:'text'">Descripción</th>
				<th data-options="field:'clave_familia',width:33" >Clave Familia</th>
            </tr>
        </thead>
    </table>
	
	<!--Cargando la barra de edición y busqueda-->
	<div id="toolPerfiles">
        <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEdicionPerfil('ALTAPERFIL')">Alta de Perfil</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEdicionPerfil('EDICIONPERFIL')">Editar Perfil</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="EliminarPerfil()">Eliminar Perfil</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="muestraWord()">Reporte del Perfil</a>
		<br>
		<!--Busqueda de elementos-->
		<TABLE BORDER=0 WIDTH=100 CELLPADDING=15 align="center">
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
		</TABLE>
	</div>
	
	
	
			<!-- MODAL PARA MOSTRAR EN LA AGREGACIÓN -->
	<div id="dlgPerfiles" class="easyui-dialog" style="width:550px;height:400px;padding:10px 20px"
	closed="true" buttons="#dlg-buttons">
        <form id="fmEditarPerfil" method="post" novalidate>
			<fieldset align="center">
				<form enctype="multipart/form-data" id="Datos"  name="Datos" method="post"	onsubmit="return dropDownVal()">
					<TABLE BORDER=1 CELLPADDING=15 align="center">
						<TR>
							<TD>
								<input id="txtPerNombre" name="txtPerNombre" label="Clave" class="easyui-textbox" prompt="Clave" data-options="" style="width:300px">
								<BR>
							</TD>
						</TR>
						<TR>
							<TD>
								<input id="txtPerDescripcion" name="txtPerDescripcion" label="Descripción" class="easyui-textbox" prompt="Descripción" data-options="" style="width:300px">
								<BR>
							</TD>
						</TR>
						<TR>
							<TD>
								<input id="comboClavePerfil" class="easyui-combobox" name="comboClavePerfil" style="width:300px;" data-options="
										url: 'php/binding/Familia/getCatFamilias.php',
										valueField: 'id_familia',
										textField: 'clave_familia',
										label: 'Familia:',
										labelPosition: 'right'
										">
								<BR>
							</TD>
						</TR>
						<TR>
							<TD>
								<div align="center">
								<div class="btn-group btn-group-lg" role="group" aria-label="...">
									<button id="btnAltaEditPerfil" type="button" onclick="guardaPerfil()" class="btn btn-primary btn-sm">ACTUALIZAR</button>
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

	
	
	<script>
	$(document).ready(function() 
	{
		 $('#dgPerfiles').datagrid('reload');    // reload the user data
	});
	
	function btnBuscarFamilia()
	{
		 $('#dgPerfiles').datagrid('reload'); 
	}
	
	
	function abrirModalEdicionPerfil(tipoOperacion)
	{
		switch(tipoOperacion)
		{
			case "EDICIONPERFIL":
				$('#tipoOperacionPerfiles').val("EDICIONPERFIL");
				var row = $('#dgPerfiles').datagrid('getSelected');
				if (row)
				{
					guardaPerfil();
					/*$('#dlgPerfiles').dialog('open').dialog('setTitle','Editar producto');
					$('#fmEditarPerfil').form('load',row);
					$('#txtFamClave').textbox("setValue",row.clave_familia);
					$('#txtFamDescripcion').textbox("setValue",row.descripcion_familia);
					$('#txtFamSubFamilia').textbox("setValue",row.subfamilia_familia);*/	
				}
				else
				{
					alert("Debe seleccionar un producto dando clic sobre el registro para poder editarlo.");
				}
			break;
			
			case "ALTAPERFIL":
				$('#fmEditarPerfil').form('clear');
				$('#tipoOperacionPerfiles').val("ALTAPERFIL");
				$('#dlgPerfiles').dialog('open').dialog('setTitle','Nuevo Perfil');
				$('#fmEditarPerfil').form('load');
				
				$("#btnAltaEditPerfil").html('GUARDAR');
			break;
			
		}
		
	}// FIN 
	
	function guardaPerfil()
	{
		var tipoOperacionGuardado = $('#tipoOperacionPerfiles').val();
		//alert("El valor de TipoOperacion es: "+ tipoOperacionGuardado);
		switch(tipoOperacionGuardado)
		{
			case "EDICIONPERFIL":
				//alert("Entre al CASE Edicion Familia");
				//alert("El valor de TipoOperacion es: "+ tipoOperacionGuardado);
				var row = $('#dgPerfiles').datagrid('getSelected');
				/*var claveTxt = $('#txtFamClave').val();
				var descTxt = $('#txtFamDescripcion').val();
				var subTxt = $('#txtFamSubFamilia').val();*/
				var dataSelectedContent = 'ID=' + row.id_perfil +'&ID_FAM='+row.id_familia+'&Clave='+row.nombre_perfil+'&Descripcion='+row.descripcion_perfil+'&TipoOperacion='+tipoOperacionGuardado;
				
				//alert ('El valor de Row =' + row.id_familia);
				//alert(dataSelectedContent);
				
					$.ajax (
					{
						url: 	'php/binding/Perfil/updateCatPerfil.php',
						type:   'post',
						dataType: "json",
						data: 	dataSelectedContent,
						success: function(request)
						{
							alert(request.responseText);
						},
						error: 	function(request, settings)
						{
							alert(request.responseText);
						}
					});
					$('#dgPerfiles').datagrid('reload'); 
			break;
			case "ALTAPERFIL":
				//alert("Se guardo correctamente la nueva familia");
				//var row = $('#dgPerfiles').datagrid('getSelected');
				var claveTxt = $('#txtPerNombre').val();
				var descTxt = $('#txtPerDescripcion').val();
				var perTxt = $('#comboClavePerfil').combobox('getValue');
				var dataSelectedContent = 'Clave='+claveTxt+'&Descripcion='+descTxt+'&ID_FAM='+perTxt+'&TipoOperacion='+tipoOperacionGuardado;
				
				//alert ("El valor de dataSelectedContent ="+dataSelectedContent);
				//alert(perTxt);
				
					$.ajax (
					{
						url: 	'php/binding/Perfil/updateCatPerfil.php',
						type:   'post',
						dataType: "json",
						data: 	dataSelectedContent,
						success: function(request)
						{
							alert(request.responseText);
						},
						error: 	function(request, settings)
						{
							alert(request.responseText);
						}
					});
					$('#dlgPerfiles').dialog('close');
					$('#dgPerfiles').datagrid('reload'); 
			break;
		}
		
		
	}
	
		
	function EliminarPerfil()
	{
			var row = $('#dgPerfiles').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirma','Estás seguro de eliminarlo?',function(r){
					if (r){
						$.post('php/binding/Perfil/deleteCatPerfil.php',{id_perfil:row.id_perfil},function(result){
							if (result.success){
								$('#dgPerfiles').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.errorMsg
								});
							}
						},'json');
					}
				});
			}
		}
	

	
	$.extend($.fn.datagrid.methods, {
			editCell: function(jq,param){
				return jq.each(function(){
					var opts = $(this).datagrid('options');
					var fields = $(this).datagrid('getColumnFields',true).concat($(this).datagrid('getColumnFields'));
					for(var i=0; i<fields.length; i++){
						var col = $(this).datagrid('getColumnOption', fields[i]);
						col.editor1 = col.editor;
						if (fields[i] != param.field){
							col.editor = null;
						}
					}
					$(this).datagrid('beginEdit', param.index);
                    var ed = $(this).datagrid('getEditor', param);
                    if (ed){
                        if ($(ed.target).hasClass('textbox-f')){
                            $(ed.target).textbox('textbox').focus();
                        } else {
                            $(ed.target).focus();
                        }
                    }
					for(var i=0; i<fields.length; i++){
						var col = $(this).datagrid('getColumnOption', fields[i]);
						col.editor = col.editor1;
					}
				});
			},
            enableCellEditing: function(jq){
                return jq.each(function(){
                    var dg = $(this);
                    var opts = dg.datagrid('options');
                    opts.oldOnClickCell = opts.onClickCell;
                    opts.onClickCell = function(index, field){
                        if (opts.editIndex != undefined){
                            if (dg.datagrid('validateRow', opts.editIndex)){
                                dg.datagrid('endEdit', opts.editIndex);
                                opts.editIndex = undefined;
                            } else {
                                return;
                            }
                        }
                        dg.datagrid('selectRow', index).datagrid('editCell', {
                            index: index,
                            field: field
                        });
                        opts.editIndex = index;
                        opts.oldOnClickCell.call(this, index, field);
                    }
                });
            }
		});

		$(function(){
			$('#dgPerfiles').datagrid().datagrid('enableCellEditing');
		})
	</script>




