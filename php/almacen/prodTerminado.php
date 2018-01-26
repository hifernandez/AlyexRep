


	<form id="fmEditarFamilia" method="post" novalidate>
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Producto terminado</div>
							
				<table  id="dgDados" title="Productos terminados" class="easyui-datagrid" style="width:auto;height:300px;"
						url="php/binding/get.php" 
						toolbar="#toolDados" 
						rownumbers="true" 
						fitColumns="true" 
						singleSelect="true"  >
					<thead>
						<tr>
							<!--<th field="ck" checkbox="true" ></th>-->
							<th field="IdDado" hidden></th>
							<th field="Clave" style="width:10%">ITEM</th>
							<th field="Descripcion" style="">PESO</th>
							<th field="PesoTeorico" style="">KILO</th>
							<th field="SuperficieExpuesta" style="">PRECIO UNITARIO</th>
						</tr>
					</thead>
				</table>
			
			
		</div>
	</form>
	
	    
	
	
	
	
	<!--Cargando la barra de edición y busqueda-->
	<div id="toolDados">
        <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEdicionAcabado('ALTAADADO')">Alta</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEdicionAcabado('EDICIONDADO')">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="muestraPDF()">Eliminar</a>
		<br>
	</div>
	

	
	
	<!-- MODAL PARA MOSTRAR EN LA AGREGACIÓN -->
	<div id="dlgDados" class="easyui-dialog" style="width:550px;height:400px;padding:10px 20px"
	closed="true" buttons="#dlg-buttons">
        <form id="fmEditarDado" method="post" novalidate>
			<fieldset align="center">
				<form enctype="multipart/form-data" id="Datos"  name="Datos" action="GuardaEdicion.php" method="post"	onsubmit="return dropDownVal()">
					<TABLE BORDER=1 CELLPADDING=15 align="center">
						<TR>
							<TD>
								<input id="txtDadoClave" name="txtDadoClave" label="Clave" class="easyui-textbox" prompt="Clave" data-options="" style="width:300px">
								<BR>
							</TD>
						</TR>
						<TR>
							<TD>
								<input id="txtDadoDescripcion" name="txtDadoDescripcion" label="Descripción" class="easyui-textbox" prompt="Descripción" data-options="" style="width:300px">
								<BR>
							</TD>
						</TR>
						<TR>
							<TD>
								<input id="txtDadoPesoTeorico" name="txtDadoPesoTeorico" label="Clave" class="easyui-textbox" prompt="Clave" data-options="" style="width:300px">
								<BR>
							</TD>
						</TR>
						<TR>
							<TD>
								<input id="txtDadoSuperficieExpuesta" name="txtDadoSuperficieExpuesta" label="Clave" class="easyui-textbox" prompt="Clave" data-options="" style="width:300px">
								<BR>
							</TD>
						</TR>
						<TR>
							<TD>
								<input id="txtDadoSuperficiePulida" name="txtDadoSuperficiePulida" label="Clave" class="easyui-textbox" prompt="Clave" data-options="" style="width:300px">
								<BR>
							</TD>
						</TR>
						<TR>
							<TD>
								<div align="center">
								<div class="btn-group btn-group-lg" role="group" aria-label="...">
									<button id="btnAltaEditDado" type="button" onclick="guardaAcabado()" class="btn btn-primary btn-sm">ACTUALIZAR</button>
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
	function abrirModalEdicionAcabado(tipoOperacion)
	{
		switch(tipoOperacion)
		{
			case "EDICIONDADO":
				var row = $('#dgDados').datagrid('getSelected');
				if (row)
				{
					$('#tipoOperacionDados').val(tipoOperacion);
					
					$('#dlgDados').dialog('open').dialog('setTitle','Editar dado');
					$('#fmEditarDado').form('load',row.IdDado);

					var casoSelected = row.IdDado;
					var dataSelectedContent = 'ID=' + casoSelected;

					$.ajax (
					{
						url: 	'php/binding/getDadoByID.php',
						type:   'post',
						dataType: "json",
						data: 	dataSelectedContent,
						success: function(request)
						{
							//alert(request.Clave+" "+request.Descripcion);
							$('#txtDadoClave').textbox("setValue",request.Clave);
							$('#txtDadoDescripcion').textbox("setValue",request.Descripcion);
							$('#txtDadoPesoTeorico').textbox("setValue",request.PesoTeorico);
							$('#txtDadoSuperficieExpuesta').textbox("setValue",request.SuperficieExpuesta);
							$('#txtDadoSuperficiePulida').textbox("setValue",request.SuperficiePulida);
						},
						error: 	function(request, settings)
						{
							alert(request.responseText);
						}
					});
				}
				else
				{
					alert("Debe seleccionar un dado dando clic sobre el registro para poder editarlo.");
				}
			break;
			
			case "ALTAADADO":
				$('#tipoOperacionDados').val(tipoOperacion);
				
				$('#dlgDados').dialog('open').dialog('setTitle','Nuevo dado');
				$('#fmEditarDado').form('load');
				
				$("#btnAltaEditDado").html('GUARDAR');
			break;
		}
		
	}// FIN 
	
	function guardaAcabado()
	{
		var tipoOperacionGuardado= $('#tipoOperacionDados').val();
		switch(tipoOperacionGuardado)
		{
			case "EDICIONDADO":
				alert("Se actualizó la información correctamente");
			break;
			case "ALTAADADO":
				alert("Se guardo correctamente el nuevo acabado");
			break;
		}
		
	}
	
	
	
	</script>

	
	
	
	
