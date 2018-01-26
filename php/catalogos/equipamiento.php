    <input id="tipoOperacionEquipos" type="hidden" value=""/>
    <table  id="dgEquipamiento" title="Equipamiento" class="easyui-datagrid" style="width:auto;height:800px;"
            url="php/binding/getCatEquipamiento.php" 
            toolbar="#toolEquipamiento" 
            rownumbers="true" 
			fitColumns="true" 
			singleSelect="true"  >
        <thead>
            <tr>
				<!--<th field="ck" checkbox="true" ></th>-->
				<th field="IdEquipo" hidden></th>
				<th field="Clave" style="width:33%">Clave</th>
				<th field="Tipo" style="width:33%">Tipo</th>
				<th field="Descripcion" style="width:33%">Descripción</th>
            </tr>
        </thead>
    </table>
	
	<!--Cargando la barra de edición y busqueda-->
	<div id="toolEquipamiento">
        <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEdicionEquipo('ALTAEQUIPO')">Alta de equipo</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEdicionEquipo('EDICIONEQUIPO')">Editar equipo</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="muestraPDF()">Eliminar equipo</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="muestraWord()">Reporte del equipo</a>
		<br>
		<!--Busqueda de elementos-->
		<TABLE BORDER=0 WIDTH=100 CELLPADDING=15 align="center">
			<TR>
			<TR>
				<TD >
					<input id="bscEquiClave" label="Clave" class="easyui-textbox" prompt="Clave" data-options="" style="width:300px">
				</TD>

				<TD>
					<input id="bscEquiTipo" label="Tipo" class="easyui-textbox" prompt="Tipo de equipo" data-options="" style="width:300px">
				</TD>

				<TD>
					<input id="bscEquiDesc" label="Descripción" class="easyui-textbox" prompt="Descripción" data-options="" style="width:300px">
				</TD>

				<TD>
					<div class="btn-group btn-group-lg" role="group" aria-label="...">
						<button type="button" onclick="btnBuscarEquipo()" class="btn btn-primary btn-sm">BUSCAR</button>
					</div>
				</TD>
			</TR>
		</TABLE>
	</div>
	

		
	
	<!-- MODAL PARA MOSTRAR EN LA AGREGACIÓN -->
	<div id="dlgEquipos" class="easyui-dialog" style="width:550px;height:400px;padding:10px 20px"
	closed="true" buttons="#dlg-buttons">
        <form id="fmEditarEquipo" method="post" novalidate>
			<fieldset align="center">
				<form enctype="multipart/form-data" id="Datos"  name="Datos" action="GuardaEdicion.php" method="post"	onsubmit="return dropDownVal()">
					<TABLE BORDER=1 CELLPADDING=15 align="center">
						<TR>
							<TD>
								<input id="txtEquiClave" name="txtEquiClave" label="Clave" class="easyui-textbox" prompt="Clave" data-options="" style="width:300px">
								<BR>
							</TD>
						</TR>
						<TR>
							<TD>
								<input id="txtEquiTipo" name="txtEquiTipo" label="Descripción" class="easyui-textbox" prompt="Descripción" data-options="" style="width:300px">
								<BR>
							</TD>
						</TR>
						<TR>
							<TD>
								<input id="txtEquiDescripcion" name="txtEquiDescripcion" label="Descripción" class="easyui-textbox" prompt="Descripción" data-options="" style="width:300px">
								<BR>
							</TD>
						</TR>
						<TR>
							<TD>
								<div align="center">
								<div class="btn-group btn-group-lg" role="group" aria-label="...">
									<button id="btnAltaEditEquipo" type="button" onclick="guardaEquipo()" class="btn btn-primary btn-sm">ACTUALIZAR</button>
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
	function abrirModalEdicionEquipo(tipoOperacion)
	{
		switch(tipoOperacion)
		{
			case "EDICIONEQUIPO":
				var row = $('#dgEquipamiento').datagrid('getSelected');
				if (row)
				{
					$('#tipoOperacionEquipos').val(tipoOperacion);
					
					$('#dlgEquipos').dialog('open').dialog('setTitle','Editar acabado');
					$('#fmEditarAcabado').form('load',row.IdEquipo);

					var casoSelected = row.IdEquipo;
					var dataSelectedContent = 'ID=' + casoSelected;

					$.ajax (
					{
						url: 	'php/binding/getEquipamientoByID.php',
						type:   'post',
						dataType: "json",
						data: 	dataSelectedContent,
						success: function(request)
						{
							//alert(request.Clave+" "+request.Descripcion);
							$('#txtEquiClave').textbox("setValue",request.Clave);
							$('#txtEquiTipo').textbox("setValue",request.Tipo);
							$('#txtEquiDescripcion').textbox("setValue",request.Descripcion);
						},
						error: 	function(request, settings)
						{
							alert(request.responseText);
						}
					});
				}
				else
				{
					alert("Debe seleccionar un acabado dando clic sobre el registro para poder editarlo.");
				}
			break;
			
			case "ALTAEQUIPO":
				$('#tipoOperacionEquipos').val(tipoOperacion);
				
				$('#dlgEquipos').dialog('open').dialog('setTitle','Nuevo equipo');
				$('#fmEditarEquipo').form('load');
				
				$("#btnAltaEditEquipo").html('GUARDAR');
			break;
		}
		
	}// FIN 
	
	function guardaEquipo()
	{
		var tipoOperacionGuardado= $('#tipoOperacionEquipos').val();
		switch(tipoOperacionGuardado)
		{
			case "EDICIONEQUIPO":
				alert("Se actualizó la información correctamente");
			break;
			case "ALTAEQUIPO":
				alert("Se guardo correctamente el nuevo acabado");
			break;
		}
		
	}
	
	
	
	</script>


